<?php



         include("database.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub"])) {

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (
            trim($username) != "" &&
            trim($email) != "" &&
            trim($password) != ""
        ) {

            $sql = "INSERT INTO users (Username, Email, Password)
                    VALUES ('$username', '$email', '$password')";

            if (mysqli_query($conn, $sql)) {

                header("Location: logi.html");
                exit;

            } else {

                echo "Error: " . mysqli_error($conn);

            }

        } else {

            echo "Please fill in all required fields.";
        }

    } 
    else {

        header("Location: index.html");
        exit;
    }

?>