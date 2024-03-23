<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stock Management System Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.png" alt="Logo" style="height: 30px; width: 30px;"> <!-- Replace path_to_your_logo.png with the actual path to your logo -->
      
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="staff.php">Staff</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Stock</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sales</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Graphs</a>
        </li>
        <!-- Add more navigation items as needed -->
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container-fluid mt-3">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active">Overview</a>
          <a href="#" class="list-group-item list-group-item-action">Staff</a>
          <a href="#" class="list-group-item list-group-item-action">Stock</a>
          <a href="#" class="list-group-item list-group-item-action">Sales</a>
          <a href="#" class="list-group-item list-group-item-action">Graphs</a>
          <!-- Add more sidebar items as needed -->
        </div>
      </div>
      <!-- Main Content -->
<div class="col-md-9">
  <h2>Dashboard</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="card text-white bg-primary mb-3">
        <div class="card-header">Total Stock</div>
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-box"></i> 500</h5> <!-- Example: Replace 500 with actual total stock -->
          <p class="card-text">View Details <i class="fas fa-arrow-circle-right"></i></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-success mb-3">
        <div class="card-header">Total Sales</div>
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-chart-line"></i> $10,000</h5> <!-- Example: Replace $10,000 with actual total sales -->
          <p class="card-text">View Details <i class="fas fa-arrow-circle-right"></i></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-danger mb-3">
        <div class="card-header">Total Loss</div>
        <div class="card-body">
          <h5 class="card-title"><i class="fas fa-exclamation-triangle"></i> $500</h5> <!-- Example: Replace $500 with actual total loss -->
          <p class="card-text">View Details <i class="fas fa-arrow-circle-right"></i></p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Sales Overview</h5>
          <!-- Example chart for sales over time -->
          <canvas id="salesChart" width="400" height="200"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Profit and Loss</h5>
          <!-- Example chart for profit and loss -->
          <canvas id="profitLossChart" width="400" height="200"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>


  <!-- Footer -->
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container text-center">
      <span class="text-muted">© 2024 Stock Management System</span>
    </div>
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Chart.js for charts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Sample data for sales over time chart
    var salesData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'Sales',
        data: [1000, 1500, 2000, 1800, 2500, 3000, 2800],
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    };

    // Sample data for profit and loss chart
    var profitLossData = {
      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
      datasets: [{
        label: 'Profit',
        data: [500, 700, 900, 800, 1200, 1500, 1400],
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }, {
        label: 'Loss',
        data: [200, 300, 400, 300, 500, 600, 550],
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    };

    // Render sales over time chart
    var salesCtx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(salesCtx, {
      type: 'line',
      data: salesData,
      options: {
        s
