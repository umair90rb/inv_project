<?php
include_once("./database/constants.php");
include_once("./database/db.php");
 if (!isset($_SESSION["userid"])) {
	 	header("location:"."./index.php");
 	}
	  $db = new Database();
	  $con = $db->connect();
		$query = "SELECT * FROM user";
		$result = $con->query($query);
		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    if (isset($_GET['id'])) {
        $res = deleteUser($_GET['id']);
        if ($res == true) {
          header("location:./manage_user.php");
        }
    }

    function deleteUser($id){
      $db = new Database();
      $con = $db->connect();
      $query = "DELETE FROM user WHERE id = $id";
      $result = $con->query($query);
      if ($result) {
        return true;
      }
      else {
        return false;
      }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include_once("./templates/module.php"); ?>
    <title>Manage Users</title>
  </head>
  <body>
		<?php include_once("./templates/header.php");  ?>

		<div class="container"><br>
			<table class="table table-hover table-bordered">
			    <thead>
			      <tr>
			        <th>Name</th>
			        <th>Email</th>

			        <th>Registration Date</th>
							<th>Actions</th>
			      </tr>
			    </thead>
			    <tbody id="">
						<?php	foreach ($rows as $row) {  ?>
							<tr>
								<td><?php echo $row['username']; ?></td>
								<td><?php echo $row['email']; ?></td>

								<td><?php echo $row['register_date']; ?></td>
								<td>
                  <a href="manage_user.php?id=<?php echo $row['id']; ?>" onclick="alert('Are you sure!')" class="btn btn-danger btn-sm ">Delete</a>
                </td>
							</tr>
						<?php }	?>
			    </tbody>
			  </table>
		</div>



  </body>
</html>
