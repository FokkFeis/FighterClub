<div class="col-md-10">
  <h1>All Users</h1>
  <table class = "table table-striped ">
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Coins</th>
      <?php foreach ($users as $user){            ?>
      <?php echo "<tr>";                                    ?>
      <?php echo "<td>" . $user->ID . "</td>"; ?>
      <?php echo "<td>" . $user->Username . "</td>"; ?>
      <?php echo "<td>" . $user->Email    . "</td>"; ?>
      <?php echo "<td>" . $user->Coins        . "</td>"; ?>
      <?php }
      echo "</tr>";
       ?>

  </table>
</div>
</div> <!-- end of sidebar -->
