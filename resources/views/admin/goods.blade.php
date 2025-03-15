@extends('layouts.admin')

@section('title', 'グッズ管理')

@section('content')
    <h2>グッズ登録</h2>
    <p>※最大５つまで登録できます。</p>
    {{-- <div class="data-form-container">
        <h3>グッズ登録</h3>
        <form action="{{ route('admin.goods.store') }}" method="POST" enctype="multipart/form-data" class="data-form">
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
                <label for="COMMENT">タイトル<span class="required"></span></label>
                <input type="text" id="COMMENT" name="COMMENT" >
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
    </div> --}}

    <div class="data-list-container">
        <h3>グッズ一覧</h3>
        <div class="data-table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>操作</th>
                        <th>公開フラグ</th>
                        <th>画像</th>
                        <th>グッズのリンク</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($goods as $info)
                        <tr>
                            <td>
                                <button type="button" class="edit-btn" data-id="{{ $info->IMAGE_ID }}"
                                        data-title="{{ htmlspecialchars($info->ALT, ENT_QUOTES, 'UTF-8') }}"
                                        data-url="{{ $info->URL }}"
                                        data-public-flg="{{ $info->PUBLIC_FLG }}"
                                        data-image-src="{{ asset($info->FILE_PATH . $info->FILE_NAME) }}">編集</button>
                            </td>
                            <td>{{ $info->PUBLIC_FLG ? '公開' : '非公開' }}</td>
                            <td><img src="{{ asset( $info->FILE_PATH . $info->FILE_NAME) }}" alt="{{ $info->ALT }}" style="max-width: 100px; max-height: 100px;"></td>
                            <td>{!! nl2br($info->URL) !!}</td>
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
            <form action="{{ route('admin.goods.update') }}" enctype="multipart/form-data" method="POST" class="data-form">
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
                    <label for="IMAGE">画像ファイル<span class="required"></span></label>
                    <div class="file-upload-container">
                        <div class="file-upload-area" id="dropArea">
                            <p>ここにファイルをドラッグ＆ドロップするか</p>
                            <div class="file-upload-button" id="fileSelectButton">ファイルを選択</div>
                        </div>
                        <input type="file" id="IMAGE" name="IMAGE[]" accept="image/*"  class="file-upload-input">
                        <div class="file-preview-container" id="filePreviewContainer"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="SPATE2">公開フラグ</label>
                    <div class="radio-area">
                        <label>
                            <input type="radio" name="SPARE2" value="1" checked>
                            公開
                        </label>
                        <label>
                            <input type="radio" name="SPARE2" value="0">
                            非公開
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_SPARE1">グッズのリンク<span class="required">*</span></label>
                    <input type="text" id="edit_SPARE1" name="SPARE1" required>
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
                    const url = this.getAttribute('data-url');
                    const publicFlg = this.getAttribute('data-public-flg');
                    const imageSrc = this.getAttribute('data-image-src');

                    // デバッグ情報をコンソールに出力
                    console.log('編集ボタンがクリックされました');
                    console.log('ID:', id);
                    console.log('リンク:', url);
                    console.log('画像URL:', imageSrc);

                    // フォームに値を設定
                    document.getElementById('edit_IMAGE_ID').value = id;
                    document.getElementById('edit_SPARE1').value = url;
                    document.querySelector(`input[name="SPARE2"][value="${publicFlg}"]`).checked = true;
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
