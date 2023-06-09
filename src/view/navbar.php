<?php
// require "src/controler/navbar.php";
?>
<nav class="navbar navbar-expand-lg" style="background-color: #04deff;">
  <div class="container-fluid navtext">
    <a class="navbar-brand nav-text" href="home">Syn<font color="red"><b>@</b></font>xMonitor</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav d-flex">
        <?php if (isset($_SESSION['id'])) { ?>
        <li class="nav-item p-2">
          <a class="nav-link active text-dark" href="home">Home</a>
        </li>
        <li class="nav-item p-2">
        <?php if ($_SESSION['admin'] == 1) { ?>
          <a class="nav-link active text-dark" href="admin">Admin</a>
        <?php } ?>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link active text-dark" href="profile">Profile</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link active text-dark" href="instancefrance">Instance Française</a>
        </li>
        <li class="nav-item p-2">
          <a class="nav-link active text-dark" href="instanceurope">Instance Européenne</a>
        </li>

        <?php } ?>

        <li class="nav-item p-2 deco">

        <?php if (isset($_SESSION['id'])){ ?>

          <a class="nav-link active text-dark" href="deconnexion">Déconnexion</a>

        <?php } else { ?>

          <a class="nav-link active text-dark" href="login">Connexion</a>

        <?php }  ?>

        </li>

      </ul>
    </div>
  </div>
</nav>
    <!-- <div class="container">
        <div class="row"> -->
          
          