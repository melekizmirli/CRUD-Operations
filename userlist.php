<?php
	include 'connection.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD Mariata Homes</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  
<body>
<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2 class="text-info">Manage Users</h2>
					</div>
			<div class="col-sm-6" style="text-align: right">
						<a href="registrationForm.php" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add User</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Name</th>
						<th>rolename</th>
                        <th>Photo</th>
						<th>Actions</th>
                    </tr>
                </thead>
                <tbody>
<?php
	$username = $_SESSION['username'];
	$roleId=$_SESSION['roleId'];
	if($roleId==1){
	return'';
	}else 
	if($roleId== 2){
		$sql = "SELECT u.*,r.name rolename from Users u inner join Roles r on r.id=u.roleId";	
	}
	$result = mysqli_query($con, $sql);
	while($row = mysqli_fetch_array($result))
	 {
			
?>
		  <tr>
						
							
						
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["surname"] ?></td>
						<td><?php echo $row["username"] ?></td>
						<td><?php echo $row["rolename"] ?></td>
						<td><?php echo '<img height="100px" width="100px" src="data:image;base64,'.base64_encode($row['photo']).'"/>' ?></td>
                      <td>
                            <a href="registrationForm.php?id=<?php echo $row["id"] ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a href="userDelete.php?id=<?php echo $row["id"] ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
<?php
		}
	  mysqli_close($con);
?>
                    
                </tbody>
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	
	
</body>
</html>