<?php  

  session_start(); 
  require_once('../api/db.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BrainShare Admin</title>
<!--  Inclue the boostrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></head>

<!-- Include Bootstrap Icon CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<!-- custom CSS -->
<link rel="stylesheet" href="../assets/css/main.css" />

<link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
<body>

<div class="">
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="/"> <img src="../assets/img/logo.png" alt="logo" height="50px" width="180px" /> </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="?pg=profile">Profile</a></li> 
              <li><a class="dropdown-item" href="?pg=logout">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <div class="row">
      <!-- Left Navigation Bar -->
      <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
        <div class="position-sticky inner_siderbar mt-4">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="?pg=home"> <i class="bi bi-house"></i> Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?pg=users"> <i class="bi bi-people"></i> Users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?pg=questions"> <i class="bi bi-patch-question"></i> Questions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?pg=answers"> <i class="bi bi-lightbulb"></i> Answers</a>
            </li>
            <!-- Add more navigation items here -->
          </ul>
        </div>
      </nav>

       <!-- Main Content Area -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Add your main content here -->
        <?php

            //check to ensure the Admin is Logged in
            if(!isset($_SESSION['_SOC_ADMIN_USER__'])){ 
                // Redirect user to login page
                header("location:login.php");

            }else{
                if(isset($_GET['pg']) && !empty($_GET['pg']) ){
                    $part = trim($_GET['pg']);
                    $realPart = $part.".php";
                    if(file_exists($realPart)){
                        require_once($realPart);
                    }else{
                        require_once('home.php');
                    }
                }else{
                    require_once('home.php');
                }
            }

        ?>
             
      </main>
    </div>
  </div>
  </div>
 


<!-- Link Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // Sample data for line graph
  var data = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [
      {
        label: 'Questions',
        data: [50, 65, 80, 100, 85, 70, 60, 75, 90, 110, 95, 70],
        borderColor: 'rgba(255, 99, 132, 1)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        tension: 0.4
      },
      {
        label: 'Answers',
        data: [30, 45, 60, 10, 70, 55, 50, 65, 35, 90, 80, 105],
        borderColor: 'rgba(54, 162, 235, 1)',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        tension: 0.4
      }
    ]
  };

  // Chart options
  var options = {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Key'
      }
    },
    scales: {
      x: {
        beginAtZero: true,
        grid: {
          display: true
        }
      },
      y: {
        beginAtZero: true,
        grid: {
          display: true
        }
      }
    }
  };

  // Create the line chart
  var lineChart = new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: data,
    options: options
  });
</script>

</body>

</html>