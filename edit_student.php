<?php
ob_start();
include('konek.php');

if(isset($_POST['btnSave'])){

	$studentID = stripslashes($_POST['studentID']);
	$lastname = stripslashes($_POST['lastname']);
	$firstname = stripslashes($_POST['firstname']);
	$middlename = stripslashes($_POST['middlename']);
	$address = stripslashes($_POST['address']);
	$contact = stripslashes($_POST['contact']);

	$sql = mysql_query("UPDATE tblStudents SET 
						`firstname` = '".$firstname."',
						`lastname` = '".$lastname."',
						`middlename` = '".$middlename."',
						`address` = '".$address."',
						`contact` = '".$contact."'
						WHERE `studentID` = ".$studentID);

	if($sql){
		header("Location: index.php");
	}else{
		echo "<font color='red'>Error updating data</font>";
	}


}

?>


<?php
$id = $_GET['id'];
$sql = mysql_query("SELECT `studentID`,`firstname`,`lastname`,`middlename`,`address`,`contact` 
					FROM `tblStudents`
					WHERE `studentID` = ".$id);
$rs = mysql_fetch_array($sql);
?>
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
<h2>Edit Student</h2>

<form method="post">
<div class="form-group">
<input type="hidden" name="studentID" id="studentID" value="<?php echo $rs['studentID'];?>">
</div>
<div class="form-group">
Last Name: <input type="text" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $rs['lastname'];?>" class="form-control">
<div class="form-group">
First Name: <input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $rs['firstname'];?>" class="form-control"> </div>
<div class="form-group">
Middle Name: <input type="text" name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo $rs['middlename'];?>" class="form-control""> </div>
<div class="form-group">
Address: <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $rs['address'];?>" class="form-control">
<div class="form-group"> </div>
Contact: <input type="text" name="contact" id="contact" placeholder="Contact" value="<?php echo $rs['contact'];?>" class="form-control">
<div class="form-group"> </div>
<input type="submit" value="save" name="btnSave" id="btnSave" class="btn btn-success"> <a href="index.php" class="btn btn-info"> Back </a>
</div>
</form>
</div>
</div>
</body>
</di