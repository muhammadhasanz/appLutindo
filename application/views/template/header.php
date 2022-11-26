<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> <?= $title; ?> | PT. Lutungan Indoutama </title>
    <meta property="og:title" content="Sign In">
    <meta name="author" content="PTIKF2017">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Aplikasi">
    <meta property="og:description" content="Aplikasi">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
    <meta property="og:site_name" content="Aplikasi - PT. Lutungan Indoutama">
    <meta name="keyword" content="PT. Lutungan Indoutama, PT., lutungan, Indoutama">
    <script type="application/ld+json">
        {
            "name": "Admin - PT. Lutungan Indoutama",
            "description": "Kamu dapat mengakses semua menu admin disini",
            "author": {
                "@type": "Person",
                "name": "PTIKF2017"
            },
            "@type": "WebSite",
            "url": "",
            "headline": "Masuk",
            "@context": ""
        }
    </script><!-- End SEO tag -->
    <!-- FAVICONS -->
    <!-- <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png"> -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/icon.png">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/open-iconic/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/fontawesome/css/all.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/datatables/extensions/responsive/responsive.bootstrap4.min.css">
    <link href="<?= base_url() ?>assets/vendor/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/stylesheets/theme.min.css" data-skin="default">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/stylesheets/theme-dark.min.css" data-skin="dark">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/stylesheets/custom.css">
    <script>
        var skin = localStorage.getItem('skin') || 'default';
        var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
        var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
        // Disable unused skin immediately
        disabledSkinStylesheet.setAttribute('rel', '');
        disabledSkinStylesheet.setAttribute('disabled', true);
        // add flag class to html immediately
        if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
    </script><!-- END THEME STYLES -->
</head>

<body>
    <!-- .app -->
    <div class="app">
        <!-- .app-header -->
        <header class="app-header app-header-dark">
            <!-- .top-bar -->
            <div class="top-bar">
                <!-- .top-bar-brand -->
                <div class="top-bar-brand">
                    <!-- toggle aside menu -->
                    <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
                    <a href="<?= base_url() ?>">
                        <img class="ml-3" src="<?= base_url('assets/img/sidebar.png') ?>" alt="" style="width: 120px;">
                    </a>
                </div><!-- /.top-bar-brand -->
                <!-- .top-bar-list -->
                <div class="top-bar-list">
                    <!-- .top-bar-item -->
                    <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                        <!-- toggle menu -->
                        <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
                    </div><!-- /.top-bar-item -->
                    <!-- .top-bar-item -->
                    <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                        <!-- .btn-account -->
                        <div class="dropdown d-flex">
                            <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md"><img src="<?= base_url('assets/images/avatars/') . $user['image']; ?>" alt=""></span> <span class="account-summary pr-lg-4 d-none d-lg-block"><span class="account-name"><?= $user['name']; ?></span> <span class="account-description"><?= $user['alias']; ?></span></span></button> <!-- .dropdown-menu -->
                            <div class="dropdown-menu">
                                <div class="dropdown-arrow ml-3"></div>
                                <h6 class="dropdown-header d-none d-md-block d-lg-none"> <?= $user['name']; ?> </h6><a class="dropdown-item" href="<?= base_url('dashboard/profile'); ?>"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="<?= base_url('dashboard/edit_profile/') . $user['id_user']; ?>"><i class="dropdown-icon fas fa-user-edit"></i> Edit Profile</a> <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                            </div><!-- /.dropdown-menu -->
                        </div><!-- /.btn-account -->
                    </div><!-- /.top-bar-item -->
                </div><!-- /.top-bar-list -->
            </div><!-- /.top-bar -->
        </header><!-- /.app-header -->