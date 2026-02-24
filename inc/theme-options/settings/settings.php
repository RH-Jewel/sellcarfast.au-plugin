<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('CSF')) {
    return;
}

// All Settings

$includes_files = array(

    // General Settings
    array(
        'file-name' => 'general',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/general'
    ),
    // Header Settings
    array(
        'file-name' => 'header',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/header'
    ),
    // Breadcrumb Settings
    array(
        'file-name' => 'breadcrumbs',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/breadcrumbs'
    ),
    // Post Settings
    array(
        'file-name' => 'post',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/post'
    ),
    // 404 Settings
    array(
        'file-name' => 'page',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/page'
    ),
    // Blog Settings
    array(
        'file-name' => 'blog',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/blog'
    ),
    // Vehicle Settings
    array(
        'file-name' => 'vehicle-options',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/vehicle'
    ),
    // Woo-Commerce Settings
    array(
        'file-name' => 'woo-commerce',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/woo-commerce'
    ),
    // 404 page Settings
    array(
        'file-name' => 'page',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/404'
    ),
    // Color Settings
    array(
        'file-name' => 'color',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/color'
    ),
    // Footer Settings
    array(
        'file-name' => 'footer',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/footer'
    ),
    // Custom Script Settings
    array(
        'file-name' => 'custom_scripts',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/custom-scripts'
    ),
    // Backup Settings
    array(
        'file-name' => 'backup',
        'folder-name' => EGNS_CORE_INC . '/theme-options/settings/backup'
    ),
);

if (is_array($includes_files) && !empty($includes_files)) {
    foreach ($includes_files as $file) {
        if (file_exists($file['folder-name'] . '/' . $file['file-name'] . '.php')) {
            require_once $file['folder-name'] . '/' . $file['file-name'] . '.php';
        }
    }
}
