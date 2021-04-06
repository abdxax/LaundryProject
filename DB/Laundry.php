<?php
require 'DB.php';
class Laundry extends DB{
    private $login_db;
    public function __construct(){
        parent::__construct();
        $this->login_db=$this->db;
    }

    public function AddnewItem($name,$phone,$ric,$lic,$loc,$email,$user_id){
        $sql=$this->login_db->prepare("INSERT INTO laundrys(LaundryName,RecordNu,LicenseNu,phone,email,status,location,user_id)VALUES (?,?,?,?,?,?,?,?)");

        if($sql->execute([$name,$ric,$lic,$phone,$email,"تحت الداسة",$loc,$user_id])){
   echo "done";
        }
    }


}