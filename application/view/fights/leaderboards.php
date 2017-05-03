<table class="table table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Strength</th>
      <th>Wins</th>
      <th>League</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allFighters as $fighters){ ?>
      <tr>
        <td><?php echo $fighters->FighterName; ?></td>
        <td><?php echo $fighters->strength; ?></td>
        <td><?php echo $fighters->wins; ?></td>
        <td><?php echo $fighters->League; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
