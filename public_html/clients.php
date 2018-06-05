<?php
include_once("./database/constants.php");
include_once("./database/db.php");

if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/");
}
if (isset($_POST['client_register'])) {
  $db = new Database();
  $con = $db->connect();
  $query = "INSERT INTO clients(name, father_name, email, cnic, contact, address) VALUES('{$_POST['name']}', '{$_POST['father_name']}', '{$_POST['email']}', '{$_POST['cnic']}', '{$_POST['contact']}', '{$_POST['address']}')";
  $result = $con->query($query);
  if ($result) {
    echo "<script>alert('Clent Added Successfully!')</script>";
    echo "<script type='text/javascript'>window.location.href = 'clients.php';</script>";
  }else {
    echo "<script>alert('Some thing went wronge!')</script>";
    echo "<script type='text/javascript'>window.location.href = 'clients.php';</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<?php include_once("./templates/module.php"); ?>
 	<link rel="stylesheet" type="text/css" href="./includes/style.css">
 	<script type="text/javascript" src="./js/main.js"></script>
 </head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/>
	<div class="container">
		<div class="card mx-auto" style="width: 30rem;">
	        <div class="card-header">New Client Information</div>
		      <div class="card-body">
		        <form action="clients.php" method="post" autocomplete="off">
		          <div class="form-group">
		            <label for="name">Full Name</label>
		            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>
              <div class="form-group">
		            <label for="father_name">Father/Husband Name</label>
		            <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father/Husband Name">
		            <small id="u_error" class="form-text text-muted"></small>
		          </div>
		          <div class="form-group">
		            <label for="email">Email address</label>
		            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
		            <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
		          </div>
              <div class="form-group">
                <label for="cnic">CNIC No</label>
                <input type="text" name="cnic" class="form-control" id="cnic" aria-describedby="emailHelp" placeholder="Enter CNIC No">
              </div>
              <div class="form-group">
                <label for="contact">Contact No</label>
                <input type="text" name="contact" class="form-control" id="contact" aria-describedby="emailHelp" placeholder="Enter Contact No">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Enter Complete Address">
              </div>

		          <button type="submit" name="client_register" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-user"></span>&nbsp;Add Client</button>
		        </form>
		      </div>
	      <div class="card-footer text-muted">

	      </div>
	    </div>
	</div>

</body>
</html>
