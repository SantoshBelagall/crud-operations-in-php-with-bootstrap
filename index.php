<?php
ob_start();
include('konek.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>student crud operations</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<div class="col-md-8 col-md-offset-2">
	<dir class="row">
		

<h2>Student Lists</h2>

<p><a href="add_student.php" class="btn btn-info" role="button">Add Student</a></p>
<div class="table-responsive">
<table class="table table-hover" border="1">
<tr>
	<th>Last Name</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Address</th>
	<th>Contact</th>
	<th colspan="2">Commands</th>
</tr>
<?php
$sql = mysql_query("SELECT `studentID`,`firstname`,`lastname`,`middlename`,`address`,`contact`
					FROM `tblStudents` 
					ORDER BY `lastname`");
if(mysql_num_rows($sql) == 0){
	echo "<tr><td colspan='7'>No Student found.</td></tr>";
}else{
	while($rs = mysql_fetch_array($sql)){
?>
<tr>
	<td><?php echo $rs['lastname'];?></td>
	<td><?php echo $rs['firstname'];?></td>
	<td><?php echo $rs['middlename'];?></td>
	<td><?php echo $rs['address'];?></td>
	<td><?php echo $rs['contact'];?></td>
	<td><a href="edit_student.php?id=<?php echo $rs['studentID'];?>" class="btn btn-info" role="button">Edit</a></td>
	<td><a href="delete_student.php?id=<?php echo $rs['studentID'];?>" onClick="return confirm('Are you sure you want to delete?');" class="btn btn-danger" role="button">Delete</a></td>
</tr>
<?php }}?>
</table>
</div>
	</dir>
</div>
</body>
</html>