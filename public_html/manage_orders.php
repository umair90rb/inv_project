<?php
include_once("./database/constants.php");
include_once("./database/db.php");
 if (!isset($_SESSION["userid"])) {
	 	header("location:"."./public_html/index.php");
 	}
    $db = new Database();
	  $con = $db->connect();
    if (isset($_GET["search"])) {
      $query = "SELECT * FROM invoice Where ". $_GET['search_by'] ." LIKE '%". $_GET['search'] ."%';";
  		$result = $con->query($query);
  		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	}
    else {
      $query = "SELECT * FROM invoice";
  		$result = $con->query($query);
  		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include_once("./templates/module.php"); ?>
    <title>Manage Orders</title>
  </head>
  <body>
		<?php include_once("./templates/header.php");  ?>

		<div class="container"><br>
      <form method="get" action="" class="">
      <div class="row">
        <div class="col">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <select class="btn btn-outline-secondary dropdown-toggle" name="search_by">
                  <option selected>Search By</option>
                  <option value="invoice_no" >Order No</option>
                  <option value="customer_name">Customer Name</option>
                </select>
            </div>
            <input type="text" name="search" class="form-control" aria-label="Text input with dropdown button">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
            </div>
          </div>
        </div>
      </div>
      </form>
			<table class="table table-hover table-bordered">
			    <thead>
			      <tr>
              <th>Order No</th>
			        <th>Customer Name</th>
			        <th>Order Date</th>
			        <th>Net Total</th>
			        <th>Paid</th>
							<th>Due</th>
              <th>Actions</th>
			      </tr>
			    </thead>
			    <tbody id="">
						<?php	foreach ($rows as $row) { ?>
							<tr>
                <td><?php echo $row['invoice_no']; ?></td>
								<td><?php echo $row['customer_name']; ?></td>
								<td><?php echo $row['order_date']; ?></td>
								<td><?php echo $row['net_total']; ?></td>
								<td><?php echo $row['paid']; ?></td>
                <td><?php echo $row['due']; ?></td>
                <td>
                  <a href="<?php echo "./view_order.php?invoice_no=".$row['invoice_no']; ?>" target="_blank" class="btn btn-primary btn-sm ">View Details</a>
                </td>
							</tr>
						<?php }	?>
			    </tbody>
			  </table>
		</div>



  </body>
</html>
