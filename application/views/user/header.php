<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Mansalva|Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>






        <header class="site-navbar site-navbar-target bg-secondary shadow" role="banner">

            <div class="container">
                <div class="row align-items-center position-relative">


                    <div class="site-logo">
                        <a href="index.html" class="text-white">Fundraiser</a>
                    </div>


                    <nav class="site-navigation text-left ml-auto " role="navigation">
                        <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                            <li class="active"><a href="index.html" class="nav-link">Home</a></li>
                            <li><a href="about.html" class="nav-link">About Us</a></li>
                            <li><a href="causes.html" class="nav-link">Our Causes</a></li>
                            <li><a href="blog.html" class="nav-link">Blog</a></li>
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                                    <img style="width: 50px" class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <?php foreach ($menu as $m) : ?>

                                        <a class="dropdown-item" href="#">
                                            <?= $m['title']; ?>
                                        </a>
                                    <?php endforeach; ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                        Logout
                                    </a>
                                    <a class="dropdown-item" data-toggle="modal" data-target="#pengajuaniklan">
                                        <span style="cursor: pointer;">Pengajuan Iklan</span>

                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>



                    <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white"><span class="icon-menu h3 text-white"></span></a></div>



                </div>
            </div>


            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header>