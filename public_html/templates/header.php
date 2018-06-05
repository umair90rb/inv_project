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

        <?php
          if (isset($_SESSION["userid"])) {
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="glyphicon glyphicon-user"></span>  Manage User
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="register.php">Add User</a>
                <a class="dropdown-item" href="manage_user.php">Manage User</a>
                <!-- <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div> -->
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <span class="glyphicon glyphicon-user"></span>  CRM
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="clients.php">New Lead</a>
                <a class="dropdown-item" href="manage_clients.php">Customer Record</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php"><i class="glyphicon glyphicon-log-out">&nbsp;</i>Logout</a>
            </li>
            <?php
          }
        ?>

    </ul>
  </div>
</nav>
