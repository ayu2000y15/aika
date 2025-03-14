@extends('layouts.admin')

@section('title', 'お知らせ管理')

@section('content')
    <h2>配信動画編集</h2>
    <button type="button" class="new-entry-btn" id="newEntryBtn" style="display: none;">登録</button>
    <div class="data-form-container" id="dataForm" style="display: none;">
        <h3>配信動画更新</h3>
        <form action="{{ route('admin.movie.update') }}" method="POST" class="data-form">
            @csrf
            <button type="button" class="cancel-btn" id="cancelBtn"></button>
            <input type="hidden" name="IMAGE_ID" id="IMAGE_ID">
            <div class="form-group">
                <label for="FILE_NAME">URL<span class="required">*</span></label>
                <p>※YouTubeの共有ボタンより、埋め込むを選択して作成されたURLのsrcの部分を入力してください。<br>
                    例、<br>＜iframe width="560" height="315" src="<span style="color: red;">https://www.youtube.com/embed/RsAow8Rh-AA?si=LW9hjkns3N9ibRfr</span>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen＞＜/iframe＞</p>
                <input type="text" id="FILE_NAME" name="FILE_NAME" required>
            </div>
            {{-- <div class="form-group">
                <label for="PRIORITY">優先度</label>
                <input type="number" id="PRIORITY" name="PRIORITY" >
            </div> --}}
            <div class="form-actions">
                <button type="submit" onclick="return confirm('更新しますか？');" class="submit-btn" id="submitBtn">更新</button>
            </div>
        </form>
    </div>

    <div class="data-list-container">
        <h3>登録済み動画</h3>
        @foreach ($deliveryMovieList as $deliveryMovie)
        <div class="movie-edit">
            <iframe  src="{{ asset($deliveryMovie->FILE_NAME) }}"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <button class="edit-btn" data-id="{{ $deliveryMovie->IMAGE_ID }}"
                data-file-name="{{ $deliveryMovie->FILE_NAME }}">編集</button>
        </div>
        @endforeach
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
            const imageId = this.getAttribute('data-id');
            const fileName = this.getAttribute('data-file-name');
            const priority = this.getAttribute('data-priority');

            document.getElementById('IMAGE_ID').value = imageId;
            document.getElementById('FILE_NAME').value = fileName;
            //document.getElementById('PRIORITY').value = priority;

            submitBtn.textContent = '更新';
            form.action = "{{ route('admin.movie.update') }}";

            showForm();
        });
    });

    function resetForm() {
        form.reset();
        document.getElementById('IMAGE_ID').value = '';
        document.getElementById('FILE_NAME').value = '';
        //document.getElementById('PRIORITY').value = '';

        submitBtn.textContent = '登録';
        form.action = "{{ route('admin.movie.store') }}";
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

