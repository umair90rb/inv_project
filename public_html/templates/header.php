<?php
include_once("./database/constants.php");
include_once("./database/db.php");
$sdb = new Database();
$scon = $sdb->connect();
$squery = "SELECT * FROM user_permissions WHERE id =".$_SESSION['user_role'];
$sresult = $scon->query($squery);
$srows = mysqli_fetch_all($sresult,MYSQLI_ASSOC);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">Inventory System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php"><i class="glyphicon glyphicon-home">&nbsp;</i>Home <span class="sr-only">(current)</span></a>
      </li>

        <?php if ($srows[0]['manage_user']) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="glyphicon glyphicon-user"></span>  Manage User
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if($srows[0]['add_user']){ ?><a class="dropdown-item" href="register.php">Add User</a> <?php } ?>
                <?php if($srows[0]['manage_user']){ ?><a class="dropdown-item" href="manage_user.php">Manage User</a> <?php } ?>
                <?php if($srows[0]['user_roles']){ ?>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="user_role.php">User Roles</a>
                <a class="dropdown-item" href="add_user_role.php">Add User Roles</a>
              </div>
            <?php } ?>
            </li>
        <?php } ?>
        <?php if ($srows[0]['customer_record']) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="glyphicon glyphicon-user"></span>  CRM
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if ($srows[0]['new_lead']) { ?><a class="dropdown-item" href="clients.php">New Lead</a><?php } ?>
                <a class="dropdown-item" href="manage_clients.php">Customer Record</a>
              </div>
            </li>
        <?php } ?>
        <?php if ($srows[0]['orders']) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="glyphicon glyphicon-signal"></span>  Sales
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if ($srows[0]['new_order']) { ?><a class="dropdown-item" href="new_order.php">New Order</a><?php } ?>
                <a class="dropdown-item" href="manage_orders.php">Orders</a>
              </div>
            </li>
        <?php } ?>
        <?php if ($srows[0]['inventory']) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="glyphicon glyphicon-list-alt"></span>  Inventory
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php if ($srows[0]['manage_categories']) { ?><a class="dropdown-item" href="manage_categories.php">Manage Categories</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#form_category" >Add New Categories</a>
                <div class="dropdown-divider"></div><?php } ?>
                <?php if ($srows[0]['manage_brands']) { ?><a class="dropdown-item" href="manage_brand.php">Manage Brands</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#form_brand">Add New Brands</a>
                <div class="dropdown-divider"></div><?php } ?>
                <?php if ($srows[0]['manage_products']) { ?><a class="dropdown-item" href="manage_product.php">Manage Products</a>
                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#form_products" >Add New Products</a>
                <div class="dropdown-divider"></div><?php } ?>
                <?php if ($srows[0]['stock_summary']) { ?><a class="dropdown-item" href="stock_summary.php">Stock Summary</a><?php } ?>

              </div>
            </li>
          <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="glyphicon glyphicon-log-out">&nbsp;</i>Logout</a>
            </li>


    </ul>
  </div>
</nav>
