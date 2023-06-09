
<div class="col">
    <form action="" method="POST">
        <!-- <div class="input-group mb-3">
            <input type="text" class="form-control" name="project" id="project" placeholder="project key">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="type" id="type"  placeholder="Type de ticket">
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="Summary" id="Summary"  placeholder="Titre du ticket">
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Description</label>
        </div> -->
        <div class="input-group mb-3">
            <button type="submit" class=" btn btn-primary" value="create" name="create" id="create">Create</button>
        </div>
    </form>
    <?php
    $create = new Create;
    /*if(isset($_POST['create'])){
        if (!empty($_POST['project']) or !empty($_POST['type']) or !empty($_POST['Summary']) or !empty($_POST['description'])) {
            $create->creation();
        } else {
            echo "<p><font color=\"red\"><b>Veuillez remplir le formulaire</b></font></p>";
        }
    }elseif($create->creation()) {
        echo "<p><font color=\"green\"><b>issues created</b></font></p>";
    } else {
        echo "<p></p>";
    }*/
    if(isset($_POST['create'])){

        $create->bulkCreation();
        echo "<p></p>";
        if ($create->bulkCreation()) {
            echo "<p><font color=\"green\"><b>issues created</b></font></p>";
        }else{
            echo "<p><font color=\"red\"><b>Veuillez remplir le formulaire</b></font></p>";
        }
    }
    ?>
</div>