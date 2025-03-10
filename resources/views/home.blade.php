@extends('layouts.app')
@section('title', '鯨野アイカ - 公式ホームページ')

@section('content')
<style>
    body {
        background-image: url("{{ asset($backImg->FILE_PATH . $backImg->FILE_NAME) }}");
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
    }
</style>
    <div class="container">
        <!-- メニュー -->
        <a href="#top" class="back-to-top"><span class="dli-arrow-up"></span></a>
        <div id="header">
            <div id="avatar">
                <img src="{{ asset($avatar1->FILE_PATH . $avatar1->FILE_NAME) }}" alt="{{ $avatar1->COMMENT }}">
            </div>
            <div id="menu">
                <div id="logo">
                    <img src="{{ asset($logoImg->FILE_PATH . $logoImg->FILE_NAME) }}" alt="{{ $logoImg->COMMENT }}">
                </div>
                <div id="top-menu">
                    @foreach ($menuBtnList as $menuBtn)
                    <a class="menu-btn" href="{{ $menuBtn->SPARE1 }}">
                        <img src="{{ asset($menuBtn->FILE_PATH . $menuBtn->FILE_NAME) }}" alt="{{ $menuBtn->COMMENT }}">
                    </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- プロフィール -->
        <div class="index" id="profile">
            <div class="prof-header">
                <div class="pop-title prof">
                    <img src="{{ asset($profileTitle->FILE_PATH . $profileTitle->FILE_NAME) }}" alt="{{ $profileTitle->COMMENT }}" >
                </div>
                <div class="sns-icons prof">
                    @foreach ($snsIcons as $snsIcon)
                    <a class="sns-icon" target="_blank" href="{{ $snsIcon->SPARE1 }}">
                        <img src="{{ asset($snsIcon->FILE_PATH . $snsIcon->FILE_NAME) }}" alt="{{ $snsIcon->COMMENT }}" >
                    </a>
                    @endforeach
                </div>
            </div>

            <div id="introduction">
                <div id="introduction-content">
                    <p><strong>なまえ</strong>：鯨野アイカ Kuzirano Aika</p>
                    <p><strong>誕生日</strong>：９月４日</p>
                    <p><strong>性　格</strong>：表情豊か、いたずら好き<br>
                        　　　　よく笑う、行動的</p>
                    <p><strong>好きなもの</strong>：ホロライブのみなさん<br>
                        　　　　　　お笑い、ゲーム</p>
                </div>
                <div class="introduction-icon avatar">
                    <img src="{{ asset($avatar2->FILE_PATH . $avatar2->FILE_NAME) }}" alt="{{ $avatar2->COMMENT }}" >
                </div>
                <div class="introduction-icon mascot">
                    <img src="{{ asset($mascot->FILE_PATH . $mascot->FILE_NAME) }}" alt="{{ $mascot->COMMENT }}" >
                </div>
            </div>
        </div>

        <!-- 最新の配信 -->
        <div class="index" id="delivery">
            <div class="pop-title delivery">
                <img src="{{ asset($deliveryTitle->FILE_PATH . $deliveryTitle->FILE_NAME) }}" alt="{{ $deliveryTitle->COMMENT }}" >
            </div>
            <div class="movie">
                <?php
                    $xml = simplexml_load_file('https://www.youtube.com/feeds/videos.xml?channel_id=UC9Io4j2kf_LqbKp8nwvfHSQ');
                    $count = 0;
                    foreach($xml as $item){
                        if($item->id) {
                            $title = $item->title;
                            \Debugbar::addMessage($item);

                            $id = $item->children('yt', true)->videoId[0];
                            $html = '<div class="movie-area">
                                        <a href="https://www.youtube.com/watch?v='.$id.'" target="_blank">
                                            <div class="movie-img">
                                                <img style="height: 200px" src="https://i1.ytimg.com/vi/'.$id.'/hqdefault.jpg">
                                            </div>
                                        <p>'.$title.'</p>
                                        </a>
                                    </div>';
                            echo $html;
                            $count++;
                        }
                        if($count >= 3) {
                            break;
                        }
                    }
                ?>
            </div>
        </div>

        <!-- お知らせ -->
        <div class="index" id="information">
            <img src="{{ asset($infoTitle->FILE_PATH . $infoTitle->FILE_NAME) }}" alt="{{ $infoTitle->COMMENT }}" >

            @foreach ($information as $info)
                <div class="article">
                    <div class="top">
                        <div class="date">{{ $info->POST_DATE }}</div>
                        <div class="title">{{ $info->TITLE }}</div>
                    </div>
                    <div class="down">
                        <div class="content">{!! nl2br(e($info->CONTENT)) !!}</div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- ギャラリー -->
        <div class="index" id="gallery">
            <img src="{{ asset($galleryTitle->FILE_PATH . $galleryTitle->FILE_NAME) }}" alt="{{ $galleryTitle->COMMENT }}" >

            <!-- ギャラリースライダー -->
            <div class="gallery-container">
                <div class="gallery-image" id="gallery-slider">
                    @foreach ($galleryImgList as $galleryImg)
                    <img src="{{ asset($galleryImg->FILE_PATH . $galleryImg->FILE_NAME) }}" alt="{{ $galleryImg->COMMENT }}" onclick="openModal(this)">
                    @endforeach
                </div>

                <!-- ナビゲーションボタン -->
                <div class="gallery-nav">
                    <button onclick="scrollGallery('left')"><span class="dli-chevron-round-left"></span></button>
                    <button onclick="scrollGallery('right')"><span class="dli-chevron-round-right"></span></button>
                </div>
            </div>

            <!-- モーダル -->
            <div id="imageModal" class="modal">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="modal-nav">
                    <button class="prev-btn" onclick="changeModalImage(-1)"><span class="dli-chevron-round-left"></span></button>
                    <button class="next-btn" onclick="changeModalImage(1)"><span class="dli-chevron-round-right"></span></button>
                </div>
                <img class="modal-content" id="modalImage">
                <div class="modal-counter" id="imageCounter"></div>
            </div>
        </div>

        <!-- グッズ -->
        <div class="index" id="goods">
            <img src="{{ asset($goodsTitle->FILE_PATH . $goodsTitle->FILE_NAME) }}" alt="{{ $goodsTitle->COMMENT }}" >
            <div class="goods-image">
                @foreach ($goodsImgList as $goodsImg)
                <a target="_blank" href="{{ $goodsImg->SPARE1 }}">
                    <img src="{{ asset($goodsImg->FILE_PATH . $goodsImg->FILE_NAME) }}" alt="{{ $goodsImg->COMMENT }}">
                </a>
                @endforeach
            </div>
            <a class="button-link" target="_blank" href="https://hermestage.stores.jp/">
                <img src="{{ asset($goodsBtn->FILE_PATH . $goodsBtn->FILE_NAME) }}" alt="{{ $goodsBtn->COMMENT }}" >
            </a>
        </div>

        <!-- 問い合わせ -->
        <div class="index" id="contact">
            <img src="{{ asset($contactTitle->FILE_PATH . $contactTitle->FILE_NAME) }}" alt="{{ $contactTitle->COMMENT }}" >
            <div class="contact-section">
                <div class="contact-contents">
                    <div class="contact-title">
                        <p>VTuber、演者としてのお仕事</p>
                    </div>
                    <div class="contact-content">
                        <p>□ゲーム、商品、サービスなどのPR</p>
                        <p>□出演、講演依頼</p>
                        <p>など</p>
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
                        <p>など</p>
                    </div>
                </div>
            </div>
            <a class="button-link" href="{{ route('contact') }}">
                <img src="{{ asset($contactBtn->FILE_PATH . $contactBtn->FILE_NAME) }}" alt="{{ $contactBtn->COMMENT }}" >
            </a>
        </div>

        <!-- ガイドライン -->
        <div class="index" id="guide-line">
            <div class="guide-line-section">
                <div class="pop-title">
                    <img src="{{ asset($guidelineTitle->FILE_PATH . $guidelineTitle->FILE_NAME) }}" alt="{{ $guidelineTitle->COMMENT }}" >
                </div>
                <div class="guid-images">
                    <a href="">〇Skeb依頼はこちらのテンプレートをご利用ください。</a><br><br>
                    <div class="guid-image">
                        <img src="{{ asset($mascot->FILE_PATH . $mascot->FILE_NAME) }}" alt="{{ $mascot->COMMENT }}" >
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
                            <p>■R15、18、準ずるものは“控えめに”投稿をお願いいたします。</p>
                        </div>
                        <div class="guide-content">
                            ファンアートタグを付けての投稿、<br>
                            鯨野アイカという名前を入れての投稿はご遠慮くださいませ。
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
        </div>

        <!-- フッター -->
        <div class="index" id="footer">
            <div class="sns-icons">
                @foreach ($footerSnsIcons as $snsIcon)
                <a class="sns-icon" target="_blank" href="{{ $snsIcon->SPARE1 }}">
                    <img src="{{ asset($snsIcon->FILE_PATH . $snsIcon->FILE_NAME) }}" alt="{{ $snsIcon->COMMENT }}" >
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        // 全ての画像要素を取得
        const galleryImages = document.querySelectorAll('#gallery-slider img');
        let currentImageIndex = 0;

        // ギャラリースライダーの機能
        function scrollGallery(direction) {
            const gallery = document.getElementById('gallery-slider');
            const scrollAmount = 320; // 画像の幅 + マージン

            if (direction === 'left') {
                gallery.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
            } else {
                gallery.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
            }
        }

        // モーダル表示機能
        function openModal(img) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const counter = document.getElementById('imageCounter');

            // 現在の画像のインデックスを取得
            for (let i = 0; i < galleryImages.length; i++) {
                if (galleryImages[i] === img) {
                    currentImageIndex = i;
                    break;
                }
            }

            modal.style.display = "block";

            // 元の画像のサイズを取得して、モーダル内で適切に表示するための処理を追加
            const newImg = new Image();
            newImg.onload = function() {
                // 画像の元のサイズを取得
                const imgWidth = this.width;
                const imgHeight = this.height;

                // ビューポートのサイズを取得
                const viewportWidth = window.innerWidth * 0.9; // 90%のビューポート幅
                const viewportHeight = window.innerHeight * 0.9; // 90%のビューポート高さ

                // 画像の比率を計算
                const imgRatio = imgWidth / imgHeight;

                // ビューポートに合わせて画像サイズを調整（比率を維持）
                let newWidth, newHeight;

                if (imgWidth > viewportWidth || imgHeight > viewportHeight) {
                    if (imgWidth / viewportWidth > imgHeight / viewportHeight) {
                        // 幅に合わせる
                        newWidth = viewportWidth;
                        newHeight = newWidth / imgRatio;
                    } else {
                        // 高さに合わせる
                        newHeight = viewportHeight;
                        newWidth = newHeight * imgRatio;
                    }
                } else {
                    // 元のサイズが十分小さい場合は、そのまま表示
                    newWidth = imgWidth;
                    newHeight = imgHeight;
                }

                // モーダル画像のスタイルを設定
                modalImg.style.width = newWidth + 'px';
                modalImg.style.height = newHeight + 'px';
                modalImg.style.objectFit = 'contain';
            };

            newImg.src = img.src;
            modalImg.src = img.src;
            updateCounter();

            // スクロール禁止
            document.body.style.overflow = "hidden";
        }

        // モーダル内の画像を変更
        function changeModalImage(step) {
            currentImageIndex = (currentImageIndex + step + galleryImages.length) % galleryImages.length;
            const modalImg = document.getElementById('modalImage');

            // 新しい画像を読み込み、サイズを調整
            const newImg = new Image();
            newImg.onload = function() {
                // 画像の元のサイズを取得
                const imgWidth = this.width;
                const imgHeight = this.height;

                // ビューポートのサイズを取得
                const viewportWidth = window.innerWidth * 0.9;
                const viewportHeight = window.innerHeight * 0.9;

                // 画像の比率を計算
                const imgRatio = imgWidth / imgHeight;

                // ビューポートに合わせて画像サイズを調整（比率を維持）
                let newWidth, newHeight;

                if (imgWidth > viewportWidth || imgHeight > viewportHeight) {
                    if (imgWidth / viewportWidth > imgHeight / viewportHeight) {
                        // 幅に合わせる
                        newWidth = viewportWidth;
                        newHeight = newWidth / imgRatio;
                    } else {
                        // 高さに合わせる
                        newHeight = viewportHeight;
                        newWidth = newHeight * imgRatio;
                    }
                } else {
                    // 元のサイズが十分小さい場合は、そのまま表示
                    newWidth = imgWidth;
                    newHeight = imgHeight;
                }

                // モーダル画像のスタイルを設定
                modalImg.style.width = newWidth + 'px';
                modalImg.style.height = newHeight + 'px';
                modalImg.style.objectFit = 'contain';
            };

            newImg.src = galleryImages[currentImageIndex].src;
            modalImg.src = galleryImages[currentImageIndex].src;
            updateCounter();
        }

        // カウンター表示を更新
        function updateCounter() {
            const counter = document.getElementById('imageCounter');
            counter.textContent = `${currentImageIndex + 1} / ${galleryImages.length}`;
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.style.display = "none";

            // スクロール許可
            document.body.style.overflow = "auto";
        }

        // モーダル外クリックで閉じる
        window.onclick = function(event) {
            const modal = document.getElementById('imageModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        // キーボード操作
        document.addEventListener('keydown', function(event) {
            const modal = document.getElementById('imageModal');

            // モーダルが表示されている場合のみキー操作を有効にする
            if (modal.style.display === "block") {
                if (event.key === "Escape") {
                    closeModal();
                } else if (event.key === "ArrowLeft") {
                    changeModalImage(-1);
                } else if (event.key === "ArrowRight") {
                    changeModalImage(1);
                }
            }
        });

        // トップに戻るボタンの表示制御
        window.onscroll = function() {
            const backToTop = document.querySelector('.back-to-top');
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                backToTop.style.display = "block";
            } else {
                backToTop.style.display = "none";
            }
        };
    </script>
@endsection

