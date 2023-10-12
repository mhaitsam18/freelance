<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cannabis"></i>
        </div>
        <div class="sidebar-brand-text mx-3"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider ">



    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');

    $querymenu = "SELECT `user_menu`.`menu_id`, `menu`
                FROM user_menu JOIN `user_acces_menu` 
                ON `user_menu`.`menu_id` = `user_acces_menu`.`menu_id`
                WHERE `user_acces_menu`.`role_id`= $role_id
                ORDER BY `user_acces_menu`.`menu_id` ASC
                ";
    $menu = $this->db->query($querymenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>
        <!-- SIAPKAN SUBMENU SESUAI MENU -->
        <?php
        $menuid = $m['menu_id'];
        $querysubmenu = "SELECT *
                            FROM user_sub_menu JOIN `user_menu` 
                            ON `user_sub_menu`.`menu_id` = `user_menu`.`menu_id`
                            WHERE `user_sub_menu`.`menu_id`= $menuid
                            AND `user_sub_menu`.`is_active` = 1
                            ";
        $subMenu = $this->db->query($querysubmenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <!-- Nav Item - Dashboard -->

            <li class="nav-item active">

            <li class="nav-item ">

                <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['judul']; ?></span></a>
            </li>
        <?php endforeach; ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

    <?php endforeach; ?>





    <!-- Nav Item - User Master Data Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>USER</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">PENGGUNA APLIKASI</h6>
                <a class="collapse-item" href="<?= base_url('admin/freelance/') ?>">Freelance</a>
                <a class="collapse-item" href="#">Perusahaan</a>

            </div>
        </div>
    </li>
    <!-- Nav Item LOWONGAN -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-search"></i>
            <span>LOWONGAN</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">LOWONGAN</h6>
                <a class="collapse-item" href="login.html">Cari Lowongan</a>
                <a class="collapse-item" href="register.html">Riwayat Lowongan</a>
                <a class="collapse-item" href="register.html">Riwayat Lamar</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - logout -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>KELUAR</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
<!-- End of Sidebar -->