<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class ContactModel extends Model{
	public function get_contact(){
		$db      = \Config\Database::connect();
		$sql = "select * from contact";
        $query = $db->query($sql);
        $cek = $query->getResult();
        return $cek;
	}  

}