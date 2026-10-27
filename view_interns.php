
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
        .add-btn {
            text-align: right;
            margin-bottom: 20px;
        }

        .add-btn button {
            background-color: #2878c8;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .add-btn button:hover {
            background-color: #1d5d9b;
        }
        .update-btn {
            background-color: green;
            color: white;
            padding: 4px 8px;
            text-decoration: none;
            border-radius: 2px;
        }

        .delete-btn {
              background-color: red;
              color: white;
              padding: 4px px;
              text-decoration: none;
              border-radius: 2px;
        }
    </style>
</head>
<body>

    <h2>All Intern Information</h2>
    <div class="add-btn">
        <form action="intern_info.html">
            <button type="submit">
                Add Intern Information
            </button>
        </form>
    </div>

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
                      <a class='update-btn' href='update_intern.php?id=" . (int)$r["intern_id"] . "'<tab>
                          Update
                      </a>
                      &nbsp

                      <form action='delete_intern.php' method='POST' style='display:inline;'class='update-btn'>
                          <input type='hidden' name='intern_id' value='" . (int)$r["intern_id"] . "'>
                          <button type='submit' name='Delete' value='1'>
                              Delete
                          </button>
                      </form>
                  </td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>
</html>
