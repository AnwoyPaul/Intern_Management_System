<?php

    include("database.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub"])) {

        $username = $_POST["username"];
        $email=$_POST["email"];
        $dob = $_POST["dob"];
        $gender = $_POST["gender"];
        $phone = $_POST["phone"];
        $Permanantadd = $_POST["Permanantadd"];//parmanent Address
        $presentadd = $_POST["presentadd"];//present Address
        $fathername=$_POST["fathername"];
        $mothername=$_POST["mothername"];
        $university = $_POST["university"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $status = $_POST["status"];

        if (
            trim($username) != "" &&
            trim($email) != "" &&
            trim($dob) != "" &&
            trim($gender) != "" &&
            trim($phone) != "" &&
            trim($Permanantadd) != "" &&
            trim($presentadd) != "" &&
            trim($fathername) != "" &&
            trim($mothername) != "" &&
            trim($university) != "" &&
            trim($start_date) != "" &&
            trim($end_date) != "" &&
            trim($status) != ""
        ) {

            $sql = "INSERT INTO interns
                    (full_name, date_of_birth, gender, phone, permanentadd,presentadd,fathername,mothername,
                     university, start_date, end_date, status,email)

                    VALUES
                    ('$username', '$dob', '$gender', '$phone',
                     '$Permanantadd','$presentadd','$fathername','$mothername', '$university', '$start_date',
                     '$end_date', '$status','$email')";

            if (mysqli_query($conn, $sql)) {

                header("Location:view_interns.php");
                exit;

            } else {

                echo "Error: " . mysqli_error($conn);

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
