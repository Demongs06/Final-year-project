<?php
    $connection= mysqli_connect('localhost','root','','vehicle management');
    session_start();

    $id= $_GET['id'];

    if(isset($_POST['submit'])){
        $card_no=$_POST['card_number'];
    }

    $sql= "UPDATE `bill` SET `paid`='1' WHERE id='$id'";
    $sql2="UPDATE `request` SET `paid`='1' WHERE id='$id'";
    $sql3="INSERT INTO `transaction`(`card_number`) VALUES ('$card_no')";

    $result= mysqli_query($connection,$sql);
    $result1= mysqli_query($connection,$sql2);
    $result2= mysqli_query($connection,$sql3);

    if($result){
        header ('Location: user_bill.php');
    }
?>
