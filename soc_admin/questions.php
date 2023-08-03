<div class="container mt-4">
    <h3>Question List</h3>
    <table class="table table-bordered">
      <thead>
        <tr> 
          <th>SN</th>
          <th>Title</th>
          <th>Asked By</th>
          <th>Answers</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $t->getAllQuestions();
        ?>
        <!-- Add more user rows here -->
      </tbody>
    </table>
  </div>