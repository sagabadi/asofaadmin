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

    public function add_contact($no_hp, $masking, $is_use){
        $db      = \Config\Database::connect();
        if($is_use == 1){
            $sql = "update contact set is_use = 0";
            $query = $db->query($sql);

            $sql = "insert into contact(no_hp, masking, is_use) values('".$no_hp."', '".$masking."',".$is_use.")";
            $query = $db->query($sql);
        } else {
            $sql = "insert into contact(no_hp, masking, is_use) values('".$no_hp."', '".$masking."',".$is_use.")";
            $query = $db->query($sql);
        }

        return $query;
    }

    public function edit_contact($id, $no_hp, $masking, $is_use){
        $db      = \Config\Database::connect();
        if($is_use == 1){
            $sql = "update contact set is_use = 0";
            $query = $db->query($sql);
        }

        $sql = "update contact set no_hp = '".$no_hp."', masking = '".$masking."', is_use = ".$is_use." where id = ".$id;
        $query = $db->query($sql);

        return $query;
    }

}