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
        FREELANCE
    </div>

    <!-- QUERY MENU -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Freelance') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Freelance/chat') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>CHAT</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Freelance/chatGrup') ?>">
            <i class="fas fa-fw fa-comments"></i>
            <span>CHAT GRUP</span>
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
                <h6 class="collapse-header">PROFIL SAYA</h6>
                <a class="collapse-item" href="<?= base_url('Freelance/profil_akun') ?>">Profil Akun</a>
                <a class="collapse-item" href="<?= base_url('Freelance/editprofil') ?>">Edit Profil</a>
                <a class="collapse-item" href="<?= base_url('Freelance/editpass') ?>">Edit Password</a>
                <a class="collapse-item" href="<?= base_url('Freelance/portofolio') ?>">Portofolio</a>
                <a class="collapse-item" href="<?= base_url('Freelance/profil') ?>">CV</a>
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
                <a class="collapse-item" href="<?= base_url('Freelance/pencarian') ?>">CARI LOWONGAN</a>
                <a class="collapse-item" href="<?= base_url('Freelance/undangan') ?>">UNDANGAN</a>
                <a class="collapse-item" href="<?= base_url('Freelance/riwayat_lamar') ?>">RIWAYAT LAMAR</a>
            </div>
        </div>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

<!-- </div> -->
<!-- End of Sidebar -->