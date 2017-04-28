<form method="post" action="#">
    <div class="col-md-10">
        <div class="col-md-3 form-group">
            <select class="form-control" id="select1">
              <?php foreach ($allFighters as $fighters) {
                 echo "<option value=" . $fighters->FighterName .">". $fighters->FighterName . "</option>";}
              ?>
            </select>
            <div class="fighter" id="fighter1"></div>
        </div>
        <div class="col-md-1">
            <span> VS </span>
        </div>
        <div class="col-md-3 form-group">
            <select class="form-control" id="select2">
              <?php
               foreach ($allFighters as $fighters) {
                 echo "<option value =" . $fighters->FighterName .">". $fighters->FighterName . "</option>";}
                 ?>
            </select>
          <div class="fighter" id="fighter2"></div>
        </div>
    </div>
    <input type="submit" value="Fight!" />
</form>
