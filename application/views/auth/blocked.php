<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Access dilarang | Crown Hunter </title>
    <meta property="og:title" content="Sign In">
    <meta name="author" content="Keith Ritherus">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Dashboard admin">
    <meta property="og:description" content="Dashboard admin">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
    <meta property="og:site_name" content="Dashboard - Admin crownhunter">
    <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" sizes="144x144" href="assets/apple-touch-icon.png">
    <link rel="shortcut icon" href="assets/favicon.ico"> -->
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
    <!-- .empty-state -->
    <main id="notfound-state" class="empty-state empty-state-fullpage bg-black">
        <!-- .empty-state-container -->
        <div class="empty-state-container">
            <div class="card">
                <div class="card-header bg-light text-left">
                    <i class="fa fa-fw fa-circle text-red"></i> <i class="fa fa-fw fa-circle text-yellow"></i> <i class="fa fa-fw fa-circle text-teal"></i>
                </div>
                <div class="card-body">
                    <h1 class="state-header display-1 font-weight-bold">
                        <span>4</span> <i class="far fa-frown text-red"></i> <span>3</span>
                    </h1>
                    <h3> Access dilarang! </h3>
                    <p class="state-description lead mt-3 mx-5"> Maaf, kamu tidak memiliki akses untuk halaman ini! </p>
                    <div class="state-action">
                        <a href="javascript:history.back()" class="btn btn-lg btn-light"><i class="fa fa-angle-right"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div><!-- /.empty-state-container -->
    </main><!-- /.empty-state -->
    <!-- BEGIN BASE JS -->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="<?= base_url(); ?>assets/vendor/particles.js/particles.min.js"></script>
    <script>
        /**
         * Keep in mind that your scripts may not always be executed after the theme is completely ready,
         * you might need to observe the `theme:load` event to make sure your scripts are executed after the theme is ready.
         */
        $(document).on('theme:init', () => {
            /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
            particlesJS.load('notfound-state', '<?= base_url(); ?>assets/javascript/pages/particles-error.json');
        })
    </script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="<?= base_url(); ?>assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
</body>

<!-- Mirrored from uselooper.com/auth-error-v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Nov 2019 16:26:42 GMT -->

</html>