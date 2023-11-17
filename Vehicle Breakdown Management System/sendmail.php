<?php

    $connection= mysqli_connect("localhost","root","","vehicle management");
    session_start();

    $id= $_GET['id'];

    $sql= "SELECT * FROM `request` WHERE id='$id'";


    $res= mysqli_query($connection,$sql);
    $row= mysqli_fetch_assoc($res);

    if(isset($_POST['email'])) {

        $email_to = $row['email'];

        $full_name = $row['full_name'];

        $email_from = "sohamgaikwad655@gmail.com";

        $mobile = $row['mobile'];

        $drname=$_POST['drname'];

        $sql2= "SELECT * FROM `driver` WHERE drname='$drname'";

        $res2= mysqli_query($connection,$sql2);
        $row2= mysqli_fetch_assoc($res2);
        $driverid=$row2['driverid'];
        

        $mecname=$_POST['mecname'];
        

        $sql3= "SELECT * FROM `mechanic` WHERE mecname='$mecname'";

        $res3= mysqli_query($connection,$sql3);
        $row3= mysqli_fetch_assoc($res3);
        $mecid=$row3['mechanicid'];
        


        $email_subject = "Your request has been confirmed.\n\n";

    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }

    

    $email_message .= "Dear ".clean_string($full_name)."<br>\n";
           
    $email_message .= "This is an email from Demon's Workshop to inform you that your breakdown request has been confirmed.<br>\n";
            
    $email_message .= "Please don't hesitate to reach out if you have any questions.<br>\n";

    $email_message .= '<table  cellpadding="10" cellspacing="0" border="1">
            
            <tr>
              <th>Customer Name</th>
              <td>'.clean_string($full_name).'</td>
            </tr>
            <tr>
              <th>Contact Us</th>
              <td>'.clean_string($email_from).'</td>
            </tr>
            <tr>
              <th>Driver Name</th>
              <td>'.clean_string($drname).'</td>
            </tr>
            <tr>
              <th>Mechanic Name</th>
              <td>'.clean_string($mecname)."</td>
            </tr>
          </table><br>\n";

            

    $email_message .= "Demon's Workshop<br>\n";

    $email_message .= "<a href='http://localhost:8012/Vehicle%20Breakdown%20Management%20System/index.php'>Demon's Workshop</a>\n";



    $headers = 'From: '.$email_from."\r\n".
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
    

    'Reply-To: '.$email_from."\r\n" .

    'X-Mailer: PHP/' . phpversion();

    mail($email_to, $email_subject, $email_message, $headers);

    $update_query="UPDATE `request` SET `confirmation`='1',`mechanicid`='$mecid',`driverid`='$driverid' WHERE id='$id'; UPDATE `mechanic` SET `mec_available`='1' WHERE mechanicid='$mecid';UPDATE `driver` SET `dr_available`='1' WHERE driverid='$driverid'";

    $res4=mysqli_multi_query($connection,$update_query);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>success</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="animate.css">
        <link rel="stylesheet" href="style.css">
        
    </head>

    <body>
        <?php include 'navbar_admin.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <br><br><br><br><br>
                    <div class="alert alert-success animated tada">
                        <strong>Success!</strong> Mail has been sent successfully.
                    </div>

                    <a class="btn btn-default" href="requestlist.php">Go Back</a>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </body>
</html>

<?php

}

?>
