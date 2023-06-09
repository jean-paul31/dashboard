<?php
require "src\controler\connexion.php"
?>
<header>
    <div class="container d-flex justify-content-lg-center text-center">
        <div class="row">
            <div class="col signIn">
                <div>
                    <h1 class="title">Connexion</h1>
                </div>
            </div>
        </div>      
    </div>
</header>


<br>
<br>
<br>


        
<section id="section1">
    <div class="container d-flex justify-content-lg-center text-center">
        <div class="row">
            <div class="col box2">
                <form action="" method="POST" class="form-group">
                    <br>
                    <div>
                        <label for="mailConnect">email:</label>
                        <input type="email" name="mailConnect" class="form-control">
                    </div>
                    <br>
                    <div>
                        <label for="mdpConnect">mot de passe:</label>
                        <input type="password" name="mdpConnect" class="form-control">
                    </div>
                    <br>
                    <div>
                        <input type="submit" class="btn btn-primary" value="connexion" name="connexion"">
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</section>
