<?php
include("database.php");


if (isset($_POST["update"])) {

    $id = (int) $_POST["intern_id"];
    $username = $_POST["full_name"];
    $email=$_POST["email"];
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
                email='$email',
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Intern - Intern Management System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-section-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--slate-900);
            margin-bottom: 16px;
            padding-bottom: 8px;
            border-bottom: 1px solid var(--slate-100);
        }

        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--slate-100);
        }

        textarea.form-control {
            min-height: 80px;
            resize: vertical;
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
        <div class="page-header" style="max-width: 760px; margin: 0 auto 24px auto;">
            <div>
                <h1 class="page-title">Update Intern Information</h1>
                <p class="page-subtitle">Modify details and status for record #<?php echo (int)$r['intern_id']; ?>.</p>
            </div>
            <div>
                <a href="view_interns.php" class="btn btn-secondary btn-sm">
                    &larr; Back to Directory
                </a>
            </div>
        </div>

        <div class="form-card">
            <form method="POST" action="update_intern.php?id=<?php echo $id; ?>">

                <input type="hidden" name="intern_id" value="<?php echo $r['intern_id']; ?>">

                <div class="form-section-title">Personal Information</div>

                <div class="form-grid">
                    <div class="form-group col-span-2">
                        <label for="full_name">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo htmlspecialchars($r['full_name']); ?>" required>
                    </div>
                    <div class="form-group col-span-2">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="e.g. simple@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" value="<?php echo $r['date_of_birth']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value="Male" <?php if ($r['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($r['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Other" <?php if ($r['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($r['phone']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" required><?php echo htmlspecialchars($r['address']); ?></textarea>
                    </div>
                </div>

                <div class="form-section-title" style="margin-top: 16px;">Academic & Internship Details</div>

                <div class="form-grid">
                    <div class="form-group col-span-2">
                        <label for="university">University / Institution</label>
                        <input type="text" id="university" name="university" class="form-control" value="<?php echo htmlspecialchars($r['university']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo $r['start_date']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo $r['end_date']; ?>" required>
                    </div>

                    <div class="form-group col-span-2">
                        <label for="status">Internship Status</label>
                        <input type="text" id="status" name="status" class="form-control" value="<?php echo htmlspecialchars($r['status']); ?>" required>
                    </div>
                </div>

                <div class="form-actions">
                    <a href="view_interns.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="update" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>

            </form>
        </div>
    </main>

</body>
</html>
