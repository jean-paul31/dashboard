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

class Update 
{

    public string $key;

    public function __construct() {}

    public function oneUpdate($key){
        $issueKey = $key;

        try {			
            $issueField = new IssueField();

            $issueField ->setProjectKey('FGDCASOPSU')
                        ->setIssueTypeAsString('Task')
                        ->setSummary('changement du summary via l\'API')
                        ->setDescription('La description a été changé par l\'api')
            ;

            // optionally set some query params
            $editParams = [
                'notifyUsers' => false,
            ];

            $issueService = new IssueService();

            // You can set the $paramArray param to disable notifications in example
            $ret = $issueService->update($issueKey, $issueField, $editParams);

            return $ret;
        } catch (JiraRestApi\JiraException $e) {
            print('update Failed : ' . $e->getMessage());
        }
    }
}
