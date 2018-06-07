<?php
include_once("./database/constants.php");
include_once("./database/db.php");
 if (!isset($_SESSION["userid"])) {
	 	header("location:"."./index.php");
 	}
	  $db = new Database();
	  $con = $db->connect();
    if (isset($_GET["search"])) {
      $query = "SELECT * FROM clients Where ". $_GET['search_by'] ." LIKE '%". $_GET['search'] ."%';";
  		$result = $con->query($query);
  		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	}
    else {
      $query = "SELECT * FROM clients";
  		$result = $con->query($query);
  		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    // if (isset($_GET['id'])) {
    //     $res = deleteUser($_GET['id']);
    //     if ($res == true) {
    //       header("location:./manage_user.php");
    //     }
    // }
    //
    // function deleteUser($id){
    //   $db = new Database();
    //   $con = $db->connect();
    //   $query = "DELETE FROM user WHERE id = $id";
    //   $result = $con->query($query);
    //   if ($result) {
    //     return true;
    //   }
    //   else {
    //     return false;
    //   }
    // }
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
      <form method="get" action="" class="">
      <div class="row">
        <div class="col">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <select class="btn btn-outline-secondary dropdown-toggle" name="search_by">
                  <option selected>Search By</option>
                  <option value="name">Name</option>
                  <option value="cnic">CNIC</option>
                  <option value="email">Email</option>
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
			        <th>Name</th>
              <th>Father/Husband Name</th>
			        <th>Email</th>
			        <th>Contact No</th>
			        <th>CNIC No</th>
							<th>Address</th>
			      </tr>
			    </thead>
			    <tbody id="">
						<?php	foreach ($rows as $row) { ?>
							<tr>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['father_name']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['cnic']; ?></td>
                <td><?php echo $row['address']; ?></td>
							</tr>
						<?php }	?>
			    </tbody>
			  </table>
		</div>



  </body>
</html>
