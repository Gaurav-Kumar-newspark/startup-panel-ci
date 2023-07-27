<?php
namespace App\Controllers;
global $hooks;
global $db;
global $ipaddress;
use CodeIgniter\Controller;
use Psr\Log\LoggerInterface;
use LDAP\Result;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Loginmodel;
use App\Models\Adminconfigurationmodel;
use App\Models\Apimodel;
class BaseController extends Controller{
  
    protected $request;
    protected $db;
    protected $data;
    protected $encrypter;
    protected $validation;
    protected $migrate;

    protected $helpers = ['url', 'form', 'email','session', 'filesystem','html','cookie','text','file','date','template','userrights','customlog','customlalertmsg','security'];
   
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger){ 
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        /************* libraries load here *****************/
        $this->session    =  \Config\Services::session();
        $this->db         =  \Config\Database::connect();
        $this->encrypter  =  \Config\Services::encrypter();
        $this->migrate    =  \Config\Services::migrations();
        $this->forge      =  \Config\Database::forge();
        $this->security   =  \Config\Services::security();
        /************* libraries End here *******************/


        /***************** Models Load here *******************/
        $this->loginmodel              = new Loginmodel();
        $this->adminconfigurationmodel = new Adminconfigurationmodel();
        $this->apimodel                = new Apimodel();
        /***************** Models End here **********************/

        $router = service('router');
        $method = $router->methodName();
        $this->checkdbconnection();
        
        /****************** Validating Registration Start Here *****************/  
        if ($this->db->tableExists('tbl_admin')){
            $count = $this->db->table('tbl_admin')->countAllResults();
            if($count > 0){
                if($method == 'adminconfiguration'){   
                    if($method!="login")
                    {
                        header("Location: ".site_url('login'));
                        die();
                    }               
                }
            }
        }
        if($method != 'adminconfiguration'){
            if ($this->db->tableExists('tbl_admin')){
                $count = $this->db->table('tbl_admin')->countAllResults();
                if($count == 0){
                    header("Location: ".site_url('adminconfiguration'));
                }
            }
        }
        $this->db->query("SET sql_mode = '' ");        
    }

     /****************** Confirmation admin password **********************/
     public function confirmationadminpassword($action = ""){
        $action =  $this->request->getPost('action');
        if (isset($action) && $action == "confirmationadminpassword") {
            $value =  $this->request->getPost('value');
            $adminpassword = trim($value);
            $session = session();
            $sessionid = $session->get('adminid');
            if (!empty($adminpassword)) {
                if (isset($sessionid) && !empty($sessionid)) {
                    $result = $this->adminconfigurationmodel->where("id", $sessionid)->get()->getResultArray();
                    if (!empty($result)) {
                        $storedPassword = $result[0]["password"];
                        if (password_verify($adminpassword,$storedPassword)) {

                            echo json_encode(array("result" => "success"));
                            die();
                        }else{
                            echo json_encode(array("result" => "error"));
                            die();
                        }   
                    }
                }
            }
            else {
                echo json_encode(array("result" => "empty"));
                die();
            }
        }
    }
    /**************************** End Here *******************************/
    
    /****************** Check db connection start Here *****************/  
    public function checkdbconnection() {
        try {
            $this->migrate->latest();
        } catch (\Throwable $e) {
            echo $e->getMessage(); die();   
        }
    }
    /****************** Check db connection End Here *****************/  

    /****************** CustomEncrption start Here *****************/  
    public function customencrption($action = "encode",$text = ""){    
        if($action == "encode"){
            return base64_encode($this->encrypter->encrypt($text));
        }else if($action == "decode"){
            return  $this->encrypter->decrypt(base64_decode($text));
        }
    }
    /****************** CustomEncrption End Here *****************/  

    public function customsetflash($var = "",$content = ""){
        $session = session();
        $_SESSION[$var] = $content;
        $session->markAsFlashdata($var);   
     }
    
    /********************** sca_dochecklicense Start Here ****************/
    public function sca_dochecklicense() {
        return array("status" => "Active");
    }
    /************************** sca_dochecklicense End Here ****************/



    public function sbp_generateRandomString($length = 10) {        

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}