
<table class="table table-striped">
  <thead>
    <tr>
      <th>Amount</th>
      <th>Win</th>
    </tr>
  </thead>
  <tbody>
    <?php    ?>

    <?php foreach ($getUserStats as $stats){ ?>
      <tr>
        <td><?php echo $stats->Amount; ?></td>
        <td><?php echo $stats->Won; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
