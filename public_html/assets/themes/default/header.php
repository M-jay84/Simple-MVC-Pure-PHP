<?php

use models\M_blocks;

$GLOBALS['tstart'] = array_sum(explode(" ", microtime())); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="M-jay">
  <meta name="description" content="M-BiTsy is a feature packed and highly customisable PHP/PDO/MVC Based BitTorrent tracker." />
  <meta name="keywords" content="https://github.com/M-jay84/M-BiTsy" />
  <title><?php echo $data['title']; ?></title>
  <link href="<?= URLROOT ?>/assets/themes/default/bootstrap.min.css" rel="stylesheet">
  <link href="<?= URLROOT ?>/assets/themes/default/customstyle.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/6f36cea5db.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/atom-one-dark.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body class='d-flex flex-column min-vh-100'>

 
<?php require "assets/themes/default/navbar.php"; ?>   
<div class="container-fluid" style="margin-top:5px;">
<div class="row">