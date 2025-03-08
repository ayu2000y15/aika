@extends('layouts.app')
@section('title', '鯨野アイカ - 公式ホームページ')

@section('content')

    <div class="container">
        <!-- メニュー -->
        <a href="#top" class="back-to-top">↑</a>
        <div id="header">
            <div id="avatar">
                <img src="storage/img/hp/aika.png" >
            </div>
            <div id="menu">
                <div id="logo">
                    <img src="storage/img/hp/logo.png" >
                </div>
                <div id="top-menu">
                    <a class="menu-btn" href="#information">
                        <img src="storage/img/hp/topbtn_1.png" >
                    </a>
                    <a class="menu-btn" href="#gallery">
                        <img src="storage/img/hp/topbtn_2.png" >
                    </a>
                    <a class="menu-btn" href="#goods">
                        <img src="storage/img/hp/topbtn_3.png" >
                    </a>
                    <a class="menu-btn" href="#contact">
                        <img src="storage/img/hp/topbtn_4.png" >
                    </a>
                </div>
            </div>
        </div>

        <!-- プロフィール -->
        <div class="index" id="profile">
            <div class="prof-header">
                <div class="pop-title prof">
                    <img src="storage/img/hp/profile.png" >
                </div>
                <div class="sns-icons prof">
                    <a class="sns-icon" href="https://x.com/KuziranoAika">
                        <img src="storage/img/hp/btn_X.png" >
                    </a>
                    <a class="sns-icon" href="https://www.youtube.com/@aika_VT">
                        <img src="storage/img/hp/btn_YouTube.png" >
                    </a>
                    <a class="sns-icon" href="">
                        <img src="storage/img/hp/btn_instagram.png">
                    </a>
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
                    <img src="storage/img/hp/aika2.png">
                </div>
                <div class="introduction-icon mascot">
                    <img src="storage/img/hp/mascot.png">
                </div>
            </div>
        </div>

        <!-- 最新の配信 -->
        <div class="index" id="delivery">
            <div class="pop-title delivery">
                <img src="storage/img/hp/delivery.png">
            </div>
            <div class="movie">
                <iframe  src="https://www.youtube.com/embed/FmpMa82mmpU?si=ltLx0sfYmGcrsZDB" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe  src="https://www.youtube.com/embed/Pr0hUkqgQyM?si=-gJN1Wm0YBSdEW1Z" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <iframe  src="https://www.youtube.com/embed/RsAow8Rh-AA?si=O_6xxDMqkLX7rrwj" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <!-- お知らせ -->
        <div class="index" id="information">
            <img src="storage/img/hp/information.png" >

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
            <img src="storage/img/hp/gallery.png" >

            <!-- ギャラリースライダー -->
            <div class="gallery-container">
                <div class="gallery-image" id="gallery-slider">
                    <img src="storage/img/gallery/gallery_1.png" alt="ギャラリー画像1" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_2.png" alt="ギャラリー画像2" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_3.png" alt="ギャラリー画像3" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_4.png" alt="ギャラリー画像4" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_5.png" alt="ギャラリー画像5" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_6.png" alt="ギャラリー画像6" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_7.png" alt="ギャラリー画像7" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_8.png" alt="ギャラリー画像8" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_9.jpg" alt="ギャラリー画像9" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_10.png" alt="ギャラリー画像10" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_11.png" alt="ギャラリー画像11" onclick="openModal(this)">
                    <img src="storage/img/gallery/gallery_12.png" alt="ギャラリー画像12" onclick="openModal(this)">
                    <img src="storage/img/hp/aika.png" alt="ギャラリー画像12" onclick="openModal(this)">
                    <img src="storage/img/hp/aika2.png" alt="ギャラリー画像12" onclick="openModal(this)">
                </div>

                <!-- ナビゲーションボタン -->
                <div class="gallery-nav">
                    <button onclick="scrollGallery('left')"><</button>
                    <button onclick="scrollGallery('right')">></button>
                </div>
            </div>

            <!-- モーダル -->
            <div id="imageModal" class="modal">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="modal-nav">
                    <button class="prev-btn" onclick="changeModalImage(-1)"></button>
                    <button class="next-btn" onclick="changeModalImage(1)"></button>
                </div>
                <img class="modal-content" id="modalImage">
                <div class="modal-counter" id="imageCounter"></div>
            </div>
        </div>

        <!-- グッズ -->
        <div class="index" id="goods">
            <img src="storage/img/hp/goods.png">
            <div class="goods-image">
                <a href="https://hermestage.stores.jp/items/67750df36005372b9a3d87da">
                    <img src="storage/img/shop/aika_shop1.png">
                </a>
                <a href="https://hermestage.stores.jp/items/6749ad283631db04a76157a5">
                    <img src="storage/img/shop/aika_shop2.png">
                </a>
            </div>
            <a class="button-link" href="https://hermestage.stores.jp/">
                <img src="storage/img/hp/btn_goodsbtn.png">
            </a>
        </div>

        <!-- 問い合わせ -->
        <div class="index" id="contact">
            <img src="storage/img/hp/contact.png">
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
                <img src="storage/img/hp/btn_contact.png">
            </a>
        </div>

        <!-- ガイドライン -->
        <div class="index" id="guide-line">
            <div class="guide-line-section">
                <div class="pop-title">
                    <img src="storage/img/hp/guideline.png">
                </div>
                <div class="guid-images">
                    <a href="">〇Skeb依頼はこちらのテンプレートをご利用ください。</a><br><br>
                    <div class="guid-image">
                        <img src="storage/img/hp/mascot.png">
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
                <a class="sns-icon" href="https://hermestage.stores.jp/">
                    <img src="storage/img/hp/btn_shop.png" >
                </a>
                <a class="sns-icon" href="https://x.com/KuziranoAika">
                    <img src="storage/img/hp/btn_X.png" >
                </a>
                <a class="sns-icon" href="https://www.youtube.com/@aika_VT">
                    <img src="storage/img/hp/btn_YouTube.png" >
                </a>
                <a class="sns-icon" href="">
                    <img src="storage/img/hp/btn_instagram.png" >
                </a>
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
