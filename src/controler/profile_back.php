<?php
require_once "db.php";
try {
    $conn = new PDO("mysql:host=".$_ENV['DB_SERVEUR'] . ";dbname=" .$_ENV['DB_DBNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    if (isset($_POST['update'])) 
    {
        $TokenCA = htmlspecialchars($_POST['TokenCA']);
        $TokenEU = htmlspecialchars($_POST['TokenEU']);
        $TokenPOC = htmlspecialchars($_POST['TokenPOC']);
        $newmdp = base64_encode($_POST['newmdp']);
        $id = $_SESSION['id'];

       if(!empty($TokenCA) OR !empty($TokenEU) OR !empty($TokenPOC) OR !empty($newmdp))
       {
        echo "on commence ";
            $reqUser = $conn->prepare("SELECT * FROM utilisateur WHERE id = ?");
            
            $reqUser->execute(array($id));
            
            $userExist = $reqUser->rowCount();
            var_dump($userExist);
            if($userExist == 1)
            {
                echo "ça existe ";
                $userinfo = $reqUser->fetch();
                $_SESSION['TokenCA'] = $userinfo['TokenCA'];
                $_SESSION['TokenPOC'] = $userinfo['TokenPOC'];
                $_SESSION['TokenEU'] = $userinfo['TokenEU'];
                if (!empty($TokenCA)) {
                    echo "ca ";
                    $upUser = $conn->query("UPDATE `utilisateur` SET `TokenCA`='$TokenCA' WHERE id = $id");
                } 
                if (!empty($TokenEU)) {
                    echo "eu ";
                    $upUser = $conn->query("UPDATE `utilisateur` SET `TokenEU`='$TokenEU' WHERE id = $id");
                } 
                if (!empty($TokenPOC)) {
                    echo "poc ";
                    $upUser = $conn->query("UPDATE `utilisateur` SET `TokenPOC`='$TokenPOC' WHERE id = $id");
                } 
                if (!empty($newmdp)) {
                    echo "mdp ";
                    $upUser = $conn->query("UPDATE `utilisateur` SET `mdp`='$newmdp' WHERE id =  $id");
                }
            }

       }
       else
       {
            $erreur = "Tous les champs doivent être complétés !";
       }
    }
} catch (\Throwable $th) {
    echo $th;
}