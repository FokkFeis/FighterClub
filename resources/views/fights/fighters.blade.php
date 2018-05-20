@include('header')
<div class="container-fluid">
    <p>
      <!-- Javascript isn't loading correclt --> 
      <label for="league">League</label>
      <input type="text" id="league" readonly style="border:0; color:#f6931f; font-weight:bold;">
    </p>
    <div class="col-md-4" id="leagueSlider"></div>
  </div>
  <hr>
  <div class="card-columns" id="fighterCards">
    @foreach ($fighters as $fighter)
      <div class="card" data-tags="{{ $fighter->LeagueID}}">
        <div class = "card-block">
          <h5 class="card-title">{{ $fighter->FighterName }}</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Strength:{{ $fighter->strength }} </li>
            <li class="list-group-item">Wins: {{ $fighter->wins }}</li>
            <li class="list-group-item">League: {{ $fighter->League }}</li>
          </ul>
        </div>
      </div>
      @endforeach
  </div>

@include('footer')