<?php
if($this->session->status !== ('Logged'))
{
    redirect('login');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sistem Pendukung Keputusan Metode PROMETHEE</title>

    <!-- Font Awesome -->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Template CSS -->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>img/favicon.ico" type="image/x-icon">

    <!-- JQuery -->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body id="page-top">

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Logo -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
           href="<?= base_url('Login/home'); ?>">

            <div class="sidebar-brand-text mx-3">
                SPK KABUPATEN BANTUL
            </div>

        </a>

        <hr class="sidebar-divider my-0">

        <!-- Dashboard -->
        <li class="nav-item <?php if($page=='Dashboard'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Login/home'); ?>">

                <i class="fas fa-fw fa-home"></i>
                <span>Dashboard</span>

            </a>

        </li>

        <hr class="sidebar-divider">

        <!-- MASTER DATA -->
        <div class="sidebar-heading">
            Master Data
        </div>

        <?php if($this->session->userdata('id_user_level') == '1'): ?>

        <!-- Kriteria -->
        <li class="nav-item <?php if($page=='Kriteria'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Kriteria'); ?>">

                <i class="fas fa-fw fa-cube"></i>
                <span>Data Kriteria</span>

            </a>

        </li>

        <!-- Asli -->
        <li class="nav-item <?php if($page=='Asli'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Asli'); ?>">

                <i class="fas fa-fw fa-users"></i>
                <span>Data Asli</span>

            </a>

        </li>

        <!-- Alternatif -->
        <li class="nav-item <?php if($page=='Alternatif'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Alternatif'); ?>">

                <i class="fas fa-fw fa-users"></i>
                <span>Data Alternatif</span>

            </a>

        </li>

        <!-- Perhitungan -->
        <li class="nav-item <?php if($page=='Perhitungan'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Perhitungan'); ?>">

                <i class="fas fa-fw fa-calculator"></i>
                <span>Data Perhitungan</span>

            </a>

        </li>

        <!-- Hasil -->
        <li class="nav-item <?php if($page=='Hasil'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Perhitungan/hasil'); ?>">

                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Hasil Akhir</span>

            </a>

        </li>

        <?php endif; ?>


        <!-- USER LEVEL 2 -->
        <?php if($this->session->userdata('id_user_level') == '2'): ?>

        <li class="nav-item <?php if($page=='Hasil'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Perhitungan/hasil'); ?>">

                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Hasil Akhir</span>

            </a>

        </li>

        <?php endif; ?>


        <!-- USER LEVEL 3 -->
        <?php if($this->session->userdata('id_user_level') == '3'): ?>

        <!-- Perhitungan -->
        <li class="nav-item <?php if($page=='Perhitungan'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Perhitungan'); ?>">

                <i class="fas fa-fw fa-calculator"></i>
                <span>Data Perhitungan</span>

            </a>

        </li>

        <!-- Hasil -->
        <li class="nav-item <?php if($page=='Hasil'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Perhitungan/hasil'); ?>">

                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Hasil Akhir</span>

            </a>

        </li>

        <?php endif; ?>


        <hr class="sidebar-divider">

        <!-- MASTER USER -->
        <div class="sidebar-heading">
            Master User
        </div>

        <?php if($this->session->userdata('id_user_level') == '1'): ?>

        <li class="nav-item <?php if($page=='User'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('User'); ?>">

                <i class="fas fa-fw fa-users-cog"></i>
                <span>Data User</span>

            </a>

        </li>

        <?php endif; ?>

        <!-- Profile -->
        <li class="nav-item <?php if($page=='Profile'){echo 'active';}?>">

            <a class="nav-link" href="<?= base_url('Profile'); ?>">

                <i class="fas fa-fw fa-user"></i>
                <span>Data Profile</span>

            </a>

        </li>

        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggle -->
        <div class="text-center d-none d-md-inline">

            <button class="rounded-circle border-0" id="sidebarToggle"></button>

        </div>

    </ul>
    <!-- End Sidebar -->


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Mobile Sidebar Button -->
                <button id="sidebarToggleTop"
                        class="btn text-danger d-md-none rounded-circle mr-3">

                    <i class="fa fa-bars"></i>

                </button>

                <!-- Right Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown no-arrow">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="userDropdown"
                           role="button"
                           data-toggle="dropdown">

                            <span class="text-uppercase mr-2 d-none d-lg-inline text-gray-600 small">

                                <?= $this->session->username; ?>

                            </span>

                            <img src="<?= base_url('assets/') ?>img/user.png"
                                 class="img-profile rounded-circle">

                        </a>

                        <!-- Dropdown -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">

                            <a class="dropdown-item" href="<?= base_url('Profile'); ?>">

                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile

                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item"
                               href="#"
                               data-toggle="modal"
                               data-target="#logoutModal">

                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Keluar

                            </a>

                        </div>

                    </li>

                </ul>

            </nav>
            <!-- End Topbar -->

            <div class="container-fluid">