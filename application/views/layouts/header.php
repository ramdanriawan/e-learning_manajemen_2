<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets'); ?>/plugins/images/favicon.png">
    <title>Ample Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo base_url('assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css'); ?>"
        rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url('assets/css/colors/default.css'); ?>" id="theme" rel="stylesheet">
    <!-- Font Awesome CSS 5.11.2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- own css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/style.css'); ?>">
    <link href="<?php echo base_url('plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet'); ?>">
    <link href="<?php echo base_url('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css'); ?>" rel="stylesheet">
</head>

<body class="fix-header" cz-shortcut-listen="true">
<div id="tampilkan_modal"></div>
    <div class="preloader" style="display: none;">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="dashboard.html">
                        <b>
                            <img src="<?php echo base_url('assets'); ?>/plugins/images/admin-logo.png" alt="home"
                                class="dark-logo">
                            <img src="<?php echo base_url('assets'); ?>/plugins/images/admin-logo-dark.png" alt="home"
                                class="light-logo">
                        </b>
                        <span class="hidden-xs">
                            <img src="<?php echo base_url('assets'); ?>/plugins/images/admin-text.png" alt="home"
                                class="dark-logo">
                            <img src="<?php echo base_url('assets'); ?>/plugins/images/admin-text-dark.png" alt="home"
                                class="light-logo">
                        </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right in">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg"
                            href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>

                    <li>
                        <a class="profile-pic active" href="#"><b class="hidden-xs"> <?php echo $this->session->userdata('admin_nama'); ?></b> <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="navbar-default sidebar" role="navigation">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100%;">
                <div class="sidebar-nav slimscrollsidebar" style="overflow: hidden; width: auto; height: 100%;">
                    <div class="sidebar-head">
                        <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                                class="hide-menu">Navigation</span></h3>
                    </div>
                    <ul class="nav in" id="side-menu">
                        <li style="margin-top: 70px;">
                            <a href="<?php echo base_url(); ?>" class="<?php echo $this->uri->segment(2) == '' ? 'active' : ''; ?>">
                                <i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>
                                Dashboard
                            </a>
                        </li>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin'])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/m_siswa'); ?>" class='<?php echo $this->uri->segment(2) == 'm_siswa' ? 'active' : ''; ?>'>
                                <i class="fa fa-user-alt" aria-hidden="true"></i>
                                Data Siswa
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin'])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/m_guru'); ?>" class='<?php echo $this->uri->segment(2) == 'm_guru' ? 'active' : ''; ?>'>
                                <i class="nav-icon fas fa-user-tie"></i>
                                Data Guru
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', '', ''])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/m_mapel'); ?>" class='<?php echo $this->uri->segment(2) == 'm_mapel' ? 'active' : ''; ?>'>
                                <i class="nav-icon fa fa-book" aria-hidden="true"></i>
                                Data Mapel
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', '', 'guru'])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/m_soal/ujian'); ?>" class='<?php echo $this->uri->segment(2) == 'm_soal' ? 'active' : ''; ?>'>
                                <i class="nav-icon fa fa-paper-plane" aria-hidden="true"></i>
                                Data Soal
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'siswa'])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/ikuti_latihan'); ?>" class='<?php echo $this->uri->segment(2) == 'm_ikuti_latihan' ? 'active' : ''; ?>'>
                                <i class="nav-icon fa fa-paper-plane" aria-hidden="true"></i>
                                Data Latihan Siswa
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'siswa'])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/ikuti_ujian'); ?>" class='<?php echo $this->uri->segment(2) == 'm_ikuti_ujian' ? 'active' : ''; ?>'>
                                <i class="nav-icon fa fa-paper-plane" aria-hidden="true"></i>
                                Data Ujian Siswa
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'siswa', 'guru'])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/m_materi'); ?>" class='<?php echo $this->uri->segment(2) == 'm_materi' ? 'active' : ''; ?>'>
                                <i class="nav-icon fa fa-paper-plane" aria-hidden="true"></i>
                                Data Materi
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', '', 'guru'])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/m_latihan'); ?>" class='<?php echo $this->uri->segment(2) == 'm_latihan' ? 'active' : ''; ?>'>
                                <i class="nav-icon fa fa-paper-plane" aria-hidden="true"></i>
                                Data Latihan
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', '', 'guru'])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/m_ujian'); ?>" class='<?php echo $this->uri->segment(2) == 'm_ujian' ? 'active' : ''; ?>'>
                                <i class="nav-icon fa fa-paper-plane" aria-hidden="true"></i>
                                Data Ujian
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'guru', ''])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/h_latihan'); ?>" class='<?php echo $this->uri->segment(2) == 'h_latihan' ? 'active' : ''; ?>'>
                                <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                                Data Hasil Latihan
                            </a>
                        </li>
                        <?php endif;?>
                        <?php if (in_array($this->session->userdata('admin_level'), ['admin', 'guru', 'ortu'])): ?>
                        <li>
                            <a href="<?php echo base_url('adm/h_ujian'); ?>" class='<?php echo $this->uri->segment(2) == 'h_ujian' ? 'active' : ''; ?>'>
                                <i class="nav-icon nav-icon fas fa-tachometer-alt"></i>
                                Data Hasil Ujian
                            </a>
                        </li>
                        <?php endif;?>

                        <li><a href="#" class='nav-link' onclick="return rubah_password();">
                            <i class="nav-icon nav-icon fa fa-key" aria-hidden="true"></i>
                            Ubah Password
                        </a></li>
                    </ul>
                    <div class="center p-20">
                        <a  class='btn btn-danger btn-block waves-effect waves-light' href="<?php echo base_url('adm/logout'); ?>" onclick="return confirm('keluar..?');">
                            <i class="fa fa-power-off" aria-hidden="true"></i>
                             Logout</a>
                    </div>
                </div>
                <div class="slimScrollBar"
                    style="background: rgba(0, 0, 0, 0.3) none repeat scroll 0% 0%; width: 6px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 313px;">
                </div>
                <div class="slimScrollRail"
                    style="width: 6px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;">
                </div>
            </div>
        </div>
        <div id="page-wrapper" style="min-height: 252px;">
