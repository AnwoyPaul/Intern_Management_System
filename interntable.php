<?php

    include("database.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub"])) {

        $username = $_POST["username"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $university = $_POST["university"];
        $end_date = $_POST["end_date"];
        $status = $_POST["status"];

        if (
            trim($username) != "" &&
            trim($dob) != "" &&
            trim($gender) != "" &&
            trim($phone) != "" &&
            trim($address) != "" &&
            trim($university) != "" &&
            trim($end_date) != "" &&
            trim($status) != ""
        ) {

            $sql = "INSERT INTO interns
                    (full_name, date_of_birth, gender, phone, address,
                     university, start_date, end_date, status)

                    VALUES
                    ('$username', '$dob', '$gender', '$phone',
                     '$address', '$university', CURDATE(),
                     '$end_date', '$status')";

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