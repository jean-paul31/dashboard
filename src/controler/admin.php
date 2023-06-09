<?php
try {
    $conn = new PDO("mysql:host=".$_ENV['DB_SERVEUR'] . ";dbname=" .$_ENV['DB_DBNAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    if (isset($_POST['ajout'])) 
    {
        $mailConnect = htmlspecialchars($_POST['mailConnect']);
        $mdpConnect = base64_encode($_POST['mdpConnect']);
        $admin = isset($_POST['admin']) ? 1 : 0;

       if(!empty($mailConnect) AND !empty($mdpConnect))
       {
            $reqUser = $conn->prepare("SELECT * FROM utilisateur WHERE email = ? and mdp = ?");
            $reqUser->execute(array($mailConnect, $mdpConnect));
            $userExist = $reqUser->rowCount();
            if($userExist == 1)
            {
                echo "Cette utilisateur existe déjà.";
            } else {
                $reqUser = $conn->prepare("INSERT INTO utilisateur (email, mdp, admin) VALUES (?, ?, ?)");
                $reqUser->execute(array($mailConnect, $mdpConnect, $admin));
                $message= "<p class='text-success'> l'utilisateur a été ajouté avec succés !</p>";
            }
       }
       else
       {
            $erreur = "Tous les champs doivent être complétés !";
       }
    }
    $usersList = $conn->prepare("SELECT email, admin FROM utilisateur");
    $usersList->execute();
    $listInfo = $usersList->fetchAll(PDO::FETCH_ASSOC);
} catch (\Throwable $th) {
    echo $th;
}

function deleteUser($email){
    try {
                $User = $conn->prepare("DELETE FROM `utilisateur` WHERE email = ?");
                $User->execute(array($email));
                $message= "<p class='text-success'> l'utilisateur a été ajouté avec succés !</p>";

            
    } catch (\Throwable $th) {
        throw $th;
    }
}

function sendMail($email){
    // Destination de l'e-mail
    $destinataire = $email;

    // Sujet de l'e-mail
    $sujet = "Création de votre compte dans SynaxMonitoring";

    // Lien de redirection
    $lien = "https://www.example.com/redirection";

    // Corps du message
    $message = "Vous y étes presque \n,
    Votre compte synaxMonitoring vient d'étre créé \n,
    Il vous reste encore à enregistrer les tokens de connexion à jira:
    - Token de l'instance EU
    - Token de l'instance CA
    - Token de l'instance POC
    ___________________________________________________________________

    Un mot de passe aléatoire a été créé, nous conseillons de le mettre à jours au même endroit.

    <a href='$lien'>Mettre à jour votre compte</a>";

    // Entêtes de l'e-mail
    $headers = "From: itools.fr@cgi.com\r\n";
    $headers .= "Reply-To: votre_adresse@example.com\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Envoyer l'e-mail
    mail($destinataire, $sujet, $message, $headers);
}

