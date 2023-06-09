
<div class="container text-center">
    <div class="row">
    <?php if (isset($_SESSION['id'])) { ?>
        <div class="title">
            <h1>Liste de tickets</h1>
        </div>
        <div class="col">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Entrez ici l'id de votre filtre:" aria-label="Recipient's username" aria-describedby="button-addon2" name="filterId" id="filterId">
                    <select class="form-select" aria-label="Default select example" name="instance" id="instance">
                        <option selected>Instance</option>
                        <option value="1">France</option>
                        <option value="2">Europe</option>
                        <option value="3">Canada</option>
                        <option value="4">POC</option>
                    </select>
                    <button type="submit" class=" btn btn-primary" name="result" id="result">Resultat</button>
                </div>
            </form> 
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Issue Key</th>
                    <th scope="col">Type</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Assignee</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        if(isset($_POST['result'])){ //vérifie qu'une action a été faite sur le bouton
                            if (isset($_POST['instance']) or $_POST['instance'] != 'Isntance') {
                                if(!empty($_POST['filterId'])){ //verifie que l'input n'est pas vide 
                                    $search = new BulkSearching;
                                    for($i = 0; $i < count($search->bulkSearch($search->quantité)); $i++) {
                                        $arrayKey[] = $search->bulkSearch($search->quantité)[$i]->key;
                                        $icon[] = $search->bulkSearch($search->quantité)[$i]->fields->issuetype->iconUrl;
                                        $arraySummary[] = $search->bulkSearch($search->quantité)[$i]->fields->summary;
                                        $arrayAssignee[] = $search->bulkSearch($search->quantité)[$i]->fields->assignee->name;
                                        $arraystatusicon[] = $search->bulkSearch($search->quantité)[$i]->fields->status->iconUrl;
                                        $arraystatus[] = $search->bulkSearch($search->quantité)[$i]->fields->status->name;
                                        echo "<tr>
                                        <td><a href=\"$url/browse/$arrayKey[$i]\" target=\"_blank\" rel=\"noopener noreferrer\">$arrayKey[$i]</a></td>
                                        <td><img src=\"$icon[$i]\" alt=\"\" srcset=\"\"></td>
                                        <td>$arraySummary[$i]</td>
                                        <td>$arrayAssignee[$i]</td>
                                        <td>$arraystatus[$i]</td>
                                    </tr> \n";
                                    }
                                } else {
                                    echo "<p><font color=\"orange\"><b>Veuillez remplir le champs filtre id !</b></font></p>";
            
                                }
                            } else {
                                echo "<p><font color=\"orange\"><b>Veuillez choisir une instance !</b></font></p>";
                            }
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php } else { ?>
                    <div class="title">
                        <h1>Vous devez etre connecté et avoir le rôle d'administrateur!</h1>
                    </div>
                <?php }?> 
</div>

