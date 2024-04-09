<?php
include 'connection.php';
session_start();
 $id=$_POST["id"];
 $otherNextOfKin=$_POST["otherNextOfKin"];
 $userId=$_SESSION['userId'];
//  $name=$_POST['name'];
//  $surname=$_POST['surname'];
 $birthdate=$_POST['birthdate'];
 $genderId=$_POST['genderId'];
 $contactEmail=$_POST['contactEmail'];
 $contactPhone=$_POST['contactPhone'];
 $contactAddress=$_POST['contactAddress'];
 $contactPostCode=$_POST['contactPostCode'];
 $contactCityId=$_POST['contactCityId'];
 $contactCountyId=$_POST['contactCountyId'];
 $otherIllness=$_POST['otherIllness'];
 $isdelete=!isset($_GET["isdelete"]) ? 0 : $_GET["isdelete"];
 $recSourceId=$_POST['recSourceId'];
 $recAddress=$_POST['recAddress'];
 $recPostCode=$_POST['recPostCode'];
 $recCityId=$_POST['recCityId'];
 $recCountyId=$_POST['recCountyId'];

 if($isdelete== 1){
 }else{
 if($id==0){
    $sql="insert into  Applications (userId,birthdate, genderId, contactPhone, contactEmail, contactAddress, contactPostCode, contactCityId, contactCountyId, otherIllness, otherNextofKin, recSourceId, recAddress, recPostCode, recCityId, recCountyId,create_time) "
    ."values"
    . "($userId,'$birthdate',$genderId,'$contactPhone','$contactEmail','$contactAddress','$contactPostCode',$contactCityId,$contactCountyId,'$otherIllness','$otherNextOfKin',$recSourceId,'$recAddress','$recPostCode',$recCityId,$recCountyId,now() );";
    $result = mysqli_query($con,$sql);
 }else{
    $sql=  "update Applications set "
            ."userId = $userId,"
            ."birthdate = '$birthdate',"
            ."genderId = $genderId,"
            ."contactPhone = '$contactPhone',"
            ."contactEmail = '$contactEmail',"
            ."contactAddress = '$contactAddress',"
            ."contactPostCode = '$contactPostCode',"
            ."contactCityId = $contactCityId,"
            ."contactCountyId = $contactCountyId,"
            ."otherIllness = '$otherIllness',"
            ."otherNextofKin = '$otherNextOfKin',"
            ."recSourceId = $recSourceId,"
            ."recAddress = '$recAddress',"
            ."recPostCode = '$recPostCode',"
            ."recCityId = $recCityId,"
            ."recCountyId = $recCountyId"
            ." where   id = $id";
      $result = mysqli_query($con,$sql);
 }
}
$roleId=$_SESSION['roleId'];
	if($roleId==1){
      
      header("Location: applicationResult.php");
	}else {
header("Location: applicationList.php");
}
?>

