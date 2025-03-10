@extends('layouts.admin')

@section('title', 'HP画像登録')

@section('content')
    <h2>HP画像登録</h2>

    <div class="data-form-container">
        <h3>新規画像アップロード</h3>
        <form action="{{ route('admin.photo.store') }}" method="POST" enctype="multipart/form-data" class="data-form">
            @csrf
            <div class="form-group">
                <label for="IMAGE">画像ファイル<span class="required">*</span></label>
                <div class="file-upload-container">
                    <div class="file-upload-area" id="dropArea">
                        <p>ここにファイルをドラッグ＆ドロップするか</p>
                        <div class="file-upload-button" id="fileSelectButton">ファイルを選択</div>
                        <p class="file-upload-help">※複数のファイルを選択できます</p>
                    </div>
                    <input type="file" id="IMAGE" name="IMAGE[]" accept="image/*" multiple required class="file-upload-input">
                    <div class="file-preview-container" id="filePreviewContainer"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="COMMENT">タイトル<span class="required">*</span></label>
                <input type="text" id="COMMENT" name="COMMENT" required>
            </div>
            <div class="form-group">
                <label for="VIEW_FLG">表示先<span class="required">*</span></label>
                <select name="VIEW_FLG" id="VIEW_FLG" >
                    @foreach ($viewFlg as $select)
                    <option value="{{ $select['VIEW_FLG'] }}">
                        {{ $select['COMMENT'] }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="PRIORITY">優先度</label>
                <input type="number" id="PRIORITY" name="PRIORITY" >
            </div>
            <div class="form-actions">
                <button type="submit" class="submit-btn">アップロード</button>
            </div>
        </form>
    </div>

    <div class="data-list-container">
        <h3>アップロード済み画像一覧</h3>
        <div class="data-table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ファイル名</th>
                        <th>プレビュー</th>
                        <th>表示先</th>
                        <th>タイトル</th>
                        <th>優先度</th>
                        <th>アップロード日時</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <td>{{ $photo->FILE_NAME }}</td>
                            <td><img src="{{ asset( $photo->FILE_PATH . $photo->FILE_NAME) }}" alt="{{ $photo->ALT }}" style="max-width: 100px; max-height: 100px;"></td>
                            <td>{{ $photo->V_COMMENT }}</td>
                            <td>{{ $photo->ALT }}</td>
                            <td>{{ $photo->PRIORITY }}</td>
                            <td>{{ $photo->INS_DATE}}</td>
                            <td>
                                <button type="button" class="edit-btn" data-id="{{ $photo->IMAGE_ID }}"
                                        data-title="{{ htmlspecialchars($photo->ALT, ENT_QUOTES, 'UTF-8') }}"
                                        data-view-flg="{{ $photo->VIEW_FLG }}"
                                        data-priority="{{ $photo->PRIORITY ?? '' }}"
                                        data-image-src="{{ asset($photo->FILE_PATH . $photo->FILE_NAME) }}">編集</button>
                                <form action="{{ route('admin.photo.delete') }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="IMAGE_ID" value="{{$photo->IMAGE_ID}}">
                                    <button type="submit" class="delete-btn" onclick="return confirm('本当に削除しますか？')">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- 編集用モーダル -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h3>画像編集</h3>
            <form action="{{ route('admin.photo.update') }}" method="POST" class="data-form">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_IMAGE_ID" name="IMAGE_ID">
                <div class="form-group">
                    <label for="edit_preview">現在の画像</label>
                    <div class="current-image-preview">
                        <img id="edit_preview" src="/placeholder.svg" alt="プレビュー" style="max-width: 200px; max-height: 200px;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_COMMENT">タイトル<span class="required">*</span></label>
                    <input type="text" id="edit_COMMENT" name="COMMENT" required>
                </div>
                <div class="form-group">
                    <label for="edit_VIEW_FLG">表示先<span class="required">*</span></label>
                    <select name="VIEW_FLG" id="edit_VIEW_FLG" required>
                        @foreach ($viewFlg as $select)
                        <option value="{{ $select['VIEW_FLG'] }}">
                            {{ $select['COMMENT'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="edit_PRIORITY">優先度</label>
                    <input type="number" id="edit_PRIORITY" name="PRIORITY">
                </div>
                <div class="form-actions">
                    <button type="submit" class="submit-btn">更新</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('IMAGE');
            const dropArea = document.getElementById('dropArea');
            const fileSelectButton = document.getElementById('fileSelectButton');
            const filePreviewContainer = document.getElementById('filePreviewContainer');
            const modal = document.getElementById('editModal');
            const closeBtn = document.querySelector('.close-modal');

            // ファイル選択ボタンのクリックイベント
            fileSelectButton.addEventListener('click', function() {
                fileInput.click();
            });

            // ファイル選択時のイベント
            fileInput.addEventListener('change', function() {
                handleFiles(this.files);
            });

            // ドラッグ&ドロップイベント
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                dropArea.classList.add('dragover');
            }

            function unhighlight() {
                dropArea.classList.remove('dragover');
            }

            dropArea.addEventListener('drop', function(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles(files);
            });

            // ファイル処理関数
            function handleFiles(files) {
                filePreviewContainer.innerHTML = '';

                if (files.length === 0) {
                    fileInput.setCustomValidity('少なくとも1つのファイルを選択してください');
                } else {
                    fileInput.setCustomValidity('');
                }

                Array.from(files).forEach(file => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const previewItem = document.createElement('div');
                            previewItem.className = 'file-preview-item';

                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.className = 'file-preview-image';
                            img.alt = file.name;

                            const info = document.createElement('div');
                            info.className = 'file-preview-info';
                            info.textContent = file.name;

                            const size = document.createElement('div');
                            size.className = 'file-preview-size';
                            size.textContent = formatFileSize(file.size);

                            const removeButton = document.createElement('div');
                            removeButton.className = 'file-preview-remove';
                            removeButton.textContent = '×';
                            removeButton.addEventListener('click', function() {
                                // 注意: 実際のファイル削除はできないため、プレビューのみ削除
                                previewItem.remove();
                            });

                            previewItem.appendChild(img);
                            previewItem.appendChild(info);
                            previewItem.appendChild(size);
                            previewItem.appendChild(removeButton);

                            filePreviewContainer.appendChild(previewItem);
                        };

                        reader.readAsDataURL(file);
                    }
                });
            }

            // ファイルサイズのフォーマット関数
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            // 編集ボタンのイベントリスナーを設定
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const id = this.getAttribute('data-id');
                    const title = this.getAttribute('data-title');
                    const viewFlg = this.getAttribute('data-view-flg');
                    const priority = this.getAttribute('data-priority');
                    const imageSrc = this.getAttribute('data-image-src');

                    // デバッグ情報をコンソールに出力
                    console.log('編集ボタンがクリックされました');
                    console.log('ID:', id);
                    console.log('タイトル:', title);
                    console.log('表示先:', viewFlg);
                    console.log('優先度:', priority);
                    console.log('画像URL:', imageSrc);

                    // フォームに値を設定
                    document.getElementById('edit_IMAGE_ID').value = id;
                    document.getElementById('edit_COMMENT').value = title;
                    document.getElementById('edit_VIEW_FLG').value = viewFlg;
                    document.getElementById('edit_PRIORITY').value = priority;
                    document.getElementById('edit_preview').src = imageSrc;

                    // モーダルを表示
                    modal.style.display = 'block';
                });
            });

            // モーダルを閉じる処理
            closeBtn.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            // モーダル外クリックで閉じる
            window.addEventListener('click', function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
@endsection
