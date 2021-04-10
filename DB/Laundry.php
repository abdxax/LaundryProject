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

    public function getBill($id){
        $sql=$this->login_db->prepare("SELECT * FROM request LEFT JOIN bill ON request.bill_id=bill.id LEFT JOIN price ON request.pr_id=price.id WHERE request.landury_id=?");
        $sql->execute([$this->getLaundry($id)]);
        return$sql;
    }

    public function getLaundry($id){
        $sql=$this->login_db->prepare("SELECT * FROM laundrys WHERE user_id=?");
        $sql->execute([$id]);
        foreach ($sql as $s){
            return $s['id'];
        }
    }

    public function getLaundryUser($id){
        $sql=$this->login_db->prepare("SELECT * FROM laundrys WHERE user_id=?");
        $sql->execute([$id]);
        return $sql;
    }

    public function getLaundryData($id){
        $sql=$this->login_db->prepare("SELECT * FROM laundrys WHERE id=?");
        $sql->execute([$id]);
        return $sql;
    }

    public function UpdateLaundryData($namw,$res,$lic,$phone,$email,$loca,$id){
        $sql=$this->login_db->prepare("UPDATE laundrys SET LaundryName=?,RecordNu=?,LicenseNu=?,email=?,location=? WHERE id=?");
        if($sql->execute([$namw,$res,$lic,$email,$loca,$id])){
            header('location:add.php');
        }
        //return $sql;
    }

    public function DeletaundryData($id){
        $sql=$this->login_db->prepare("DELETE FROM laundrys WHERE id=?");
        if($sql->execute([$id])){
             header('location:add.php');
        }
        //return $sql;
    }


}