<?php
session_start();
if (!isset($_SESSION["UserID"])) {
    header("Location: login.php");
    exit();
}
require_once("connection.php");
$userID = $_SESSION["UserID"];
$sql = "SELECT * FROM Users WHERE UserID = '$userID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row["Username"];
    $email = $row["Email"];
} else {
    header("Location: index.php");
    exit();
}

// Handle form submission to update profile
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_profile"])) {
    $newUsername = $_POST["new_username"];
    $newEmail = $_POST["new_email"];
    $newPassword = $_POST["new_password"];

    $updateSql = "UPDATE Users SET Username = '$newUsername', Email = '$newEmail', Password = '$newPassword' WHERE UserID = '$userID'";

    if ($conn->query($updateSql) === TRUE) {
        // Update successful, refresh the page to display the updated profile
        header("Location: index.php");
        exit();
    } else {
        // Error updating profile, handle as needed (e.g., display error message)
        $updateError = "Error updating profile: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to Your Profile</h1>
        <p>Here are your details:</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="new_username">Username:</label>
                <input type="text" class="form-control" id="new_username" name="new_username" value="<?php echo $username; ?>" required>
            </div>
            <div class="form-group">
                <label for="new_email">Email Address:</label>
                <input type="email" class="form-control" id="new_email" name="new_email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>
            <?php if(isset($updateError)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $updateError; ?>
                </div>
            <?php } ?>
            <button type="submit" class="btn btn-primary" name="update_profile">Update Profile</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
