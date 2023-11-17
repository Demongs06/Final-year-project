<?php

    $connection=mysqli_connect("localhost","root","","vehicle management");

    session_start();
    
    $msg="";
    $id=$_GET['id'];
    
    $query= "SELECT * FROM `bill` WHERE id='$id'";
    
    //echo $query;
    $result= mysqli_query($connection,$query);
    
    $row= mysqli_fetch_assoc($result);

    //echo $row['username'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bill</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
     <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"> 
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="animate.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php include 'navbar.php'; ?>
        <br><br>
        
        <div class="row">
           <div class="page-header">
            <h1 style="text-align: center;">Confirm Payment</h1>
            <?php echo $msg; ?>
           
           
      
          </div> 
            <div class="col-md-3"></div>
            <div class="col-md-6">
                  <p><strong>Bill Id: </strong><?php echo $row['id']; ?></p>    
                  <p><strong>Full Name: </strong><?php echo $row['full_name']; ?></p>    
                  <p><strong>Vehicle Upgrades: </strong><?php echo $row['veh_up']; ?></p>    
               <!--         <p><strong>Towing Charge: ₹</strong><?php //echo $row['tow_charge']; ?></p>
                  <p><strong>Upgrade Cost: ₹</strong><?php //echo $row['up_cost']; ?></p>    
-->      <p><strong>Total Cost: ₹</strong><?php echo $row['total_cost']; ?></p>
                  
                <form action="payment.php?id=<?php echo $row['id']; ?>" method="post">
                    <button class="btn btn-success">Confirm Payment</button>
                </form> 
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>
