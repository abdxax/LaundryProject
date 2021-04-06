<?php
class DB{
    protected $db;

    public function __construct(){
        $this->db=new PDO("mysql:host=localhost;dbname=laundry","root","");
    }

}
