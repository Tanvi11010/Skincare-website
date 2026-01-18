<?php
include "config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = intval($_POST['userId']);
  $status = $_POST['status'] === 'active' ? 'active' : 'inactive';

  $query = "UPDATE users SET account_status = '$status' WHERE id = $id";
  mysqli_query($con, $query);

  echo json_encode(['success' => true]);
}
?>
