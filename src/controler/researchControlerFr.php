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

class BulkSearchingfr
{

    public int $quantité;
    public string $filterId;
    public string $jql = 'project = "ProAction Support" AND assignee in ("gwenole.maisonneuvelebrec@cgi.com", "jean-paul.andrei@cgi.com", "tinany.faure@cgi.com", "oceane.venries@cgi.com", "ducthang.tran@cgi.com") AND (resolution = Unresolved OR resolution is not EMPTY AND status not in (Resolved, Closed)) AND "Client Name(s)" = France';

    public function __construct(){

        
    }
    public function bulkSearch(){
        try {
            $issueService = new IssueService(); //crée l'instance "IssueService"
            $ret = $issueService->search($this->jql, 0); //Lance la requeste http 
            return $ret->issues;
        } catch (JiraRestApi\JiraException $e) { //gestion des exeptions
            die;
            print('testSearch Failed : '.$e->getMessage());
        }
    }

    public function affichagefr() {
        try{
            $ret = $this->bulkSearch(); //Lance la requeste http
            $url = $_ENV['JIRA_HOST']; 
            if (count($ret) > 0) {
                for($i = 0; $i < count($ret); $i++) {
                    $arrayKey = $ret[$i]->key;
                    $icon = $ret[$i]->fields->issuetype->iconUrl;
                    $arraySummary = $ret[$i]->fields->summary;
                    $arrayAssignee = $ret[$i]->fields->assignee->name;
                    $arraystatusicon = $ret[$i]->fields->status->iconUrl;
                    $arraystatus = $ret[$i]->fields->status->name;
                    $arrayCreated = $ret[$i]->fields->created;
                    $newcreated = $arrayCreated->format("d/m/Y");
                    $arrayUpdated = $ret[$i]->fields->updated;
                    $newUpdated = $arrayUpdated->format("d/m/Y");
                    echo "<tr>
                    <td><a href=\"$url/browse/$arrayKey\" target=\"_blank\" rel=\"noopener noreferrer\">$arrayKey</a></td>
                    <td><img src=\"$icon\" alt=\"\" srcset=\"\"></td>
                    <td>$arraySummary</td>
                    <td>$arrayAssignee</td>
                    <td>$newcreated</td>
                    <td>$newUpdated</td>
                    <td>$arraystatus</td>
                    <td><img src=\"$arraystatusicon\" alt=\"\" srcset=\"\"></td>";
                    if ($arraystatus == "Open"){
                        echo "<td><img src=\"src/view/asset/new.png\" alt=\"\" srcset=\"\" class=\"icon\"></td>
                        </tr> \n";
                    }
                }
            }else {
                echo "<p class='text-center text-success'><b> Il n'y a pas de ticket actuellement ! </b></p>
                <img src='src/view/asset/congrats.gif' alt='' srcset='' class=''>";
            }

        } catch (JiraRestApi\JiraException $e) { //gestion des exeptions
            die;
            print('testSearch Failed : '.$e->getMessage());
        }
    }
}