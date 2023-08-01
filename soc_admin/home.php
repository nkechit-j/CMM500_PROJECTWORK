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