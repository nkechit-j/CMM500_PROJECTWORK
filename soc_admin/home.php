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
    fetch('../api/question/metric.php')
            .then(response => response.json())
            .then(data => {
                const months_q = data.msg.question.map(item => item.month);
                const counts_q = data.msg.question.map(item => parseInt(item.qty));

                const months_a = data.msg.answer.map(item => item.month);
                const counts_a = data.msg.answer.map(item => parseInt(item.qty));


                console.log(months_q, counts_q);
                console.log(months_a, counts_a);

                const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                const result = labels.map(label => { let index =   months_q.indexOf(label) ;  return index !== -1 ? counts_q[index] : 0 });
                console.log(result);

                // Configuration for counts of questions and answers for eac month on the line graph
                  var data = {
                    labels: labels,
                    datasets: [
                      {
                        label: 'Questions',
                        data: labels.map(label => { let index =   months_q.indexOf(label) ;  return index !== -1 ? counts_q[index] : 0 }),
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        tension: 0.4
                      },
                      {
                        label: 'Answers',
                        data: labels.map(label => { let index =   months_a.indexOf(label) ;  return index !== -1 ? counts_a[index] : 0 }),
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

                  // Create the line graph(visualisation)
                  var lineChart = new Chart(document.getElementById('lineChart'), {
                    type: 'line',
                    data: data,
                    options: options
                  });
 
         }).catch(error => {
                console.error('Error fetching data:', error);
        });

  </script>