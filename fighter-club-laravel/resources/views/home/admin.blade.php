@include('header')
<div class="btn-group btn-group-justified" role="group">
  <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary" id="allUsersButton">Show all users</button>
  </div>
  <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary" id="allBetsButton">Show all bets</button>
  </div>
  <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary" id="addFighterButton">Add fighters</button>
  </div>
  <div class="btn-group" role="group">
      <button type="button" class="btn btn-secondary" id="makeAdminButton">Make admin</button>
  </div>
</div>
<hr>
<div class = "col-md-10" id="displayBox"><div>
@include('footer')