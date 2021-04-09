<?php
session_start();
require '../DB/admin.php';
$log=new Admin();
$cols=$log->prcc();
$msg='';
if(isset($_POST['sub'])){
    $rt=$_POST['types'];
    $ly=$_POST['latypes'];
    $prc=$_POST['price'];
    $log->addPrice($rt,$ly,$prc);
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

<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <form class="" method="post">
                <div class="form-group">
                    <input type="text" name="types" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" name="latypes" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" name="price" class="form-control">
                </div>

                <div class="form-group">
                    <input type="submit" name="sub" class="btn btn-info" value="حفظ">
                </div>


            </form>
        </div>
        <table class="table">
            <thead>

            </thead>
            <tbody>
            <?php

            foreach ($cols as $its){
                echo '
            <tr>
            <td>'.$its['ReType'].'</td>
            <td>'.$its['laType'].'</td>
            <td>'.$its['price'].'</td>
            
            
            
            
</tr>
            ';
            }


            ?>
            </tbody>
        </table>
    </div>
</div>
<!-- start model pop-->


<!-- end model pop -->
<!-- JS bootstap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
