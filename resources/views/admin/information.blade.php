@extends('layouts.admin')

@section('title', 'お知らせ管理')

@section('content')
    <h2>お知らせ登録</h2>
    <button type="button" class="new-entry-btn" id="newEntryBtn">新規登録</button>
    <div class="data-form-container" id="dataForm" style="display: none;">
        <h3>お知らせ登録・更新</h3>
        <form action="{{ route('admin.information.store') }}" method="POST" class="data-form">
            @csrf
            <button type="button" class="cancel-btn" id="cancelBtn"></button>
            <input type="hidden" name="INFORMATION_ID" id="INFORMATION_ID">
            <div class="form-group">
                <label for="POST_DATE">投稿日<span class="required">*</span></label>
                <input type="date" id="POST_DATE" name="POST_DATE" required>
            </div>
            <div class="form-group">
                <label for="TITLE">タイトル<span class="required">*</span></label>
                <input type="text" id="TITLE" name="TITLE" required>
            </div>
            <div class="form-group">
                <label for="CONTENT">内容<span class="required">*</span></label>
                <textarea rows="5" id="CONTENT" name="CONTENT" required></textarea>
            </div>
            <div class="form-group">
                <label for="PUBLIC_FLG">公開フラグ</label>
                <div class="radio-area">
                    <label>
                        <input type="radio" name="PUBLIC_FLG" value="1" >
                        公開
                    </label>
                    <label>
                        <input type="radio" name="PUBLIC_FLG" value="0">
                        非公開
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="PRIORITY">優先度</label>
                <input type="number" id="PRIORITY" name="PRIORITY" >
            </div>
            <div class="form-actions">
                <button type="submit" onclick="return confirm('登録しますか？');" class="submit-btn" id="submitBtn">登録</button>
            </div>
        </form>
    </div>

    <div class="data-list-container">
        <h3>登録済みデータ一覧</h3>

        <table class="data-table">
            <thead>
                <tr>
                    <th>優先度</th>
                    <th>ID</th>
                    <th>投稿日</th>
                    <th>タイトル</th>
                    <th>内容</th>
                    <th>公開フラグ</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($information as $info)
                    <tr>
                        <td>{{ $info->PRIORITY }}</td>
                        <td>{{ $info->INFORMATION_ID }}</td>
                        <td>{{ $info->POST_DATE }}</td>
                        <td>{{ $info->TITLE }}</td>
                        <td>{!! nl2br(e($info->CONTENT)) !!}</td>
                        <td>{{ $info->PUBLIC_FLG ? '公開' : '非公開' }}</td>
                        <td>
                            <button class="edit-btn" data-id="{{ $info->INFORMATION_ID }}"
                                    data-post-date="{{ $info->POST_DATE }}"
                                    data-title="{{ $info->TITLE }}"
                                    data-content="{{ $info->CONTENT }}"
                                    data-public-flg="{{ $info->PUBLIC_FLG }}"
                                    data-priority="{{ $info->PRIORITY }}">編集</button>
                            <form action="{{ route('admin.information.delete') }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="INFORMATION_ID" value="{{ $info->INFORMATION_ID }}">
                                <button type="submit" class="delete-btn" onclick="return confirm('本当に削除しますか？');">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-btn');
    const form = document.querySelector('.data-form');
    const dataFormContainer = document.getElementById('dataForm');
    const newEntryBtn = document.getElementById('newEntryBtn');
    const submitBtn = document.getElementById('submitBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    //キャンセルボタンのイベントリスナー
    cancelBtn.addEventListener('click', function() {
        hideForm();
    });

    // 新規登録ボタンのイベントリスナー
    newEntryBtn.addEventListener('click', function() {
        resetForm();
        showForm();
    });

    // 編集ボタンのイベントリスナー
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const informationId = this.getAttribute('data-id');
            const postDate = this.getAttribute('data-post-date');
            const title = this.getAttribute('data-title');
            const content = this.getAttribute('data-content');
            const publicFlg = this.getAttribute('data-public-flg');
            const priority = this.getAttribute('data-priority');

            document.getElementById('INFORMATION_ID').value = informationId;
            document.getElementById('POST_DATE').value = postDate;
            document.getElementById('TITLE').value = title;
            document.getElementById('CONTENT').value = content;
            document.querySelector(`input[name="PUBLIC_FLG"][value="${publicFlg}"]`).checked = true;
            document.getElementById('PRIORITY').value = priority;

            submitBtn.textContent = '更新';
            form.action = "{{ route('admin.information.update') }}";

            showForm();
        });
    });

    function resetForm() {
        form.reset();
        document.getElementById('INFORMATION_ID').value = '';
        document.getElementById('POST_DATE').value = '';
        document.getElementById('TITLE').value = '';
        document.getElementById('CONTENT').value = '';
        document.querySelector('input[name="PUBLIC_FLG"][value="1"]').checked = true;
        document.getElementById('PRIORITY').value = '';

        submitBtn.textContent = '登録';
        form.action = "{{ route('admin.information.store') }}";
    }

    function showForm() {
        dataFormContainer.style.display = 'block';
        dataFormContainer.scrollIntoView({ behavior: 'smooth' });
    }

    function hideForm() {
        dataFormContainer.style.display = 'none';
    }

});
</script>
@endsection

