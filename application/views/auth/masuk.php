<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uselooper.com/auth-signin-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 16:26:43 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Halaman Masuk | PT. Lutungan Indoutama </title>
    <meta property="og:title" content="Sign In">
    <meta name="author" content="PTIKF2017">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Halaman Masuk">
    <meta property="og:description" content="Halaman Masuk">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
    <meta property="og:site_name" content="Halaman Masuk | PT. Lutungan Indoutama">
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
    <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png"> -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/icon.png">
    <meta name="theme-color" content="#3063A0"><!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End Google font -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/vendor/fontawesome/css/all.css"><!-- END PLUGINS STYLES -->
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
    <!-- .auth -->
    <main class="auth">
        <header id="auth-header" class="auth-header" style="background-image: url(<?= base_url('assets/img/intro-bg.svg') ?>);">
            <h1>
                <img class="mb-4" height="80" src="<?= base_url() ?>assets/img/logo.png" alt="">
            </h1>
        </header><!-- form -->
        <form action="<?= base_url('auth'); ?>" method="post" class="auth-form">
            <fieldset>
                <?= $this->session->flashdata('Message') ?>
                <!-- <p class="text-left mb-4"> Don't have a account? <a href="auth-signup.html">Create One</a></p>.form-group -->
                <div class="form-group mb-4">
                    <label class="d-block text-left" for="username">Username</label> <input type="text" id="username" name="username" class="form-control <?= form_error('username', 'is-invalid ', ''); ?> form-control-md" autofocus="on" value="<?= set_value('username') ?>">
                    <?= form_error('username', '<div class="invalid-feedback"><i class="fa fa-exclamation-circle fa-fw"></i>', '</div>'); ?>
                </div><!-- /.form-group -->
                <div class="form-group mb-4">
                    <label class="d-flex justify-content-between" for="password"><span>Password</span> <a href="#password" data-toggle="password"><i class="fa fa-eye fa-fw"></i><span>Show</span></a></label> <input type="password" class="form-control <?= form_error('password', 'is-invalid ', ''); ?>" id="password" name="password">
                    <?= form_error('password', '<div class="invalid-feedback"><i class="fa fa-exclamation-circle fa-fw"></i>', '</div>'); ?>
                </div><!-- /.form-group -->
                <div class="form-group mb-4">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
                </div><!-- /.form-group -->
                <!-- .form-group -->
                <!-- <div class="form-group text-center">
                <div class="custom-control custom-control-inline custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label" for="remember-me">Keep me sign in</label>
                </div>
            </div>/.form-group -->
                <!-- recovery links -->
                <!-- <p class="py-2">
                <a href="auth-recovery-username.html" class="link">Forgot Username?</a> <span class="mx-2">·</span> <a href="auth-recovery-password.html" class="link">Forgot Password?</a>
            </p>/recovery links -->
                <!-- copyright -->
                <!-- <p class="mb-0 px-3 text-muted text-center"> © 2018 All Rights Reserved. Loper is Responsive Admin Theme build on top of latest Bootstrap 4. <a href="#">Privacy</a> and <a href="#">Terms</a>
            </p> -->
            </fieldset>
        </form><!-- /.auth-form -->
        <!-- copyright -->
        <footer class="auth-footer">
            <p class="text-center"> &copy; Copyright <strong>Team Lutindo</strong>. All Rights Reserved <br>
                Modified by Team Lutindo
            </p>
        </footer>
    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="<?= base_url(); ?>assets/vendor/stacked-menu/stacked-menu.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/particles.js/particles.min.js"></script>
    <script>
        $(document).on('theme:init', () => {
            /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
            particlesJS.load('announcement', 'assets/javascript/pages/particles.json');
        })
    </script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="<?= base_url(); ?>assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
</body>

<!-- Mirrored from uselooper.com/auth-signin-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 16:26:43 GMT -->

</html>