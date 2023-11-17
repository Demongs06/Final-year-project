<?php

    $connection=mysqli_connect("localhost","root","","vehicle management");

    session_start();
    
    $msg="Generate the bill according to upgrades.";
    $id=$_GET['id'];
    
    $query= "SELECT * FROM `request` WHERE id='$id'";
    $result= mysqli_query($connection,$query);
    $row= mysqli_fetch_assoc($result);

    
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

<script type="text/javascript">
      function getSum() {
        // Get all the checkboxes
        var checkboxes = document.querySelectorAll("input[type=checkbox]:checked");
        
        // Convert the values of the checked checkboxes to a string
        var checkboxValues = "";
        for (var i = 0; i < checkboxes.length; i++) {
          checkboxValues += checkboxes[i].value + ",";
        }
        
        // Remove the last comma from the string
        checkboxValues = checkboxValues.slice(0, -1);
        
        // Split the string into an array
        var checkboxValuesArray = checkboxValues.split(",");
        
        // Sum the values in the array
        var sum = 0;
        for (var i = 0; i < checkboxValuesArray.length; i++) {
          sum += parseInt(checkboxValuesArray[i]);
        }
        
        // Display the sum
        document.getElementById("checkboxValues").innerHTML = sum;

        var sumString = sum.toString();
        
        // Submit the values in a varchar format
        document.getElementById("total_cost").value = sumString;
      }
    </script>


</head>
<body>
    <div class="container">
        <?php include 'navbar_admin.php'; ?>
        <br><br>
        
        <div class="row">
           <div class="page-header">
            <h1 style="text-align: center;">Generate Bill</h1>
            <h4 style="text-align: center;"><?php echo $msg; ?></h4>
        </div>  
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <form action="billaction.php?id=<?php echo $id; ?>" method="post">
            <p><strong>Request Id: </strong><?php echo $row['id']; ?></p>


            <p><strong>Full Name: </strong><?php echo $row['full_name']; ?></p>


            <p><strong>Email: </strong><?php echo $row['email']; ?></p>


            <p><strong>Mobile: </strong><?php echo $row['mobile']; ?></p>
      
            <br>
            
                     <div class="input-group">
                      <span class="input-group-addon"><b>Vehicle Upgrades :</b></span>
                      <textarea rows="5" id="upgrade" type="text" class="form-control" name="veh_up" placeholder="Total Upgrades" required></textarea>
                    </div>
                    <br>
                    
            <div class="input-group">
            <span class="input-group-addon">Calculate :</span>
              <input type="checkbox" onchange="getSum()" name="item[]" value="1500">Oil Change
              <input type="checkbox" onchange="getSum()" name="item[]" value="8000">Brake Service
              <input type="checkbox" onchange="getSum()" name="item[]" value="20000">Engine Repair
              <input type="checkbox" onchange="getSum()" name="item[]" value="10000">Transmisssion Repair
              <br>
              <input type="checkbox" onchange="getSum()" name="item[]" value="5000">Tires Replacement
              <input type="checkbox" onchange="getSum()" name="item[]" value="10000">Suspension Repair
              <input type="checkbox" onchange="getSum()" name="item[]" value="2500">Battery Replacement
            </div>

            <br>

                <div class="input-group">
                    <span class="input-group-addon"><b>Total Cost :</b></span>

                    ₹<span id="checkboxValues">0</span>
                  </div>  <input type="hidden" name="total_cost" id="total_cost">


          
                    
          
                    
                    
                    
                    
              <!--      <div class="input-group">
                      <span class="input-group-addon"><b>Total Cost</b></span>
                      <input id="total" type="text" class="form-control" name="total_cost" placeholder="Total Cost" required>
                    </div>-->
                    <br>
                    
                     <input type="hidden" name="full_name" value="<?php echo $row['full_name']; ?>">
                     <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                     
                    

                    <div class="input-group">
                    <button type="submit" name="submit" class="btn btn-success"> Generate </button>
                    </div>
                    
                   
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>
