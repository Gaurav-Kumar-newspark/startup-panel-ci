<?php 
namespace App\Models;
use CodeIgniter\Model; 
class Apimodel extends Model
{    
    protected $table = 'tbl_apidetails';
    protected $primaryKey = 'id';
    protected $allowedFields = ["apikey","secret","apilable","usename","password","created_at","created_by"];

    public function createapi($data = array()) {
		 try {
			$this->insert($data);
			$last_insertid = $this->getInsertID();
			return array('result' => 'success', 'message' => 'Created Successfully.','last_insertid' => $last_insertid);
		} catch (Exception $exc) {
			return array('result' => 'error', 'message' => $exc->getTraceAsString());
		}
     }
    public function getapidatabyid($id = "") {
    	$returndata = array();
     	if($id != "")
     	{
     		$returndata = $this->where('id', $id)->get()->getResult();
     	}
     	return $returndata;
     }
    public function getallapidetailslist() {
        $returndata = array();
        $this->orderBy('id', 'DESC');
        $this->select('*');
        $this->select("DATE_FORMAT(created_at, '%M %e, %Y') as formatted_createddate", FALSE);
        $returndata = $this->get()->getResult(); 
        return $returndata;
    }


    public function getallapicount() {
		$returndata = array();
		$returndata = $this->countAllResults();
     	return $returndata;
     }


    public function deleteapibyid($id) {
    	try {
            $this->where('id', $id)->delete();
            return array('result' => 'success', 'message' => 'Deleted Successfully');
        } catch (\Exception $e) {
            return array('result' => 'error', 'message' => $e->getMessage());
        }
    }
}
?>
