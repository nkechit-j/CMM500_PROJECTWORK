<div class="container mt-4">
    <h3>User List</h3>
    <table class="table table-bordered">
      <thead>
        <tr> 
          <th>SN</th>
          <th>Username</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $t->getAll();
        ?>
        <!-- Add more user rows here -->
      </tbody>
    </table>
  </div>