<?php
     $connection= mysqli_connect('localhost','root','','vehicle management');
    session_start();

    $id= $_GET['id'];
    
    

    $msg="Generated";

    if(isset($_POST['total_cost'])){
        
        $full_name= $_POST['full_name'];
        $veh_up=$_POST['veh_up'];
      //  $tow_charge=$_POST['tow_charge'];
      //  $up_cost=$_POST['up_cost'];
        $total_cost=$_POST['total_cost'];
        $email= $_POST['email'];
        
    } 

    $sql="INSERT INTO `bill`(`id`, `full_name`, `veh_up`, `total_cost`, `email`) VALUES ('$id','$full_name','$veh_up','$total_cost','$email')";

    $result= mysqli_query($connection,$sql);

    if($result==true){
        $msg= "<script language='javascript'>
                                       swal(
                                            'Success!',
                                            'Generation Completed!',
                                            'success'
                                            );
				          </script>";
            
        }
        else{
            die('unsuccessful' .mysqli_error($connection));
        }

        if (isset($_POST['email'])) {

            $email_from = "sohamgaikwad655@gmail.com";

              
            // retrieve bill details based on email address
            $query = "SELECT * FROM bill WHERE id='$id'";
            $result2 = mysqli_query($connection, $query);
            $row = mysqli_fetch_assoc($result2);
            
                    
            // send the email
            $to = $row['email'];
           

           

            function clean_string($string) {

                $bad = array("content-type","bcc:","to:","cc:","href");
          
                return str_replace($bad,"",$string);
          
              }
            $subject = "Invoice for your vehicle breakdown request.\n";
            
            $message .= "Dear ".clean_string($full_name)."<br>\n";
           
            $message .= "I hope you are well. Please pay your bill on our website.<br>\n";
            
            $message .= "Please don't hesitate to reach out if you have any questions.<br>\n";

            $message .= '<table  cellpadding="10" cellspacing="0" border="1">
            <tr>
              <th>Bill ID</th>
              <td>'.clean_string($id).'</td>
            </tr>
            <tr>
              <th>Customer Name</th>
              <td>'.clean_string($full_name).'</td>
            </tr>
            <tr>
              <th>Vehicle Repairs</th>
              <td>'.clean_string($veh_up).'</td>
            </tr>
            <tr>
              <th>Total Price</th>
              <td>₹'.clean_string($total_cost)."</td>
            </tr>
          </table><br>\n";

            

            $message .= "Demon's Workshop<br>\n";

            $message .= "<a href='http://localhost:8012/Vehicle%20Breakdown%20Management%20System/index.php'>Demon's Workshop</a>\n";

            $headers = 'From: '.$email_from."\r\n".
            $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

            'Reply-To: '.$email_from."\r\n" .

            'X-Mailer: PHP/' . phpversion();

            mail($to,$subject,$message,$headers);
            
            
          }
    
?>    


<<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    
   
     <link rel="stylesheet" href="sweetalert2/sweetalert2.css">
    <script src="sweetalert2/sweetalert2.min.js"></script>
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>

</head>
<body>
    <?php echo $msg;
    ?>
    
    <script>
    
        var timer = setTimeout(function() {
            window.location='requestlist.php'
        }, 1000);
    </script>
</body>
</html>
