<?php 
namespace App\Controllers;
use App\Models\Adminconfigurationmodel;
class Profile extends BaseController{

    protected $adminconfigurationmodel;
    protected $session;
    protected $response;
    protected $request;
    
    public function __construct()
    {
        $this->adminconfigurationmodel = new Adminconfigurationmodel();
        $this->session                 = session();
    }
   
    public function profile()
    {
        $data = array();
        $validationRule = array();
        $adminid = $this->getcurrentloggedinadminid();
       
        if(empty($adminid))
        {
            return $this->response->redirect(site_url('/login'));
       
        }else{

            $alladmindetails = $this->adminconfigurationmodel->getadmindetailsbyadminid($adminid);

            if ($this->request->getMethod() === 'post'  && $this->request->getPost('updatedetails') !== null) {

                $validationRule["firstname"] = array('label'  => 'Firstname','rules'  => 'required');
                $validationRule["lastname"] = array('label'  => 'Lastname','rules'  => 'required');
                $validationRule["phonenumber"] = array('label'  => 'Phonenumber','rules'  => 'required');           
                $validationRule["currentpassword"] = array('label'  => 'Current Password','rules'  => 'required');

                
                $password = $this->request->getPost("password");

                if(!empty($password) && !empty($password)){
                
                    $validationRule["password"] = array('label'  => 'Password','rules'  => 'required|min_length[6]');
                    $validationRule["confirmpassword"] = array('label'  => 'Confirm Password','rules'  => 'matches[password]');
                }

                if (! $this->validate($validationRule)) {
               
                    $data["errors"] = $this->validator->getErrors();
               
                }else{
                  
                    
                    $curppass = $this->request->getPost("currentpassword");

                    $storedPassword = $alladmindetails[0]->password;
                    if (password_verify($curppass,$storedPassword)) {
                        
                        $datatoupdate = array();
                        $datatoupdate["firstname"]   = $this->request->getPost("firstname");
                        $datatoupdate["lastname"]    = $this->request->getPost("lastname");
                        $datatoupdate["phonenumber"] = $this->request->getPost("phonenumber");

                        if($this->request->getPost("password") != null)
                        {
                            if($this->request->getPost("password") != $this->request->getPost("confirmpassword"))
                            {
                                $msg = array("result" => "error","message" => "Confirm Password not matched with new password");
                                $this->customsetflash("profilemsg", $msg); 
                            }
                            else
                            {   
                               $datatoupdate["password"] = password_hash($this->request->getPost("password"), PASSWORD_DEFAULT,["cost"=>"14"]);
                            
                            }
                        }

                        $updatedata = $this->adminconfigurationmodel->updateadmindetails($adminid,$datatoupdate);
                        if(isset($updatedata["result"]) && $updatedata["result"] == "success"){
                      
                            $msg = array("result" => "success","action" => "profile update", "request" => $datatoupdate,"message" => "Profile update successfully");
                           $this->customsetflash("profilemsg", $msg);
                            return redirect()->to('/profile');
                      
                        }else{
                            
                            $msg = array("result" => "error","action" => "profile update", "request" => $datatoupdate,"message" => "Unable to update the profile");
                           $this->customsetflash("profilemsg", $msg);
                        }
                     
                    }else{
                      
                        $msg = array("result" => "error","action" => "profile update", "request" => $this->request->getPost(),"message" => "Invalid current password");
                        $this->customsetflash("profilemsg", $msg);
                    
                    }
                }
            }

            
            if(isset($alladmindetails[0]) && !empty($alladmindetails[0]))
            {
                unset($alladmindetails[0]->password);
                $data["admindetails"] = $alladmindetails[0];
            }

            return view('includes/head',array("thiscontrol" => $this))
                  .view('includes/header', array("thiscontrol" => $this,"menuactive" => "profile","submenuactive" => "profile"))
                  .view('profile',$data)
                  .view('includes/footer');
        }
    }

    private function getcurrentloggedinadminid()
    {
        $data = $this->session->get();
        return (isset($data["adminid"]) && !empty($data["adminid"]))?$data["adminid"]:"";
    }
}
?>