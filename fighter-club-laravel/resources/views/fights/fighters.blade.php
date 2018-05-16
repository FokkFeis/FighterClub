@include('header')
<div class="container-fluid">
    <p>
      <!-- need to loop leagues -->
      <label for="league">League</label>
      <input type="text" id="league" readonly style="border:0; color:#f6931f; font-weight:bold;">
    </p>
    <div class="col-md-4" id="leagueSlider"></div>
  </div>
  <hr>
  <div class="card-columns" id="fighterCards">
    <!-- need to loop to get fighters -->
      <div class="card" data-tags="">
        <div class = "card-block">
          <h5 class="card-title"></h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Strength:</li>
            <li class="list-group-item">Wins: </li>
            <li class="list-group-item">League: </li>
          </ul>
        </div>
      </div>
  </div>
@include('footer')