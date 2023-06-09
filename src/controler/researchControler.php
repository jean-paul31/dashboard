<?php
//require '../../vendor/autoload.php';

use JiraRestApi\Issue\IssueService;
use JiraRestApi\Issue\IssueField;
use JiraRestApi\Issue\Comment;
use JiraRestApi\JiraException;

use Unirest\Request;
use Unirest\Response;


Unirest\Request::defaultHeader("Accept", "application/json");
Unirest\Request::defaultHeader("Content-Type", "application/json");
Unirest\Request::verifyPeer(false);

class BulkSearching
{

    public int $quantité=15;
    public string $filterId;
    public string $jql='';
    public string $instance;

    public function __construct(){
        switch (isset($_POST['instance'])) {
            case 'france':
                
                $_ENV['JIRA_HOST'] = 'https://proactionfr.ent.cgi.com/jira';
                echo "<script type='text/javascript'>document.location.replace('search?id=france');</script>";
                break;
            case 'europe':
                $_ENV['JIRA_HOST'] = 'https://proactioneu.ent.cgi.com/jira';
                echo "<script type='text/javascript'>document.location.replace('search?id=europe');</script>";
                break;
            case 'canada':
                $_ENV['JIRA_HOST'] = 'https://proactionca.ent.cgi.com/jira';
                echo "<script type='text/javascript'>document.location.replace('search?id=canada');</script>";
                break;
            case 'POC':
                $_ENV['JIRA_HOST'] = 'https://proactioncapoc.ent.cgi.com/jira';
                echo "<script type='text/javascript'>document.location.replace('search?id=POC');</script>";
                break;
            default:
                // $_ENV['JIRA_HOST'] = 'https://proactioneu.ent.cgi.com/jira';
                echo "<script type='text/javascript'>document.location.replace('search?id=none');</script>";
                break;
        }
    }

    public function bulkSearch($quantité){
            //définition de l'instance
            

        try {
            if(isset($_POST['result'])){ //vérifie qu'une action a été faite sur le bouton
                if (isset($_POST['instance']) or $_POST['instance'] != 'Isntance') {
                    if(!empty($_POST['filterId'])){ //verifie que l'input n'est pas vide 
                        $this->filterId = htmlspecialchars( $_POST['filterId']); //On récupére la valeur renseignée dans l'input
                        $this->jql = $this->filterId; //On utilise cette valeur pour construire la requete
                    } else {
                        $this->jql = '';
                        echo "<p><font color=\"orange\"><b>Veuillez remplir le champs filtre id !</b></font></p>";

                    }
                } else {
                    echo "<p><font color=\"orange\"><b>Veuillez choisir une instance !</b></font></p>";
                }
            }
            $issueService = new IssueService(); //crée l'instance "IssueService"
            $ret = $issueService->search($this->jql, 0, $this->quantité); //Lance la requeste http
            return $ret->issues;
        } catch (JiraRestApi\JiraException $e) { //gestion des exeptions
            die;
            print('testSearch Failed : '.$e->getMessage());
        }
    }
}