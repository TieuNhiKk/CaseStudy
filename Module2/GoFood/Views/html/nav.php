<?php require "header.php" ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <img id="logohome" src="/Public/Logo.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-auto" id="navbarColor01">
        <div class="nav nav-tabs mx-auto">
            <a class="nav-item nav-link <?= !isset($id) ? 'active' : '' ?>" href="index.php">HOME</a>
            <a class="nav-item nav-link <?= $id == 1 ? 'active' : '' ?>" id="type1" href="?type=1">Food</a>
            <a class="nav-item nav-link <?= $id == 2 ? 'active' : '' ?>" id="type2" href="?type=2">Drink</a>
        </div>
        <div class="navbar-nav ml-auto">
            <form class="nav-item form-inline my-2 my-lg-0">
                <input id="myInput" class="form-control mr-sm-2" type="text" placeholder="Search">
            </form>