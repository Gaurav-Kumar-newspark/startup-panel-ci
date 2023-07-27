<?php 
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BaseController;

class isLoggedIn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
       
        $this->db = \Config\Database::connect();
        $session = session();
        $router = service('router');
        $method = $router->methodName();
        if (!$session->get('adminid')) 
        {
            if($method!= "login")
            {

                return redirect()->to(site_url('login'));
            }     
        }else{
            
            if ($this->db->tableExists('tbl_admin'))
            {
                $count = $this->db->table('tbl_admin')->countAllResults();
                if($count == 0)
                { 
                    if($method!= "adminconfiguration")
                    {
                        $params = ['adminid', 'firstname'];
                        $session->remove($params); 
                        return redirect()->to(site_url('adminconfiguration'));
                    }
                }
               
            }else{
                
                $params = ['adminid', 'firstname'];
                $session->remove($params); 
                return redirect()->to(site_url('adminconfiguration'));
            }
            
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $router = service('router');
        $method = $router->methodName();
        $basecontroller = new BaseController();
        $checklicense =  $basecontroller->sca_dochecklicense();
        if($checklicense["status"] != "Active")
        {
            if($method != "configurelicense")
            {
                 return redirect()->to(site_url('configurelicense'));
            }            
        }

    }

    
}
?>