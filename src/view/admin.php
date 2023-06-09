<?php
require "src/controler/admin.php";
?>
<header>
    <div class="container d-flex justify-content-md-center text-center">
        <div class="row">
        <?php if (isset($_SESSION['id'])AND isset($_SESSION['id'])) { ?>
            <div class="col">
                <div>
                    <h1 class="title">Page d'administration</h1>
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
            <div class="col-4">  
                <div>
                    <h2 class="title">Ajouter un utilisateur dans la BDD</h2>
                </div>
                <form action="" method="POST" class="form-group signIn  box2">
                    <div>
                        <label for="mailConnect">email:</label>
                        <input type="email" name="mailConnect" class="form-control">
                    </div>
                    <div>
                        <label for="mdpConnect">mot de passe:</label>
                        <input type="password" name="mdpConnect" class="form-control">
                    </div>
                    <br>
                    <div>
                        <div>
                            <label for="mailConnect">Sera t il/elle admin:</label>
                        </div>
                        <div>
                            <input class="form-check-input mt-0" type="checkbox" value="1" name="admin">
                        </div>
                        
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="connexion" name="ajout">
                    </div>
                    <!-- <span>Vous n'avez pas encore de compte? <a href="signUp"> Créer un compte</a></span> -->
                </form>
                <br>
                <br>
                <br>
            </div>
            <div class="col-4">
                <div>
                    <h2 class="title">Liste des utilisateurs</h2>
                </div>
                <div>
                    <table class="table box2">
                        <thead>
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">Admin</th>

                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                foreach ($listInfo as $utilisateur) { ?>
                            <tr>
                                <td><?= $utilisateur['email'] ?></td>
                                <td><?php 
                                if($utilisateur['admin']){
                                    echo "Oui";
                                } else {
                                    echo "Non";
                                } ?></td>
                                <!-- <td><button class="btn btn-warning" type="submit" name="delete_user" id="<?=$utilisateur['email']?>">SUPPRIMER</button></td> -->
                                <!-- <?php
                                    // if (isset($_POST['delete_user'])) {
                                    //     deleteUser($utilisateur['email']);
                                    // }
                                ?> -->
                            </tr>
                            <?php 
                                    
                        } 
                        ?>
                        </tbody>
                    </table> 
                    <?php } else { ?>
                    <div class="title">
                        <h1>Vous devez etre connecté et avoir le rôle d'administrateur!</h1>
                    </div>
                <?php }?> 
                </div>
            </div>
        </div>
    </div>
</section>
