
<?php
include("database.php");

$sql = "SELECT * FROM interns";
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

<h2>All Intern Information</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Date Of Birth</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Address</th>
        <th>University</th>
        <th>Start Date</th>
        <th> End Date</th>
        <th>Status</th>


    </tr>

    <?php
    while ($r = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $r["intern_id"] . "</td>";
        echo "<td>" . $r["full_name"] . "</td>";
        echo "<td>" . $r["date_of_birth"] . "</td>";
        echo "<td>" . $r["gender"] . "</td>";
        echo "<td>" . $r["phone"] . "</td>";
        echo "<td>" . $r["address"] . "</td>";
        echo "<td>" . $r["university"] . "</td>";
        echo "<td>" . $r["start_date"] . "</td>";
        echo "<td>" . $r["end_date"] . "</td>";
        echo "<td>" . $r["status"] . "</td>";
         echo "<td>
                <a class='update-btn' href='update_intern.php?id=" . $r["intern_id"] . "'>
                    Update
                </a>
              </td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>
