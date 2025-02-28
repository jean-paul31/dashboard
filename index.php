<?php
session_start();
require('vendor/autoload.php');
require_once("src/controler/researchControler.php");
require_once("src/controler/researchControlerFr.php");
// require_once("src/controler/researchControlerFr_copy.php");
require_once("src/controler/researchControlerEu.php");
require("src/view/header.php");
require("src/view/navbar.php");

//permet d'utiliser les variables d'environement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

//initialise la variable $url
$url = '';
//Régle le temps d'execution du script
set_time_limit(500);
//cérifie l'url rentré et récupére tous ce qui est entre "/"
if (isset($_GET['url'])) {
    var_dump($url);
    $url = explode('/', $_GET['url']);
    
}


//défini les différentes actions à effectuer pour le routing
switch ($url[1]) {
    case 'home':
        require('src/view/home.php');
        break;
    case 'profile':
        require('src/view/profile.php');
        break;
    case 'editProfile':
        require('src/view/editProfile.php');
        break;
    case 'admin':
        require('src/view/admin.php');
        break;
    case 'search':
        require('src/view/research.php');
        break;
    case 'login':
        require('src/view/login.php');
        break;
    case 'deconnexion':
        require('src/view/deconnexion.php');
        break;
    case "instancefrance":
        $_ENV['JIRA_HOST'] = $_ENV['JIRA_CA'];//'https://proactionca.ent.cgi.com/jira';
        $_ENV['PERSONAL_ACCESS_TOKEN'] = $_SESSION['TokenCA'];
        require('src/view/searchfr.php');
        break;
    case "instanceurope":
        $_ENV['JIRA_HOST'] = $_ENV['JIRA_EU'];//'https://proactioneu.ent.cgi.com/jira';
        $_ENV['PERSONAL_ACCESS_TOKEN'] = $_SESSION['TokenEU'];
        require('src/view/searcheu.php');
    break; 
    default:
        require('src/view/404.php');
        break;
    
}

require("src/view/footer.php");
