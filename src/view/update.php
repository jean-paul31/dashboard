
<div class="col">
    <form action="" method="post">
        <button type="submit" class=" btn btn-primary" value="update" name="update" id="update">update</button>
    </form>
    <?php
        $updateOne = new Update;
        if(isset($_POST['update'])){
            $updated = $updateOne->oneUpdate('FGDCASOPSU-3803');
            echo "<p></p>";
            if (!empty($updated)) {
                echo "<p><font color=\"green\"><b>issues updated</b></font></p>";
            } else {
                echo "<p><font color=\"red\"><b>something goes wrong</b></font></p>";
            }
        }
    ?>
</div>