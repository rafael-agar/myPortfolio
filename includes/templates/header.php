<?php

    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    $allowed_pages = array('index.php','entrar.php'); // Lista de páginas permitidas
    $page = isset($_GET['page']) ? $_GET['page'] : 'index.php'; // Obtener la página solicitada

    if (!in_array($page, $allowed_pages)) {
      // La página no está permitida, redirigir a la página de error
      header("Location: error.php");
      exit;
    }

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="images/logo.png">

  <meta name="description" content="Web Developer" />
  <meta name="keywords" content="web developer, web designer, programmer" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=PT+Mono&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Rafael Agar</title>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="100">

  <div class="lines-wrap">
    <div class="lines-inner">
      <div class="lines"></div>
    </div>
  </div>
  <!-- END lines -->

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  
  <nav class="site-nav dark site-navbar-target">
    <div class="container ">
      <div class="site-navigation">
        <a href="index.php" m-0"><img width="100px" class="logo" src="images/logo.png" /></a>

        <ul class="js-clone-nav d-none d-lg-inline-none site-menu float-right site-nav-wrap">
          <li><a href="#home-section" class="nav-link active">Home</a></li>
          <li><a href="#portfolio-section" class="nav-link">Portfolio</a></li>
          <li><a href="#about-section" class="nav-link">About</a></li>
          <li><a href="#services-section" class="nav-link">Services</a></li>
          <li><a href="#contact-section" class="nav-link">Contact us</a></li>
        </ul>

        <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-inline-block" data-toggle="collapse" data-target="#main-navbar">
          <span></span>
        </a>

      </div>
    </div>
  </nav>