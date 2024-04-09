<?php
include 'connection.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

try {
      $sql = "select * from Users where username='$username' and password='$password'";
      print $sql;
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $rowcount=mysqli_num_rows($result);
      if ($rowcount== 0) {
         header("location: loginerror.php");
      }
      
      $roleId = $row['roleId'];
      $userId = $row['id'];

      $count = mysqli_num_rows($result);

      if ($count > 0 ) {
         $_SESSION['username'] = $username;
         $_SESSION['roleId'] = $roleId;
         $_SESSION['userId'] = $userId;

         if($roleId==1)
            header("location: applicationForm.php");
         else
            header("location: userlist.php");
      } 
}
catch(Exception $e) {
   header("location: loginerror.php");
}
?>