<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/icon/icon.png">
    <title><?= $judul ?></title>
    <?php foreach($css as $csss): ?>
        <link rel="stylesheet" href="<?= base_url() . "assets/css/" . $csss . '.css'?>">
    <?php endforeach; ?>
    <link rel="stylesheet" href="<?= base_url()?>assets/css/root.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/plugin/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script src="<?= base_url()?>assets/plugin/bootstrap/js/bootstrap.js"></script>
    <script src="<?= base_url()?>assets/plugin/jquery/jquery.js"></script>
</head>
<body>
