<?php
session_start();
require '../DB/cous.php';
$log=new Cust();
$lay=$log->getLaundry();
$cols=$log->prcc();
$biils=$log->getBill($_SESSION['user_id']);
$msg='';
if(isset($_POST['sub'])){
    $co=$_POST['ch'];
    $laun=$_POST['laun'];
$log->addBill($_SESSION['user_id'],$co,$laun);

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
                    <?php
                    foreach ($cols as $pr){
                        echo '
                        <input type="checkbox" name="ch[]" value="'.$pr['id'].'"> '.$pr['ReType'].'- '.$pr['laType'].' - '.$pr['price'].'ريال 
                        ';
                    }
                    ?>
                </div>

                <div class="form-group">
                    <select name="laun">
                        <?php
                        foreach ($lay as $lr){
                            echo '
                        <option value="'.$lr['id'].'">'.$lr['LaundryName'].'</option>
                        ';
                        }
                        ?>
                    </select>

                </div>

                <div class="form-group">
                    <input type="submit" name="sub">
                </div>


            </form>
        </div>
        <table class="table">
            <thead>
             <tr>
                 <th>No</th>
                 <th>Price</th>
             </tr>
            </thead>
            <tbody>
            <?php

            foreach ($biils as $its){
                echo '
            <tr>
            <td>'.$its['id'].'</td>
            <td>'.$its['total_price'].'</td>
           
            
            
            
            
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
