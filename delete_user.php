<?php
include("database.php");

if (isset($_POST["Delete"]) && isset($_POST["user_id"])) {

    $id = (int) $_POST["user_id"];

    if ($id <= 0) {
        exit("Invalid ID");
    }

    $sql = "DELETE FROM users WHERE user_id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: viewuser.php");
        exit();
    } else {
        echo "Delete Failed";
    }
}
?>