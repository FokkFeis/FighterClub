
<table class="table table-striped">
  <thead>
    <tr>
      <th>Result</th>
      <th>Amount</th>
    </tr>
  </thead>
  <tbody>
    <?php    ?>

    <?php foreach ($getUserStats as $stats){ ?>
      <tr>
        <td><?php
          if ($stats->Won == 1) {
              echo "Won";
          }
          else {
            echo "Lost";
          }?></td>
          <td><?php echo $stats->Amount; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
