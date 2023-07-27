<?php
namespace App\Controllers;
use App\Models\Adminconfigurationmodel;
class Adminconfiguration extends BaseController
{   
    protected $adminconfigurationmodel;
    protected $response;
    protected $request;
    protected $security;
    
    public function __construct()
    {
       $this->adminconfigurationmodel = new  Adminconfigurationmodel;
       $this->security                = \Config\Services::security();
    }

    public function adminconfiguration()
    {   
        $per = WRITEPATH."adminaccess.php";
        $allowcreate  = $this->checkAdminConfigurationPermission($per);
        if($allowcreate)
        {

            if ($this->request->getMethod() === 'post'  && $this->request->getPost('submitbtn') !== null) {
                
                return $this->processFormSubmission($per);
            }
            else
            { 
                return view("adminconfiguration");
            }
        }
        else
        {
            return view("errors/html/error_404theme");
        }
    }


    private function checkAdminConfigurationPermission($per){
        
        $allowcreate = false;
        if(file_exists($per))
        { 
            $getpermission = octal_permissions(fileperms($per));
            if($getpermission == '0777')
            {
                $data2 = file_get_contents($per);
                if(preg_match(strtoupper('/adminconfiguration = true/'), strtoupper($data2)))
                {
                    $allowcreate = true;
                }                
            }
        }
        else
        {
            write_file($per, "adminconfiguration = false");
        }
        return $allowcreate;
    }


    private function processFormSubmission($per){

        $input = $this->validate(
            [
                'Firstname' => 'required|min_length[3]|max_length[20]',
                'Lastname' => 'required|min_length[3]|max_length[20]',
                'Email' => 'required|valid_email|is_unique[tbl_admin.email,id,{id}]',
                'Phonenumber' => 'required|',
                'Password' => 'required|min_length[6]',
                'ConfirmPassword' => 'matches[Password]',
            ]
        );

        if (!$input) {

            $error_msg["error"] = $this->validator->getErrors();
            
            return view('adminconfiguration', $error_msg);

        } else {
            
            $password = $this->request->getPost('Password');
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT,["cost"=>"14"]);
        
            $posdata = 
            [
                'firstname' => $this->request->getPost('Firstname'),
                'lastname' => $this->request->getPost('Lastname'),
                'email' => $this->request->getPost('Email'),
                'phonenumber' => $this->request->getPost('Phonenumber'),
                'password' => $hashedPassword,
                'role' => 0,
                'created_at' => date("Y-m-d H:i:s"),
            ];     
                    
            $result = $this->adminconfigurationmodel->set($posdata)->insert();
            $adminid = $this->adminconfigurationmodel->getInsertID();
            $data = [
                "groupname" => "Default",
                "created_by" => $adminid,
                "created_at" => date("Y-m-d"),
                "updated_on" => "",

            ];
            if($result)
            {
                unlink($per);
                return redirect()->to('/login');
            }
            else
            {
                $data['Error'] = "Faile To Create Admin!.";
            }
            return view("adminconfiguration",$data);
        }
    }
}
