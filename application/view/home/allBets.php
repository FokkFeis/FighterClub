<div class="col-md-10">
  <h1>All bets</h1>
  <table class = "table table-striped ">
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Amount</th>
      <th>Result</th>
      <?php foreach ($bets as $bet){            ?>
      <?php echo "<tr>";                                    ?>
      <?php echo "<td>" . $bet->ID . "</td>"; ?>
      <?php echo "<td>" . $bet->Username . "</td>"; ?>
      <?php echo "<td>" . $bet->Email    . "</td>"; ?>
      <?php echo "<td>" . $bet->Amount       . "</td>"; ?>
      <?php echo "<td>" . $bet->Won       . "</td>"; ?>
      <?php }
      echo "</tr>";
       ?>

  </table>
</div>
</div> <!-- end of sidebar -->
