
<?php

// Step 1: Check whether the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Step 2: Receive the values from the form
    $username = $_POST["username"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";

    // Step 3: Check whether all fields contain values
    if (
        trim($username) != "" &&
        trim($email) != "" &&
        trim($password) != ""
    ) {

        // Step 4: Go to the next page
        header("Location: logi.html");
        exit;

    } else {

        // Step 5: Display an error message
        echo "Please fill in all required fields.";

    }

} else {

    // If someone opens intern.php without submitting the form
    header("Location: index.html");
    exit;

}

?>
