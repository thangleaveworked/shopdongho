<!DOCTYPE html>
<html itemscope="" itemtype="http://schema.org/WebPage" lang="vi">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="robots" content="index,follow">
    <title>Watch</title>
    <meta property="og:site_name" content="Watch">
    <meta property="og:type" content="article">
    <meta property="og:locale" content="vi_vn">
    <link rel="shortcut icon" href="images/3_2.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toastr.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/thuc.css">
    <!-- <script src="js/jquery.min.js"></script> -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <!-- Your existing styles -->
    <script>
        $(document).ready(function() {
    // Direct click handler for search button
    $('button.d_seach_btn').click(function(e) {
        e.preventDefault();
        console.log('Search button clicked');
        $('.search-popup').fadeIn(300);
        $('body').css('overflow', 'hidden');
    });

    // Using event delegation as backup
    $(document).on('click', '.d_seach_btn', function(e) {
        e.preventDefault();
        console.log('Search button clicked (delegation)');
        $('.search-popup').fadeIn(300);
        $('body').css('overflow', 'hidden');
    });
});
        $(document).ready(function() {
    console.log('Header script loaded');
    
    // Add click handler for search button
    $('.d_seach_btn').on('click', function(e) {
        e.preventDefault();
        console.log('Search button clicked');
        $('.search-popup').fadeIn(300);
        $('body').css('overflow', 'hidden');
        $('.quick-search input').focus();
    });

    // Close popup handlers
    $('.close-search').on('click', function() {
        console.log('Close button clicked');
        $('.search-popup').fadeOut(300);
        $('body').css('overflow', '');
    });

    // Handle brand selection
    $('.col_brands a').on('click', function(e) {
        e.preventDefault();
        console.log('Brand selected:', $(this).data('brand'));
        $('.col_brands a').removeClass('active');
        $(this).addClass('active');
        $('#selected_brand').val($(this).data('brand'));
    });

    // Handle price range selection
    $('.col_price a').on('click', function(e) {
        e.preventDefault();
        console.log('Price range selected:', $(this).data('price'));
        $('.col_price a').removeClass('active');
        $(this).addClass('active');
        $('#selected_price').val($(this).data('price'));
    });

    // Form submission
    $('.search-form').on('submit', function(e) {
        if (!$('#selected_brand').val() && !$('#selected_price').val() && !$('input[name="key"]').val()) {
            e.preventDefault();
            alert('Vui lòng nhập từ khóa hoặc chọn tiêu chí tìm kiếm');
        }
    });
});
    </script>
</head>

<body class="scrollstyle1">
    <header>
        <div class="container">
            <div class="d-flex flex-wrap justify-content-between align-items-center rela">
                <a href="" title="Đồng Hồ Boss Luxury" alt="Đồng Hồ Boss Luxury" class="smooth logo d-inline-block">
                    <img src="images/2222.png" alt="" title="Đồng Hồ Boss Luxury" class="img-responsive">
                </a>
                <div class="h-menu">
                    <div class="main-nav d-flex flex-wrap align-items-center">
                        <ul>
                            <li><a href="index.php" title="TRANG CHỦ" class="smooth">TRANG CHỦ</a></li>
                            <li class="menusp">
                                <a href="san-pham" title="Thương hiệu" class="smooth">Thương hiệu</a>
                                <ul>
                                    <li class="col_menusp col_tm">
                                        <span>Thương hiệu</span>
                                        <ul>
                                            <li class=""><a href="https://bossluxurywatch.vn/rolex" title="Rolex"
                                                    class="smooth lr upper">Rolex</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/hublot" title="Hublot"
                                                    class="smooth lr upper">Hublot</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/richard-mille" title="Richard Mille"
                                                    class="smooth lr upper">Richard Mille</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/patek-philippe" title="Patek Philippe"
                                                    class="smooth lr upper">Patek Philippe</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/corum" title="Corum"
                                                    class="smooth lr upper">Corum</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/audemars-piguet-3" title="AUDEMARS PIGUET" class="smooth lr upper">AUDEMARS PIGUET</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/jacob-co" title="Jacob&amp;Co"
                                                    class="smooth lr upper">Jacob&amp;Co</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/chopard" title="Chopard"
                                                    class="smooth lr upper">Chopard</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/vacheron-constantin"
                                                    title="Vacheron Constantin" class="smooth lr upper">Vacheron Constantin</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/zenith" title="Zenith"
                                                    class="smooth lr upper">Zenith</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/piaget" title="Piaget"
                                                    class="smooth lr upper">Piaget</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/bvl-gari" title="BVLGARI"
                                                    class="smooth lr upper">BVLGARI</a></li>
                                            <li class=""><a href="https://bossluxurywatch.vn/chanel" title="Chanel"
                                                    class="smooth lr upper">Chanel</a></li>
                                        </ul>
                                    </li>
                                    <li class="col_menusp col_segment">
                                        <span>Phân khúc</span>
                                        <ul>
                                            <li class=" mb-2"><a
                                                    href="https://bossluxurywatch.vn/phan-khuc?price=10000000%20-%20200000000"
                                                    title="Dưới 200 triệu VNĐ" class="smooth ">Dưới 200 triệu VNĐ</a></li>
                                            <li class=" mb-2"><a
                                                    href="https://bossluxurywatch.vn/phan-khuc?price=200000000%20-%20500000000"
                                                    title="Từ 200 - 500 triệu VNĐ" class="smooth ">Từ 200 - 500 triệu VNĐ</a></li>
                                            <li class=" mb-2"><a
                                                    href="https://bossluxurywatch.vn/phan-khuc?price=500000000%20-%201000000000"
                                                    title="Từ 500 triệu - 1 tỷ VNĐ" class="smooth ">Từ 500 triệu - 1 tỷ VNĐ</a></li>
                                            <li class=" mb-2"><a
                                                    href="https://bossluxurywatch.vn/phan-khuc?price=1000000000%20-%202000000000"
                                                    title="Từ 1 - 2 tỷ VNĐ" class="smooth ">Từ 1 - 2 tỷ VNĐ</a></li>
                                            <li class=" mb-2"><a
                                                    href="https://bossluxurywatch.vn/phan-khuc?price=2000000000%20-%205000000000"
                                                    title="Từ 2 tỷ - 5 tỷ VNĐ" class="smooth ">Từ 2 tỷ - 5 tỷ VNĐ</a></li>
                                        </ul>
                                    </li>
                                </ul>

                            </li>
                            <li class="menusp">
                                <a href="san-pham" title="Thương hiệu" class="smooth">HÀNG CÓ SẴN</a>
                            </li>
                            <li class="menusp">
                                <a href="san-pham" title="Thương hiệu" class="smooth">REIEW</a>
                                <!-- Menu động có thể thêm từ PHP -->
                            </li>
                            <li class="menusp">
                                <a href="san-pham" title="Thương hiệu" class="smooth">TƯ VẤN</a>
                                <!-- Menu động có thể thêm từ PHP -->
                            </li>
                            <li class="menusp">
                                <a href="san-pham" title="Thương hiệu" class="smooth">LIÊN HỆ</a>
                                <!-- Menu động có thể thêm từ PHP -->
                            </li>
                            <li class="menusp">
                                <a href="san-pham" title="Thương hiệu" class="smooth">GIỚI THIỆU</a> <!-- Menu động có thể thêm từ PHP -->
                            </li>
                            <!-- Rest of your menu items -->
                            <button type="button" class="d_btn clnau d_seach_btn toggle_seach cspoint ml-2">
                                <i class="fa fa-search"></i>
                            </button>
                            <a href="gio-hang" rel="nofollow,noindex,noopener" class="d_btn clnau bdnau fs20 ml-2 cspoint d-inline-block text-center">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <style>
        /* search Header Styles  slider 2 value*/
        .search-categories {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .col_search {
            flex: 1;
        }

        .col_search span {
            display: block;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }

        .col_search ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .col_search ul li {
            margin-bottom: 10px;
        }

        .col_search ul li a {
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .col_search ul li a:hover {
            color: #c8a96a;
        }

        .col_search ul li a.active {
            color: #c8a96a;
            font-weight: 500;
        }


        /* Banner Slider Styles */
        .banner-slider {
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .banner-slider .slider-container {
            position: relative;
        }

        .banner-slider .item {
            position: relative;
            height: 500px;
        }

        .banner-slider .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-slider .slider-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            text-align: left;
        }

        .banner-slider .slider-caption h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #fff;
        }

        .banner-slider .slider-caption p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .banner-slider .btn-slider {
            display: inline-block;
            padding: 10px 20px;
            background-color: #c8a96a;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .banner-slider .btn-slider:hover {
            background-color: #a88c4e;
        }

        /* Tiny Slider Navigation Customization */
        .banner-slider .tns-nav {
            position: absolute;
            bottom: 20px;
            /* Điều chỉnh khoảng cách từ đáy */
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
        }


        .banner-slider .tns-nav button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            margin: 0 5px;
        }

        .banner-slider .tns-nav button.tns-nav-active {
            background: #c8a96a;
        }

        @media (max-width: 768px) {
            .banner-slider .item {
                height: 350px;
            }

            .banner-slider .slider-caption h2 {
                font-size: 22px;
            }

            .banner-slider .slider-caption p {
                font-size: 14px;
            }
        }
    </style>



    