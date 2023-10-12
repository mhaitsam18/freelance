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

    <!-- Heading -->
    <div class="sidebar-heading">
        PERUSAHAAN
    </div>

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
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Perusahaan') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Perusahaan/chat') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Chat dengan Pelamar</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Perusahaan/chatGrup') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>Chat Grup</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - PROFIL Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>PROFIL</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">PROFIL PERUSAHAAN</h6>
                <?php 
                $user_pin = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $where = array('id_user' => $user_pin['id']);
                $perusahaan = $this->Menu_model->getWhere($where, 'perusahaan')->row();
                if ($perusahaan->pin != '') {
                    $minta = "minta-pin-masuk";
                } else{
                    $minta = "";
                }
                 ?>
                <a class="collapse-item <?= $minta ?>" href="<?= base_url('Perusahaan/cek_pin/') ?>">Profil Akun</a>


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
                <a class="collapse-item" href="<?= base_url('Perusahaan/Buat_lowongan') ?>">Buat Lowongan</a>
                <a class="collapse-item" href="<?= base_url('Perusahaan/Pe_pelamar') ?>">Penerimaan Pelamar</a>
                <!-- <a class="collapse-item" href="<?= base_url('Perusahaan/rekrut_freelance') ?>">Cari Freelance</a> -->
            </div>
        </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->