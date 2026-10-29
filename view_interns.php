<?php
include("database.php");

$sql = "SELECT * FROM interns";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Interns - Intern Management System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .table-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .search-box {
            position: relative;
            max-width: 320px;
            width: 100%;
        }

        .search-box input {
            padding-left: 36px;
        }

        .search-box svg {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: var(--slate-400);
            pointer-events: none;
        }

        .action-cell {
            white-space: nowrap;
        }

        .btn-update {
            background-color: var(--primary-light);
            color: var(--primary);
            border: 1px solid #bfdbfe;
        }

        .btn-update:hover {
            background-color: var(--primary);
            color: #ffffff;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--slate-500);
        }
    </style>
</head>
<body>

    <!-- Navigation Header -->
    <header class="app-nav">
        <div class="nav-container">
            <a href="logi.html" class="nav-brand">
                <span class="brand-badge" style="width: 36px; height: 36px; margin: 0; border-radius: 8px;">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 20px; height: 20px;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </span>
                <span>Intern Management System</span>
            </a>
            <nav class="nav-links">
                <a href="logi.html" class="nav-link">Dashboard</a>
                <a href="view_interns.php" class="nav-link active">Interns</a>
                <a href="viewuser.php" class="nav-link">Users</a>
                <a href="login.html" class="btn btn-secondary btn-sm" style="margin-left: 12px;">Sign Out</a>
            </nav>
        </div>
    </header>

    <main class="app-container">

        <!-- Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Intern Directory</h1>
               
            </div>
            <div>
                <form action="intern_info.html" style="margin: 0; display: inline;">
                    <button type="submit" class="btn btn-primary">
                        + Add Intern Information
                    </button>
                </form>
            </div>
        </div>

        

        <!-- Data Table Card -->
        <div class="table-card">
            <div class="table-responsive">
                <table class="data-table" id="internsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>University</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($r = mysqli_fetch_assoc($result)) {
                                $statusClass = (strcasecmp(trim($r["status"]), 'active') === 0) ? 'badge-active' : 'badge-inactive';
                                echo "<tr>";
                                echo "<td>#" . htmlspecialchars($r["intern_id"]) . "</td>";
                                echo "<td style='font-weight: 600; color: var(--slate-900);'>" . htmlspecialchars($r["full_name"]) . "</td>";
                                echo "<td>" . htmlspecialchars($r["email"]) . "</td>";
                                echo "<td>" . htmlspecialchars($r["date_of_birth"]) . "</td>";
                                echo "<td>" . htmlspecialchars($r["gender"]) . "</td>";
                                echo "<td>" . htmlspecialchars($r["phone"]) . "</td>";
                                echo "<td>" . htmlspecialchars($r["address"]) . "</td>";
                                echo "<td>" . htmlspecialchars($r["university"]) . "</td>";
                                echo "<td>" . htmlspecialchars($r["start_date"]) . "</td>";
                                echo "<td>" . htmlspecialchars($r["end_date"]) . "</td>";
                                echo "<td><span class='badge " . $statusClass . "'>" . htmlspecialchars($r["status"]) . "</span></td>";
                                echo "<td class='action-cell'>
                                        <div class='action-group'>
                                            <a class='btn btn-sm btn-update' href='update_intern.php?id=" . (int)$r["intern_id"] . "'>
                                                Update
                                            </a>
                                            <form action='delete_intern.php' method='POST' style='display:inline;'>
                                                <input type='hidden' name='intern_id' value='" . (int)$r["intern_id"] . "'>
                                                <button type='submit' name='Delete' value='1' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this intern record?');\">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='11' class='empty-state'>No intern records found. Click '+ Add Intern Information' to create one.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- Client-side Instant Filter -->
    
</body>
</html>
