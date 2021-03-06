<?php
namespace NJT\FastDup\Translation;

defined('ABSPATH') || exit;
class I18n_Admin {

  public static function get_translation() {
    $translation_array = array(
      'error_nonce' => __('Please refresh and try again.', 'njt-fastdup'),
      'dashboard' => array(
        //Common
        'learn_more' => __('Learn More', 'njt-fastdup'),
        'pass' => __('Pass', 'njt-fastdup'),
        'error' => __('Error', 'njt-fastdup'),
        'waiting' => __('Waiting', 'njt-fastdup'),
        'done' => __('Done', 'njt-fastdup'),
        'process' => __('Process', 'njt-fastdup'),
        'notice' => __('Notice', 'njt-fastdup'),
        'name' => __('Name', 'njt-fastdup'),
        'created' => __('Created', 'njt-fastdup'),
        'size' => __('Size', 'njt-fastdup'),
        'status' => __('Status', 'njt-fastdup'),
        'action' => __('Action', 'njt-fastdup'),
        'edit' => __('Edit', 'njt-fastdup'),
        'update' => __('Update', 'njt-fastdup'),
        'delete' => __('Delete', 'njt-fastdup'),
        'cancel' => __('Cancel', 'njt-fastdup'),
        'clear' => __('Clear', 'njt-fastdup'),
        'yes' => __('Yes', 'njt-fastdup'),
        'no' => __('No', 'njt-fastdup'),
        'delete_selected' => __('Delete Selected', 'njt-fastdup'),
        'required_field' => __('This field is required', 'njt-fastdup'),
        'select_all' => __('Select all', 'njt-fastdup'),
        // Packages
        'packages' => __('Packages', 'njt-fastdup'),
        'stop_build' => __('Stop Build', 'njt-fastdup'),
        'stop_package_tooltip' => __('If an issue occurs while the package is processing, please click delete to erase the current package without status of completion and clean up tmp file.', 'njt-fastdup'),
        'stop_package' => __('Stop Package Successfully', 'njt-fastdup'),
        'create_your_first_package' => __('Create Your First Package', 'njt-fastdup'),
        'installer_file' => __('Installer File', 'njt-fastdup'),
        'new_package' => __('New Package', 'njt-fastdup'),
        'no_package' => __('No Package', 'njt-fastdup'),
        'download' => __('Download', 'njt-fastdup'),
        'in_process' => __('Processing', 'njt-fastdup'),
        'process_build_package' => __('Processing Build Package', 'njt-fastdup'),
        'build_status_fail' => __('Built Unsuccessfully', 'njt-fastdup'),
        'build_status_success' => __('Built Successfully', 'njt-fastdup'),
        'archive' => __('Archive', 'njt-fastdup'),
        'log' => __('Log', 'njt-fastdup'),
        'view_log' => __('View Log', 'njt-fastdup'),
        'delete_package_confirm' => __('Are you sure you want to delete this package?', 'njt-fastdup'),
        'build_package' => __('Build Package', 'njt-fastdup'),
        'wait_process_package' => __('Please wait for the processing package to be done!', 'njt-fastdup'),
        'view_process' => __('View Process', 'njt-fastdup'),
        //Create Package
        'general_requirements' => __('General Requirements', 'njt-fastdup'),
        'loading_process' => __('Processing. Please wait a moment :)', 'njt-fastdup'),
        'size_checks' => __('Size Check', 'njt-fastdup'),
        'size_checks_note' => __('List of images more than 4MB and other files more than 150MB (check to exclude from the archive)', 'njt-fastdup'),
        'sub_sites' => __('Sub Sites', 'njt-fastdup'),
        'sub_sites_note' => __('A sub site is a site that is separate from this site but in the same directory. If not important, exclude these sub sites to make the zip process faster. If you want to back up that sub site, you should install this plugin on the sub site for backup.', 'njt-fastdup'),
        'read_checks' => __('Read Check', 'njt-fastdup'),
        'read_checks_note' => __('There is an error occured while PHP is trying to read these items, so they will not be added in the package. You can contact your host to resolve this. In case these items are not important, please just skip them.', 'njt-fastdup'),
        'recursive_links' => __('Recursive Links', 'njt-fastdup'),
        'unreadable_items' => __('Unreadable Items', 'njt-fastdup'),
        'rescan' => __('Rescan', 'njt-fastdup'),
        'create_package_now' => __('Create Package Now', 'njt-fastdup'),
        // Package Done
        'zip_file' => __('Zipping Files', 'njt-fastdup'),
        'clean_up' => __('Cleaning Up', 'njt-fastdup'),
        'package_done' => __('Package Done', 'njt-fastdup'),
        'download_file' => __('Download Files', 'njt-fastdup'),
        'time_process' => __('Process Time:', 'njt-fastdup'),
        'installer' => __('Installer', 'njt-fastdup'),

        // Templates
        'templates' => __('Templates', 'njt-fastdup'),
        'template' => __('Template', 'njt-fastdup'),
        'new_template' => __('New Template', 'njt-fastdup'),
        'delete_template_confirm' => __('Are you sure you want to delete this template?', 'njt-fastdup'),
        'run_now' => __('Run Now', 'njt-fastdup'),
        'template_name' => __('Template Name', 'njt-fastdup'),
        'package_name' => __('Package Name', 'njt-fastdup'),
        'file_extensions' => __('File Extensions:', 'njt-fastdup'),
        'files_and_directories' => __('Files and Directories', 'njt-fastdup'),
        'archive_only_database' => __('Archive Only The Database', 'njt-fastdup'),
        'enable_file_filters' => __('Enable File Filters (Switch OFF to archive all files and directories)', 'njt-fastdup'),
        'database' => __('Database', 'njt-fastdup'),
        'enable_table_filters' => __('Enable Table Filters', 'njt-fastdup'),
        'switch_off_table' => __('(Switch OFF to archive all tables)', 'njt-fastdup'),
        'table_filter_note_1' => __('Selected tables will not be added to the database script.', 'njt-fastdup'),
        'table_filter_note_2' => __(' Errors can be caused by missing excluded tables!', 'njt-fastdup'),
        'hover_text_archive_1' => __('Hover & select to navigate', 'njt-fastdup'),
        'hover_text_archive_2' => __('to exclude', 'njt-fastdup'),
        // 'exclude_text_archive' => __('Excluded files & directories (relative to WordPress root)', 'njt-fastdup'),
        'exclude_text_archive' => __('Excluded files & directories', 'njt-fastdup'),
        'file_exts_text_archive' => __('* The directories, extensions and files above will be excluded from the archived file', 'njt-fastdup'),
        'database_popover_content_1' => __('Checked tables will not be added to the database script.', 'njt-fastdup'),
        'database_popover_content_2' => __('Errors can be caused by missing excluded tables!', 'njt-fastdup'),
        'media' => __('Media', 'njt-fastdup'),
        'archive' => __('Archive', 'njt-fastdup'),
        'add_template' => __('Add Template', 'njt-fastdup'),
      ),
    );
    return $translation_array;
  }
}
