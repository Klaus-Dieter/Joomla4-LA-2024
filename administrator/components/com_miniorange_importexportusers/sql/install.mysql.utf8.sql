
CREATE TABLE IF NOT EXISTS `#__miniorange_importexport_customer_details` (
`id` int(11) UNSIGNED NOT NULL,
`email` VARCHAR(255) NOT NULL,
`password` VARCHAR(255) NOT NULL,
`admin_phone` VARCHAR(255) NOT NULL,
`customer_key` VARCHAR(255) NOT NULL,
`customer_token` VARCHAR(255) NOT NULL,
`api_key` VARCHAR(255) NOT NULL,
`status` VARCHAR(255) NOT NULL,
`login_status` tinyint(1) DEFAULT 0,
`importexport_keys` VARCHAR(255) NOT NULL,
`registration_status` VARCHAR(255) NOT NULL,
`transaction_id` VARCHAR(255) NOT NULL,
`email_count` int(11),
`sms_count` int(11),
`sml_lk` VARCHAR(128) NOT NULL,
`in_cmp` VARCHAR(255) NOT NULL,
`licenseExpiry` TIMESTAMP NULL DEFAULT NULL,
`supportExpiry` TIMESTAMP NULL DEFAULT NULL,
`licensePlan` VARCHAR(64) NOT NULL,
`miniorange_exli_thirtyd` int(11) DEFAULT 0,
`miniorange_exli_fifteend` int(11) DEFAULT 0,
`miniorange_exli_fived` int(11) DEFAULT 0,
`miniorange_exlid` int(11) DEFAULT 0,
`miniorange_lexpired` int(11) DEFAULT 0,
`miniorange_exli_tenth` int(11) DEFAULT 0,
`miniorange_exli_first` int(11) DEFAULT 0,
`plan_type` TEXT,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__miniorange_exportusers` (
`id` int(11) UNSIGNED NOT NULL,
`enable_export_users` tinyint(1) DEFAULT 0,
`mo_enable_column_based_export` tinyint(1) DEFAULT 0,
`enable_export_users_group` tinyint(1) DEFAULT 0,
`mo_sync_for_roles` VARCHAR(256) NOT NULL DEFAULT '["ALL"]',
`mo_column_based_export` VARCHAR(256) NOT NULL,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__miniorange_importusers` (
`id` int(11) UNSIGNED NOT NULL,
`mo_role_based_import` VARCHAR(256) NOT NULL DEFAULT '["ALL"]',
`mo_donot_update_existing_users` tinyint(1) DEFAULT 0,
`mo_delete_users_which_not_in_csv` tinyint(1) DEFAULT 0,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__miniorange_cronimport` (
`id` int(11) UNSIGNED NOT NULL,
`mo_enable_cron_import` tinyint(1) DEFAULT 0,
`send_email_to_updated_users` tinyint(1) DEFAULT 0,
`send_email_after_update` tinyint(1) DEFAULT 0,
`mo_path_to_be_imported_periodically` VARCHAR(256) NOT NULL,
`mo_cron_period` VARCHAR(256) NOT NULL,
`cron_default_check_timestamp` VARCHAR(256) NOT NULL,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

INSERT IGNORE INTO `#__miniorange_importexport_customer_details`(`id`,`login_status`) values (1,0);
INSERT IGNORE INTO `#__miniorange_exportusers`(`id`) values (1);
INSERT IGNORE INTO `#__miniorange_importusers`(`id`) values (1);
INSERT IGNORE INTO `#__miniorange_cronimport`(`id`) values (1);


