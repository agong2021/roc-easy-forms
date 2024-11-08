<div style="padding: 0;">
    <h3 style="font-size: 18px; font-weight: bold; color: #333; margin-bottom: 10px;">欄位庫</h3>

    <div id="field-groups" style="display: flex; flex-direction: column; gap: 10px;">
        <!-- 自訂欄位群組 -->
        <div class="field-group" style="padding: 10px; border-bottom: 1px solid #ddd;">
            <div style="background: #0073aa; color: white; padding: 10px; font-size: 16px; display: flex; justify-content: space-between; align-items: center; cursor: pointer;" onclick="toggleGroup(this)">
                <span><span class="dashicons dashicons-portfolio"></span> 自訂欄位</span>
                <span class="dashicons dashicons-arrow-down-alt2"></span>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: none; flex-direction: column; gap: 8px;">
                <li style="padding: 8px 10px; display: flex; align-items: center; gap: 10px; font-size: 14px;">
                    <span class="dashicons dashicons-editor-textcolor"></span> 文字欄位
                </li>
                <li style="padding: 8px 10px; display: flex; align-items: center; gap: 10px; font-size: 14px;">
                    <span class="dashicons dashicons-menu-alt3"></span> 下拉選單
                </li>
            </ul>
        </div>

        <!-- 預設欄位群組 -->
        <div class="field-group" style="padding: 10px; border-bottom: 1px solid #ddd;">
            <div style="background: #0073aa; color: white; padding: 10px; font-size: 16px; display: flex; justify-content: space-between; align-items: center; cursor: pointer;" onclick="toggleGroup(this)">
                <span><span class="dashicons dashicons-portfolio"></span> 預設欄位</span>
                <span class="dashicons dashicons-arrow-down-alt2"></span>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: none; flex-direction: column; gap: 8px;">
                <li style="padding: 8px 10px; display: flex; align-items: center; gap: 10px; font-size: 14px;">
                    <span class="dashicons dashicons-id"></span> 帳號
                </li>
                <li style="padding: 8px 10px; display: flex; align-items: center; gap: 10px; font-size: 14px;">
                    <span class="dashicons dashicons-email"></span> 電子郵件
                </li>
            </ul>
        </div>
    </div>

    <!-- 新增群組按鈕 -->
    <button id="add-group-btn" class="button button-secondary" style="width: 100%; margin-top: 10px;">+ 新增群組</button>

    <!-- 群組輸入框與按鈕 -->
    <div id="add-group-container" style="display: none; margin-top: 10px;">
        <input type="text" id="group-name" placeholder="輸入群組名稱" style="width: 100%; padding: 8px; font-size: 14px; margin-bottom: 8px; border: 1px solid #ccc; border-radius: 4px;">
        <small id="error-message" style="color: red; display: none;">請輸入群組名稱！</small>
        <div style="display: flex; gap: 8px;">
            <button id="save-group-btn" class="button button-primary" style="flex: 1;">保存</button>
            <button id="cancel-group-btn" class="button button-secondary" style="flex: 1;">取消</button>
        </div>
    </div>
</div>

<script>
// Toggle Group Display
function toggleGroup(header) {
    const content = header.nextElementSibling;
    const icon = header.querySelector('.dashicons-arrow-down-alt2, .dashicons-arrow-up-alt2');
    if (content.style.display === 'none' || content.style.display === '') {
        content.style.display = 'flex';
        icon.className = 'dashicons dashicons-arrow-up-alt2';
    } else {
        content.style.display = 'none';
        icon.className = 'dashicons dashicons-arrow-down-alt2';
    }
}

// Show input container on click
document.getElementById('add-group-btn').addEventListener('click', function() {
    document.getElementById('add-group-container').style.display = 'block';
    document.getElementById('add-group-btn').style.display = 'none';
});

// Save New Group
document.getElementById('save-group-btn').addEventListener('click', function() {
    const groupName = document.getElementById('group-name').value.trim();
    const errorMessage = document.getElementById('error-message');
    if (groupName) {
        errorMessage.style.display = 'none';
        const newGroup = document.createElement('div');
        newGroup.className = 'field-group';
        newGroup.style.cssText = 'padding: 10px; border-bottom: 1px solid #ddd; margin-top: 10px;';
        newGroup.innerHTML = `
            <div style="background: #0073aa; color: white; padding: 10px; font-size: 16px; display: flex; justify-content: space-between; align-items: center;">
                <span><span class="dashicons dashicons-portfolio"></span> ${groupName}</span>
                <span>
                    <span class="dashicons dashicons-arrow-down-alt2" onclick="toggleGroup(this.parentElement.parentElement)"></span>
                    <span class="dashicons dashicons-trash" style="margin-left: 10px; color: white;" onclick="deleteGroup(this)"></span>
                </span>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: none;"></ul>
        `;
        document.getElementById('field-groups').appendChild(newGroup);
        resetAddGroup();
    } else {
        errorMessage.style.display = 'block';
    }
});

// Cancel adding group
document.getElementById('cancel-group-btn').addEventListener('click', resetAddGroup);

// Reset the add group form
function resetAddGroup() {
    document.getElementById('group-name').value = '';
    document.getElementById('add-group-container').style.display = 'none';
    document.getElementById('add-group-btn').style.display = 'block';
    document.getElementById('error-message').style.display = 'none';
}

// Delete group
function deleteGroup(element) {
    element.closest('.field-group').remove();
}
</script>
