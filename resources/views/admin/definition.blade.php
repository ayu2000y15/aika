@extends('layouts.admin')

@section('title', '汎用テーブル管理')

@section('content')
    <h2>汎用テーブル管理</h2>
    <button type="button" class="new-entry-btn" id="newEntryBtn">新規登録</button>
    <div class="data-form-container" id="dataForm" style="display: none;">
        <h3>登録・更新</h3>
        <form action="{{ route('admin.definition.store') }}" method="POST" class="data-form">
            @csrf
            <button type="button" class="cancel-btn" id="cancelBtn"></button>
            <input type="hidden" name="DEFINITION_ID" id="DEFINITION_ID">
            <div class="form-group">
                <label for="DEFINITION">定義<span class="required">*</span></label>
                <input type="text" id="DEFINITION" name="DEFINITION" required>
            </div>
            <div class="form-group">
                <label for="ITEM">内容<span class="required">*</span></label>
                <input type="text" id="ITEM" name="ITEM" required>
            </div>
            <div class="form-group">
                <label for="EXPLANATION">説明<span class="required">*</span></label>
                <input type="text" id="EXPLANATION" name="EXPLANATION" required>
            </div>
            <div class="form-actions">
                <button type="submit" onclick="return confirm('登録しますか？');" class="submit-btn" id="submitBtn">登録</button>
            </div>
        </form>
    </div>

    <div class="data-list-container">
        <h3>登録済みデータ一覧</h3>
        <div class="data-table-wrapper">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>定義ID</th>
                        <th>定義</th>
                        <th>内容</th>
                        <th>説明</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($definition as $def)
                        <tr>
                            <td>{{ $def->DEFINITION_ID }}</td>
                            <td>{{ $def->DEFINITION }}</td>
                            <td>{{ $def->ITEM }}</td>
                            <td>{{ $def->EXPLANATION }}</td>
                            <td>
                                <button class="edit-btn" data-id="{{ $def->DEFINITION_ID }}"
                                        data-definition="{{ $def->DEFINITION }}"
                                        data-item="{{ $def->ITEM }}"
                                        data-explanation="{{ $def->EXPLANATION }}">編集</button>
                                <form action="{{ route('admin.definition.delete') }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="DEFINITION_ID" value="{{ $def->DEFINITION_ID }}">
                                    <button type="submit" class="delete-btn" onclick="return confirm('本当に削除しますか？');">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
            const definitionId = this.getAttribute('data-id');
            const definition = this.getAttribute('data-definition');
            const item = this.getAttribute('data-item');
            const explanation = this.getAttribute('data-explanation');

            document.getElementById('DEFINITION_ID').value = definitionId;
            document.getElementById('DEFINITION').value = definition;
            document.getElementById('ITEM').value = item;
            document.getElementById('EXPLANATION').value = explanation;

            submitBtn.textContent = '更新';
            form.action = "{{ route('admin.definition.update') }}";

            showForm();
        });
    });

    function resetForm() {
        form.reset();
        document.getElementById('DEFINITION_ID').value = '';
        document.getElementById('DEFINITION').value = '';
        document.getElementById('ITEM').value = '';
        document.getElementById('EXPLANATION').value = '';

        submitBtn.textContent = '登録';
        form.action = "{{ route('admin.definition.store') }}";
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

