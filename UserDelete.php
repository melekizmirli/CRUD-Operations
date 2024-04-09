<?php
 include 'connection.php';
  $id = 0;
  if( isset( $_GET['id']) )
  {
      $id= $_GET['id'];
  }

if($id>0)
{
    $sql="delete from  Users where id=$id";
    $result = mysqli_query($con,$sql);
    header("Location: userlist.php");
}else{
 echo "user is not found";
}

?>

