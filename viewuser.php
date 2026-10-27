
<?php
include("database.php");

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Interns</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #c4c9c3;
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #5b6b5b;
            color: white;
        }
    </style>
</head>
<body>

<h2>All Users Information</h2>

<table>
    <tr>
        <th>ID</th>
        <th>UserName</th>
        <th>Email</th>
        


    </tr>

    <?php
    while ($r = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $r["user_id"] . "</td>";
        echo "<td>" . $r["Username"] . "</td>";
        echo "<td>" . $r["Email"] . "</td>";
        echo "<td>
                <a class='update-btn' href='update_user.php?id=" . $r["user_id"] . "'>
                    Update
                </a>
              </td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>
