<?php 
namespace App\Models;
use CodeIgniter\Model; 
class Loginmodel extends Model
{    
    protected $table = 'tbl_admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ["firstname","lastname","email","phonenumber","password"];
}
?>
