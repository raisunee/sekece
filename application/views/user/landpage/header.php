<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $judul ?></title>
  <!-- Font Awesome -->
  <script type="text/javascript">
    function copyClipboard(clip)
    {

      var link = document.getElementById("clip");
      link.select();
      document.execCommand("copy");
      alert("URL telah di Copy");

    }
  </script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/vendor/mdb/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Material -->
  <link href="<?= base_url('assets/vendor/mdb/css/mdb.min.css') ?>" rel="stylesheet">
  <!-- DataTables -->
  <link href="<?= base_url('assets/vendor/datatables/datatables.min.css') ?>" rel="stylesheet">
  <!-- Style -->
  <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="<?= base_url('assets/vendor/mdb/css/style.css') ?>" rel="stylesheet">


</head>

<body>

<!-- Just an image -->
<nav class="navbar sticky-top navbar-light" style="background-color: #303841;">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img
        src="assets/photos/sekece_white.png"
        height="30"
        alt=""
        loading="lazy"
      />
    </a>
    <div class="justify-content-start">
      <a class="" href="<?= base_url('login'); ?>">
      <button class="btn btn-sm btn-link" type="button" style="background-color: #303841; color:#f6c90e; font-family: 'Alata', sans-serif;">
          Login
        </button>
      </a>
      <a class="" href="<?= base_url('register'); ?>">
        <button class="btn btn-sm btn-rounded" type="button" style="background-color: #eeeeee; color: #303841; font-family: 'Alata', sans-serif;">
          Sign Up
        </button>
      </a>
    </div>
  </div>
</nav>