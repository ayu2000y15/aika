@extends('layouts.app')
@section('title', '鯨野アイカ - お問い合わせ')

@section('content')
    <div class="container">
        <img src="storage/img/hp/contact.png" style="height:120px">
        @if (session('message'))
        <div class="success-message">{{ session('message') }}</div>
        @endif

        <div id="contact-page">
            <div id="contact-form">
                <form action="{{ route('confirm') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="CONTACT_CATEGORY_ID">問い合わせ項目</label>
                        <select name="CONTACT_CATEGORY_ID" id="CONTACT_CATEGORY_ID" required>
                            @foreach ($contactCategories as $select)
                            <option value="{{ $select['CONTACT_CATEGORY_ID'] }}">
                                {{ $select['CONTACT_CATEGORY_NAME'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">氏名<span class="required">必須</span></label>
                        <input type="text" id="name" name="NAME" placeholder="山田太郎" required />
                    </div>
                    <div class="form-group">
                        <label for="age">年齢<span class="required"></span></label>
                        <input type="text" id="age" name="AGE" placeholder="25" />
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス<span class="required">必須</span></label>
                        <input type="email" id="email" name="MAIL" placeholder="example@gmail.com" required />
                    </div>
                    <div class="form-group">
                        <label for="tel">電話番号<span class="required"></span></label>
                        <input type="tel" id="tel" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" name="TEL"
                            placeholder="080-1234-5678" />
                    </div>
                    <div class="form-group">
                        <label for="subject">件名<span class="required">必須</span></label>
                        <input type="text" id="subject" name="SUBJECT" placeholder="例、衣装制作について" required />
                    </div>
                    <div class="form-group">
                        <label for="content">質問内容 または 自己PR等<span class="required">必須</span></label>
                        ※タレント応募の場合、SNSアカウントがあればこちらに記載してください
                        <textarea id="content" name="CONTENT" rows="5" placeholder="問い合わせ内容をここに記載してください"
                            required></textarea>
                    </div>
                    <button type="submit" class="submit-button">お問い合わせ内容の確認へ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
