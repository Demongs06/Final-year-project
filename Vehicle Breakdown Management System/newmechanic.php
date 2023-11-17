<?php
    if(!isset($_SESSION))
    {
      session_start();
    }

    $connection= mysqli_connect('localhost','root','','vehicle management');
    $msg= "" ;

    if(isset($_POST['submit'])){

      $mecname=$_POST['mecname'];
      $mecphoto=$_FILES['mecphoto']['name'];
      $mecjoin=$_POST['mecjoin'];
      $mecmobile=$_POST['mecmobile'];
      $mecexp=$_POST['mecexp'];
      $mecaddress=$_FILES['mecaddress']['name'];

      move_uploaded_file($_FILES['mecphoto']['tmp_name'],"picture/".$_FILES['mecphoto']['name']);
      move_uploaded_file($_FILES['mecaddress']['tmp_name'],"picture/".$_FILES['mecaddress']['name']);

      $res=false;
      $insert_query="INSERT INTO `mechanic`(`mecname`, `mecphoto`, `mecjoin`, `mecmobile`, `mecexp`, `mecaddress`, `mechanicid`) VALUES ('$mecname','$mecphoto','$mecjoin','$mecmobile','$mecexp','$mecaddress','')";

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

    }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>New Mechanic</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
    <script src="sweetalert2/sweetalert2.min.js"></script>


    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <?php include 'navbar_admin.php'; ?>
    <br>

    <div class="container">

      <div class="row">

        <div class="page-header">
          <h1 style="text-align: center;">New Mechanic Form </h1>
          <?php echo $msg; ?>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-6 animated bounceIn">

          <br>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

            <div class="input-group">
              <span class="input-group-addon"><b>Mechanic Name</b></span>
              <input id="mecname" type="text" class="form-control" name="mecname" placeholder="Name" required>
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon"><b>Photo</b></span>
              <input type="file" class="form-control" name="mecphoto" required>
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon"><b>Mobile</b></span>
              <input id="mecmobile" type="text" class="form-control" name="mecmobile" placeholder="Mobile No" required>
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon"><b>Mechanic Joining Date</b></span>
              <input id="mecjoin" type="text" class="form-control" name="mecjoin" placeholder="Joining date" required>
            </div>
            <br>

            <script>
              $( function() {
              $( "#mecjoin" ).datepicker();
              } );
            </script>

            <div class="input-group">
              <span class="input-group-addon"><b>Mechanic Experience</b></span>
              <input id="mecexp" type="text" class="form-control" name="mecexp" placeholder="Experience" required>
            </div>
            <br>

            <div class="input-group">
              <span class="input-group-addon"><b>Address Proof</b></span>
              <input type="file" class="form-control" name="mecaddress" required>

            </div>
            <br>
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
