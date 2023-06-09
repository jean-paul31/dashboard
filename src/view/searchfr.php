<?php
$tempsAttente = 900;
header("refresh:$tempsAttente");
?>
<header>
    <div class="container d-flex justify-content-md-center text-center">
        <?php if (isset($_SESSION['id'])) { ?>
        <div class="row">
            <br>
            <div class="col">
                <h1 class="title">LISTE DES TICKETS EN COURS SUR L'INSTANCE FRANCAISE</h1>
            </div>
        </div>
    </div>
</header>

<br>
<br>
<br>

<section id="section1">
    <div class="container d-flex justify-content-md-center text-center">
        <div class="row">
            <div class="col">
                <div>
                    <button class="btn btn-primary" type="reset" name="refresh" onclick="window.location.reload();">REFRESH</button>
                </div>
                <br>
                <table class="table box2">
                    <thead>
                        <tr>
                            <th scope="col">Issue Key</th>
                            <th scope="col">Type</th>
                            <th scope="col">Summary</th>
                            <th scope="col">Assignee</th>
                            <th scope="col">Created</th>
                            <th scope="col">Updated</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                // $fr = new BulkSearchingfrBIS();
                                // $fr->affichagefrBIS();
                                $fr = new BulkSearchingfr();
                                $fr->affichagefr();
                            ?>
                    </tbody>
                    </a>
                </table> 
            </div>
            <?php } else { ?>
            <div class="title">
                <h1>Vous devez etre connecté</h1>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
