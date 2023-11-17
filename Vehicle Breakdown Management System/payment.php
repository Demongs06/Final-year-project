<?php

    $connection=mysqli_connect("localhost","root","","vehicle management");

    session_start();
    
    
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
         
          <div class="page-header">
              <h1 style="text-align: center;">Payment</h1>      
        </div> 
          <form class="form-horizontal animated bounce" action="confirmpaymentaction.php?id=<?php echo $row['id']; ?>" method="post"> 
              <div class="input-group">
                <span class="input-group-addon"><b>Card Number</b></span>
                <input id="card_number" type="text" class="form-control" name="card_number" placeholder="Enter Card Number" required>
              </div>
              <br>

                <div class="input-group">

                    <span class="input-group-addon"><b>Expiry Date</b></span>
                            
                                <select name="month" id="month" required>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <select name="year" id="year" required>
                                    
                                    <option value="2023">23</option>
                                    <option value="2024">24</option>
                                    <option value="2025">25</option>
                                    <option value="2026">26</option>
                                    <option value="2027">27</option>
                                    <option value="2028">28</option>
                                    <option value="2029">29</option>
                                    <option value="2030">30</option>
                                    <option value="2031">31</option>
                                    <option value="2032">32</option>
                                    
                                </select>
                            
                                
                        </div>
                        <br> 
                        <div class="input-group">
                            <span class="input-group-addon"><b>CVV  </b></span>
                            <input type="text" name="cvv" class="form-control" placeholder="CVV"  required>
                        </div>
              <br>
              
              <div class="input-group">
                <button type="submit" name="submit" class="btn btn-success">Pay Bill</button>
                
              </div>

            </form>   
      </div> 
      <div class="col-md-3"></div>
       
   </div> 
  
  </div>
</body>
</html>