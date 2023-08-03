<div class="container mt-4">
    <h3>Answer List</h3>
    <table class="table table-bordered">
      <thead>
        <tr> 
          <th>SN</th>
          <th>Question</th>
          <th>Asked By</th>
          <th>Answered By</th>
          <th>Date Answered</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $t->getAllAnswers();
        ?>
        <!-- Add more user rows here -->
      </tbody>
    </table>
  </div>