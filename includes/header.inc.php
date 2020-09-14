<?php require('includes/connection.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
  <title><?php

          if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT meta_title FROM projects WHERE id='$id'";
            $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
            echo  $row['meta_title'];
          } else {
            echo "Brucre";
          }


          ?></title>

  <meta name="description" content="<?php
                                    if (isset($_GET['id'])) {
                                      $id = $_GET['id'];
                                      $sql = "SELECT meta_desc FROM projects WHERE id='$id'";
                                      $row = mysqli_fetch_assoc(mysqli_query($con, $sql));

                                      echo  $row['meta_desc'];
                                    } else {
                                      echo "A LUCKNOW BASED ARCHITECTURE FIRM";
                                    }

                                    ?>">
  <meta name="keywords" content="<?php
                                  if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                    $sql = "SELECT meta_keyword FROM projects WHERE id='$id'";
                                    $row = mysqli_fetch_assoc(mysqli_query($con, $sql));

                                    echo  $row['meta_keyword'];
                                  } else {
                                    echo "lucknow, architecture, lko, portfolio";
                                  }

                                  ?>">
  <!-- favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
  <link rel="manifest" href="img/favicon/site.webmanifest">
  <!-- CSS  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;900&display=swap" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,700' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
  <!-- <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" /> -->
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="stylesheet" type="text/css" href="contact.css" />
  <link rel="stylesheet" type="text/css" href="aboutUs.css" />
  <link rel="stylesheet" type="text/css" href="slider.css" />
  <link rel="stylesheet" type="text/css" href="projects.css" />
  <link rel="stylesheet" type="text/css" href="footer.css" />
  <link rel="stylesheet" type="text/css" href="navbar.css" />
  <link rel="stylesheet" type="text/css" href="services.css" />

</head>

<body>
  <header>
    <a id="cd-logo" href="index.php">
      <h1 class="brand-logo">brucre.</h1>
    </a>

    <nav id="cd-top-nav">
      <ul>
        <li><a href="aboutUs.php">About Us</a></li>
        <li><a href="services.php">Our Services</a></li>
        <li><a href="all_projects.php">Projects</a></li>
        <li><a href="career.php">Career</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
    </nav>
    <a id="cd-menu-trigger" href="#0"><span class="cd-menu-text">Menu</span><span class="cd-menu-icon"></span></a>
  </header>
  <main class="cd-main-content">