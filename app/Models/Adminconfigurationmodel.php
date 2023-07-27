<?php 
namespace App\Models;
use CodeIgniter\Model; 
class Adminconfigurationmodel extends Model
{    
    protected $table = 'tbl_admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['firstname','lastname','email','phonenumber','password','created_at','role'];  


	public function getadmindetailsbyadminid($id) {
		$returndata = array();
		$returndata = $this->where('id', $id)->get()->getResult();
		return $returndata;
		}  


		public function updateadmindetails($id = "",$data = "") {
		try {

			$this->where('id', $id)->set($data)->update();
			return array('result' => 'success', 'message' => 'Details Updated Successfully');
		} catch (\Exception $e) {
			return array('result' => 'error', 'message' => $e->getMessage());
		}
	}  



	public function totalcountforsearrchone($searchdata = "", $orderby = "",$currentadminid="")
    {
        $returndata = array();
        if (!empty($searchdata)) {
            
 
            $this->like('id',$searchdata);
            $this->orLike('firstname',$searchdata);
            $this->orLike('lastname',$searchdata);
            $this->orLike('email',$searchdata);
            $this->orLike('phonenumber',$searchdata);
            $this->orLike('created_at',$searchdata);
            $this->select('*');
            $this->orderBy('id',$orderby);
            $this->where("role","1");
            $returndata = $this->get()->getResult();   
        }
        return $returndata;
    }




	public function dataifsearchnot($orderby = "desc")
    {
		$returndata = array();
		$this->select('*');
		$this->orderBy('id',$orderby);
        $this->where("role","1");
		$returndata = $this->get()->getResult();
        return $returndata;

    }

    public function perpagedataifsearchnot($orderby = "desc", $start = "", $length = "")
    {
		$returndata = array();
        $this->limit($length);
        $this->offset($start);
		$this->select('*');
        $this->orderBy('id',$orderby);
        $this->where("role","1");
		$returndata = $this->get()->getResult();
        return $returndata;
    }

}
?>
