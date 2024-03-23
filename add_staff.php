<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'stocksystem');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute SQL INSERT statement
    $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);
    if ($stmt->execute()) {
        echo "Staff member added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
    
    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
