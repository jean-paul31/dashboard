<?php
require("src/controler/profile_back.php");
?>
<header>
    <div class="container d-flex justify-content-lg-center text-center">
        <div class="row">
        <?php if (isset($_SESSION['id'])) { ?>
            <div class="col">
                <div>
                    <h1 class="title text-center">Mon profile</h1>
                </div>                
            </div>
        </div>
    </div>
</header>

<br>
<br>
<br>

<section id="section1">
    <div class="container text-center">
        <div class="row d-flex justify-content-between">
            <div class="col-5">
                <div>
                    <h2 class="title text-center">Détail de mon compte</h2>
                </div> 
                <div class="box2">
                    <div>
                        <h3 class="profile_h2">Mon adresse mail: </h3>
                        <p><?= $_SESSION['email'] ?></p>
                    </div>
                    <div>
                        <h3 class="profile_h2">Mon Token pour ca: </h3>
                        <p class="token"><?= $_SESSION['TokenCA'] ?></p>
                    </div>
                    <div>
                        <h3 class="profile_h2">Mon Token pour eu: </h3>
                        <p class="token"><?= $_SESSION['TokenEU'] ?></p>
                    </div>
                    <div>
                        <h3 class="profile_h2">Mon Token pour POC: </h3>
                        <p class="token"><?= $_SESSION['TokenPOC'] ?></p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div>
                    <h2 class="title">Editer mon compte</h2>
                </div>
                <form action="" method="POST" class="form-group box2">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Token CA</span>
                        <input type="text" class="form-control" name="TokenCA">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Token EU</span>
                        <input type="text" class="form-control" name="TokenEU">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Token POC</span>
                        <input type="text" class="form-control" name="TokenPOC">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Mot de passe</span>
                        <input type="password" class="form-control" name="newmdp">
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="update" name="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php } else { ?>
        <div class="title">
            <h1>Vous devez etre connecté et avoir le rôle d'administrateur!</h1>
        </div>
    <?php }?> 
</section>
