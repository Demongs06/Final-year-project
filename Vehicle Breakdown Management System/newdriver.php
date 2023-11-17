<?php
  if(!isset($_SESSION))
  {
    session_start();
  }


  $connection= mysqli_connect('localhost','root','','vehicle management');
  $msg= "" ;


  if(isset($_POST['submit'])){
    $drname=$_POST['drname'];
    $drphoto=$_FILES['drphoto']['name'];
    $drjoin=$_POST['drjoin'];
    $drmobile=$_POST['drmobile'];
    $drlicense=$_FILES['drlicense']['name'];
    $draddress=$_FILES['draddress']['name'];

    move_uploaded_file($_FILES['drphoto']['tmp_name'],"picture/".$_FILES['drphoto']['name']);
    move_uploaded_file($_FILES['drlicense']['tmp_name'],"picture/".$_FILES['drlicense']['name']);
    move_uploaded_file($_FILES['draddress']['tmp_name'],"picture/".$_FILES['draddress']['name']);

    $res=false;
    $insert_query="INSERT INTO `driver`(`driverid`, `drname`,`drphoto`, `drjoin`, `drmobile`, `drlicense`, `draddress`) VALUES ('','$drname','$drphoto','$drjoin','$drmobile','$drlicense','$draddress')";

    $res= mysqli_query($connection,$insert_query);

    if($res==true){
      $msg= "<script language='javascript'>
              swal(
                   'Success!',
                   'Registration Completed!',
                   'success'
                   );
				    </script>";
    }
    else{
      die('unsuccessful' .mysqli_error($connection));
    }

  }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>New Driver</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
    <script src="sweetalert2/sweetalert2.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="animate.css">
  </head>

  <body>
    <?php include 'navbar_admin.php'; ?>
    <br>

    <div class="container">
      <div class="row">

        <div class="page-header">
          <h1 style="text-align: center;">New Driver Form</h1>
          <?php echo $msg; ?>

        </div>
        <div class="col-md-3">
        </div>

        <div class="col-md-6 animated bounceIn">

          <br>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" >

            <div class="input-group">
              <span class="input-group-addon"><b>Driver Name</b></span>
              <input id="drname" type="text" class="form-control" name="drname" placeholder="Name" required>
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><b>Photo</b></span>
              <input type="file" class="form-control" name="drphoto" required>
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon"><b>Mobile</b></span>
              <input id="drmobile" type="text" class="form-control" name="drmobile" placeholder="Mobile No" required>
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon"><b>Driver Joining Date</b></span>
              <input id="drjoin" type="text" class="form-control" name="drjoin" placeholder="Joining date" required>
            </div>
            <br>

            <script>
              $( function() {
              $( "#drjoin" ).datepicker();
              } );
            </script>

            <div class="input-group">
              <span class="input-group-addon"><b>License</b></span>
              <input type="file" class="form-control" name="drlicense" required>
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon"><b>Address Proof</b></span>
              <input type="file" class="form-control" name="draddress" required>

            </div>
            <br>

            <div class="input-group">
              <input type="submit" name="submit" class="btn btn-success">

            </div>
          </form>
        </div>
        <div class="col-md-3"></div>

      </div>

    </div>

  </body>
</html>
