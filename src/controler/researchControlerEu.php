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

class BulkSearchingEu
{
    // public array $issues;
    public int $quantité;
    public string $filterId;
    public string $jql = 'project = WSE-FGDC-ASOP-Support AND status not in (Closed, Resolved) and component = RUN and issuetype in (Incident, "Service Request", Enhancement) and Account in ("ASOPSU WSE", ASOPSU-SUPPFR, ASOPSU_JIRA)';

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

    public function affichageEu(){
        try {
            $ret = $this->bulkSearch();
            $url = $_ENV['JIRA_HOST']; 
            if (count($ret)>0) {
                for($i = 0; $i < count($ret); $i++) {
                    $arrayKey = $ret[$i]->key;
                    $icon = $ret[$i]->fields->issuetype->iconUrl;
                    $arraySummary = $ret[$i]->fields->summary;
                    if (empty($ret[$i]->fields->assignee->name)){
                        
                        $arrayAssignee = "Unassignee";
                    
                    }else{
                        $arrayAssignee = $ret[$i]->fields->assignee->name;
                    }
                    $arraystatusicon = $ret[$i]->fields->status->iconUrl;
                    $arraystatus= $ret[$i]->fields->status->name;
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
                    if (empty($ret[$i]->fields->assignee->name)){
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

    public function bulkWithPage(){
        try {
            $issueService = new IssueService();
        
            $pagination = -1;
          
            $startAt = 0;	//the index of the first issue to return (0-based)    
            $maxResult = 3;	// the maximum number of issues to return (defaults to 50). 
            $totalCount = -1;	// the number of issues to return
          
            // first fetch
            $ret = $issueService->search($this->jql, $startAt, $maxResult);
            $totalCount = $ret->total;
              
            // do something with fetched data
            foreach ($ret->issues as $issue) {
                // print (sprintf('%s %s \n', $issue->key, $issue->fields->summary));
            }
              
            // fetch remained data
            $page = $totalCount / $maxResult;
        
            for ($startAt = 1; $startAt < $page; $startAt++) {
                $ret = $issueService->search($this->jql, $startAt * $maxResult, $maxResult);
        
                // print ('\nPaging $startAt\n');
                // print ('-------------------\n');
                foreach ($ret->issues as $issue) {
                    // print (sprintf('%s %s \n', $issue->key, $issue->fields->summary));
                }
            }     
        } catch (JiraRestApi\JiraException $e) { //gestion des exeptions
            die;
            print('testSearch Failed : '.$e->getMessage());
        }
    }

    // public function refresh(){
    //     if (isset($_POST['refresh'])) {
    //         return header("refresh:0");
    //     }
    // }
}