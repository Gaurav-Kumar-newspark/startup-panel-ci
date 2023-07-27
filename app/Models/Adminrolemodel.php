<?php 
namespace App\Models;
use CodeIgniter\Model; 
class Adminrolemodel extends Model
{    
    protected $table = 'tbl_adminroles';
    protected $primaryKey = 'id';
    protected $allowedFields = ["name"];
}
?>