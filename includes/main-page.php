<?php
function roc_form_main_page_callback() {
    $icons = roc_form_get_icon_urls();
    ?>
    <div class="wrap">
        <h1 style="display: flex; justify-content: space-between; align-items: center;">
            ROC Easy Forms
            <button id="add-field" class="button button-primary">添加欄位</button>
        </h1>
        <div id="roc-form-container" style="display: flex; gap: 20px;">
            <!-- 欄位庫區域 -->
            <div id="field-library" style="width: 30%; border: 1px solid #ddd; padding: 10px;">
                <?php include_once plugin_dir_path(__FILE__) . 'field-library.php'; ?>
            </div>
            <!-- 布局區域 -->
            <div id="layout-area" style="width: 70%; border: 1px solid #ddd; padding: 10px;">
                <?php include_once plugin_dir_path(__FILE__) . 'layout-area.php'; ?>
            </div>
        </div>
    </div>
    <?php
}
?>
