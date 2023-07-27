<?php
namespace App\Controllers;
use App\Models\Apimodel;
use App\Models\Adminconfigurationmodel;
class Generateapi extends BaseController
{
    protected $apimodel;
    protected $adminconfigurationmodel;
    protected $session;
    protected $response;
    protected $request;
    protected $db;

    public function __construct()
    {
        $this->apimodel                = new Apimodel();
        $this->adminconfigurationmodel = new Adminconfigurationmodel();
        $this->session                 = session();
        $this->db                      =  \Config\Database::connect();
    }
   
    public function generateapi(){
      
        $data = array();
        if ($this->request->getMethod() === 'post'  && $this->request->getPost('generateapikey') !== null) {
          
            $adminid = $this->session->get('adminid');
            $apidatatocreate = array();
            $apidatatocreate["apikey"] = $this->Generate_securekey(15);
            $apidatatocreate["secret"] = $this->Generate_securekey(50);
            $apidatatocreate["created_at"]= date("Y-m-d");
            $apidatatocreate["created_by"]= $adminid;
            $createapi = $this->apimodel->createapi($apidatatocreate);
           
            if (isset($createapi["result"]) && $createapi["result"] == "success" && isset($createapi["last_insertid"]) && !empty($createapi["last_insertid"])) {
          
                setcookie("apicreated", "y", time() + 2592000);
                setcookie("apicreatedid", $createapi["last_insertid"], time() + 2592000);
                $_SESSION['apilastinsertid'] = $createapi["last_insertid"];
                $msg = array("result" => "success","action" => "api created", "request" => $apidatatocreate,"message" => "API created successfully");
               
            }else {
          
                $msg = array("result" => "error","action" => "api created", "request" => $apidatatocreate,"message" => "Unable to created api");
               
                setcookie("apicreated", "n", time() + 2592000);
            }   
            $this->customsetflash("flashmsg", $msg);
            return redirect()->to('/generateapi');
        }

        $deleteapinum =  $this->request->getPost("deleteapinum");
        if (isset($deleteapinum) && !empty($deleteapinum)) {
        
            $deletprocess = $this->apimodel->deleteapibyid($deleteapinum);
            if($deletprocess == true){
              
                $msg = array("result" => "success","action" => "delete api ", "request" => ["id" => $deleteapinum],"message" => "API deleted successfully");
           
            }else{
           
                $msg = array("result" => "error","action" => "delete api ", "request" => ["id" => $deleteapinum],"message" => "Unable to delete api");

            }
            $this->customsetflash("flashmsg", $msg);
        }
        
        if (isset($_COOKIE["apicreated"]) && !empty($_COOKIE["apicreated"])) {
          
            if ($_COOKIE["apicreated"] == "n") {
                $data["modelshow"] = 'yes';
                $data["modelheader"] = 'Failed';
                $data["class"] = 'show';
                $data["modalcontent"] = '<div class="alert alert-danger"><strong>Error! &nbsp;&nbsp;</strong> Unable to create api seems some technical issue concern with panel provider.</div>';
                setcookie("apicreated", "");
            }

            if ($_COOKIE["apicreated"] == "y") {
              
                $getdata = $this->apimodel->getapidatabyid($_COOKIE["apicreatedid"]);
                $gshowapikey = $this->customencrption("decode", $getdata[0]->apikey);
                $gshowsecret = $this->customencrption("decode", $getdata[0]->secret);
                $data["modelshow"] = 'yes';
                $data["modelheader"] = 'API Details';
                $data["class"] = 'show';
                $data["modalcontent"] = '<div class="alert alert-success"><b>Success!&nbsp;</b> API generated successfully.</div>';               
                $data["modalcontent"] .= '<p style="margin-top: 10px;margin-bottom: 0;">API Key</p>';
                $data["modalcontent"] .= '<input type="text" class="form-control" value="' . $gshowapikey . '" readonly disabled id="apikey">';
                $data["modalcontent"] .= '<p style="margin-top: 10px;margin-bottom: 0;">Secret key</p>';
                $data["modalcontent"] .= '<input type="text" class="form-control" value="' . $gshowsecret . '" readonly disabled id="apisecreate">';
                $data["modalcontent"] .= '<p class="alert alert-warning" style="margin-top:10px; color:black!important;"><b>Important Note</b>: Please store details it as &nbsp;<b style="text-decoration:underline;">Secret key</b> &nbsp; will no longer be visible here.</p>';
                setcookie("apicreated", "");
                setcookie("apicreatedid", "");
            }

        }

        $listapi = $this->apimodel->getallapidetailslist();
       
        if (!empty($listapi)) {
            foreach ($listapi as $apidataget) {
                
                $data["listapi"][] = array(
                    "id" => $apidataget->id,
                    "created_at" => $apidataget->formatted_createddate,
                    "apikey" => $this->customencrption("decode", $apidataget->apikey));
            }
        }
     
        return view("includes/head", array("thiscontrol" => $this))
              .view("includes/header",array("thiscontrol" => $this,"menuactive" => "generateapi"))
              .view("generateapi", $data)
              .view("includes/footer");
    }

    public function Generate_securekey($number = 8)
    {
        $randomstr = random_string('alnum', $number);
        $apikey = $randomstr;
        return $this->customencrption("encode", $apikey);
    }

    public function sendmailtoadmin()
    {
        $action =  $this->request->getPost("action");

        if (isset($action) && $action == "sendmailtoadmin") {
   
            $apisessionid = $this->session->get('apilastinsertid');
           
            if (isset($apisessionid) && !empty($apisessionid)) {    

                $getdata = $this->apimodel->getapidatabyid($apisessionid);
                $apikey = $getdata[0]->apikey;
                $secret = $getdata[0]->secret;
                $decriptapikey = $this->customencrption("decode", $apikey);
                $decriptsecret = $this->customencrption("decode", $secret);
                $count = $this->db->table('tbl_smtp')->countAllResults();
               
                if ($count > 0) {
                  
                    $message  = "<p>Api key".": ".$decriptapikey."</p>";
                    $message .= "<p>Api Secret".": ".$decriptsecret."</p>"; 
                    $emaildata = array("subject" => "API Details","message" => $message);
                    $email = $this->sendmail($emaildata);
                   
                    if($email == true){
                       
                        echo json_encode(array("result" => "success"));
                        die();
                   
                    }else{
                       
                        echo json_encode(array("result" => "error"));
                        die();
                    }
                }else {
                   
                    echo json_encode(array("result" => "empty"));
                    die();
                }
            } 
        }
    }
}
?>