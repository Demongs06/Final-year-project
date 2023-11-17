<?php

    $connection= mysqli_connect("localhost","root","","vehicle management");
    session_start();

    $driverid= $_GET['driverid'];

    $sql= "SELECT * FROM `driver` WHERE driverid='$driverid'";

    $res= mysqli_query($connection,$sql);
    $row= mysqli_fetch_assoc($res);

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">

    <title>Driver Details</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

  </head>

  <body>

    <?php include 'navbar_admin.php';?>

    <div class="container" style="margin-top: 20px; margin-bottom: 20px;"></div>

    <div class="container">

      <div class="row"> 

        <div class="fb-profile-text" id="h1" >
          <h2><?php echo $row['drname']; ?></h2>
        </div>

        <hr>
        <div class="col-sm-9">

          <div data-spy="scroll" class="tabbable-panel">

            <div class="tabbable-line">

              <ul class="nav nav-tabs ">
                <li class="active">
                  <a href="#tab_default_1" data-toggle="tab"> About Me </a>
                </li>

                <li>
                  <a href="#tab_default_2" data-toggle="tab"> Contact Details </a>
                </li>
              </ul>

              <div class="tab-content">

                <div class="tab-pane active" id="tab_default_1">

                <h4><strong>Driver Photo</strong></h4>
                  <p>
                  <img height="100px" width="100px" src="picture/<?php echo $row["drphoto"];?>"alt="dp">
                  </p>

                  <h4><strong>Full Name</strong></h4>
                  <p>
                   <?php echo $row['drname']; ?>
                  </p>

                  <h4><strong>Joined On</strong></h4>
                  <p>
                    <?php echo $row['drjoin']; ?>
                  </p>

                  <h4><strong>Driver License</strong></h4>
                  <p>
                  <img height="300px" width="500px" src="picture/<?php echo $row["drlicense"];?>"alt="dp">
                  </p>

                  
                </div>
                <div class="tab-pane" id="tab_default_2">

                  <div class="row">

                    <div class="col-sm-10">

                      <div class="form-group">
                        <label for="mobile">Mobile:</label>
                        <p> <?php echo $row['drmobile']; ?> </p>
                      </div>

                      <div class="form-group">
                        <label for="address">Address</label>
                        <p><img height="300px" width="500px" src="picture/<?php echo $row["draddress"];?>"alt="dp"></p>
                      </div>

                    </div>

                  </div>

                

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="container">
      <div class="col-sm-12"></div>
    </div>

  </body>

</html>




