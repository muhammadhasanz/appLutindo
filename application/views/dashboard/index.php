<!-- .app-main -->
<main class="app-main">
    <!-- .wrapper -->
    <div class="wrapper">
        <!-- .page -->
        <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <!-- .page-title-bar -->
                <header class="page-title-bar">
                    <div class="d-flex flex-column flex-md-row">
                        <p class="lead">
                            <span class="font-weight-bold">Hai, <?= $user['name']; ?>.</span> <span class="d-block text-muted">Selamat datang di halaman dashboard <?= $user['alias']; ?></span>
                        </p>
                    </div>
                </header><!-- /.page-title-bar -->
                <div class="page-section">
                    <!-- .section-block -->
                    <div class="section-block">
                        <div class="metric-row">
                            <div class="col-lg-9">
                                <div class="metric-row metric-flush">
                                    <!-- metric column -->
                                    <div class="col">
                                        <!-- .metric -->
                                        <?php if ($htotal == 0) : ?>
                                            <div class="metric metric-bordered align-items-center">
                                                <p class="metric-value h3">
                                                    <sub><i class="oi oi-people fa-lg"></i></sub>
                                                </p>
                                                <h2 class="metric-label"> Tidak ada Permintaan </h2>
                                            </div><!-- /.metric -->
                                        <?php else : ?>
                                            <div class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Total Permintaan </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="oi oi-people"></i></sub> <span class="value"><?= $htotal; ?></span>
                                                </p>
                                            </div> <!-- /.metric -->
                                        <?php endif; ?>
                                    </div><!-- /metric column -->
                                    <!-- metric column -->
                                    <div class="col">
                                        <!-- .metric -->
                                        <?php if ($hbelum == 0) : ?>
                                            <div class="metric metric-bordered align-items-center">
                                                <p class="metric-value h3">
                                                    <sub><i class="oi oi-fork fa-lg"></i></sub>
                                                </p>
                                                <h2 class="metric-label"> Tidak ada yang belum diproses </h2>
                                            </div><!-- /.metric -->
                                        <?php else : ?>
                                            <div class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Belum Diproses </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="oi oi-fork"></i></sub> <span class="value"><?= $hbelum; ?></span>
                                                </p>
                                            </div> <!-- /.metric -->
                                        <?php endif; ?>
                                    </div><!-- /metric column -->
                                    <!-- metric column -->
                                    <div class="col">
                                        <!-- .metric -->
                                        <?php if ($htelah == 0) : ?>
                                            <div class="metric metric-bordered align-items-center">
                                                <p class="metric-value h3">
                                                    <sub><i class="fa fa-tasks fa-lg"></i></sub>
                                                </p>
                                                <h2 class="metric-label"> Tidak ada site yang aktif </h2>
                                            </div><!-- /.metric -->
                                        <?php else : ?>
                                            <div class="metric metric-bordered align-items-center">
                                                <h2 class="metric-label"> Site yang telah aktif </h2>
                                                <p class="metric-value h3">
                                                    <sub><i class="fa fa-tasks"></i></sub> <span class="value"><?= $htelah; ?></span>
                                                </p>
                                            </div> <!-- /.metric -->
                                        <?php endif; ?>
                                    </div><!-- /metric column -->
                                </div>
                            </div><!-- metric column -->
                            <div class="col-lg-3">
                                <!-- .metric -->
                                <?php if ($hsedang == 0) : ?>
                                    <div class="metric metric-bordered align-items-center">
                                        <p class="metric-value h3">
                                            <sub><i class="oi oi-timer fa-lg"></i></sub>
                                        </p>
                                        <h2 class="metric-label"> Tidak ada yang sedang diproses </h2>
                                    </div><!-- /.metric -->
                                <?php else : ?>
                                    <div class="metric metric-bordered">
                                        <div class="metric-badge">
                                            <span class="badge badge-lg badge-success"><span class="oi oi-media-record pulse mr-1"></span> SEDANG DIPROSES </span>
                                        </div>
                                        <p class="metric-value h3">
                                            <sub><i class="oi oi-timer"></i></sub> <span class="value"><?= $hsedang; ?></span>
                                        </p>
                                    </div> <!-- /.metric -->
                                <?php endif; ?>
                            </div><!-- /metric column -->
                        </div><!-- /metric row -->
                    </div><!-- /.section-block -->
                </div><!-- /.page-inner -->
                <!-- .page-section -->
            </div><!-- /.page-inner -->
        </div><!-- /.page -->
    </div>