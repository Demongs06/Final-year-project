<?php

    $id= $_GET['mechanicid'];

    $conn=mysqli_connect('localhost','root','','vehicle management');

    $sql="DELETE FROM `mechanic` WHERE mechanicid='$id'";
    echo $sql;

    $result=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql)){
       header("Location: mechaniclist.php");
    }else{
        echo "Not deleted";
    }

?>