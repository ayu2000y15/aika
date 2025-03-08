@extends('layouts.app')
@section('title', '鯨野アイカ - お問い合わせ')

@section('content')
    <div class="container">
        <a href="/" class="back-to-main">トップページに戻る</a>
        <a href="#top" class="back-to-top">↑</a>

        <img class="contact-top" src="storage/img/hp/contact.png" >
        @if (session('message'))
        <div class="success-message">{{ session('message') }}</div>
        @endif

        <div id="contact-page">
            <div id="contact-form">
                <form action="{{ route('confirm') }}" method="post">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="CONTACT_CATEGORY_ID">問い合わせ項目</label>
                        <select name="CONTACT_CATEGORY_ID" id="CONTACT_CATEGORY_ID" required>
                            @foreach ($contactCategories as $select)
                            <option value="{{ $select['CONTACT_CATEGORY_ID'] }}">
                                {{ $select['CONTACT_CATEGORY_NAME'] }}
                            </option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group">
                        <label for="company_name">会社名<span class="required"></span></label>
                        <input type="text" id="COMPANY_NAME" name="COMPANY_NAME" placeholder="〇〇株式会社"  />
                    </div>
                    <div class="form-group">
                        <label for="name">担当者名<span class="required">必須</span></label>
                        <input type="text" id="name" name="NAME" placeholder="山田太郎" required />
                    </div>
                    <div class="form-group">
                        <label for="tel">電話番号<span class="required"></span></label>
                        <input type="tel" id="tel" pattern="\d{2,4}-?\d{2,4}-?\d{3,4}" name="TEL"
                            placeholder="080-1234-5678" />
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス<span class="required">必須</span></label>
                        <input type="email" id="email" name="MAIL" placeholder="example@gmail.com" required />
                    </div>
                    <div class="form-group">
                        <label for="subject">件名<span class="required">必須</span></label>
                        <input type="text" id="subject" name="SUBJECT" placeholder="件名をこちらに記載してください" required />
                    </div>
                    <div class="form-group">
                        <label for="content">ご連絡内容<span class="required">必須</span></label>
                        <textarea id="content" name="CONTENT" rows="5" placeholder="ご連絡内容をこちらに記載してください"
                            required></textarea>
                    </div>
                    <div class="button-group">
                        <button type="submit" class="submit-button">内容の確認へ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
