<div class="col-md-10">
  <h1> Fighter Leaderboard</h1>
  <table class = "table table-striped ">
    <tr>
      <th>Name</th>
      <th>Strength</th>
      <th>Wins</th>
      <th>League</th>
      <?php foreach ($allFighters as $fighters){            ?>
      <?php echo "<tr>";                                    ?>
      <?php echo "<td>" . $fighters->FighterName . "</td>"; ?>
      <?php echo "<td>" . $fighters->strength    . "</td>"; ?>
      <?php echo "<td>" . $fighters->wins        . "</td>"; ?>
      <?php echo "<td>" . $fighters->League      . "</td>"; ?>
      <?php }
      echo "</tr>";
       ?>

  </table>
</div>
</div> <!-- end of sidebar -->
