<?php
 include 'connection.php';
  $id = 0;
  if( isset( $_POST['id']) )
  {
      $id= $_POST['id'];
  }
 $username=$_POST['username'];
 $name=$_POST['name'];
 $surname=$_POST['surname'];
 $roleId=$_POST['roleId']??1;
 $password=$_POST['password'];
 $repassword=$_POST['repassword'];
 $imgContent=null;
 if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $image = $_FILES['photo']['tmp_name']; 
        $imgContent = addslashes(file_get_contents($image)); 
    }
}

if($password!=$repassword){
    $failure = "Email must have an at-sign @";
    header("Location: signup.html");
    return;
}

if($id==0)
{
    $sql="insert into Users (create_time,username,name,surname,password,roleId,photo) values (now(),'$username','$name','$surname','$password',$roleId,'$imgContent') ";
    $result = mysqli_query($con,$sql);
    header("Location: login.html");
}else{
    $sql="update Users set "
    ." name = '$name',"
    ." surname = '$surname',"
    ." photo = '$imgContent',"
    ." roleId = '$roleId',"
    ." password = '$password',"
    ." username = '$username'"
    ." where id = $id";
    print $sql;
    $result = mysqli_query($con,$sql);
    header("Location: userlist.php");
}   

?>

