<?php



   include("database.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub"])) {

      
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (
           
            trim($email) != "" &&
            trim($password) != ""
        ) {

            $sql = "SELECT * FROM Users WHERE Email= '$email'";
            $result = mysqli_query($conn, $sql);
            if($u=mysqli_fetch_assoc($result))
              {
                if($password == $u["Password"])
                  {
                    $_SESSION["user_id"]=$u["user_id"];
                    header("Location: dashboard.html");
                    exit;
                  }
                else
                  {
                    echo "Invalid Password";
                  }

              }
            else
              {
                echo "Email Not Found";

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