<div class="container mt-4">
    <div class="row justify-content-center">
      <!-- Users Metric -->
     
 
      <div class="col-md-4 mb-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Users</h5>
            <h3 class="card-text"> <?=$t->totalUsers() ?></h3>
          </div>
        </div>
      </div>

      <!-- Questions Metric -->
      <div class="col-md-4 mb-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Questions</h5>
            <h3 class="card-text"> <?=$t->totalQuestions() ?></h3>
          </div>
        </div>
      </div>

      <!-- Answers Metric -->
      <div class="col-md-4 mb-4">
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Answers</h5>
            <h3 class="card-text"> <?=$t->totalAnswers() ?></h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  



  <div class="container mt-4 mb-4">
    <h3>User Activity Visualization</h3>
    <div class="row">
      <div class="col card">
        <canvas id="lineChart"></canvas>
      </div>
    </div>
  </div>



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