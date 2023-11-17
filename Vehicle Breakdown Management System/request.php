<?php
    $connection=mysqli_connect("localhost","root","","vehicle management");

   /* session_start(); */
    $msg="";
    
    if(isset($_POST['submit'])){
        
        $fullname= mysqli_real_escape_string($connection,strtolower($_POST['full_name']));
        /*$lastname= mysqli_real_escape_string($connection,strtolower($_POST['last_name']));*/
        $email= mysqli_real_escape_string($connection,strtolower($_POST['email']));
        $mobile= mysqli_real_escape_string($connection,strtolower($_POST['mobile']));
        $location= mysqli_real_escape_string($connection,strtolower($_POST['location'])); 

        $request_query= "INSERT INTO `request`(`id`, `full_name`, `email`, `mobile`, `location`) VALUES ('','$fullname','$email','$mobile','$location')"; 
        
        $request_query_2= "UPDATE request SET id = (SELECT MAX(id) + 1 FROM request),full_name='$fullname',email='$email',mobile='$mobile',location='$location',confirmation='0',driverid='0',mechanicid='0',finished='0',paid='0' Where email='$email'"; 

        $check_query= "SELECT * FROM `request` WHERE email='$email'";
        
        $check_res=mysqli_query($connection,$check_query);
        
        if(mysqli_num_rows($check_res)>0){

          $request_res= mysqli_query($connection,$request_query_2);
            $msg= '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Request Send.
                      </div>';

        }

        else{

          $request_res= mysqli_query($connection,$request_query); 
            $msg= '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Request Send.
                      </div>';

        }

    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="swal/sweetalert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="swal/sweetalert.js"></script>
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
</head>
<body> 
  <?php include 'navbar.php';?> 
  
  
  
  
   
    
    <br>
    <div class="container"> 
     <div class="row">
       <div class="col-md-3"></div>
        <div class="col-md-6"> 
           <?php echo $msg; ?>
            <div class="page-header">
                <h1 style="text-align: center;">Request</h1>      
          </div> 
            <form class="form-horizontal animated bounce" action="" method="post"> 
                <div class="input-group">
                  <span class="input-group-addon"><b>Full Name</b></span>
                  <input id="full_name" type="text" class="form-control" name="full_name" placeholder="Full Name" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><b>Email</b></span>
                  <input id="email" type="email" class="form-control" name="email" placeholder="Enter a valid email address." required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><b>Mobile</b></span>
                  <input id="mobile" type="tel" class="form-control" name="mobile" placeholder="Mobile" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><b>Location</b></span>
                  <textarea rows="5" id="location" type="text" class="form-control" name="location" placeholder="Location" required></textarea>
                </div>
                <br> 
                
                <div class="input-group">
                  <button type="submit" name="submit" class="btn btn-success">Request</button>
                  
                </div>

              </form>   
        </div> 
        <div class="col-md-3"></div>
         
     </div> 
    
    </div> 
    
   
    
</body>
</html>