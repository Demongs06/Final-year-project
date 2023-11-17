<?php
    $connection=mysqli_connect("localhost","root","","vehicle management");

    session_start();
    $msg="";
    
    if(isset($_POST['submit'])){
        $name= mysqli_real_escape_string($connection,strtolower($_POST['u_name']));
        
        $email= mysqli_real_escape_string($connection,strtolower($_POST['email']));
        $review= mysqli_real_escape_string($connection,strtolower($_POST['review'])); 
        
        
        $request_query= "INSERT INTO `feedback`(`id`, `u_name`, `email`, `review`) VALUES ('','$name','$email','$review')"; 
        
        $request_query_2= "UPDATE feedback SET u_name='$name',email='$email',review='$review' Where email='$email'"; 
        
        $check_query= "SELECT * FROM `feedback` WHERE email='$email'";
        
        $check_res=mysqli_query($connection,$check_query);
        
        if(mysqli_num_rows($check_res)>0){
          $request_res= mysqli_query($connection,$request_query_2);
             $msg= '<div class="alert alert-warning" style="margin-top:30px";>
                      <strong>Updated!</strong> Feedback Received.
                      </div>';
            
        }
        
        else{
            $request_res= mysqli_query($connection,$request_query); 
                 $msg= '<div class="alert alert-success" style="margin-top:30px";>
                      <strong>Success!</strong> Feedback Received.
                      </div>';
            
        }
        
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="swal/sweetalert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="swal/sweetalert.js"></script>
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50"> 
  <?php include 'navbar.php';?> 
  
  
  
  
   
    
    <br>
    <div class="container"> 
     <div class="row">
       <div class="col-md-3"></div>
        <div class="col-md-6"> 
           <?php echo $msg; ?>
            <div class="page-header">
                <h1 style="text-align: center;">Feedback</h1>      
          </div> 
            <form class="form-horizontal animated bounce" action="" method="post"> 
                <div class="input-group">
                  <span class="input-group-addon"><b>Full Name</b></span>
                  <input id="u_name" type="text" class="form-control" name="u_name" placeholder="Full Name" required>
                </div>
                <br>
                
                 <div class="input-group">
                  <span class="input-group-addon"><b>Email</b></span>
                  <input id="email" type="email" class="form-control" name="email" placeholder="ABC00@XYZ" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><b>Review</b></span>
                  <textarea rows="5" id="review" type="text" class="form-control" name="review" placeholder="Review" required></textarea>
                </div>
                <br> 
                
                <div class="input-group">
                  <button type="submit" name="submit" class="btn btn-success">Post</button>
                  
                </div>

              </form>   
        </div> 
        <div class="col-md-3"></div>
         
     </div> 
    
    </div> 
    
   
    
</body>
</html>
