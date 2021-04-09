<?php
require 'DB.php';
class Cust extends DB{
    private $login_db;
    public function __construct(){
        parent::__construct();
        $this->login_db=$this->db;
    }

    public function prcc(){
        $sql=$this->login_db->prepare("SELECT * FROM price");
        $sql->execute();
        return $sql;
    }

    public function getLaundry(){
        $sql=$this->login_db->prepare("SELECT * FROM laundrys WHERE status=?");
        $sql->execute(['مفعل']);
        return $sql;
    }

    public function addBill($user_id,$co,$lan){
        $total=0;
        foreach ($co as $c){
            $total+=$this->getprice($c);
        }
        $sql=$this->login_db->prepare("INSERT INTO bill (user_id,total_price,status)VALUES (?,?,?)");
        if($sql->execute([$user_id,$total,'do'])){
            $id_bill=$this->login_db->lastInsertId();
            foreach ($co as $c){
                $sql_item=$this->login_db->prepare("INSERT INTO request (bill_id,landury_id,ReNu,pr_id)VALUES (?,?,?,?)");
                $sql_item->execute([$id_bill,$lan,7,$c]);
            }

        }
        else{
            echo "l".$user_id." ".$total. " ".$lan;
        }

    }

    public function getprice($id){
        $sql=$this->login_db->prepare("SELECT * FROM price WHERE id=?");
        $sql->execute([$id]);

        foreach ($sql as $s){
            return $s['price'];
        }
        //return ;
    }

    public function getBill($id){
        $sql=$this->login_db->prepare("SELECT * FROM bill WHERE user_id=?");
        $sql->execute([$id]);
        return $sql;
    }










}


