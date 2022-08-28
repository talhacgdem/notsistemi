<?php

$url = $this->uri->segment(1); // n=1 for controller, n=2 for method, etc

$pageName = match ($url) {
    '', 'Login' => 'Login',
    'Dashboard' => 'Dashboard',
    'Upload' => 'Upload',
    'Lessons' => 'Lessons',
    default => 'Login'
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title><?=$pageName?></title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link href="<?= base_url('depends/') ?>css/styles.css" rel="stylesheet"/>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<style>
    body{
        position: relative;
    }
    .notify{
        position: absolute;
        top: 60px;
        right: 25px;
        z-index: 55555;
    }
</style>

<body class="sb-nav-fixed">

<div class="notify">
    <?php $NOTIFY = $this->notify->getNotify(); if ($NOTIFY !== null){ ?>
        <div class="alert alert-<?=$NOTIFY['type']?> alert-dismissible fade show" role="alert">
            <span>
                <?=match ($NOTIFY['type']){
                    'danger' => '<i class="fa-solid fa-circle-xmark"></i>',
                    'success' => '<i class="fa-solid fa-circle-check"></i>',
                    'warning' => '<i class="fa-solid fa-circle-exclamation"></i>',
                    'info' => '<i class="fa-solid fa-circle-info"></i>',
                }?>
            </span>
            <span><?=$NOTIFY['msg']?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
</div>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?=base_url('Dashboard')?>">Not Sistemi</a>

    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><svg class="svg-inline--fa fa-bars" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"></path></svg><!-- <i class="fas fa-bars"></i> Font Awesome fontawesome.com --></button>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav pt-5">



                    <?php if ($USER->type == "1" || $USER->type == "2"){ ?>
                        <a class="mb-2 nav-link <?=($url === "Lessons") ? 'active' : ''?>"
                           href="<?=base_url('Lessons')?>">
                            <div class="sb-nav-link-icon"><i class="fa-2x fa-solid fa-file-arrow-up"></i></div>
                            Derslerim
                        </a>
                    <?php } ?>


                    <a class="mb-2 nav-link <?=($url === "User") ? 'active' : ''?>" href="<?=base_url('User')?>">
                    <div class="sb-nav-link-icon"><i class="fa-2x fa-solid fa-user"></i></div>
                        <?= match ($USER->type){
                            "0" => "Kullanıcılar",
                            default => "Profilim",
                        }?>
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer" style="position: relative">
                <?=$USER->username?>
                <div class="small">
                    <?= match ($USER->type){
                        "0" => "Admin",
                        "1" => "Akademisyen",
                        "2" => "Öğrenci"
                    }?>
                </div>
                <a href="<?=base_url('Login/logout')?>">
                    <div class="logout-area"><i class="logout-icon fa-solid fa-right-from-bracket fa-2x"></i></div>
                </a>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid p-4">