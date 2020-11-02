<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?= $judul ?><?= $this->session->userdata('username') ?></title>
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
  <link href="<?= base_url('assets/fa/css/font-awesome.min.css') ?>" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Rubik&display=swap" rel="stylesheet">


</head>

<body style="background-color:#eeeeee;">