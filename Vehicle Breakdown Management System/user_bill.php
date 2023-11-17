<?php

    session_start();
    $connection=mysqli_connect("localhost","root","","vehicle management"); 

    $msg="";
    if(isset($_POST['submit'])){
        $id=mysqli_real_escape_string($connection,strtolower($_POST['id']));

        $query="SELECT * FROM `bill` WHERE id='$id'";

        $res=mysqli_query($connection,$query);
        if(mysqli_num_rows($res)>0){
            while ($row = mysqli_fetch_assoc($res)) {
                // Retrieve the bill details from the result
                $bill_details = $row['id'];
        
                header("Location: confirmpayment.php?id=$bill_details; ?>");
                
        }
        } else{
             $msg= '<div class="alert alert-danger alert-dismissable" style="margin-top:30px";>
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <strong>Unsuccessful!</strong> Please Enter Valid Bill ID.
                  </div>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Payment</title>
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
                <h1 style="text-align: center;">Bill Payment</h1>
            </div>
            <form action="" method="post">
                
                <div class="input-group">
                  <span class="input-group-addon"><b>Bill ID :</b></span>
                  <input id="id" type="text" class="form-control" name="id" placeholder="Bill ID" required>
                </div>
                    <br/>
                <div class="input-group">
                  <button type="submit" name="submit" class="btn btn-success">Show Bill</button>
                  
                </div>
            </form>
        </div> 
        <div class="col-md-3"></div>
         
     </div> 
    
    </div> 


</body>
</html>