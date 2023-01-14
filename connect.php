<?php
  $con = new mysqli("localhost", "root", "", "dobhapp");

  if ($con->connect_errno) {
    die("FAILED: " . $con->connect_error);
  }
?>
