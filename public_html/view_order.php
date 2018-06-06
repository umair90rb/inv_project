<?php
include_once("./database/constants.php");
include_once("./database/db.php");
$db = new Database();
$con = $db->connect();
$query1 = "SELECT * FROM invoice WHERE invoice_no= ".$_GET['invoice_no'];
$query2 = "SELECT * FROM invoice_details WHERE invoice_no= ".$_GET['invoice_no'];
$customer = $con->query($query1);
$products = $con->query($query2);
$cus = mysqli_fetch_all($customer,MYSQLI_ASSOC);
$pro = mysqli_fetch_all($products,MYSQLI_ASSOC);
//print_r($cus);print_r($pro);exit;
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
 </head>
<body><br>
  <div class='container '>

    <div class="card">
      <div class="card-header">
        Order Detail
      </div>
      <div class="card-body">
        <h5 class="card-title">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "Customer Name: ".$cus[0]['customer_name']; ?></h5>
        <div class="row">
          <div class="col">
						<ul class="list-group list-group-flush">
						  <li class="list-group-item"><div class='row'><div class="col">Order Date:</div> <div class="col"><?php echo $cus[0]['order_date']; ?></div></div> </li>
						  <li class="list-group-item"><div class='row'><div class="col">Payment Type:</div> <div class="col"><?php echo $cus[0]['payment_type']; ?></div></div></li>
						  <li class="list-group-item"><div class='row'><div class="col">Due:</div> <div class="col"><?php echo "Rs. ".$cus[0]['due']; ?></div></div></li>
						</ul>
          </div>
					<div class="col">
						<ul class="list-group list-group-flush">
						  <li class="list-group-item"><div class='row'><div class="col">Sub Total:</div> <div class="col"><?php echo "Rs. ".$cus[0]['sub_total']; ?></div></div> </li>
						  <li class="list-group-item"><div class='row'><div class="col">GST:</div> <div class="col"><?php echo "Rs. ".$cus[0]['gst']; ?></div></div></li>
						  <li class="list-group-item"><div class='row'><div class="col">Discount:</div> <div class="col"><?php echo "Rs. ".$cus[0]['discount']; ?></div></div></li>
							<li class="list-group-item"><div class='row'><div class="col">Net Total:</div> <div class="col"><?php echo "Rs. ".$cus[0]['net_total']; ?></div></div></li>
						</ul>
          </div>
        </div>

				<table class="table">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Product Name</th>
				      <th scope="col">Price</th>
				      <th scope="col">Quantity</th>
				    </tr>
				  </thead>
				  <tbody>

							<?php foreach ($pro as $p) { ?>
							<tr>
								<td><?php echo $p['product_name']; ?></td>
								<td><?php echo $p['price']; ?></td>
								<td><?php echo $p['qty']; ?></td>
							</tr>
							<?php	} ?>

				  </tbody>
				</table>

      </div>
    </div>

  </div>
</body>
</html>
