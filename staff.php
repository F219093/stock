<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Management - Stock System</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

  <!-- Navigation Bar -->
  <!-- Include your navigation bar here -->

  <!-- Page Content -->
  <div class="container mt-5">
    <h2>Staff Management</h2>
    <div class="row">
      <!-- Add New Staff Form -->
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            Add New Staff
          </div>
          <div class="card-body">
            <form action="add_staff.php" method="POST">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add Staff</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Show Old Staff -->
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            Existing Staff
          </div>
          <div class="card-body">
            <ul class="list-group">
              <?php
              // Connect to the database
              $conn = new mysqli('localhost', 'root', '', 'stocksystem');
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              // Fetch existing staff members
              $sql = "SELECT * FROM user";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<li class='list-group-item'>" . $row['name'] . " - " . $row['email'] . "
                  <div class='btn-group' role='group'>
                  <a href='edit_staff.php?email=" . $row['email'] . "' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>
                  <a href='delete_staff.php?email=" . $row['email'] . "' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i> Delete</a>
                  </div>
                        </li>";
                }
              } else {
                echo "<li class='list-group-item'>No staff members found.</li>";
              }
              $conn->close();
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <!-- Include Bootstrap JS and dependencies here -->

</body>
</html>
