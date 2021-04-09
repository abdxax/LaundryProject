<?php
//session_start();
require 'DB.php';
class Login extends DB{
    private $login_db;
    public function __construct(){
        parent::__construct();
        $this->login_db=$this->db;
    }

    public function login($user,$pass){
        $sql=$this->login_db->prepare("SELECT * FROM user WHERE userName=? AND password=?");
        $sql->execute([$user,$pass]);
        if($sql->rowCount()==1){
            foreach ($sql as $s){
                if($s['role_id']==1){
                    $_SESSION['user_id']=$s['id'];
                    header("location:admin/index.php");
                }
                else if($s['role_id']==2){
                  $_SESSION['user_id']=$s['id'];
                  header("location:laundry/index.php");
                }
                else if($s['role_id']==3){
                    $_SESSION['user_id']=$s['id'];
                    header("location:coustmor/index.php");
                }
                else{

                }
            }
        }
        else{
            echo "error";
        }
    }

    public function newUser($name,$user_name,$pass,$email,$phone,$role_id){
        $sql_user=$this->login_db->prepare("INSERT INTO user (userName,password,role_id)values (?,?,?)");
        if($sql_user->execute([$user_name,$pass,$role_id])){
            $id_colum=$this->login_db->lastInsertId();
            $sql_info=$this->login_db->prepare("INSERT INTO info (user_id,name,email,phone)VALUES (?,?,?,?)");
            if($sql_info->execute([$id_colum,$name,$email,$phone])){
             echo "done";
            }
        }

    }


}