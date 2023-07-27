<?php
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class Bannedip implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        $this->db = \Config\Database::connect();
        $session = session();
        $router = service('router');
        $method = $router->methodName();
        $currenttime = time();
        $count = $this->db->table('am_bannedip')->countAllResults();
        if($count > 0 )
        {
            if($method !="set404Override")
            {
                return redirect()->to('/set404Override');
            }
            
        }

        $query = $this->db->table('am_bannedip')->Where('ip', $ipaddress)->countAllResults();

        if ($query > 0) 
        {
            return redirect()->to('/set404Override');

        }

        if ($query == 0) 
        {
            $result = $this->db->table('am_loginattempts')->where('ip', $ipaddress)->get()->getResultArray();
            if (!empty($result)) 
            {
                $attemptscount = $query[0]["attempts"];
                if ($attemptscount == 3) 
                {
                    return redirect()->to('/set404Override');
                }

            }

        }
        
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }
}
?>