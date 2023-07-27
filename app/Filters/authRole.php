<?php 
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\BaseController;

class authRole implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {    

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }

    
}
?>