<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\ResponseTrait;
use App\Models\Adminconfigurationmodel;
use App\Models\Apimodel;

class Api extends BaseController
{
    use ResponseTrait;

    protected $adminconfigurationmodel;
    protected $apimodel;
    protected $db;
    protected $response;

    public function __construct()
    {
        $this->db                         =  \Config\Database::connect();
        $this->encrypter                  =  \Config\Services::encrypter();
        $this->config                     = new \Config\Salt();
        $this->adminconfigurationmodel    = new Adminconfigurationmodel();
        $this->apimodel                   = new Apimodel();
    }


    private function validatesc($data = array())
    {
        $return = "error";
        if (!empty($data)) {
            $a = (isset($data["a"])) ? $data["a"] : "";
            $r = (isset($data["r"])) ? $data["r"] : "";
            $d = (isset($data["d"])) ? $data["d"] : "";
            $chforsc = $a . "*" . $this->config->salt . "*" . $r . "*" . $d;
            $sctocheck = md5($chforsc);
            if ($sctocheck == $data["sc"]) {
                $return = "success";
            }
        }
        return $return;
    }


    private function gensctoreturn($data = array())
    {
        $return = "NOSC";
        if (!empty($data)) {
            $a = (isset($data["a"])) ? $data["a"] : "";
            $r = (isset($data["r"])) ? $data["r"] : "";
            $d = (isset($data["d"])) ? $data["d"] : "";
            $chforsc = $a . "*" . $this->config->namak . "*" . $r . "*" . $d;
            $return = md5($chforsc);
        }
        return $return;
    }


    public function api()
    {

        $jsonData = json_decode(file_get_contents('php://input'), true);

        $newsc = $this->gensctoreturn($jsonData); //Generate New SC to return 
        if (!isset($jsonData["a"])) {
            $result = array();
            $result['result']  = "error";
            $result['sc']      = $newsc;
            $result['message'] = "API Key is required1";
            return $this->response->setJSON($result)->setStatusCode(400);
        }
        if (!isset($jsonData["s"])) {
            $result = array();
            $result['result']  = "error";
            $result['sc']      = $newsc;
            $result['message'] = "Api Secret is required";
            return $this->response->setJSON($result)->setStatusCode(400);
        }
        if (!isset($jsonData["action"])) {
            $result = array();
            $result['result']  = "error";
            $result['sc']      = $newsc;
            $result['message'] = "Action is required";
            return $this->response->setJSON($result)->setStatusCode(400);
        }

        //Security needed
        if (!isset($jsonData["r"])) {
            $result = array();
            $result['result']  = "error";
            $result['sc']      = $newsc;
            $result['message'] = "r is required";
            return $this->response->setJSON($result)->setStatusCode(400);
        }

        if (!isset($jsonData["d"])) {
            $result = array();
            $result['result']  = "error";
            $result['sc']      = $newsc;
            $result['message'] = "d is required";
            return $this->response->setJSON($result)->setStatusCode(400);
        }

        if (!isset($jsonData["sc"])) {
            $result = array();
            $result['result']  = "error";
            $result['sc']      = $newsc;
            $result['message'] = "sc is required";
            return $this->response->setJSON($result)->setStatusCode(400);
        }

        $validatesc = $this->validatesc($jsonData);
        if ($validatesc == "error") {
            $result = array();
            $result['result']  = "error";
            $result['sc']      = $newsc;
            $result['message'] = "Authorization failed";
            return $this->response->setJSON($result)->setStatusCode(401);
        }



        //Ends here
        $apikey = $jsonData["a"];
        $apisecret = $jsonData["s"];

        $apiauthentication = "0";
        $allapidetails = $this->apimodel->getallapidetailslist();

        if (!empty($allapidetails)) {
            foreach ($allapidetails as $da) {
                $savedapikey = $this->customencrptiondata("decode", $da->apikey);
                $savedsecret = $this->customencrptiondata("decode", $da->secret);
                if ($savedapikey == $apikey && $savedsecret == $apisecret) {
                    $apiauthentication = "1";
                    break;
                }
            }
        }
        if ($apiauthentication == "0") {
            $result = array();
            $result['result']  = "error";
            $result['sc']      = $newsc;
            $result['message'] = "Authorization failed";
            return $this->response->setJSON($result)->setStatusCode(401);
        }


        echo "need to work here";
        die();
    }


    private function customencrptiondata($action = "encode", $text = "")
    {
        if ($action == "encode") {
            return base64_encode($this->encrypter->encrypt($text));
        } else if ($action == "decode") {
            return  $this->encrypter->decrypt(base64_decode($text));
        }
    }
}
