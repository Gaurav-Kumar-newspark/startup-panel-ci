<?php 
namespace App\Controllers;
use App\Models\Loginmodel;
class Login extends BaseController{
  
    protected $ipbannedmodel;
    protected $loginattemptsmodel;
    protected $loginmodel;
    protected $session;
    protected $response;
    protected $request;
    protected $encrypter;
  
    public function __construct()
    {
        $this->session            = session();
        $this->loginmodel         = new Loginmodel();
        $this->encrypter          = \Config\Services::encrypter();
    }
  
    public function login(){

        $validationRule = [];
        if ($this->request->getMethod() === 'post'  && $this->request->getPost('loginbtn') !== null) { 

            $validationRule["email"]    = ['label'  => 'email','rules'  => 'required|valid_email'];
            $validationRule["password"] = ['label'  => 'password','rules'  => 'required'];
            $validationRule["csrf"]     = ['label'  => 'csrf','rules'  => 'required'];            
            $input = $this->validate($validationRule);
          
            if (!$input) {
               
                $error_msg["error"] = $this->validator->getErrors();  
                $error_msg["thiscontrol"] = $this;                 
                return view('login', $error_msg);
               
            }else {  
                return $this->authredirect($this->authlogin());
            }
        
            $data["thiscontrol"] = $this;
            echo view("login",$data);
            exit();
       
        }else{

            if($this->session->get('adminid')){
           
                return redirect()->to('/dashboard');
           
            }else{   
           
                $data["thiscontrol"] = $this;
                echo view("login",$data);
                exit();
            }
        }
    } 


    private function authlogin(){

        $data = [];
        $ipaddress =  $this->request->getIPAddress();
        $currenttime = strtotime(date("Y-m-d H:i:s"));
        $email = $this->request->getPost('email');
        $password  = $this->request->getPost('password');
        $count = $this->loginmodel->where("email",$email)->countAllResults();
       
        if($count > 0){
            
            // encrypt email and password for cookie remember me functionality
            $encrypter_email = base64_encode($this->encrypter->encrypt($email)); 
            $encrypter_Password = base64_encode($this->encrypter->encrypt($password)); 


            $query = $this->loginmodel->where("email",$email)->get()->getResultArray();
            $haspassword = $query[0]['password'];
       
            if ($query && password_verify($password,$haspassword)) {
            
                $this->session->set([
                    'adminrole' => $query[0]["role"],
                    'firstname' => $query[0]['firstname'],
                    'adminid'   => $query[0]['id'],
                ]);
                if(!empty($_POST["Remember"])) {
            
                    setcookie ("email",$encrypter_email,time()+ 2592000);
                    setcookie ("password",$encrypter_Password,time()+ 2592000);
              
                }else{
              
                    setcookie ("email","");
                    setcookie ("password","");
                }   
             
                $data["status"] = "200";
              
            }else{
              
                $data['Error'] = "Login Failed!.. Invalid  Login Details"; 
            }
       
        }else{
           
            $data['Error'] = "Login Failed!.. Invalid  Login Details";
    
        }
       
        if(!empty($data['Error'])){
            $data["Error"] = "invalid login details";   
        }
        return $data;
    }

    
    private function authredirect($data=""){
    
        if(isset($data["status"]) && $data["status"] == "200"){
           
            return redirect()->to('/dashboard');
        
        }elseif(isset($data["status"]) && $data["status"] == "301"){
        
            return redirect()->to(base_url());
       
        }else{
          
            $data['Error'] = $data['Error'];
            $data["thiscontrol"] = $this;
            echo view("login",$data);
        }
        return $data;
    }  
}
?>