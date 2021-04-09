<?php
require 'DB.php';
class Admin extends DB{
    private $login_db;
    public function __construct(){
        parent::__construct();
        $this->login_db=$this->db;
    }


    public function getNewItem(){
        $sql=$this->login_db->prepare("SELECT * FROM laundrys WHERE status=?");
        $sql->execute(['تحت الداسة']);
        return $sql;
}

    public function getActivetem(){
        $sql=$this->login_db->prepare("SELECT * FROM laundrys WHERE status=?");
        $sql->execute(['مفعل']);
        return $sql;
    }

public function update($id){
        $sql=$this->login_db->prepare("UPDATE laundrys SET status=? WHERE id=?");
        if($sql->execute(["مفعل",$id]));
}


public function addPrice($rt,$ly,$pric){
        $sql=$this->login_db->prepare("INSERT INTO price(ReType,laType,price) VALUES (?,?,?)");
        if($sql->execute([$rt,$ly,$pric])){
            echo "Done ";
        }
}

public function prcc(){
        $sql=$this->login_db->prepare("SELECT * FROM price");
        $sql->execute();
        return $sql;
}



    }


