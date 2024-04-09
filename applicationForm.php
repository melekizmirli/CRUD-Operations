<?php
	include 'connection.php';
	session_start();
  $id = 0;
  if( isset( $_GET['id']) )
  {
      $id= $_GET['id'];
  }
	
  $userId=$_SESSION['userId'];
  $sql = "SELECT * from Users u  WHERE u.Id=$userId";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  
  $sql1 = "SELECT a.* from Users u  inner JOIN Applications a on u.id=a.userId  WHERE a.Id=$id";
  //echo $sql1;
  $result1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
  //print $row1['birthdate'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Mariata Homes</title>
  </head>
  <body>
  
    <div class="container mt-3 border p-3">
    <form name="Nameform" action="applicationCrud.php" method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>"/>
          <div class="row jumbotron box8">
            <div class="col-sm-12 mx-t3 mb-4">
              <div class="row" style="display: block;text-align: center;">
             <img src="images/logo1.png" style="width: 100px;" alt="Avatar Logo" ></div>
              <h2 class="text-center text-info mt-3">Application Form</h2>
            </div>
            <h4 class="text-info mt-3">Personal Information</h4>
            <div class="col-sm-6 form-group">
              <label for="name-f">First Name:</label>
              <label class="form-control"><?php echo ($row['name']??"") ?></label>
              <!-- <input type="text" class="form-control" name="name" id="address-1"  required value="<?php echo ($row1['name']??"") ?>"> -->
         
            </div>
            <div class="col-sm-6 form-group">
              <label for="name-l">Last Name:</label>
              <label class="form-control"><?php echo ($row['surname']??"") ?></label>
              <!-- <input type="text" class="form-control" name="surname" id="address-1"  required value="<?php echo ($row1['surname']??"") ?>"> -->
         
            </div>
            <div class="col-sm-6 form-group mt-3">
              <label for="Date">Date Of Birth</label>
              <input type="date" name="birthdate" class="form-control" id="Date" value="<?php echo date('Y-m-d',strtotime($row1['birthdate']??"")) ?>"  required>
            </div>
            <div class="col-sm-6 form-group mt-3">
              <label for="sex">Gender</label>        
              <?php
                    $result = $con->query("select id, name from Gender");
                    echo "<select  name='genderId' class='form-control'><option value=-1 selected>select</option>";
                    $gid=!isset($row1['genderId']) ? 0 : $row1['genderId'];
                    while ($row = $result->fetch_assoc()) {
                      $id = $row['id'];
                      $name = $row['name']; 
                      $slct=$gid==$id? "selected":"";
                      echo '<option value="'.htmlspecialchars($id).'"  '.htmlspecialchars($slct).'>'.htmlspecialchars($name).'</option>';
                    }
                    echo "</select>";
              ?>
            </div>
            <h4 class="text-info mt-3">Contact Details</h4>
            <div class="col-sm-6 form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="contactEmail" id="email" value="<?php echo ($row1['contactEmail']??"") ?>" >
            </div>
            <div class="col-sm-4 form-group">
              <label for="tel">Phone</label>
              <input type="tel" name="contactPhone" class="form-control" id="tel" value="<?php echo ($row1['contactPhone']??"") ?>">
            </div>
            <div class="col-sm-6 form-group">
              <label for="address-1">Address Line-1</label>
              <input type="address" class="form-control" name="contactAddress" id="address-1" placeholder="Locality/House/Street no." required value="<?php echo ($row1['contactAddress']??"") ?>">
            </div>
            
            <div class="col-sm-2 form-group">
              <label for="zip">PostCode</label>
              <input type="zip" class="form-control" name="contactPostCode" id="zip" value="<?php echo ($row1['contactPostCode']??"") ?>">
            </div>
            <div class="col-sm-2 form-group">
              <label for="State">City</label>
              <?php
                    $result = $con->query("select id, name from Cities");
                    echo "<select  name='contactCityId' class='form-control'><option value=-1 selected>select</option>";
                    $gid=!isset($row1['contactCityId']) ? 0 : $row1['contactCityId'];
                    while ($row = $result->fetch_assoc()) {
                      $id = $row['id'];
                      $name = $row['name']; 
                      $slct=$gid==$id? "selected":"";
                      echo '<option value="'.htmlspecialchars($id).'"  '.htmlspecialchars($slct).'>'.htmlspecialchars($name).'</option>';
                    }
                    echo "</select>";
              ?>

            </div>           
            <div class="col-sm-2 form-group">
              <label for="Country">Country</label>
              <?php
                    $result = $con->query("select id, name from Counties");
                    echo "<select name='contactCountyId' class='form-control'><option value=-1 selected>select</option>";
                    $gid=!isset($row1['contactCountyId']) ? 0 : $row1['contactCountyId'];
                    while ($row = $result->fetch_assoc()) {
                      $id = $row['id'];
                      $name = $row['name']; 
                      $slct=$gid==$id? "selected":"";
                      echo '<option value="'.htmlspecialchars($id).'"  '.htmlspecialchars($slct).'>'.htmlspecialchars($name).'</option>';
                    }
                    echo "</select>";
              ?>
            </div>
            <h4 class="text-info mt-3">Other</h4>
            <div class="col-sm-6 form-group">
              <label for="pass">Any Illness</label>
              <input type="Text" name="otherIllness" class="form-control" id="illness" value="<?php echo ($row1['otherIllness']??"") ?>">
            </div>
            <div class="col-sm-6 form-group">
              <label for="pass2">Next of Kin</label>
              <input type="Text" name="otherNextOfKin" class="form-control" id="nextOFKin" value="<?php echo ($row1['otherNextofKin']??"") ?>">
            </div>
            <h4 class="text-info mt-3">Recommended Source Information</h4>
            <div class="col-sm-6 form-group">
              <label for="pass">Source Name</label>
              <?php
                    $result = $con->query("select id, name from Sources");
                    echo "<select name='recSourceId' class='form-control'><option value=-1 selected>select</option>";
                    $gid=!isset($row1['recSourceId']) ? 0 : $row1['recSourceId'];
                    while ($row = $result->fetch_assoc()) {
                      $id = $row['id'];
                      $name = $row['name']; 
                      $slct=$gid==$id? "selected":"";
                      echo '<option value="'.htmlspecialchars($id).'"  '.htmlspecialchars($slct).'>'.htmlspecialchars($name).'</option>';
                    }
                    echo "</select>";
              ?>
            </div>
            <div class="col-sm-6 form-group">
              <label for="address-1">Address Line-1</label>
              <input type="address" class="form-control" name="recAddress" id="address-1" placeholder="Locality/House/Street no." value="<?php echo ($row1['recAddress']??"") ?>">
            </div>
            
            <div class="col-sm-2 form-group">
              <label for="zip">Postal-Code</label>
              <input type="zip" class="form-control" name="recPostCode" id="recSourcePostCode" value="<?php echo ($row1['recPostCode']??"") ?>">
            </div>
            <div class="col-sm-2 form-group">
              <label for="State">City</label>
              <?php
                    $result = $con->query("select id, name from Cities");
                    echo "<select   name='recCityId' class='form-control'><option value=-1 selected>select</option>";
                    $gid=!isset($row1['recCityId']) ? 0 : $row1['recCityId'];
                    while ($row = $result->fetch_assoc()) {
                      $id = $row['id'];
                      $name = $row['name']; 
                      $slct=$gid==$id? "selected":"";
                      echo '<option value="'.htmlspecialchars($id).'"  '.htmlspecialchars($slct).'>'.htmlspecialchars($name).'</option>';
                    }
                    echo "</select>";
              ?>
            </div>            
            <div class="col-sm-2 form-group">
              <label for="Country">Country</label>
              <?php
                    $result = $con->query("select id, name from Counties");
                    echo "<select  name='recCountyId' class='form-control'><option value=-1 selected>select</option>";
                    $gid=!isset($row1['recCountyId']) ? 0 : $row1['recCountyId'];
                    while ($row = $result->fetch_assoc()) {
                      $id = $row['id'];
                      $name = $row['name']; 
                      $slct=$gid==$id? "selected":"";
                      echo '<option value="'.htmlspecialchars($id).'"  '.htmlspecialchars($slct).'>'.htmlspecialchars($name).'</option>';
                    }
                    echo "</select>";
              ?>
            </div>
            <div class="col-sm-12">
              <input type="checkbox" class="form-check d-inline mt-3" id="chb" required><label for="chb" class="form-check-label mt-1">&nbsp;I accept all terms and conditions.
              </label>
            </div>
            <div class="col-sm-12 form-group mb-0">
              <button class="btn btn-success float-right">Submit</button>
            </div>
      
          </div>
        </form>
      </div>
  </body>
</html>