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
class Create
{

    public string $projectKey;
    public string $issueType;
    public string $summary;
    public string $description;

    public function __construct() {}

    public function creation():void{
        $this->projectKey = htmlspecialchars($_POST['project']);
        $this->issueType = htmlspecialchars($_POST['type']);
        $this->summary = htmlspecialchars($_POST['Summary']);
        $this->description = htmlspecialchars($_POST['description']);
        try {
            $issueField = new IssueField();
        
            $issueField->setProjectKey($this->projectKey)
                        ->setSummary($this->summary)
                        ->setPriorityNameAsString('Critical')
                        ->setIssueTypeAsString($this->issueType)
                        ->setDescription($this->description)
                    ;
            
            $issueService = new IssueService();
        
            $ret = $issueService->create($issueField);
            
            //If success, Returns a link to the created issue.

        } catch (JiraRestApi\JiraException $e) {
            print('Error Occured! ' . $e->getMessage());
        }
    }
    public function bulkCreation()
    {
        // $this->projectKey = htmlspecialchars($_POST['project']);
        // $this->issueType = htmlspecialchars($_POST['type']);
        // $this->summary = htmlspecialchars($_POST['Summary']);
        // $this->description = htmlspecialchars($_POST['description']);
        try {
            $issueFieldOne = new IssueField();
        
            $issueFieldOne->setProjectKey('FGDCASOPSU')
                        ->setSummary('Demo kick off 1')
                        ->setPriorityNameAsString('Critical')
                        ->setIssueTypeAsString('Incident')
                        ->setDescription('On va tester ca');
        
            $issueFieldTwo = new IssueField();
        
            $issueFieldTwo->setProjectKey('FGDCASOPSU')
                        ->setSummary('Demo kick off 2')
                        ->setPriorityNameAsString('Critical')
                        ->setIssueTypeAsString('Service Request')
                        ->setDescription('Full description for second issue');
            
            $issueService = new IssueService();
        
            $ret = $issueService->createMultiple([$issueFieldOne, $issueFieldTwo]);
            
            //If success, returns an array of the created issues
            //var_dump($ret);
            return $ret;
        } catch (JiraRestApi\JiraException $e) {
            print('Error Occured! ' . $e->getMessage());
        }
    }

}








