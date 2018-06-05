<?php
include_once('../database/db.php');

if (isset($_GET['id'])) {
    $res = deleteUser($_GET['id']);
    if ($res) {
      header("location:./manage_user.php");
    }
}

function deleteUser($id){
  $db = new Database();
  $con = $db->connect();
  $query = "DELETE FROM table_name WHERE id = $id";
  $result = $con->query($query);
  if ($result) {
    return true;
  }
  else {
    print_r($result);
    return false;
  }
}
