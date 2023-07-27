<?php 
namespace App\Controllers;
use App\Models\Apimodel;
class Dashboard extends BaseController{

    protected $firebasedevicemodel;
    protected $clientfeedback;
    protected $reportmodel;
    protected $adminconfigurationmodel;
    protected $notificationsmodel;
    protected $addannouncements;
    protected $apimodel;
    protected $ovnfilemodel;
   
    public function __construct()
    {
        $this->apimodel                = new Apimodel();       
    }
    
    public function dashboard()
    {
        $data = array();
        $data["getallmultipaldata"] = $this->getallmultipaldata();
        return view('includes/head',array("thiscontrol" => $this))
              .view('includes/header',array("thiscontrol" => $this,"menuactive" => "dashboard"))
              .view('dashboard',$data)
              .view('includes/footer');
    }


    private function getallmultipaldata(){

        $response = [];
        $response["totalapis"]             = $this->apimodel->countAllResults();
        return $response;
    }
}
?>