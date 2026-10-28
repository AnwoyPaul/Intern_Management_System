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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User - Intern Management System</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--slate-100);
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
                <a href="view_interns.php" class="nav-link">Interns</a>
                <a href="viewuser.php" class="nav-link active">Users</a>
                <a href="login.html" class="btn btn-secondary btn-sm" style="margin-left: 12px;">Sign Out</a>
            </nav>
        </div>
    </header>

    <main class="app-container">
        <div class="page-header" style="max-width: 520px; margin: 0 auto 24px auto;">
            <div>
                <h1 class="page-title">Update User</h1>
                <p class="page-subtitle">Modify credentials for user #<?php echo (int)$r['user_id']; ?>.</p>
            </div>
            <div>
                <a href="viewuser.php" class="btn btn-secondary btn-sm">
                    &larr; Back to Users
                </a>
            </div>
        </div>

        <div class="auth-card" style="max-width: 520px; margin: 0 auto; box-shadow: var(--shadow-lg);">
            <form method="POST" action="update_user.php?id=<?php echo $id; ?>">

                <input type="hidden" name="user_id" value="<?php echo $r['user_id']; ?>">

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control"
                           value="<?php echo htmlspecialchars($r['Username'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Work Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                           value="<?php echo htmlspecialchars($r['Email'], ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="form-actions">
                    <a href="viewuser.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="update" class="btn btn-primary">
                        Save Changes
                    </button>
                </div>

            </form>
        </div>
    </main>

</body>
</html>
