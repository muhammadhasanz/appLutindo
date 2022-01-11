<?php $this->load->view('ls/navreport');  ?>
<div class="card-body">
  <!-- .section-block -->
  <div class="page-section">
    <div class="section-block">
      <h2 class="section-title ml-2"> Hari ini </h2><!-- .timeline -->
      <?php if ($data_hariini != null) : ?>
        <?php foreach ($data_hariini as $hi) : ?>
          <ul class="timeline ml-3">
            <!-- .timeline-item -->
            <li class="timeline-item">
              <!-- .timeline-figure -->
              <div class="timeline-figure">
                <span class="tile tile-circle tile-sm"><i class="fa<?= $hi['icon_log']; ?> fa-lg"></i></span>
              </div><!-- /.timeline-figure -->
              <!-- .timeline-body -->
              <div class="timeline-body">
                <!-- .media -->
                <div class="media">
                  <!-- .media-body -->
                  <div class="media-body">
                    <h6 class="timeline-heading">
                      <?= $hi['name_branch']; ?>
                    </h6>
                    <p class="mb-0">
                      <?= $hi['tindakan']; ?> </p>
                    <p class="timeline-date d-sm-none"> <?= nasah_time_ago($hi['tanggal']); ?> </p>
                  </div><!-- /.media-body -->
                  <!-- .media-right -->
                  <div class="d-none d-sm-block">
                    <span class="timeline-date"> <?= nasah_time_ago($hi['tanggal']); ?> </span>
                  </div><!-- /.media-right -->
                </div><!-- /.media -->
              </div><!-- /.timeline-body -->
            </li><!-- /.timeline-item -->
          </ul><!-- .timeline -->
        <?php endforeach; ?>
      <?php else : ?>
        <ul class="timeline ml-3">
          <!-- .timeline-item -->
          <li class="timeline-item">
            <!-- .timeline-figure -->
            <div class="timeline-figure">
              <span class="tile tile-circle tile-sm"><i class="fas fa-exclamation fa-lg"></i></span>
            </div><!-- /.timeline-figure -->
            <!-- .timeline-body -->
            <div class="timeline-body">
              <!-- .media -->
              <div class="media">
                <!-- .media-body -->
                <div class="media-body">
                  <h6 class="timeline-heading">
                    Tidak ada aktifitas untuk saat ini.
                  </h6>
                </div><!-- /.media-body -->
              </div><!-- /.media -->
            </div><!-- /.timeline-body -->
          </li><!-- /.timeline-item -->
        </ul><!-- .timeline -->
      <?php endif; ?>
      <h2 class="section-title ml-2"> Kemarin </h2><!-- .timeline -->
      <?php if ($data_kemarin != null) : ?>
        <?php foreach ($data_kemarin as $ke) : ?>
          <ul class="timeline ml-3">
            <!-- .timeline-item -->
            <li class="timeline-item">
              <!-- .timeline-figure -->
              <div class="timeline-figure">
                <span class="tile tile-circle tile-sm"><i class="fa<?= $ke['icon_log']; ?> fa-lg"></i></span>
              </div><!-- /.timeline-figure -->
              <!-- .timeline-body -->
              <div class="timeline-body">
                <!-- .media -->
                <div class="media">
                  <!-- .media-body -->
                  <div class="media-body">
                    <h6 class="timeline-heading">
                      <?= $ke['name_branch']; ?>
                    </h6>
                    <p class="mb-0">
                      <?= $ke['tindakan']; ?> </p>
                    <p class="timeline-date d-sm-none"> <?= date('H:i', strtotime($ke['tanggal'])); ?> </p>
                  </div><!-- /.media-body -->
                  <!-- .media-right -->
                  <div class="d-none d-sm-block">
                    <span class="timeline-date"> <?= date('H:i', strtotime($ke['tanggal'])); ?> </span>
                  </div><!-- /.media-right -->
                </div><!-- /.media -->
              </div><!-- /.timeline-body -->
            </li><!-- /.timeline-item -->
          </ul><!-- .timeline -->
        <?php endforeach; ?>
      <?php else : ?>
        <ul class="timeline ml-3">
          <!-- .timeline-item -->
          <li class="timeline-item">
            <!-- .timeline-figure -->
            <div class="timeline-figure">
              <span class="tile tile-circle tile-sm"><i class="fas fa-exclamation fa-lg"></i></span>
            </div><!-- /.timeline-figure -->
            <!-- .timeline-body -->
            <div class="timeline-body">
              <!-- .media -->
              <div class="media">
                <!-- .media-body -->
                <div class="media-body">
                  <h6 class="timeline-heading">
                    Tidak ada aktifitas kemarin.
                  </h6>
                </div><!-- /.media-body -->
              </div><!-- /.media -->
            </div><!-- /.timeline-body -->
          </li><!-- /.timeline-item -->
        </ul><!-- .timeline -->
      <?php endif; ?>
      <h2 class="section-title ml-2"> <?= date('F d, Y', $lalu); ?> </h2><!-- .timeline -->
      <?php if ($data_lalu != null) : ?>
        <?php foreach ($data_lalu as $la) : ?>
          <ul class="timeline ml-3">
            <!-- .timeline-item -->
            <li class="timeline-item">
              <!-- .timeline-figure -->
              <div class="timeline-figure">
                <span class="tile tile-circle tile-sm"><i class="fa<?= $la['icon_log']; ?> fa-lg"></i></span>
              </div><!-- /.timeline-figure -->
              <!-- .timeline-body -->
              <div class="timeline-body">
                <!-- .media -->
                <div class="media">
                  <!-- .media-body -->
                  <div class="media-body">
                    <h6 class="timeline-heading">
                      <?= $la['name_branch']; ?>
                    </h6>
                    <p class="mb-0">
                      <?= $la['tindakan']; ?> </p>
                    <p class="timeline-date d-sm-none"> <?= date('H:i', strtotime($la['tanggal'])); ?> </p>
                  </div><!-- /.media-body -->
                  <!-- .media-right -->
                  <div class="d-none d-sm-block">
                    <span class="timeline-date"> <?= date('H:i', strtotime($la['tanggal'])); ?> </span>
                  </div><!-- /.media-right -->
                </div><!-- /.media -->
              </div><!-- /.timeline-body -->
            </li><!-- /.timeline-item -->
          </ul><!-- .timeline -->
        <?php endforeach; ?>
      <?php else : ?>
        <ul class="timeline ml-3">
          <!-- .timeline-item -->
          <li class="timeline-item">
            <!-- .timeline-figure -->
            <div class="timeline-figure">
              <span class="tile tile-circle tile-sm"><i class="fas fa-exclamation fa-lg"></i></span>
            </div><!-- /.timeline-figure -->
            <!-- .timeline-body -->
            <div class="timeline-body">
              <!-- .media -->
              <div class="media">
                <!-- .media-body -->
                <div class="media-body">
                  <h6 class="timeline-heading">
                    Tidak ada aktifitas 2 hari yang lalu.
                  </h6>
                </div><!-- /.media-body -->
              </div><!-- /.media -->
            </div><!-- /.timeline-body -->
          </li><!-- /.timeline-item -->
        </ul><!-- .timeline -->
      <?php endif; ?>
      <h2 class="section-title ml-2"> Yang telah berlalu </h2><!-- .timeline -->
      <ul class="timeline ml-3">
        <div id="get-log"></div>
      </ul><!-- .timeline -->
    </div><!-- /.section-block -->
    <div id="load_log_message"></div>
  </div><!-- /.page-section -->
</div><!-- /.page-section -->
</div><!-- /.page-inner -->
</div><!-- /.page -->
</div><!-- .app-footer -->