<?php

/**
 * @package SP Page Builder
 * @author JoomShaper http://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2023 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Media Folder Trait files for managing the folders operation.
 * 
 * @version 4.1.0
 */

use Joomla\CMS\Factory;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Filter\OutputFilter;
use Joomla\CMS\Uri\Uri;

trait MediaFolderTrait
{
    /**
     * Media Folder endpoint for the API.
     * 
     * @return void
     * @version 4.1.0
     */
    public function folders()
    {
        $method = $this->getInputMethod();
        $this->checkNotAllowedMethods(['PUT'], $method);

        switch ($method) {
            case 'GET':
                $this->getAllFolders();
                break;
            case 'POST':
                $this->createMediaFolder();
                break;

            case 'DELETE':
                $this->deleteMediaFolders();
                break;
            case 'PATCH':
                $this->renameFolder();
                break;
        }
    }

    /**
     * Get all media files from the database.
     * 
     * @return void
     * @version 4.1.0
     */
    private function getAllFolders()
    {
        $model = $this->getModel('Media');
        $media = $model->getFolders();

        $report['breadcrumbs'] = $media['breadcrumbs'];
        $report['folders'] = $media['folders'];
        $report['folders_list'] = $media['folders_list'];

        $items = array();

        foreach ($media['items'] as $key => $item) {

            $item 					= str_replace('\\', '/',$item);
            $root_path 				= str_replace('\\', '/', JPATH_ROOT);
            $path 					= str_replace($root_path . '/', '', $item);

            $items[$key]['path'] 	= '/' . $path;
            $thumb 					= dirname($path) . '/_sp-pagebuilder_thumbs/' . basename($path);

            if(file_exists(JPATH_ROOT . '/' . $thumb))
            {
                $items[$key]['src'] = Uri::root(true) . '/' . $thumb;
            }
            else
            {
                $items[$key]['src'] = Uri::root(true) . '/' . $path;
            }

            $filename 				= basename($item);
            $title 					= File::stripExt($filename);
            $ext 					= File::getExt($filename);

            $items[$key]['id'] 			= 0;
            $items[$key]['title'] 		= $title;
            $items[$key]['ext'] 		= $ext;
            $items[$key]['type'] 		= ( $ext == 'pdf' ) ? 'pdf' : 'image';
        }

        $report['items'] = $items;

        $this->sendResponse($report);
    }

    private function createMediaFolder()
    {
        $input = Factory::getApplication()->input;
        $folder = $input->get('folder', '', 'STRING');

        $dirname = dirname($folder);
        $basename = OutputFilter::stringURLSafe(basename($folder));
        $folder = $dirname . '/' . $basename;

        $report = array();
        $report['status'] = false;
        $fullName = JPATH_ROOT . $folder;

        if (Folder::exists(JPATH_ROOT . $folder))
        {
            $response['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_FOLDER_EXISTS');
        	$this->sendResponse($response, 500);
        }

        if (!Folder::create(JPATH_ROOT . $folder, 0755))
        {
            $response['message'] = Text::_('COM_SPPAGEBUILDER_MEDIA_MANAGER_FOLDER_CREATION_FAILED');
            $this->sendResponse($response, 500);
        }

        $folder_info['name'] = basename($folder);
        $folder_info['relname'] = $folder;
        $folder_info['fullname'] = $fullName;

        $report['status'] = true;
        $report['output'] = $folder_info;

        $this->sendResponse($report, 201);
    }

    private function deleteMediaFolders()
    {
        $input = Factory::getApplication()->input;
        $folder = $input->json->get('folder', '', 'STRING');
        $deleteItem = $input->json->get('deleteItem', '', 'STRING');
        $model = $this->getModel('Media');

        $dirname = dirname($folder);
        $basename = OutputFilter::stringURLSafe(basename($folder));
        $folder = $dirname . '/' . $basename;
        $report = array();
        $report['status'] = false;

        if (!Folder::exists(JPATH_ROOT . $folder)) {
            $response['message'] = Text::_("COM_SPPAGEBUILDER_MEDIA_MANAGER_FOLDER_EXISTS");
            $this->sendResponse($response, 500);
        }

        if ($deleteItem === 'multiple') {
            $mediaDelete = $model->removeMediaByPath(substr($folder, 1) . '/');
        } else {
            $mediaDelete = true;
        }

        if ($mediaDelete === true) {
            if (!Folder::delete(JPATH_ROOT . $folder)) {
                $response['message'] = Text::_("COM_SPPAGEBUILDER_MEDIA_MANAGER_FOLDER_DELETE_FAILED");
                $this->sendResponse($response, 500);
            }

            $folder_info['name'] = basename($folder);
            $folder_info['relname'] = $folder;

            $report['status'] = true;
            $report['output'] = $folder_info;

            $this->sendResponse($report, 200);
        } else {
            $response['message'] = Text::_("COM_SPPAGEBUILDER_MEDIA_MANAGER_FOLDER_DELETE_FAILED");
            $this->sendResponse($response, 500);
        }
    }

    private function renameFolder()
	{
		$input  = Factory::getApplication()->input;
		$model  = $this->getModel('Media');
		$currentfolder = $input->post->get('currentfolder', '', 'STRING');
		$newfolder = $input->post->get('newfolder', '', 'STRING');
		$renameItem = $input->post->get('renameItem', '', 'STRING');
		$dirname = dirname($currentfolder);
		$currentbasename = OutputFilter::stringURLSafe(basename($currentfolder));
		$newbasename = OutputFilter::stringURLSafe(basename($newfolder));
		$src = $dirname . '/' . $currentbasename;
		$dest = $dirname . '/' . $newbasename;

		if (Folder::exists(JPATH_ROOT . $currentfolder))
		{
			if ($renameItem === 'multiple')
			{
				$mediaRename = $model->editMediaPathById(substr($src, 1) . '/', substr($dest, 1) . '/');
			}
			else
			{
				$mediaRename = true;
			}

			if ($mediaRename === true)
			{
				if (Folder::move(JPATH_ROOT . $src, JPATH_ROOT . $dest, $path = '', $use_streams = false))
				{
					$report['status'] = true;
					$folder_info['name'] = basename($dest);
					$folder_info['relname'] = $dest;
					$folder_info['fullname'] = JPATH_ROOT . $dest;
					$report['output'] = $folder_info;
				}
				else
				{
					$report['output'] = "FOLDER RENAME FAILED";
				}
			}
			else
			{
				$report['output'] = $mediaRename;
				//'MEDIA FILES COULD NOT BE RENAMED';
			}
		}
		else
		{
			$report['output'] = "FOLDER_DOES_NOT_EXISTS";
		}

		$this->sendResponse($report);
	}
}
