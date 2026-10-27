<?php
include("database.php");

// UPDATE DATA
if (isset($_POST["update"])) {

    $id = (int) $_POST["intern_id"];
    $username = $_POST["full_name"];
    $dob = $_POST["date_of_birth"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $university = $_POST["university"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $status = $_POST["status"];

    $sql = "UPDATE interns SET
                full_name = '$username',
                date_of_birth = '$dob',
                gender = '$gender',
                phone = '$phone',
                address = '$address',
                university = '$university',
                start_date = '$start_date',
                end_date = '$end_date',
                status = '$status'
            WHERE intern_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: view_interns.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


// FETCH EXISTING DATA
$id = (int) $_GET["id"];

$sql = "SELECT * FROM interns WHERE intern_id = '$id'";

$result = mysqli_query($conn, $sql);

$r = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Intern</title>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #c4c9c3;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        form {
            width: 450px;
            max-width: 100%;
            padding: 30px;
            background-color: rgb(210, 205, 224);
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, select, textarea, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 16px;
        }

        input, select, textarea {
            background-color: white;
            border: 1px solid #999;
            border-radius: 5px;
        }

        textarea {
            min-height: 80px;
            resize: vertical;
        }

        button {
            background-color: #2878c8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            margin-bottom: 0;
        }

        button:hover {
            background-color: #1d5d9b;
        }
    </style>
</head>

<body>

<form method="POST" action="update_intern.php?id=<?php echo $id; ?>">

    <h2>Update Intern Information</h2>

    <input type="hidden" name="intern_id"
           value="<?php echo $r['intern_id']; ?>">

    <label>Full Name:</label>
    <input type="text" name="full_name"
           value="<?php echo htmlspecialchars($r['full_name']); ?>" required>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth"
           value="<?php echo $r['date_of_birth']; ?>" required>

    <label>Gender:</label>
    <select name="gender" required>
        <option value="Male" <?php if ($r['gender'] == 'Male') echo 'selected'; ?>>Male</option>
        <option value="Female" <?php if ($r['gender'] == 'Female') echo 'selected'; ?>>Female</option>
        <option value="Other" <?php if ($r['gender'] == 'Other') echo 'selected'; ?>>Other</option>
    </select>

    <label>Phone:</label>
    <input type="text" name="phone"
           value="<?php echo htmlspecialchars($r['phone']); ?>" required>

    <label>Address:</label>
    <textarea name="address" required><?php echo htmlspecialchars($r['address']); ?></textarea>

    <label>University:</label>
    <input type="text" name="university"
           value="<?php echo htmlspecialchars($r['university']); ?>" required>

    <label>Start Date:</label>
    <input type="date" name="start_date"
           value="<?php echo $r['start_date']; ?>" required>

    <label>End Date:</label>
    <input type="date" name="end_date"
           value="<?php echo $r['end_date']; ?>" required>

    <label>Status:</label>
    <input type="text" name="status"
           value="<?php echo htmlspecialchars($r['status']); ?>" required>

    <button type="submit" name="update">Save Changes</button>

</form>

</body>
</html>
