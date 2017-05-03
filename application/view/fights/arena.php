<div class="card-deck">
  <div class="card">
    <div class = "card-block">
      <select class="form-control card-title" id="select1">
        <?php foreach ($allFighters as $fighters) {
          echo "<option value=" . $fighters->FighterName .">". $fighters->FighterName . "</option>";}
          ?>
      </select>
      <ul class="list-group list-group-flush" id="fighter1"></ul>
    </div>
  </div>

  <div class="card">
      <p class="card-text display-1 text-center">VS</p>
  </div>

  <div class="card">
    <div class = "card-block">
      <select class="form-control card-title" id="select2">
        <?php foreach ($allFighters as $fighters) {
          echo "<option value=" . $fighters->FighterName .">". $fighters->FighterName . "</option>";}
          ?>
      </select>
      <ul class="list-group list-group-flush" id="fighter2"></ul>
    </div>
  </div>
</div>
<input type="submit" value="Fight!" />
