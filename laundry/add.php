<?php
session_start();
require '../DB/Laundry.php';
$log=new Laundry();
$cols=$log->getLaundryUser($_SESSION['user_id']);
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

if(isset($_POST['upda'])){
    $name=strip_tags($_POST['name']);
    $phone=strip_tags($_POST['phone']);
    $ric=strip_tags($_POST['ric']);
    $lic=strip_tags($_POST['lic']);
    $email=strip_tags($_POST['email']);
    $location=strip_tags($_POST['location']);
    //$pass=strip_tags($_POST['pass']);
    $log->UpdateLaundryData($name,$ric,$lic,$phone,$email,$location,$_GET['id_edit']);
    //($name,$phone,$ric,$lic,$location,$email,);
}

if (isset($_GET['id_delet'])){
    $log->DeletaundryData($_GET['id_delet']);
}
?>
<html lang="en">
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
        input{
            margin: 5px;
        }

    </style>
</head>
<body>
    
	  <div class="container">
          <div class="row justify-content-center">
              <?php
              if(isset($_GET['id_edit'])) {
              $edit= $log->getLaundryData($_GET['id_edit']);
              $arr=[];
              foreach ($edit as $e){
                  $arr['LaundryName']=$e['LaundryName'];
                  $arr['RecordNu']=$e['RecordNu'];
                  $arr['LicenseNu']=$e['LicenseNu'];
                  $arr['phone']=$e['phone'];
                  $arr['email']=$e['email'];
                  $arr['location']=$e['location'];


              }

                  ?>
              <center><h2>تعديل مغسلة</h2>
                  <div class="col-md-12">
                      <form class="form-inline"  method="post">
                          <div class="container">
                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="name" placeholder="اسم المغسلة" required value="<?php echo $arr['LaundryName']; ?>">
                                  </label>
                              </div>
                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="phone" placeholder="رقم التواصل" required value="<?php echo $arr['phone']; ?>">
                                  </label>
                              </div>

                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="ric" placeholder="رقم السجل" required value="<?php echo $arr['LicenseNu']; ?>">
                                  </label>
                              </div>

                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="lic" placeholder="رقم الرخصه" required value="<?php echo $arr['RecordNu']; ?>">
                                  </label>
                              </div>

                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="email" placeholder="البريد الالكتروني" required value="<?php echo $arr['email']; ?>">
                                  </label>
                              </div>

                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="location" placeholder="الموقع " required value="<?php echo $arr['location']; ?>">
                                  </label>
                              </div>
                              <div class="form-group  text-center">
                                  <input type="submit" class="btn btn-primary mb-2" name="upda" value="Update" />
                              </div>
                          </div>
                      </form>
                  </div>
              </center>
          </div>
      </div>
      </div>

           <?php   }


              else {
              ?>
              <center><h2>إضافة مغسلة</h2>
                  <div class="col-md-12">
                      <form class="form-inline"  method="post">
                          <div class="container">
                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="name" placeholder="اسم المغسلة" required>
                                  </label>
                              </div>
                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="phone" placeholder="رقم التواصل" required>
                                  </label>
                              </div>

                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="ric" placeholder="رقم السجل" required>
                                  </label>
                              </div>

                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="lic" placeholder="رقم الرخصه" required>
                                  </label>
                              </div>

                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="email" placeholder="البريد الالكتروني" required>
                                  </label>
                              </div>

                              <div class="form-group ">
                                  <label>
                                      <input type="text" class="form-control text-center"  name="location" placeholder="الموقع " required>
                                  </label>
                              </div>
                              <div class="form-group  text-center">
                                  <input type="submit" class="btn btn-primary mb-2" name="sub-login" value="Send" />
                              </div>
                          </div>
                      </form>
                  </div>
              </center>
          </div>
      </div>
      </div>
      <?php
      }
      ?>
      <center><h2>المغاسل الجديدة</h2></center>
          </div>

<div class="container">
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
					<th>الخيارات</th>
					<th>الحالة</th>
					<th>الموقع</th>
					<th>البريد الإلكتروني</th>
					<th>رقم الجوال</th>
					<th>رقم الرخصة</th>
					<th>رقم السجل</th>
                    <th>اسم المغسلة</th>
                </tr>
            </thead>
		
            <tbody>
            <?php

            foreach ($cols as $its){

                echo '
            <tr>';

                if($its['status']!='مفعل'){
                    echo '
                    <td><a class="btn btn-info" href="add.php?id_edit='.$its['id'].'">تعديل</a> </td>
                     <td><a  class="btn btn-danger" href="add.php?id_delet='.$its['id'].'" >حذف</a> </td>
                    ';
                }

                echo '<td> </td>
				<td>'.$its['status'].'</td>
				<td>'.$its['location'].'</td>
				<td>'.$its['email'].'</td>
				<td>'.$its['phone'].'</td>
				<td>'.$its['LicenseNu'].'</td>
				<td>'.$its['RecordNu'].'</td>
				<td>'.$its['LaundryName'].'</td>
				
			</tr>
            ';
            }


            ?>
            </tbody>
        </table>
    </div>



<!-- end model pop -->
<!-- JS bootstap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
