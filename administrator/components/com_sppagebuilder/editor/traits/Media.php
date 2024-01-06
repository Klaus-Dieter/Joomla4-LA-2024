<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Filesystem\Path;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Layout\FileLayout;
use Joomla\CMS\Helper\MediaHelper;
use Joomla\CMS\Filter\OutputFilter;
use Joomla\CMS\Component\ComponentHelper;

// No direct access
defined('_JEXEC') or die('Restricted access');

JLoader::register('SppagebuilderHelperImage', JPATH_ROOT . '/components/com_sppagebuilder/helpers/image.php');

/**
 * Media trait files for managing the CRUD operation.
 * 
 * @version 4.1.0
 */
trait Media
{
	/**
	 * Media endpoint for the API.
	 * 
	 * @return void
	 * @version 4.1.0
	 */
	public function media()
	{
		$method = $this->getInputMethod();
		$this->checkNotAllowedMethods(['PUT'], $method);

		switch ($method)
		{
			case 'GET':
				$this->getAllMedia();
				break;
			case 'POST':
				$this->uploadMedia();
				break;
			case 'PATCH':
				$this->renameMedia();
				break;
			case 'DELETE':
				$this->deleteMedia();
				break;
		}
	}

	/**
	 * Get all media files from the database.
	 * 
	 * @return void
	 * @version 4.1.0
	 */
	private function getAllMedia()
	{
		$input = Factory::getApplication()->input;
		$layout = $input->get('layout', 'browse', 'STRING');
		$date = $input->get('date', NULL, 'STRING');
		$page = $input->get('page', 1, 'INT');
		$search = $input->get('search', NULL, 'STRING');
		$limit = $input->get('limit', 30, 'INT');

		$offset = ($page - 1) * $limit;

		$model = $this->getModel('Media');

		if (($layout == 'browse') || ($layout == 'modal'))
		{
			$items = $model->getItems();
			$filters = $model->getDateFilters($date, $search);
			$total = $model->getTotalMedia($date, $search);
		}

		$report = [];
		$report['items'] = $items;
		$report['filters'] = $filters;
		$report['pageNav'] 	= false;

		if ($total > ($limit + $offset))
		{
			$report['pageNav'] 	= true;
		}

		$this->sendResponse($report);
	}

	/**
	 * Upload multiple media files
	 * 
	 * @return void
	 * @version 4.1.0
	 */
	private function uploadMedia()
	{
		$model  = $this->getModel('Media');
		$user 	= Factory::getUser();

		$files = $this->getFilesInput('file', null);
		$dir  = $this->getInput('folder', '', 'PATH');

		$report = [];
		$error = false;

		$authorised = $user->authorise('core.edit', 'com_sppagebuilder') || $user->authorise('core.edit.own', 'com_sppagebuilder');

		if (!$authorised)
		{
			$report['status'] = false;
			$report['output'] = Text::_('JERROR_ALERTNOAUTHOR');
			$this->sendResponse($report, 403);
		}

		$params = ComponentHelper::getParams('com_media');
		$contentLength = (int) $_SERVER['CONTENT_LENGTH'];
		$mediaHelper = new MediaHelper;
		$postMaxSize = $mediaHelper->toBytes(ini_get('post_max_size'));
		$memoryLimit = $mediaHelper->toBytes(ini_get('memory_limit'));

		$statusCode = 200;

		if (!empty($files) && is_array($files))
		{
			foreach ($files as $file)
			{
				if ($file['error'] == UPLOAD_ERR_OK)
				{
					$error = false;

					// Check for the total size of post back data.
					if (($postMaxSize > 0 && $contentLength > $postMaxSize) || ($memoryLimit != -1 && $contentLength > $memoryLimit))
					{
						$report['status'] = false;
						$report['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_MEDIA_TOTAL_SIZE_EXCEEDS');
						$error = true;
						$statusCode = 400;
					}

					$uploadMaxSize = $params->get('upload_maxsize', 0) * 1024 * 1024;
					$uploadMaxFileSize = $mediaHelper->toBytes(ini_get('upload_max_filesize'));

					if (($file['error'] == 1) || ($uploadMaxSize > 0 && $file['size'] > $uploadMaxSize) || ($uploadMaxFileSize > 0 && $file['size'] > $uploadMaxFileSize))
					{
						$report['status'] = false;
						$report['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_MEDIA_LARGE');
						$error = true;
						$statusCode = 400;
					}

					// File formats
					$accepted_file_formats = array(
						'image' => array('jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'),
						'video' => array('mp4', 'mov', 'wmv', 'avi', 'mpg', 'ogv', '3gp', '3g2'),
						'audio' => array('mp3', 'm4a', 'ogg', 'wav'),
						'attachment' => array('pdf', 'doc', 'docx', 'key', 'ppt', 'pptx', 'pps', 'ppsx', 'odt', 'xls', 'xlsx', 'zip', 'json'),
					);

					// Upload if no error found
					if (!$error)
					{
						$date = Factory::getDate();
						$file_ext = strtolower(File::getExt($file['name']));

						if (self::in_array($file_ext, $accepted_file_formats))
						{
							$media_type = self::array_search($file_ext, $accepted_file_formats);

							if ($media_type == 'image')
							{
								$mediaParams = ComponentHelper::getParams('com_media');
								$folder_root = $mediaParams->get('file_path', 'images') . '/';
							}
							elseif ($media_type == 'video')
							{
								$folder_root = 'media/videos/';
							}
							elseif ($media_type == 'audio')
							{
								$folder_root = 'media/audios/';
							}
							elseif ($media_type == 'attachment')
							{
								$folder_root = 'media/attachments/';
							}
							elseif ($media_type == 'fonts')
							{
								$folder_root = 'media/fonts/';
							}

							$report['type'] = $media_type;

							$folder = $folder_root . HTMLHelper::_('date', $date, 'Y') . '/' . HTMLHelper::_('date', $date, 'm') . '/' . HTMLHelper::_('date', $date, 'd');

							if ($dir != '')
							{
								$folder = ltrim($dir, '/');
							}

							if (!Folder::exists(JPATH_ROOT . '/' . $folder))
							{
								Folder::create(JPATH_ROOT . '/' . $folder, 0755);
							}

							if ($media_type == 'image')
							{
								if (!Folder::exists(JPATH_ROOT . '/' . $folder . '/_spmedia_thumbs'))
								{
									Folder::create(JPATH_ROOT . '/' . $folder . '/_spmedia_thumbs', 0755);
								}
							}

							$name = $file['name'];
							$path = $file['tmp_name'];

							// Do no override existing file
							$media_file = preg_replace('#\s+#', "-", File::makeSafe(basename(strtolower($name))));
							$base_name  = File::stripExt($media_file) . (int)(microtime(true) * 1000);
							$ext        = File::getExt($media_file);
							$media_name = $base_name . '.' . $ext;
							$dest       = str_replace('\\', '/', JPATH_ROOT . '/' . $folder . '/' . $media_name);
							$src        = str_replace('\\', '/', $folder . '/'  . $media_name);


							if (File::upload($path, $dest, false, true))
							{
								$media_attr = [];
								$thumb = '';

								if ($media_type == 'image')
								{
									if (strtolower($ext) == 'svg')
									{
										$report['src'] = Uri::root(true) . '/' . $src;
									}
									else
									{
										$image = new SppagebuilderHelperImage($dest);
										$media_attr['full'] = ['height' => $image->height, 'width' => $image->width];

										if (($image->width > 300) || ($image->height > 225))
										{
											$thumbDestPath = dirname($dest) . '/_spmedia_thumbs';
											$created = $image->createThumb(array('300', '300'), $thumbDestPath, $base_name, $ext);

											if ($created == false)
											{
												$report['status'] = false;
												$report['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_FILE_NOT_SUPPORTED');
												$error = true;
												$statusCode = 400;
											}

											$report['src'] = Uri::root(true) . '/' . $folder . '/_spmedia_thumbs/' . $base_name . '.' . $ext;
											$thumb = $folder . '/_spmedia_thumbs/'  . $base_name . '.' . $ext;
											$thumb_dest = $thumbDestPath . '/' . $base_name . '.' . $ext;
											list($width, $height) = getimagesize($thumb_dest);
											$media_attr['thumbnail'] = ['height' => $height, 'width' => $width];
											$report['thumb'] = $thumb;
										}
										else
										{
											$report['src'] = Uri::root(true) . '/' . $src;
											$report['thumb'] = $src;
										}
										// Create placeholder for lazy load
										$this->createMediaPlaceholder($dest, $base_name, $ext);
									}
								}

								$insert_id = $model->insertMedia($base_name, $src, json_encode($media_attr), $thumb, $media_type);
								$report['media_attr'] = $media_attr;
								$report['status'] = true;
								$report['title'] = $base_name;
								$report['id'] = $insert_id;
								$report['path'] = $src;

								$layout_path = JPATH_ROOT . '/administrator/components/com_sppagebuilder/layouts';
								$format_layout = new FileLayout('media.format', $layout_path);
								$report['message'] = $format_layout->render(array('media' => $model->getMediaByID($insert_id), 'innerHTML' => true));
							}
							else
							{
								$report['status'] = false;
								$report['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_UPLOAD_FAILED');
								$statusCode = 400;
							}
						}
						else
						{
							$report['status'] = false;
							$report['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_FILE_NOT_SUPPORTED');
							$statusCode = 400;
						}
					}
				}
			}
		}
		else
		{
			$report['status'] = false;
			$report['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_UPLOAD_FAILED');
			$statusCode = 400;
		}

		$this->sendResponse($report, $statusCode);
	}


	private static function in_array($needle, $haystack)
	{

		$it = new RecursiveIteratorIterator(new RecursiveArrayIterator($haystack));

		foreach ($it as $element)
		{
			if ($element == $needle)
			{
				return true;
			}
		}

		return false;
	}


	private static function array_search($needle, $haystack)
	{

		foreach ($haystack as $key => $value)
		{
			$current_key = $key;

			if ($needle === $value or (is_array($value) && self::array_search($needle, $value) !== false))
			{
				return $current_key;
			}
		}
		return false;
	}

	/**
	 * @since 2020
	 * Create light weight image placeholder for lazy load feature
	 */
	private function createMediaPlaceholder($dest, $base_name, $ext)
	{
		$placeholder_folder_path = JPATH_ROOT . '/media/com_sppagebuilder/placeholder';

		if (!Folder::exists($placeholder_folder_path))
		{
			Folder::create($placeholder_folder_path, 0755);
		}

		$image = new SppagebuilderHelperImage($dest);
		list($srcWidth, $srcHeight) = $image->getDimension();
		$width = 60;
		$height = $width / ($srcWidth / $srcHeight);
		$image->createThumb(array('60', $height), $placeholder_folder_path, $base_name, $ext, 20);
	}

	/**
	 * @since 2020
	 * Delete placeholder image if exists
	 */
	private function deleteImagePlaceholder($file_path)
	{
		$filename = basename($file_path);
		$src = JPATH_ROOT . '/media/com_sppagebuilder/placeholder' . '/' . $filename;
		if (File::exists($src))
		{
			File::delete($src);
		}
	}

	/**
	 * Summary of deleteMedia
	 * @return void
	 */
	public function deleteMedia()
	{
		$input 		= Factory::getApplication()->input;
		$user		= Factory::getUser();
		$model 		= $this->getModel('Media');

		$data = $input->json->get('data', [], 'ARRAY');
		$response = [];

		if (empty($data))
		{
			$response['status'] = false;
			$response['message'] = 'Something went wrong!';

			$this->sendResponse($response, 500);
		}

		foreach ($data as $item)
		{
			if (!$this->removeMediaItem($item, $model, $user))
			{
				continue;
			}

			$response['data'] = 'Media item deleted!';
		}

		$response['status'] = true;

		$this->sendResponse($response);
	}

	/**
	 * Remove a media item.
	 *
	 * @param 	array 	$item	The media item array.
	 * @param 	object 		$model	The media model.
	 * @param 	object 		$user	The user class object.
	 *
	 * @return 	bool
	 * @since 	4.0.0
	 */
	private function removeMediaItem($item, $model, $user): bool
	{
		$mediaType = $item['type'];

		if ($mediaType === 'folder')
		{
			$path = Path::clean($item['path']);

			$folder = JPATH_ROOT . $path;

			if (Folder::exists($folder))
			{
				Folder::delete($folder);

				return true;
			}

			return false;
		}
		elseif ($mediaType === 'local')
		{
			$src = JPATH_ROOT . '/' . Path::clean($item['path']);

			if (\file_exists($src))
			{
				$media = $model->getMediaByPath($item['path']);
				if (isset($media->thumb) && $media->thumb)
				{
					if (File::exists(JPATH_ROOT . '/' . $media->thumb))
					{
						File::delete(JPATH_ROOT . '/' . $media->thumb); // Delete thumb
					}
				}

				// Delete placeholder too
				$this->deleteImagePlaceholder($item['path']);
				// Remove Path.
				$removeMediaByPath = $model->removeMediaByPath($item['path']);

				if (!File::delete($src) || !$removeMediaByPath)
				{
					return false;
				}

				return true;
			}

			return false;
		}
		elseif ($mediaType === 'local+db')
		{

			$media = $model->getMediaByID($item['id']);
			$authorised = $user->authorise('core.edit', 'com_sppagebuilder') || ($user->authorise('core.edit.own', 'com_sppagebuilder') && ($media->created_by === $user->id));

			if (!$authorised)
			{
				return false;
			}

			if (!$model->removeMediaByID($item['id']))
			{
				return false;
			}

			$src = JPATH_ROOT . '/' . Path::clean(!empty($media->path) ? $media->path : '');

			if (!empty($media->thumb))
			{
				$thumbSrc = JPATH_ROOT . '/' . Path::clean(!empty($media->thumb) ? $media->thumb : '');

				if (\file_exists($thumbSrc))
				{
					\unlink($thumbSrc);
				}
			}

			// Delete placeholder too
			$this->deleteImagePlaceholder($item['path']);

			if (\file_exists($src))
			{
				\unlink($src);

				return true;
			}

			return false;
		}

		return false;
	}

	// Create folder
	public function createFolder()
	{
		$input  = Factory::getApplication()->input;
		$folder = $input->post->get('folder', '', 'STRING');

		$dirname = dirname($folder);
		$basename = OutputFilter::stringURLSafe(basename($folder));
		$folder = $dirname . '/' . $basename;

		$report = array();
		$report['status'] = false;
		$fullname = JPATH_ROOT . $folder;

		if (!Folder::exists(JPATH_ROOT . $folder))
		{
			if (Folder::create(JPATH_ROOT . $folder, 0755))
			{
				$report['status'] = true;

				$folderInfo['name'] = basename($folder);
				$folder_info['relname'] = $folder;
				$folder_info['fullname'] = $fullname;
				$report['output'] = $folder_info;
			}
			else
			{
				$report['output'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_FOLDER_CREATION_FAILED');
			}
		}
		else
		{
			$report['output'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_FOLDER_EXISTS');
		}

		$this->sendResponse($report);
	}

	public function deleteFolder()
	{
		$input  = Factory::getApplication()->input;
		$folder = $input->post->get('folder', '', 'STRING');
		$deleteItem = $input->post->get('deleteItem', '', 'STRING');
		$model  = $this->getModel();
		$dirname = dirname($folder);
		$basename = OutputFilter::stringURLSafe(basename($folder));
		$folder = $dirname . '/' . $basename;
		$report = array();
		$report['status'] = false;

		if (Folder::exists(JPATH_ROOT . $folder))
		{
			if ($deleteItem === 'multiple')
			{
				$mediaDelete = $model->removeMediaByPath(substr($folder, 1) . '/');
			}
			else
			{
				$mediaDelete = true;
			}

			if ($mediaDelete === true)
			{
				if (Folder::delete(JPATH_ROOT . $folder))
				{
					$report['status'] = true;
					$folder_info['name'] = basename($folder);
					$folder_info['relname'] = $folder;
					$report['output'] = $folder_info;
				}
				else
				{
					$report['output'] = "FOLDER DELETE FAILED";
				}
			}
			else
			{
				$report['output'] = 'MEDIA FILES COULD NOT BE DELETED';
			}
		}
		else
		{
			$report['output'] = "FOLDER_DOES_NOT_EXISTS";
		}

		$this->sendResponse($report);
	}

	/**
	 * Rename the media file
	 *
	 * @return void
	 */
	public function renameMedia()
	{
		$response = new stdClass();

		$id = $this->getInput('id', 0, 'INT');
		$title = $this->getInput('title', '', 'STR');
		$path = $this->getInput('path', '', 'STR');
		$thumb = $this->getInput('thumb', '', 'STR');

		$mediaType = empty($id) ? 'folder' : 'DB';

		$data = new \stdClass;
		$data->id = $id;
		$data->title = $title;
		$data->path = $this->replacePathByTitle($path, $title);
		$data->thumb = $this->replacePathByTitle($thumb, $title);
		$data->modified_on = Factory::getDate()->toSql();
		$data->modified_by = Factory::getUser()->id;

		try
		{
			if ($mediaType === 'DB')
			{
				$db 	= Factory::getDbo();
				$db->updateObject('#__spmedia', $data, 'id');
			}

			\rename(JPATH_ROOT . '/' . $path, JPATH_ROOT . '/' . $data->path);
			\rename(JPATH_ROOT . '/' . $thumb, JPATH_ROOT . '/' . $data->thumb);

			$response->message = Text::_("COM_SPPAGEBUILDER_MEDIA_MANAGER_MEDIA_RENAME_SUCCESS");
			$response->status = true;

			$this->sendResponse($response, 200);
		}
		catch (Exception $e)
		{
			$response->message = Text::_("COM_SPPAGEBUILDER_MEDIA_MANAGER_MEDIA_RENAME_ERROR");
			$response->status = false;

			$this->sendResponse($response, 500);
		}
	}

	private function replacePathByTitle($path, $title)
	{
		$fileName = pathinfo($path, PATHINFO_FILENAME);
		$basename = basename($path);

		$newFile = str_replace($fileName, $title, $basename);

		return str_replace($basename, $newFile, $path);
	}
}
