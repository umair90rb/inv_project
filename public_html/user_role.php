<?php
include_once("./database/constants.php");
include_once("./database/db.php");
 if (!isset($_SESSION["userid"])) {
	 	header("location:"."./index.php");
 	}
	  $db = new Database();
	  $con = $db->connect();
    if (isset($_GET["search"])) {
      $query = "SELECT * FROM user_permissions Where ". $_GET['search_by'] ." LIKE '%". $_GET['search'] ."%'";
  		$result = $con->query($query);
  		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
    	}
    else {
      $query = "SELECT * FROM user_permissions";
  		$result = $con->query($query);
  		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
      <form method="get" action="" class="">
      <div class="row">
        <div class="col">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
                <select class="btn btn-outline-secondary dropdown-toggle" name="search_by">
                  <option>Search By</option>
                  <option value="title" selected>Title</option>
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
			    <thead class="thead-dark">
			      <tr>
			        <th>No</th>
			        <th>Title</th>
							<th>Action</th>
			      </tr>
			    </thead>
			    <tbody id="">
						<?php	foreach ($rows as $row) { ?>
							<tr>
								<td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td>
                  <a href="<?php echo $row['id']; ?>" onclick="alert('Are you sure!')" class="btn btn-danger btn-sm ">Delete</a>
                </td>
							</tr>
						<?php }	?>
			    </tbody>
			  </table>
		</div>



  </body>
</html>
