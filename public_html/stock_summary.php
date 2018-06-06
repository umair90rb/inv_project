<?php
include_once("./database/constants.php");
include_once("./database/db.php");
 if (!isset($_SESSION["userid"])) {
	 	header("location:"."./public_html/index.php");
 	}
	  $db = new Database();
	  $con = $db->connect();
		$query = "SELECT * FROM products";
		$result = $con->query($query);
		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
			<table class="table table-hover table-bordered">
			    <thead class="thead-dark">
			      <tr>
			        <th>Product Name</th>
			        <th>Stock In</th>
			        <th>Price</th>
			      </tr>
			    </thead>
			    <tbody >
						<?php	foreach ($rows as $row) { ?>
							<tr>
								<td><?php echo $row['product_name']; ?></td>
								<td><?php echo $row['product_stock']; ?></td>
                <td><?php echo $row['product_price']; ?></td>
							</tr>
						<?php }	?>
			    </tbody>
			  </table>
		</div>



  </body>
</html>
