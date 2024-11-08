<?php
/*
Plugin Name: ROC Easy Forms
Description: 一款用於建立自訂表單的 WordPress 外掛
Version: 1.0
Author: Your Name
*/

// 載入 CSS 和 JS 資源
function roc_form_enqueue_assets() {
    wp_enqueue_style('roc-bootstrap', plugin_dir_url(__FILE__) . 'assets/css/bootstrap.min.css');
    wp_enqueue_style('roc-jquery-ui', plugin_dir_url(__FILE__) . 'assets/css/jquery-ui.css');
    wp_enqueue_style('roc-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    
    wp_enqueue_script('roc-bootstrap', plugin_dir_url(__FILE__) . 'assets/js/bootstrap.bundle.min.js', ['jquery'], null, true);
    wp_enqueue_script('roc-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', ['jquery', 'jquery-ui-sortable'], null, true);
}
add_action('admin_enqueue_scripts', 'roc_form_enqueue_assets');

// 加入 ROC Easy Forms 後台頁面
function roc_form_register_menu() {
    add_menu_page(
        'ROC Easy Forms',      // 頁面標題
        'ROC Easy Forms',      // 選單名稱
        'manage_options',      // 權限需求
        'roc-easy-forms',      // 唯一 slug
        'roc_form_main_page_callback',  // 回調函數
        'dashicons-feedback',  // 圖標
        6                      // 排序
    );
}
add_action('admin_menu', 'roc_form_register_menu');

// 圖標函數：集中管理圖標
function roc_form_get_icon_urls() { 
    $base_url = plugin_dir_url(__FILE__) . 'assets/icons/';
    return [
        'column_1' => $base_url . 'column_1.svg',
        'column_2' => $base_url . 'column_2.svg',
        'column_3' => $base_url . 'column_3.svg',
    ];
}

// 引入主頁面
include_once plugin_dir_path(__FILE__) . 'includes/main-page.php';
