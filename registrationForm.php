<?php
include 'connection.php';
session_start();
 $id = 0;
 if( isset( $_GET['id']) )
 {
     $id= $_GET['id'];
 }
 
  $sql = "SELECT * from Users u  WHERE u.Id=$id";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
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
   
    
    <div class="container mt-3 border p-3" >
      <form name="Nameform" action="registration.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $id ?>" autocomplete="off"/>
          <div class="row jumbotron box8">
            <div class="col-sm-12 mx-t3 mb-4">
              <div class="row" style="display: block;text-align: center;">
                <img src="images/logo1.png" style="width: 100px;" alt="Avatar Logo" ></div>
              <h2 class="text-center text-info mt-3">Sign Up</h2>
            </div>
            <div class="col-sm-6 form-group mx-auto">
              <label for="name-f">Name</label>
              <input type="text" class="form-control" name="name" id="name-f" value="<?php echo ($row['name']??"") ?>" required>
           
              <label for="name-f">Surname</label>
              <input type="text" class="form-control" name="surname" id="name-f" value="<?php echo ($row['surname']??"") ?>"  required>
              <label for="name-l">Username</label>
              <input type="text" class="form-control" name="username" id="name-l"  value="<?php echo ($row['username']??"") ?>" required>
              <?php
                $roleId =!isset($_SESSION['roleId']) ? 0 :$_SESSION['roleId'] ;
              if($roleId==$roleId && $id>0)
              {
                   echo "<label for='RoleId'>Role</label>";
                    $result = $con->query("select id, name from Roles");
                    echo "<select  name='roleId' class='form-control'><option value=-1 selected>select</option>";
                    $gid=!isset($row['roleId']) ? 0 : $row['roleId'];
                    while ($row = $result->fetch_assoc()) {
                      $id = $row['id'];
                      $name = $row['name']; 
                      $slct=$gid==$id? "selected":"";
                      echo '<option value="'.htmlspecialchars($id).'"  '.htmlspecialchars($slct).'>'.htmlspecialchars($name).'</option>';
                    }
                    echo "</select>";
                  }
              ?>
              <?php

              
              ?>
              <label for="name-l">Password</label>
              <input type="password" class="form-control" name="password" id="name-l"  required>
              <label for="name-l">Confirm Password</label>
              <input type="password" class="form-control" name="repassword" id="name-l"  placeholder="Re-enter your password." required>

              <label class="form-label" for="customFile">Upload profile photo</label>
              <input type="file" class="form-control" id="customFile" name="photo" />
            
              <input type="checkbox" class="form-check d-inline" id="chb" required><label for="chb" class="form-check-label">&nbsp&nbsp&nbsp;I accept all terms and conditions.
              </label>
            
      
              <div class="col-sm-6 form-group mx-3">
              <button class="btn btn-primary float-right">Sign Up</button>
            </div>
          </div>
      
          </div>
        </form>
      </div>
  </body>
</html>