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

    public function add_contact($no_hp, $masking){
        $db      = \Config\Database::connect();
        $sql = "insert into contact(no_hp, masking) values('".$no_hp."', '".$masking."')";
        $query = $db->query($sql);

        return $query;
    }

}