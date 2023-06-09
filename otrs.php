<?php
require_once 'vendor/autoload.php';

Unirest\Request::defaultHeader("Accept", "application/json");
Unirest\Request::defaultHeader("Content-Type", "application/json");
Unirest\Request::verifyPeer(false);

class Otobo
{
    public $BaseURL;
    public $headers;
    public $body;
    public $SessionID;

    public function __construct(){
        $this->BaseURL = "https://fgdc-ux.imfr.cgi.com/otrs/nph-genericinterface.pl/Webservice/GenericTicketConnectorREST";
        $this->headers = [];
        $this->body = json_encode(
            [
                "UserLogin" => "jean-paul.andrei",
                "Password"  => "Balma003!!",
            ]
        );
    }

    /**
     * SessionCreate
     *
     * http://doc.otrs.com/doc/api/otrs/6.0/Perl/Kernel/GenericInterface/Operation/Session/SessionCreate.pm.html
     */
    public function session(){
        try {
            $response = Unirest\Request::post($this->BaseURL."/session", $this->headers, $this->body);
            return $this->SessionID = $response->body->SessionID;
            
        } catch (\Throwable $th) {
            if (!$response->body->SessionID) {
                print "No SessionID returned \n";
                exit(1);
            }
            throw $th;
        }
    }

    /**
     * TicketCreate
     *
     * https://doc.otrs.com/doc/api/otrs/6.0/Perl/Kernel/GenericInterface/Operation/Ticket/TicketCreate.pm.html
     */
    // $attachment = file_get_contents("README.md");
    // $body = json_encode([
    //         'SessionID' => $SessionID,
    //         'Ticket' => [
    //             'Title' => 'Example ticket from PHP',
    //             'Queue' => 'Postmaster',
    //             'CustomerUser' => 'info@znuny.com',
    //             'State' => 'new',
    //             'Priority' => '3 normal',
    //             'OwnerID' => 1,
    //         ],
    //         'Article' =>[
    //             'CommunicationChannel' => 'Email',  
    //             'ArticleTypeID' => 1,
    //             'SenderTypeID' => 1,
    //             'Subject' => 'Example',
    //             'Body' => 'This is a GenericInterface example.',
    //             'ContentType' => 'text/plain; charset=utf8',
    //             'Charset' => 'utf8',
    //             'MimeType' => 'text/plain',
    //             'From' => 'info@znuny.com',
    //         ],
    //         'Attachment' => [
    //             'Content' => base64_encode($attachment),
    //             'ContentType' => 'text/plain',
    //             'Filename' => 'README.md'
    //         ],
    //     ]
    // );

    // $response = Unirest\Request::post($BaseURL."/Ticket", $headers, $body);
    // if ( $response->body->Error ) {
    //     $ErrorCode = $response->body->Error->ErrorCode;
    //     $ErrorMessage = $response->body->Error->ErrorMessage;
    //     print "ErrorCode $ErrorCode\n";
    //     print "ErrorMessage $ErrorMessage\n";
    //     exit(1);
    // }
    // $TicketNumber = $response->body->TicketNumber;
    // $TicketID = $response->body->TicketID;
    // $ArticleID = $response->body->ArticleID;

    // print "\nThe ticket $TicketNumber was created. Check it via https://$FQDN/otrs/index.pl?Action=AgentTicketZoom;TicketID=$TicketID\n";


    /**
     * TicketUpdate
     *
     * http://doc.otrs.com/doc/api/otrs/6.0/Perl/Kernel/GenericInterface/Operation/Ticket/TicketUpdate.pm.html
     */
    // $param = json_encode([
    //     'SessionID' => $SessionID,
    //     'Ticket' => [
    //         'Queue' => 'Raw',
    //         'State' => 'open'
    //     ]
    // ]);
    // $response = Unirest\Request::patch($BaseURL."/Ticket/${TicketID}", $headers, $param);
    // if ( $response->body->Error ) {
    //     $ErrorCode = $response->body->Error->ErrorCode;
    //     $ErrorMessage = $response->body->Error->ErrorMessage;
    //     print "ErrorCode $ErrorCode\n";
    //     print "ErrorMessage $ErrorMessage\n";
    //     exit(1);
    // }
    // print "\nThe ticket was moved to the queue 'Raw' and the state changed to 'open'\n";

    /**
     * TicketGet
     *
     * http://doc.otrs.com/doc/api/otrs/6.0/Perl/Kernel/GenericInterface/Operation/Ticket/TicketGet.pm.html
     */
    public function getTicket($TicketID){
            $param = [
            'SessionID' => $this->SessionID,
        ];
        try {
            $response = Unirest\Request::get($this->BaseURL."/Ticket/$TicketID", $this->headers);
            $TicketData = $response->body;
            var_dump($TicketData);
            
            // print "\nThe ticket data:\n";
            // foreach($TicketData as $key => $value) {
            //     if ($value) {
            //         print "$key: $value\n";    
            //     }
            // }
        } catch (\Throwable $th) {
            echo $th;
        }

    }

    /**
     * TicketSearch
     *
     * http://doc.otrs.com/doc/api/otrs/6.0/Perl/Kernel/GenericInterface/Operation/Ticket/TicketSearch.pm.html
     */
    public function search(){
        $param = [
            'SessionID' => $this->SessionID,
            'StateType' => ['new', 'ouvert'],
            'Queue' => 'ITools Jean-Paul'
        ];
        try {
            $response = Unirest\Request::get($this->BaseURL."/Tickets", $this->headers, $param);
            $Count = count($response->body->TicketID);
            print "\nThere is/are $Count ticket(s) with the state new or open, created during the last 15 minutes.\n";
            $TicketIDs = $response->body;
            var_dump($response);
            // foreach($TicketIDs as $TicketID) {
            //     // $this->getTicket($TicketID);
            //     exit(1);
            // } 
        } catch (\Throwable $th) {
            throw $th;
        }
       
    }
}

$oto = new Otobo();
// echo $oto->SessionID."\n";:
$oto->session();
// $oto->search();
$oto->getTicket(37731);

