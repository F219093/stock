<?php
// Check if email is provided
if(isset($_GET['email']) && !empty($_GET['email'])) {
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'stocksystem');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare and execute SQL query to update staff member
        $stmt = $conn->prepare("UPDATE user SET name = ?, email = ?, password = ? WHERE email = ?");
        $stmt->bind_param("ssss", $_POST['name'], $_POST['email'], $_POST['password'], $_GET['email']);
        $stmt->execute();
        
        // Close statement and database connection
        $stmt->close();
        $conn->close();
        
        // Redirect back to staff management page after editing
        header("Location: staff.php");
        exit();
    }
} else {
    echo "Invalid email provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff Member</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Staff Member</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
