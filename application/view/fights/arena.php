<div class="card-deck">
  <div class="card">
    <div class = "card-block">
      <select class="form-control card-title custom-select" id="select1">
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
      <select class="form-control card-title custom-select" id="select2">
        <?php foreach ($allFighters as $fighters) {
          echo "<option value=" . $fighters->FighterName .">". $fighters->FighterName . "</option>";}
          ?>
      </select>
      <ul class="list-group list-group-flush" id="fighter2"></ul>
    </div>
  </div>
</div>
<hr>
<div class="container-fluid">
  <form class="form-inline" return false;>
      <select class="custom-select" id="selBetFighter"></select>
      <input type="text" name="amountToBet" class="form-control" id="amountToBet" placeholder="Amount to bet">
      <button class="btn btn-danger" id="fightButton" value="Fight!">Confirm bet</button>
  </form>
</div>

<div class = "col-md-12" id="fightBox"></div>
