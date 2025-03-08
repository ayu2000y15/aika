@extends('layouts.app')
@section('title', '鯨野アイカ - お問い合わせ')

@section('content')
    <div class="container">
        <a href="#top" class="back-to-top">↑</a>
        <img class="contact-top" src="storage/img/hp/contact.png" >

        <div id="contact-page">
            <div id="contact-form">
                <h2>入力内容をご確認ください</h2>

                <form action="{{ route('send') }}" method="post">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="CONTACT_CATEGORY_ID">問い合わせ項目</label>
                        <p style="font-size:1.3rem; margin-left: 3rem;">{{ $contactCategory['CONTACT_CATEGORY_NAME'] }}</p>
                        <input type="hidden" name="CONTACT_CATEGORY_ID" value="{{ $contactCategory['CONTACT_CATEGORY_ID'] }}">
                        <input type="hidden" name="CONTACT_CATEGORY_NAME" value="{{ $contactCategory['CONTACT_CATEGORY_NAME'] }}">
                    </div> --}}
                    <input type="hidden" name="CONTACT_CATEGORY_ID" value="0">
                    <input type="hidden" name="CONTACT_CATEGORY_NAME" value="その他">
                    <input type="hidden" name="AGE" value="">
                    @foreach(['COMPANY_NAME', 'NAME', 'TEL', 'MAIL', 'CONTENT', 'SUBJECT'] as $field)
                    <input type="hidden" name="{{ $field }}" value="{{ $contact[$field] }}">
                    @endforeach
                    <div class="form-group">
                        <label for="company_name">会社名<span class="required"></span></label>
                        <p style="font-size:1.3rem; margin-left: 3rem;">{{ $contact['COMPANY_NAME'] ?: '未入力'}}</p>
                    </div>
                    <div class="form-group">
                        <label for="name">担当者名<span class="required">必須</span></label>
                        <p style="font-size:1.3rem; margin-left: 3rem;">{{ $contact['NAME'] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="tel">電話番号<span class="required"></span></label>
                        <p style="font-size:1.3rem; margin-left: 3rem;">{{  $contact['TEL'] ?: '未入力' }}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス<span class="required">必須</span></label>
                        <p style="font-size:1.3rem; margin-left: 3rem;">{{ $contact['MAIL'] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="subject">件名<span class="required">必須</span></label>
                        <p style="font-size:1.3rem; margin-left: 3rem;">{{ $contact['SUBJECT'] }}</p>
                    </div>
                    <div class="form-group">
                        <label for="content">ご連絡内容<span class="required">必須</span></label>
                        <p style="font-size:1.3rem; margin-left: 3rem;">{!! nl2br(e($contact['CONTENT']))
                        !!}</p>
                    </div>
                    {{-- <div class="confirm-group privacy-policy">
                        <label>
                            <input type="checkbox" name="privacy_policy" required>
                            <a href="{{ route('privacy-policy') }}" target="_blank" rel="noopener">プライバシーポリシー</a>に同意する
                        </label>
                    </div> --}}
                    <div class="button-group">
                        <button type="button" class="back-button" onclick="history.back();">修正する</button>
                        <button type="submit" class="submit-button">送信する</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
