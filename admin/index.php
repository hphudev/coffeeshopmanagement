<?php
session_start();
if (($_SESSION["id"] == "")) {
    header('Location: ' . '../index.php');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- CSS Files -->
    <link href="../assets_control/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" /> <!-- Fonts and icons -->

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <link href="../admin/css/sale.css" rel="stylesheet" /> <!-- Fonts and icons -->
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            border: 2px solid wheat;
            background-color: white;
            overflow: hidden;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
        }

        body::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="orange" data-background-color="black" data-image="../assets_control/img/sidebar-1.jpg">
            <div class="logo">
                <a href="index.php?page=home" class="simple-text logo-normal">
                    Coffee family
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=manage-customer_s-info">
                            <i class="material-icons">insert_chart_outlined</i>
                            <p>QUẢN LÝ KHÁCH HÀNG</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=sale">
                            <i class="material-icons">storefront</i>
                            <p>BÁN HÀNG</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=table">
                            <i class="material-icons">coffee </i>
                            <p>QUẢN LÝ MÓN</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=staff">
                            <i class="material-icons">groups</i>
                            <p>QUẢN LÝ NHÂN SỰ</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=werehouse">
                            <i class="material-icons">sticky_note_2</i>
                            <p>QUẢN LÝ KHO</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=manage-financial">
                            <i class="material-icons">attach_money</i>
                            <p>QUẢN LÝ TÀI CHÍNH</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=account">
                            <i class="material-icons">perm_contact_calendar</i>
                            <p>TÀI KHOẢN CỦA BẠN</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link logout" href="#">
                            <i class="material-icons">logout</i>
                            <p>ĐĂNG XUẤT</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="
            navbar navbar-expand-lg navbar-transparent navbar-absolute
            fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">&nbsp</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">
                                    <i class="material-icons">dashboard</i>
                                    <p class="d-lg-none d-md-block">
                                        Stats
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="d-lg-none d-md-block">
                                        Some Actions
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                    <a class="dropdown-item" href="#">Another Notification</a>
                                    <a class="dropdown-item" href="#">Another One</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Tài khoản</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content" style="height: 100%; width: 100%">
                <?php
                if (isset($_REQUEST['page'])) {
                    $page = $_REQUEST['page'];
                    switch ($page) {
                        case 'manage-customer_s-info':
                            include 'customer/manage-customer_s-info.php';
                            break;
                        case 'add-customer_s-info':
                            include 'customer/add-customer_s-info.php';
                            break;
                        case 'change-customer_s-info':
                            include 'customer/change-customer_s-info.php';
                            break;
                        case 'staff':
                            include '../controllers/C_NhanVien.php';
                            break;
                        case 'account':
                            include './account.php';
                            break;
                        case 'sale':
                            include '../controllers/C_BanHang.php';
                            break;
                        case 'table':
                            include '../controllers/C_Mon.php';
                            break;
                        case 'werehouse':
                            include '../controllers/C_NguyenVatLieu.php';
                            break;
                        case 'manage-financial':
                            include './manage-financial.php';
                            break;
                        case 'title':
                            include '../controllers/C_ChucVu.php';
                            break;
                        default:
                            include './home.php';
                            break;
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.logout').click(function() {
                var xmlhttp = new XMLHttpRequest();
                var url = "../../coffeeshopmanagement/controllers/C_TaiKhoan.php?logout";

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.responseText == 'success') {
                            window.location.reload()
                        }
                    }
                };
                xmlhttp.open("GET", url, true);
                xmlhttp.send();
            })
        })
    </script>

    <script src="../assets_control/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../assets_control/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="../assets_control/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets_control/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <!-- Datatables -->
    <script src="../assets_control/js/plugins/jquery.dataTables.min.js"></script>
    <!-- SelectPicker -->
    <!-- <script src="../assets_control/js/plugins/bootstrap-selectpicker.js"></script> -->
</body>

</html>