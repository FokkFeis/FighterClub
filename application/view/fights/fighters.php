<div class="container-fluid">
  <p>
    <label for="league">League</label>
    <input type="text" id="league" readonly style="border:0; color:#f6931f; font-weight:bold;">
  </p>
  <div class="col-md-4" id="leagueSlider"></div>
</div>
<hr>
<div class="card-columns" id="fighterCards">
  <?php foreach($fightersWithLeagueID as $fighters) {?>
    <div class="card" data-tags="<?php echo $fighters->LeagueID?>">
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
