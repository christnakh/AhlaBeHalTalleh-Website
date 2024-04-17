<?php
// Include the database connection file
require_once("connection.php");

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the registration form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the username is already taken
    $check_username_query = "SELECT * FROM Users WHERE Username = '$username'";
    $result_username = $conn->query($check_username_query);
    if ($result_username->num_rows > 0) {
        $error_message = "Username already exists. Please choose a different username.";
    }

    // Check if the email is already registered
    $check_email_query = "SELECT * FROM Users WHERE Email = '$email'";
    $result_email = $conn->query($check_email_query);
    if ($result_email->num_rows > 0) {
        $error_message = "Email address already registered. Please use a different email.";
    }

    // If username and email are unique, insert user details into the database
    if (!isset($error_message)) {
        $insert_query = "INSERT INTO Users (Username, Email, Password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insert_query) === TRUE) {
            // Registration successful
            $success_message = "Registration successful. You can now login.";
             header("Location: login.php");
            exit();
        } else {
            $error_message = "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">
                        Register
                    </div>
                    <div class="card-body">
                        <?php if(isset($error_message)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <?php if(isset($success_message)) { ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $success_message; ?>
                            </div>
                        <?php } ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                        <div class="mt-3">
                            <p>Already have an account? <a href="login.php">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
