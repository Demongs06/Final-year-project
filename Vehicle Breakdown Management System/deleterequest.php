<?php

    $id= $_GET['id'];

    $conn=mysqli_connect('localhost','root','','vehicle management');

    $sql="DELETE FROM `request` WHERE id='$id'";
    echo $sql;

    $result=mysqli_query($conn,$sql);
    if(mysqli_query($conn,$sql)){
       header("Location: requestlist.php");
    }else{
        echo "Not deleted";
    }

?>
