<?php
// Start the session
session_start();

include 'dbconnect.php'; // Include your database connection script
// Check connection

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare a select statement
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

// Execute the statement
$stmt->execute();

// Bind the result to variables
$stmt->bind_result($id, $username, $hashed_password);

// Check if a user was found
if ($stmt->fetch()) {
    // Verify the password
    if (password_verify($password, $hashed_password)) {
        // Password is correct, so start a new session
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;

        // Redirect to the home page
        header("location: home.php");
    } else {
        // Display an error message if the password is not correct
        echo "The password you entered was not valid.";
    }
} else {
    // Display an error message if the username doesn't exist
    echo "No account found with that username.";
}

// Close the statement
$stmt->close();

// Close the connection
$conn->close();
?>
