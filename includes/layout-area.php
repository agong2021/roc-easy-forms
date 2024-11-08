<?php

    $icons = roc_form_get_icon_urls();
    ?>
    <div id="roc-layout-area" class="layout-area">
        <!-- 預設單欄容器 -->
        <div class="roc-row single-column">
            <div class="roc-column">
                <div class="roc-placeholder">
                    <span>+</span>
                </div>
            </div>
            <div class="roc-row-controls">
                <button class="column-switch" data-columns="1">
                    <img src="<?php echo $icons['column_1']; ?>" alt="1 Column" />
                </button>
                <button class="column-switch" data-columns="2">
                    <img src="<?php echo $icons['column_2']; ?>" alt="2 Columns" />
                </button>
                <button class="column-switch" data-columns="3">
                    <img src="<?php echo $icons['column_3']; ?>" alt="3 Columns" />
                </button>
            </div>
        </div>
        
        <!-- 新增行按鈕 -->
        <button id="add-new-row" class="btn btn-primary full-width">新增行</button>
    </div>

    <style>
        .layout-area {
            width: 100%;
            float: right;
            padding: 15px;
            border: 1px solid #ddd;
            background: #f9f9f9;
        }

        .roc-row {
            border: 1px dashed #ccc;
            margin-bottom: 15px;
            padding: 10px;
            position: relative;
        }

        .roc-column {
            width: 100%;
            padding: 5px;
            border: 1px dashed #aaa;
            min-height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .roc-row-controls {
            position: absolute;
            top: -10px;
            right: 10px;
        }

        .column-switch img {
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        .roc-placeholder {
            font-size: 24px;
            color: #aaa;
            cursor: pointer;
        }

        .btn.full-width {
            width: 100%;
            margin-top: 10px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 新增行
            document.getElementById('add-new-row').addEventListener('click', function() {
                const layoutArea = document.getElementById('roc-layout-area');
                const newRow = document.createElement('div');
                newRow.className = 'roc-row single-column';
                newRow.innerHTML = `
                    <div class="roc-column">
                        <div class="roc-placeholder">+</div>
                    </div>
                    <div class="roc-row-controls">
                        <button class="column-switch" data-columns="1">
                            <img src="<?php echo $icons['column_1']; ?>" alt="1 Column" />
                        </button>
                        <button class="column-switch" data-columns="2">
                            <img src="<?php echo $icons['column_2']; ?>" alt="2 Columns" />
                        </button>
                        <button class="column-switch" data-columns="3">
                            <img src="<?php echo $icons['column_3']; ?>" alt="3 Columns" />
                        </button>
                    </div>`;
                layoutArea.insertBefore(newRow, this);
            });

            // 切換欄數
            document.addEventListener('click', function(e) {
                if (e.target.closest('.column-switch')) {
                    const button = e.target.closest('.column-switch');
                    const row = button.closest('.roc-row');
                    const columns = button.dataset.columns;
                    row.innerHTML = ''; // 清空欄位

                    for (let i = 0; i < columns; i++) {
                        const column = document.createElement('div');
                        column.className = 'roc-column';
                        column.innerHTML = '<div class="roc-placeholder">+</div>';
                        row.appendChild(column);
                    }

                    const controls = document.createElement('div');
                    controls.className = 'roc-row-controls';
                    controls.innerHTML = `
                        <button class="column-switch" data-columns="1">
                            <img src="<?php echo $icons['column_1']; ?>" alt="1 Column" />
                        </button>
                        <button class="column-switch" data-columns="2">
                            <img src="<?php echo $icons['column_2']; ?>" alt="2 Columns" />
                        </button>
                        <button class="column-switch" data-columns="3">
                            <img src="<?php echo $icons['column_3']; ?>" alt="3 Columns" />
                        </button>`;
                    row.appendChild(controls);
                }
            });
        });
    </script>
    <?php

