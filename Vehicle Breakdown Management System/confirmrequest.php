<?php

    $connection= mysqli_connect("localhost","root","","vehicle management");
    session_start();

    $id= $_GET['id'];

    $sql= "SELECT * FROM `request` WHERE id='$id'";

    $res= mysqli_query($connection,$sql);
    $row= mysqli_fetch_assoc($res);

    $sql1= "SELECT * FROM `driver` WHERE dr_available='0'";

    $res1= mysqli_query($connection,$sql1);

    $sql2= "SELECT * FROM `mechanic` WHERE mec_available='0'";

    $res2= mysqli_query($connection,$sql2);

?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="UTF-8">

        <title>Confirm Request</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body>

        <?php include 'navbar_admin.php'; ?>

        <br>
        <div class="container">

            <div class="row">

                <div class="col-md-3"></div>

                <div class="col-md-6">

                    <div class="page-header">
                        <h1 style="text-align:center;">Confirm Request</h1>
                    </div>

                    <p><strong>Request Id: </strong><?php echo $row['id']; ?></p>


                    <p><strong>Full Name: </strong><?php echo $row['full_name']; ?></p>


                    <p><strong>Email: </strong><?php echo $row['email']; ?></p>


                    <p><strong>Mobile: </strong><?php echo $row['mobile']; ?></p>


                    <p><strong>Location: </strong><?php echo $row['location']; ?></p>


                   <form action="sendmail.php?id=<?php echo $id; ?>" method="post">

                        <div class="input-group">

                            <span class="input-group-addon"><b>Available Driver's</b></span>

                            <select class="form-control" name="drname";>

                                <?php
                                   while($row1=mysqli_fetch_assoc($res1)) { ?>
                                ?>
                                <option><?php echo $row1['drname'];?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <br>
                        <div class="input-group">

                            <span class="input-group-addon"><b>Available Mechanic's</b></span>

                            <select class="form-control" name="mecname">

                                <?php
                                   while($row2=mysqli_fetch_assoc($res2)) {  ?>
                                ?>
                                <option><?php echo $row2['mecname']; ?></option>
                                <?php } ?>

                            </select>

                        </div>

                        <input type="hidden" name="driverid" value="<?php echo $row['driverid']; ?>">
                        <input type="hidden" name="mechanicid" value="<?php echo $row['mechanicid']; ?>">

                        <br>
                        <button class="btn btn-success" type="submit" name="email">Confirm</button>

                    </form>

                </div>

                <div class="col-md-3"></div>

            </div>

        </div>

    </body>

</html>
