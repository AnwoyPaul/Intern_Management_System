
<?php
include("database.php");

// UPDATE DATA
if (isset($_POST["update"])) {

    $id = (int) $_POST["user_id"];
    $username = $_POST["username"];
    $email = $_POST["email"];

    $sql = "UPDATE users SET
                username = '$username',
                email = '$email'
            WHERE user_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: viewuser.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}


// FETCH EXISTING DATA
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    die("Invalid User ID");
}

$id = (int) $_GET["id"];

$sql = "SELECT * FROM users WHERE user_id = '$id'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$r = mysqli_fetch_assoc($result);

if (!$r) {
    die("User not found");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Users</title>

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

        input, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 16px;
        }

        input {
            background-color: white;
            border: 1px solid #999;
            border-radius: 5px;
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

<form method="POST" action="update_user.php?id=<?php echo $id; ?>">

    <h2>Update User Information</h2>

    <input type="hidden" name="user_id"
           value="<?php echo $r['user_id']; ?>">

    <label>Username:</label>
    <input type="text" name="username"
           value="<?php echo htmlspecialchars($r['Username'], ENT_QUOTES, 'UTF-8'); ?>"
           required>

    <label>Email:</label>
    <input type="email" name="email"
           value="<?php echo htmlspecialchars($r['Email'], ENT_QUOTES, 'UTF-8'); ?>"
           required>

    <button type="submit" name="update">Save Changes</button>

</form>

</body>
</html>
