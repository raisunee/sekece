<?php 

  if($this->session->userdata('level') === null ):

    redirect(base_url());

  endif;

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $judul ?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/vendor/mdb/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Material -->
  <link href="<?= base_url('assets/vendor/mdb/css/mdb.min.css') ?>" rel="stylesheet">
  <!-- DataTables -->
  <link href="<?= base_url('assets/vendor/datatables/datatables.min.css') ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?= base_url('assets/vendor/mdb/css/style.css') ?>" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg" style="background-color: #244F64;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse text-white" id="navbarTogglerDemo01">
    <a class="navbar-brand text-white" href="<?= base_url($this->session->userdata("level").'/index') ?>  ">
      <img src="<?= base_url('assets/logo.png'); ?>" height="45" alt="mdb logo">
    </a>
    <ul class="navbar-nav mr-auto mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link text-white" href="<?= base_url($this->session->userdata("level").'/index') ?>"><i class="fas fa-tachometer-alt"></i> Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url($this->session->userdata("level").'/artikel') ?>"><i class="fas fa-newspaper"></i> Artikel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url($this->session->userdata("level").'/kelola_komentar') ?>"><i class="fas fa-comment"></i> Komentar</a>
      </li>

      <?php 
          if($this->session->userdata('level') === 'penulis' ):
       ?>

       <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url('penulis/pengaturan') ?>"><i class="fas fa-cog"></i> Pengaturan</a>
      </li>

      <?php endif; ?>

      <?php 
          if($this->session->userdata('level') === 'admin' ):
       ?>

      <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url('admin/kategori') ?>"><i class="fas fa-list-ul"></i> Kategori</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url('admin/komentar') ?>"><i class="fas fa-comments"></i> Komentar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url('admin/penulis') ?>"><i class="fas fa-user-friends"></i> Penulis</a>
      </li>
    <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= base_url() ?>" target="_blank"><i class="fas fa-link"></i> Ke Halaman Blog</a>
      </li>
    </ul>
    <span><a href="<?= base_url('logout') ?>" class="btn btn-cyan btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a></span>
</nav>
  