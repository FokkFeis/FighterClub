
<div class="card-columns">
  <?php foreach($allFighters as $fighters) {?>
    <div class="card">
      <div class = "card-block">
        <h5 class="card-title"><?php echo $fighters->FighterName ?></h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Strength: <?php echo $fighters->strength ?></li>
          <li class="list-group-item">Wins: <?php echo $fighters->wins ?></li>
          <li class="list-group-item">League: <?php echo $fighters->League?></li>
        </ul>
      </div>
    </div>
    <?php } ?>
</div>
