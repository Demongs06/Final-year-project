<?php
   
   $id= $_GET['id'];

   $conn=mysqli_connect('localhost','root','','vehicle management');
   $sql="DELETE FROM bill WHERE id='$id'";
   $result=mysqli_query($conn,$sql);
   $sql2="UPDATE request SET paid='0' WHERE id='$id'";
   $result=mysqli_query($conn,$sql2);

   if(mysqli_query($conn,$sql)){
       header("Location: indexbill.php");
   }else{
         echo "Not deleted";
   }
   
?>
