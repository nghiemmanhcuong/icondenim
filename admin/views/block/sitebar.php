
<aside class="sitebar">
    <!-- logo -->
    <div class="sitebar-logo">
        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="100" height="100"
            viewBox="0 0 1000.000000 1000.000000" preserveAspectRatio="xMidYMid meet">
            <g transform="translate(0.000000,1000.000000) scale(0.100000,-0.100000)" fill="#fff" stroke="none">
                <path d="M2930 8905 c-277 -57 -482 -235 -580 -504 -64 -175 -61 7 -58 -2906
												 l3 -2650 22 -80 c13 -44 46 -127 74 -185 45 -90 65 -117 139 -191 75 -75 100
												 -93 191 -137 160 -77 208 -87 444 -87 236 0 284 10 444 87 91 44 116 62 191
												 137 74 74 94 101 139 191 28 58 61 141 73 185 23 80 23 80 26 1118 l3 1037
												 -275 0 -275 0 -4 -987 c-3 -916 -4 -992 -21 -1048 -35 -118 -96 -198 -179
												 -236 -58 -26 -186 -26 -244 0 -83 38 -143 118 -179 236 -18 57 -19 180 -21
												 2615 -4 2769 -6 2652 50 2773 32 71 84 127 144 157 39 19 63 24 128 24 65 0
												 89 -5 128 -24 60 -30 112 -86 144 -157 51 -111 52 -135 53 -1150 l0 -943 275
												 0 276 0 -4 1023 c-3 931 -4 1028 -20 1087 -91 341 -306 553 -625 616 -93 18
												 -372 17 -462 -1z"></path>
                <path d="M5037 8910 c-323 -55 -559 -292 -640 -645 -21 -90 -21 -97 -25 -2615
												 -2 -1628 1 -2577 7 -2670 6 -80 19 -179 30 -220 85 -319 313 -530 632 -586
												 146 -25 394 -15 514 20 281 84 468 282 547 576 l23 85 3 2635 c3 2385 1 2644
												 -13 2733 -20 118 -41 181 -95 285 -111 215 -296 351 -538 398 -80 15 -362 18
												 -445 4z m342 -480 c79 -40 142 -128 177 -245 18 -57 19 -181 22 -2590 2 -1722
												 -1 -2556 -8 -2610 -17 -129 -44 -197 -106 -265 -71 -77 -114 -93 -227 -89 -72
												 4 -90 8 -132 34 -87 54 -142 150 -165 287 -6 42 -10 920 -10 2590 0 2712 -2
												 2608 49 2723 42 95 122 168 204 185 58 12 153 2 196 -20z"></path>
                <path d="M1380 5540 l0 -3320 280 0 280 0 0 3320 0 3320 -280 0 -280 0 0
												 -3320z"></path>
                <path d="M6460 5540 l0 -3320 235 0 235 0 1 2483 1 2482 466 -2482 466 -2483
												 313 0 313 0 0 3320 0 3320 -260 0 -260 0 -1 -2422 -1 -2423 -438 2420 c-242
												 1331 -439 2421 -440 2423 0 1 -142 2 -315 2 l-315 0 0 -3320z"></path>
                <path d="M1360 1351 l0 -421 94 0 c134 0 199 28 250 108 50 80 61 135 61 307
												 0 181 -12 239 -67 321 -50 73 -103 96 -234 102 l-104 5 0 -422z m217 284 c59
												 -39 93 -213 74 -379 -16 -142 -53 -199 -135 -213 l-36 -6 0 313 0 313 36 -6
												 c20 -3 47 -13 61 -22z"></path>
                <path d="M3120 1350 l0 -420 160 0 160 0 0 55 0 55 -100 0 -100 0 0 135 0 135
												 85 0 85 0 0 55 0 55 -85 0 -85 0 0 120 0 120 95 0 95 0 0 55 0 55 -155 0 -155
												 0 0 -420z"></path>
                <path d="M4810 1350 l0 -420 55 0 55 0 2 242 3 243 85 -240 85 -240 48 -3 47
												 -3 0 420 0 421 -50 0 -50 0 -2 -246 -3 -247 -69 194 c-38 107 -77 218 -88 247
												 l-19 52 -50 0 -49 0 0 -420z"></path>
                <path d="M6570 1350 l0 -420 55 0 55 0 0 420 0 420 -55 0 -55 0 0 -420z"></path>
                <path d="M8050 1351 l0 -421 58 0 57 0 -3 287 -2 288 47 -122 c34 -86 53 -123
												 64 -123 11 0 29 35 60 118 l44 117 3 -282 2 -283 55 0 55 0 0 421 0 420 -51
												 -3 -51 -3 -56 -137 c-31 -76 -59 -138 -62 -138 -3 0 -30 62 -61 138 l-55 137
												 -52 3 -52 3 0 -420z"></path>
            </g>
        </svg>
    </div>
    <!-- navigation -->
    <ul class="sitebar-nav">
        <!-- item -->
        <li class="sitebar-nav-item">
            <a href="?p=trang-chu" class="sitebar-nav-link">
            <i class="fa-solid fa-house-chimney"></i>
                <span>Trang chủ</span>
            </a>
        </li>
        <!-- end item -->
        <!-- item -->
        <?php if($_SESSION['user']['access'] != 'saff'):?>
        <li class="sitebar-nav-item">
            <div class="sitebar-nav-link">
                <i class="bi bi-person-lines-fill"></i>
                <span>Người dùng</span>
                <i class="bi bi-caret-down-fill sitebar-nav-icon"></i>
            </div>
            <ul class="sitebar-nav-sub">
                <li class="sitebar-sub-nav-item">
                    <a href="?p=danh-sach-nguoi-dung" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Danh sách
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=them-nguoi-dung" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Thêm người dùng
                    </a>
                </li>
            </ul>
        </li>
        <?php endif;?>
        <!-- end item -->
        <!-- item -->
        <li class="sitebar-nav-item">
            <div class="sitebar-nav-link">
                <i class="bi bi-list-stars"></i>
                <span>Sản phẩm</span>
                <i class="bi bi-caret-down-fill sitebar-nav-icon"></i>
            </div>
            <ul class="sitebar-nav-sub">
                <li class="sitebar-sub-nav-item">
                    <a href="?p=danh-sach-san-pham" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Danh sách
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=them-san-pham" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Thêm sản phẩm
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=mau-san-pham" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Màu
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=kich-co-san-pham" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Kích cỡ
                    </a>
                </li>
            </ul>
        </li>
        <!-- end item -->
        <!-- item -->
        <li class="sitebar-nav-item">
            <a href="?p=don-hang" class="sitebar-nav-link">
                <i class="bi bi-cart-check-fill"></i>
                <span>Đơn hàng</span>
            </a>
        </li>
        <!-- end item -->
        <li class="sitebar-nav-item">
            <div class="sitebar-nav-link">
                <i class="fa-solid fa-blog"></i>
                <span>Bài viết</span>
                <i class="bi bi-caret-down-fill sitebar-nav-icon"></i>
            </div>
            <ul class="sitebar-nav-sub">
                <li class="sitebar-sub-nav-item">
                    <a href="?p=danh-sach-bai-viet" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Danh sách
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=them-bai-viet" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Thêm bài viết
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=danh-muc-bai-viet" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Danh mục bài viết
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=them-danh-muc-bai-viet" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Thêm danh mục
                    </a>
                </li>
            </ul>
        </li>
        <!-- end item -->
        <!-- item -->
        <li class="sitebar-nav-item">
            <a href="?p=lien-he" class="sitebar-nav-link">
                <i class="bi bi-chat-square-text-fill"></i>
                <span>Phản hồi</span>
            </a>
        </li>
        <li class="sitebar-nav-item">
            <div class="sitebar-nav-link">
                <i class="bi bi-list-task"></i>
                <span>Danh mục</span>
                <i class="bi bi-caret-down-fill sitebar-nav-icon"></i>
            </div>
            <ul class="sitebar-nav-sub">
                <li class="sitebar-sub-nav-item">
                    <a href="?p=danh-sach-danh-muc" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Danh sách
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=them-danh-muc" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Thêm Danh mục
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=nhom-san-pham" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Nhóm sản phẩm
                    </a>
                </li>
                <li class="sitebar-sub-nav-item">
                    <a href="?p=them-nhom-san-pham" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Thêm nhóm
                    </a>
                </li>
            </ul>
        </li>
        <!-- end item -->
        <!-- item -->
        <li class="sitebar-nav-item">
            <div class="sitebar-nav-link">
                <i class="bi bi-person-lines-fill"></i>
                <span>Club</span>
                <i class="bi bi-caret-down-fill sitebar-nav-icon"></i>
            </div>
            <ul class="sitebar-nav-sub">
                <li class="sitebar-sub-nav-item">
                    <a href="?p=them-anh-club" class="sitebar-sub-nav-link">
                        <i class="bi bi-dot"></i>
                        Thêm ảnh
                    </a>
                </li>
            </ul>
        </li>
        <!-- end item -->
        <!-- item -->
        <li class="sitebar-nav-item">
            <a href="?p=banners" class="sitebar-nav-link">
                <i class="bi bi-cart-check-fill"></i>
                <span>Banners</span>
            </a>
        </li>
        <!-- end item -->
        <!-- item -->
        <li class="sitebar-nav-item">
            <a href="?p=info-shop" class="sitebar-nav-link">
                <i class="bi bi-cart-check-fill"></i>
                <span>Thông tin shop</span>
            </a>
        </li>
        <!-- end item -->
    </ul>
    <div>

    </div>
</aside>