<?php
include("database.php");

if (isset($_POST["Delete"]) && isset($_POST["intern_id"])) {

    $id = (int) $_POST["intern_id"];

    if ($id <= 0) {
        exit("Invalid ID");
    }

    $sql = "DELETE FROM interns WHERE intern_id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: view_interns.php");
        exit();
    } else {
        echo "Delete Failed";
    }
}
?>