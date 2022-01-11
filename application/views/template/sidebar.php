<!-- .app-aside -->
<aside class="app-aside app-aside-expand-md app-aside-light">
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `klk_dashboard`.*
                  FROM `klk_dashboard` JOIN `klk_user_access_menu` 
                    ON `klk_dashboard`.`id` = `klk_user_access_menu`.`id_menu`
                 WHERE `klk_user_access_menu`.`id_role` = $role_id
              ORDER BY `klk_user_access_menu`.`id_menu` ASC
              ";
    $menu1 = $this->db->query($queryMenu)->result_array();
    $queryMenu2 = "SELECT `klk_menu`.`id`, `menu`
                   FROM `klk_menu` JOIN `klk_user_access_menu` 
                     ON `klk_menu`.`id` = `klk_user_access_menu`.`id_menu`
                  WHERE `klk_user_access_menu`.`id_role` = $role_id
               ORDER BY `klk_user_access_menu`.`id_menu` ASC
              ";
    $menuHeader = $this->db->query($queryMenu2)->result_array();
    $menuAwal = $this->db->get('klk_dashboard')->result_array();
    ?>
    <!-- .aside-content -->
    <div class="aside-content">
        <!-- .aside-header -->
        <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="<?= base_url('assets/images/avatars/') . $user['image']; ?>" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name"><?= $user['name']; ?></span> <span class="account-description"><?= $user['alias']; ?></span></span></button> <!-- /.btn-account -->
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
                <!-- dropdown-items -->
                <div class="pb-3">
                    <a class="dropdown-item" href="<?= base_url('dashboard/profile'); ?>"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="<?= base_url('dashboard/edit_profile/') . $user['id_user']; ?>"><i class="dropdown-icon fas fa-user-edit"></i> Edit Profile</a> <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
                </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
        </header><!-- /.aside-header -->
        <!-- .aside-menu -->
        <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
                <!-- .menu -->
                <ul class="menu">
                    <!-- .menu-item -->
                    <?php foreach ($menuAwal as $ma) : ?>
                        <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="menu-item has-active"' : 'class="menu-item"' ?>>
                            <a href="<?= base_url() . $ma['url_awal']; ?>" class="menu-link"><span class="menu-icon <?= $ma['icon_awal'] ?>"></span> <span class="menu-text"><?= $ma['menu_awal']; ?></span>
                            </a>
                        </li><!-- /.menu-item -->

                    <?php endforeach; ?>

                    <?php foreach ($menuHeader as $mh) : ?>
                        <?php if ($mh['id'] != 6) : ?>
                            <li class="menu-header"><?= $mh['menu']; ?> </li>
                        <?php endif; ?>
                        <!-- /.menu-header -->

                        <?php
                        $menuId = $mh['id'];
                        $queryMenu = "SELECT *
                                        FROM `klk_sub_menu`
                                       WHERE `menu_id_sub` = $menuId
                                         AND `is_active_sub` = 1
                                    ORDER BY `klk_sub_menu`.`id` ASC
                          ";
                        $subMenu = $this->db->query($queryMenu)->result_array();
                        ?>
                        <?php foreach ($subMenu as $sb) : ?>
                            <?php if ($title == $sb['title_sub']) : ?>
                                <li class="menu-item has-active">
                                <?php else : ?>
                                <li class="menu-item">
                                <?php endif; ?>
                                <a href="<?= base_url() . $sb['url_sub']; ?>" class="menu-link"><span class="menu-icon <?= $sb['icon_sub']; ?>"></span> <span class="menu-text"><?= $sb['title_sub']; ?></span></a> <!-- child menu -->
                                <ul class="menu">
                                    <?php
                                    $dropdownId = $sb['id'];
                                    $queryDropdown = "SELECT *
                                                        FROM `klk_dropdown`
                                                       WHERE `menu_id_drop` = $dropdownId
                                                         AND `is_active_drop` = 1
                                                    ORDER BY `klk_dropdown`.`id` ASC
                                     ";
                                    $dropdown = $this->db->query($queryDropdown)->result_array();
                                    ?>
                                    <?php foreach ($dropdown as $dd) : ?>
                                        <li class="menu-item">
                                            <a href="<?= base_url() . $dd['url_drop']; ?>" class="menu-link"><?= $dd['title_drop']; ?></a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul><!-- /child menu -->
                                </li><!-- /.menu-item -->
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
        </div><!-- /.aside-menu -->
        <!-- Skin changer -->
        <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
        </footer><!-- /Skin changer -->
    </div><!-- /.aside-content -->
</aside><!-- /.app-aside -->