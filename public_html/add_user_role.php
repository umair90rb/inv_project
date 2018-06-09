<?php
include_once("./database/constants.php");

if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/");
}
if (isset($_POST['add_role'])) {
  include_once("./database/db.php");
  $title = $_POST['title'];
  isset($_POST['manage_user']) ? $manage_user=$_POST['manage_user'] : $manage_user=0;
  isset($_POST['add_user']) ? $add_user=$_POST['add_user'] : $add_user=0;
  isset($_POST['user_role']) ? $user_role=$_POST['user_role'] : $user_role=0;
  isset($_POST['new_lead']) ? $new_lead=$_POST['new_lead'] : $new_lead=0;
  isset($_POST['customer_record']) ? $customer_record=$_POST['customer_record'] : $customer_record=0;
  isset($_POST['new_order']) ? $new_order=$_POST['new_order'] : $new_order=0;
  isset($_POST['order']) ? $order=$_POST['order'] : $order=0;
  isset($_POST['stock_summary']) ? $stock_summary=$_POST['stock_summary'] : $stock_summary=0;
  isset($_POST['manage_categories']) ? $manage_categories=$_POST['manage_categories'] : $manage_categories=0;
  isset($_POST['manage_brands']) ? $manage_brands=$_POST['manage_brands'] : $manage_brands=0;
  isset($_POST['manage_products']) ? $manage_products=$_POST['manage_products'] : $manage_products=0;
	isset($_POST['inventory']) ? $inventory=$_POST['inventory'] : $inventory=0;
  $db = new Database();
  $con = $db->connect();
  $query = "INSERT INTO user_permissions(title, add_user, manage_user, user_roles, new_lead, customer_record, new_order, orders, manage_categories, manage_brands, manage_products, stock_summary, inventory) VALUES('$title', '$add_user', '$manage_user', '$user_role', '$new_lead', '$customer_record', '$new_order', '$order', '$manage_categories', '$manage_brands', '$manage_products', '$stock_summary', '$inventory')";
  $result = $con->query($query);
	header("location:".DOMAIN."/dashboard.php?msg=Operation Successful.");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Add User Role</title>
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
	        <div class="card-header">Add User Roles</div>
		      <div class="card-body">
		        <form action="" method="post">
		          <div class="form-group">
		            <label for="title">Title</label>
		            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" required>
		          </div>
              <p class="text"> Set User Permissions</p>
              <div class="row">
                <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" name="add_user" type="checkbox" value="1">
                    <label class="form-check-label">
                      <small class="text-muted">Add User</small>
                    </label>
                  </div>
                  </div>
                  <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="manage_user" value="1">
                    <label class="form-check-label">
                      <small class="text-muted">Manage User</small>
                    </label>
                  </div>
                  </div>
                  <div class="col">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="user_role" value="1">
                    <label class="form-check-label">
                      <small class="text-muted">Add User Roles</small>
                    </label>
                  </div>
                  </div>
              </div>
              <div class="row">
                <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="new_lead" value="1">
                  <label class="form-check-label">
                    <small class="text-muted">Add New Customer</small>
                  </label>
                </div>
                </div>
                <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="customer_record" value="1">
                  <label class="form-check-label">
                    <small class="text-muted">Check Customer Record</small>
                  </label>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                <div class="form-check">
                  <input class="form-check-input" name="new_order" type="checkbox" value="1">
                  <label class="form-check-label">
                    <small class="text-muted">New Order</small>
                  </label>
                </div>
                </div>
                <div class="col">
                <div class="form-check">
                  <input class="form-check-input" name="order" type="checkbox" value="1">
                  <label class="form-check-label">
                    <small class="text-muted">View Order</small>
                  </label>
                </div>
                </div>
                <div class="col">
                <div class="form-check">
                  <input class="form-check-input" name="stock_summary" type="checkbox" value="1">
                  <label class="form-check-label">
                    <small class="text-muted">Stock Summary</small>
                  </label>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="manage_categories" value="1">
                  <label class="form-check-label">
                    <small class="text-muted">Manage Categories</small>
                  </label>
                </div>
                </div>
                <div class="col">
                <div class="form-check">
                  <input class="form-check-input" name="manage_brands" type="checkbox" value="1">
                  <label class="form-check-label">
                    <small class="text-muted">Manage Brands</small>
                  </label>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="manage_products" value="1">
                  <label class="form-check-label">
                    <small class="text-muted">Manage Products</small>
                  </label>
                </div>
                </div>
								<div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="inventory" value="1">
                  <label class="form-check-label">
                    <small class="text-muted">Inventory</small>
                  </label>
                </div>
                </div>
              </div>
		          <button type="submit" name="add_role" class="btn btn-block btn-primary"><span class="glyphicon glyphicon-user"></span>&nbsp;Add User Role</button>
		        </form>
		      </div>
	      <div class="card-footer text-muted">

	      </div>
	    </div>
	</div>

</body>
</html>
