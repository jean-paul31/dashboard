<?php
try {
    $conn = new PDO("mysql:host=".$_ENV['DB_SERVEUR'] . ";dbname=" .$_ENV['DB_DBNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    if (isset($_POST['connexion'])) 
    {
        $mailConnect = htmlspecialchars($_POST['mailConnect']);
        $mdpConnect = base64_encode($_POST['mdpConnect']);

       if(!empty($mailConnect) AND !empty($mdpConnect))
       {
            $reqUser = $conn->prepare("SELECT * FROM utilisateur WHERE email = ? and mdp = ?");
            $reqUser->execute(array($mailConnect, $mdpConnect));
            $userExist = $reqUser->rowCount();
            if($userExist == 1)
            {
                echo "ça existe";
                $userinfo = $reqUser->fetch();        
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['email'] = $userinfo['email'];
                $_SESSION['TokenCA'] = $userinfo['TokenCA'];
                $_SESSION['TokenPOC'] = $userinfo['TokenPOC'];
                $_SESSION['TokenEU'] = $userinfo['TokenEU'];
                $_SESSION['admin'] = $userinfo['admin'];
                $message = "Vous etes connecté ! ";  
                if (isset($_SESSION['id'])) {
                    header("Location:home");
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
