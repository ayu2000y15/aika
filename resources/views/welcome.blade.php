@extends('layouts.app')
@section('title', '鯨野アイカ - 公式ホームページ')

@section('content')
    <div class="container">
        <!-- メニュー -->
        <div id="header">
            <div id="avatar">
                <img src="storage/img/hp/aika.png" style="width:300px ">
            </div>
            <div id="menu">
                <div id="logo">
                    <img src="storage/img/hp/logo.png" style="height:150px">
                </div>
                <div id="top-menu">
                    <a class="menu-btn" href="#information">
                        <img src="storage/img/hp/topbtn_1.png" style="height:100px">
                    </a>
                    <a class="menu-btn" href="#gallery">
                        <img src="storage/img/hp/topbtn_2.png" style="height:100px">
                    </a>
                    <a class="menu-btn" href="#goods">
                        <img src="storage/img/hp/topbtn_3.png" style="height:100px">
                    </a>
                    <a class="menu-btn" href="#contact">
                        <img src="storage/img/hp/topbtn_4.png" style="height:100px">
                    </a>
                </div>
            </div>
        </div>

        <!-- プロフィール -->
        <div class="index" id="profile">
            <div class="prof-header">
                <div class="pop-title prof">
                    <img src="storage/img/hp/profile.png" style="height:100px">
                </div>
                <div class="sns-icons prof">
                    <a class="sns-icon" href="">
                        <img src="storage/img/hp/btn_X.png" style="height:70px">
                    </a>
                    <a class="sns-icon" href="">
                        <img src="storage/img/hp/btn_YouTube.png" style="height:70px">
                    </a>
                    <a class="sns-icon" href="">
                        <img src="storage/img/hp/btn_instagram.png" style="height:70px">
                    </a>
                </div>
            </div>

            <div id="introduction">
                <div id="introduction-content">
                    <p><strong>なまえ</strong>：鯨野アイカ Kuzirano Aika</p>
                    <p><strong>誕生日</strong>：00月00日</p>
                    <p><strong>性　格</strong>：表情豊か、いたずら好き<br>
                        　　　　よく笑う、行動的</p>
                    <p><strong>好きなもの</strong>：ホロライブのみなさん<br>
                        　　　　　　お笑い、ゲーム</p>
                </div>
                <div class="introduction-icon">
                    <img src="storage/img/hp/aika2.png" style="height:400px">
                </div>
                <div class="introduction-icon">
                    <img src="storage/img/hp/mascot.png" style="height:70px">
                </div>
            </div>
        </div>

        <!-- 歌ってみた配信 -->
        <div class="index" id="delivery">
            <div class="pop-title">
                <img src="storage/img/hp/delivery.png" style="height:50px">
            </div>
            <div class="movie">
                <iframe width="300" height="200" src="https://www.youtube.com/embed/qUuElC8jpHc?si=TGorsIl9jwNgQuED" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="300" height="200" src="https://www.youtube.com/embed/KuRi10a5klQ?si=rQrxAYrB8wZaSHLq" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe width="300" height="200" src="https://www.youtube.com/embed/8Dz5ne5xKwU?si=DdMkVLtreBsYim-m" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <!-- お知らせ -->
        <div class="index" id="information">
            <img src="storage/img/hp/information.png" style="height:120px">

            <div class="article">
                <div class="top">
                    <div class="date">2025.01.01</div>
                    <div class="title">新ビジュアルを公開しました！</div>
                </div>
                <div class="down">
                    <div class="content">あああああ</div>
                </div>
            </div>

            <div class="article">
                <div class="top">
                    <div class="date">2025.01.01</div>
                    <div class="title">ホームページを作成しました</div>
                </div>
                <div class="down">
                    <div class="content">あああああ</div>
                </div>
            </div>
        </div>

        <!-- ギャラリー -->
        <div class="index" id="gallery">
            <img src="storage/img/hp/gallery.png" style="height:120px">
            <div class="gallery-image">
                <img src="storage/img/gallery/seiunsky1.png">
                <img src="storage/img/gallery/talent2.png">
                <img src="storage/img/gallery/top2.jpg">
                <img src="storage/img/gallery/2450304-5.output.png">
                <img src="storage/img/gallery/2450304-6.output.png">
                <img src="storage/img/gallery/2450304-7.output.png">
            </div>
        </div>

        <!-- グッズ -->
        <div class="index" id="goods">
            <img src="storage/img/hp/goods.png" style="height:120px">
            <div class="goods-image">
                <img src="storage/img/gallery/2450304-2.output.png" style="height:200px">
                <img src="storage/img/gallery/2450304-3.output.png" style="height:200px">
                <img src="storage/img/gallery/2450304-4.output.png" style="height:200px">
                <img src="storage/img/gallery/2450304-5.output.png" style="height:200px">
            </div>
            <a class="button-link" href="#">
                <img src="storage/img/hp/btn_goodsbtn.png" style="height:50px">
            </a>
        </div>

        <!-- 問い合わせ -->
        <div class="index" id="contact">
            <img src="storage/img/hp/contact.png" style="height:120px">
            <div class="contact-section">
                <div class="contact-contents">
                    <div class="contact-title">
                        <p>VTuber、演者としてのお仕事</p>
                    </div>
                    <div class="contact-content">
                        <p>□ゲーム、商品、サービスなどのPR</p>
                        <p>□出演、講演依頼</p>
                        <p>　　　　　　　　　　　　　　　など</p>
                        <p>　</p>
                    </div>
                </div>
                <div class="contact-contents">
                    <div class="contact-title">
                        <p>イベンター、コンサルタントとしてのお仕事</p>
                    </div>
                    <div class="contact-content">
                        <p>□VTuberデビュー準備のご相談</p>
                        <p>□配信活動についてのご相談</p>
                        <p>□VTuber向けサービスについてのご相談</p>
                        <p>　　　　　　　　　　　　　　　　　　　など</p>
                    </div>
                </div>
            </div>
            <a class="button-link" href="{{ route('contact') }}">
                <img src="storage/img/hp/btn_contact.png" style="height:50px">
            </a>
        </div>

        <!-- ガイドライン -->
        <div class="index" id="guide-line">
            <div class="pop-title">
                <img src="storage/img/hp/guideline.png" style="height:100px">
            </div>
            <div class="guid-images">
                <a href="">〇Skeb依頼はこちらのテンプレートをご利用ください。</a><br><br>
                <div class="guid-image">
                    <img src="storage/img/hp/mascot.png" style="height:100px">
                    二次創作につきまして
                </div>
            </div>
            <div class="guide-section">
                <div class="guide-contents">
                    <div class="guide-title">
                        <p>■私が投稿した画像を加工して投稿するのは禁止です。</p>
                    </div>
                    <div class="guide-content">
                        SNSアイコン、私的なグッズなどご自身で画像自体を制作、<br>
                        依頼したものはご自由にしていただいて構いません。<br>
                        痛車に使用したい場合などは、一度ご連絡ください。
                    </div>
                </div>
                <div class="guide-contents">
                    <div class="guide-title">
                        <p>■R15、18、準ずるものを公に見える場に<br>　投稿するのは禁止です。</p>
                    </div>
                    <div class="guide-content">
                        使用は自由ですが、<br>制作した後はファンアートタグや鯨野アイカの
                        名前は使わずにご投稿ください。
                    </div>
                </div>
                <div class="guide-contents">
                    <div class="guide-title">
                        <p>■商的利用も条件次第で構いません。<br>
                            お気軽にご相談ください。</p>
                    </div>
                    <div class="guide-content">
                        無料頒布出なくてもOKです。<br>
                        コミケなど大歓迎です！お待ちしております。
                    </div>
                </div>
                <div class="guide-contents">
                </div>
            </div>
        </div>

        <!-- フッター -->
        <div class="index" id="footer">
            <div class="sns-icons">
                <a class="sns-icon" href="">
                    <img src="storage/img/hp/btn_shop.png" style="height:70px">
                </a>
                <a class="sns-icon" href="">
                    <img src="storage/img/hp/btn_X.png" style="height:70px">
                </a>
                <a class="sns-icon" href="">
                    <img src="storage/img/hp/btn_YouTube.png" style="height:70px">
                </a>
                <a class="sns-icon" href="">
                    <img src="storage/img/hp/btn_instagram.png" style="height:70px">
                </a>
            </div>
        </div>
    </div>
@endsection
