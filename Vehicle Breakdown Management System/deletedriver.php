<?php

    $driverid= $_GET['driverid'];

    $conn=mysqli_connect('localhost','root','','vehicle management');

    $sql="DELETE FROM `driver` WHERE driverid='$driverid'";
    echo $sql;

    $result=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql)){
       header("Location: driverlist.php");
    }else{
        echo "Not deleted";
    }

?>
