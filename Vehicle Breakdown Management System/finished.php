<?php
   
   $id= $_GET['id'];

   $conn=mysqli_connect('localhost','root','','vehicle management'); 

    $sql="SELECT `mechanicid`,`driverid` FROM `request` WHERE id='$id'";
    $res=mysqli_query($conn,$sql);
    $row= mysqli_fetch_assoc($res);
    $mecid=$row['mechanicid'];
    $driverid=$row['driverid'];

        $sql2="UPDATE `mechanic` SET `mec_available`='0' WHERE mechanicid='$mecid'; UPDATE `driver` SET `dr_available`='0' WHERE driverid='$driverid'; UPDATE `request` SET `finished`='1' WHERE id='$id'";

        $res2=mysqli_multi_query($conn,$sql2);
        if($res2){
          header("Location: requestlist.php");
        }else{
          echo "Not finished";
        }


        

?>