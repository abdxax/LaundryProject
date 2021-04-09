<?php
session_start();
require '../DB/Laundry.php';
$log=new Laundry();
$cols=$log->getBill($_SESSION['user_id']);
$msg='';
if(isset($_POST['sub'])){
    $name=strip_tags($_POST['name']);
    $id_job=strip_tags($_POST['id_job']);
    $email=strip_tags($_POST['email']);
    $phone=strip_tags($_POST['phone']);
    $password=strip_tags($_POST['password']);

    $cols=$_POST['cols'];
    /*if(!empty($name)&&!empty($id_job)&&!empty($email)&&!empty($password)&&!empty($phone)) {
        $log->register($name, $id_job, $email, $phone, $password, $typ, $cols);
    }*/
    $log->newUser($name,$id_job,$password,$email,$phone,$cols);

}

if(isset($_POST['sub-login'])){
    $name=strip_tags($_POST['name']);
    $phone=strip_tags($_POST['phone']);
    $ric=strip_tags($_POST['ric']);
    $lic=strip_tags($_POST['lic']);
    $email=strip_tags($_POST['email']);
    $location=strip_tags($_POST['location']);
    //$pass=strip_tags($_POST['pass']);
    $log->AddnewItem($name,$phone,$ric,$lic,$location,$email,$_SESSION['user_id']);
}
?>
<html lang="ar">
<head>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rakkas&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title></title>

    <style>
        h2{
            font-family: 'Rakkas', cursive;
            margin: 10px;

        }

        ::placeholder {
            font-family: 'Rakkas', cursive;
        }

    </style>
</head>
<body >

<div class="container">
    <div class="row">
        <div class="col-md-10 text-center">
            <a  href="newLan.php">طلبات جديدة </a>
            <a  href="laundry.php">المغاسل  </a>
            <a  href="price.php">التسعيرة  </a>
        </div>
    </div>
</div>
<!-- end model pop -->
<!-- JS bootstap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
