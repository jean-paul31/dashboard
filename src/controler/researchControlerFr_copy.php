<?php
// require 'C:\wamp64\www\synaxe\vendor\autoload.php';

use JiraRestApi\Issue\IssueService;
// use JiraRestApi\ServiceDesk\Request;
use JiraRestApi\Issue\IssueField;
use JiraRestApi\Issue\Comment;
use JiraRestApi\JiraException;

use Unirest\Request;
use Unirest\Response;


Unirest\Request::defaultHeader("Accept", "application/json");
Unirest\Request::defaultHeader("Content-Type", "application/json");
Unirest\Request::auth("jean-paul.andrei@cgi.com", "Balma003!!");
Unirest\Request::verifyPeer(false);

class BulkSearchingfrBIS
{

    public int $quantité;
    public string $filterId;
    public string $jql = 'project = "ProAction Support" AND assignee in ("gwenole.maisonneuvelebrec@cgi.com", "jean-paul.andrei@cgi.com", "tinany.faure@cgi.com", "oceane.venries@cgi.com", "ducthang.tran@cgi.com") AND (resolution = Unresolved OR resolution is not EMPTY AND status not in (Resolved, Closed)) AND "Client Name(s)" = France';
    public string $URL = 'https://proactioncapoc.ent.cgi.com/jira/rest/servicedeskapi/request?expand=participant,status,requestType&requestOwnership=PARTICIPATED_REQUESTS';

    public function __construct(){

        
    }
    public function bulkSearch(){
        try {

            $req = Request::get($this->URL);
            // var_dump($req->body->values[0]);
            // $issueReq = new RequestService(); //crée l'instance "IssueService"
            // $ret = $issueReq->getRequestsByParticipant(); //Lance la requeste http 
            return $req->body->values;
        } catch (JiraRestApi\JiraException $e) { //gestion des exeptions
            die;
            print('testSearch Failed : '.$e->getMessage());
        }
    }

    public function affichagefrBIS() {
        try{
            $ret = $this->bulkSearch(); //Lance la requeste http
            // var_dump($ret[0]->issueKey);
            $url = $_ENV['JIRA_HOST']; 
            if (count($ret) > 0) {
                for($i = 0; $i < count($ret); $i++) {
                    $arrayLink = $ret[$i]->_links->web;
                    $arrayKey = $ret[$i]->issueKey;
                    $icon = $ret[$i]->requestType->name;
                    for ($j=0; $j < count($ret[$i]->requestFieldValues) ; $j++) { 
                        if ($ret[$i]->requestFieldValues[$j]->label == "Summary") {
                            $arraySummary = $ret[$i]->requestFieldValues[$j]->value;
                        }
                    }
                    // $arraySummary = $ret[$i]->requestFieldValues;
                    $arrayReporter = $ret[$i]->reporter->name;
                    // $arraystatusicon = $ret[$i]->fields->status->iconUrl;
                    $arraystatus = $ret[$i]->currentStatus->status;
                    $arrayCreated = Datetime::createFromFormat('Y-m-d h:i:s',  $ret[$i]->createdDate->jira);
                    echo gettype($arrayCreated);
                    $newcreated = $arrayCreated->format('d-m-Y');
                    // $arrayUpdated = $ret[$i]->fields->updated;
                    // $newUpdated = $arrayUpdated->format("d/m/Y");
                    echo "<tr>
                    <td><a href=$arrayLink target=\"_blank\" rel=\"noopener noreferrer\">$arrayKey</a></td>   
                    <td>$icon</td>           
                    <td>$arraySummary</td>
                    <td>$arrayReporter</td>
                    <td>$newcreated</td>
                    <td>$arraystatus</td>";
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
