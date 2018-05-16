@include('header')

<div class="card-deck">
    <div class="card">
      <div class = "card-block">
        <select class="form-control card-title custom-select" id="select1">
          <!-- We need to add fighters -->
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
          <!-- We need to add fighters -->
        </select>
        <ul class="list-group list-group-flush" id="fighter2"></ul>
      </div>
    </div>
  </div>
  <hr>
  <div class="container-fluid">
    <div class="form-inline">
      <select class="custom-select" id="selBetFighter"></select>
      <input type="text" name="amountToBet" class="form-control" id="amountToBet" placeholder="Amount to bet">
          <!-- Button trigger modal -->
      <button type="button" class="btn btn-success" id="confirmBetButton" data-toggle="modal" data-target="#fightModal" onclick="$('#fightBox,#resultBox').html('')">Confirm bet</button>
    </div>
  <!-- Modal -->
  <div class="modal fade" id="fightModal" tabindex="-1" role="dialog" aria-labelledby="fightModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="currentBets"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.getElementById('amountToBet').value = ''">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card-deck" id="fightBox"></div>
          <div class = "col-md-12" id="resultBox"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" onclick="document.getElementById('amountToBet').value = ''">Close</button>
          <button class="btn btn-outline-danger btn-lg" id="fightButton" value="Fight!">Fight</button>
        </div>
      </div>
    </div>
  </div>
@include('footer')