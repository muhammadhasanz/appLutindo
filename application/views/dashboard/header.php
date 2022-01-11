<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .page -->
        <div class="page">
            <!-- .page-cover -->
            <header class="page-cover">
                <div class="text-center">
                    <a href="#" class="user-avatar user-avatar-xl"><img src="<?= base_url('assets/images/avatars/') . $user['image']; ?>" alt=""></a>
                    <h2 class="h4 mt-2 mb-0"> <?= $user['name']; ?> </h2>
                    <div class="my-1"> <?= $user['alias']; ?> </div>
                    <p class="text-muted"> Terdaftar pada tanggal <?= date('d F Y', $user['date_created']); ?> </p>
                </div><!-- .cover-controls -->
            </header><!-- /.page-cover -->
            <!-- .page-navs -->