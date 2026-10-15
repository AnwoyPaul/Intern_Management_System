<?php

  $bd_server = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "intern_info";

  $conn = mysqli_connect($bd_server, $db_user, $db_pass, $db_name);

  if (!$conn) {
    echo "Could not Connect";
  }

?>