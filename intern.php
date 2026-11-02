<?php



     include("database.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub"])) {

        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword=$_POST["confirmpassword"];


        if (
            trim($username) != "" &&
            trim($email) != "" &&
            trim($password) != ""&&
            trim($confirmpassword) != ""
        ) {
            if($password==$confirmpassword)

                {    $sql = "INSERT INTO users (Username, Email, Password)
                            VALUES ('$username', '$email', '$confirmpassword')";

                    if (mysqli_query($conn, $sql)) {

                        header("Location: login.html");
                        exit;

                    } else {

                        echo "Error: " . mysqli_error($conn);

                    }
                }
            else   {
                echo "Re Entry Your Password and Confirm Password";
                //header("Location: Register.html");
            } 

        } else {

            echo "Please fill in all required fields.";
        }

    } 
    else {

        header("Location: Register.html");
        exit;
    }

?>
