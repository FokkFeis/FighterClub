<div class = "col-md-10">
<?php foreach($allFighters as $fighters) {?>
  <div class="col-md-3">
    <div class = "fighter">
      <p>Name: <?php echo $fighters->FighterName ?></p>
      <p>Strength: <?php echo $fighters->strength ?></p>
      <p>Wins: <?php echo $fighters->wins ?></p>
      <p>League: <?php echo $fighters->League?></p>
      <br>
    </div>
  </div>
  <?php } ?>
 </div>
</div> <!-- end of sidebar -->
