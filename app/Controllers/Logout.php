<?php
namespace App\Controllers;
class Logout extends BaseController 
{
    protected $session;
    protected $response;
    protected $request;

    public function __construct()
    {
        $this->session = session();
    }
   
    public function logout()
    {     
        $params = ['firstname','adminid','adminrole'];
        $this->session->remove($params);     
        $msg = array("result" => "success","message" => "Logout successfully");
        $this->customsetflash("logoutmsg", $msg);
       
        return $this->response->redirect(site_url('/'));
    }
}
?>