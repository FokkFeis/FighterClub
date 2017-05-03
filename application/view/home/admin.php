<?php
# make some user info stuff here
# logout button needs to be added
# in the nav for admin functions we need the  onClick="return false;" so that the page doesn't reload or go to top.
if(!isset($_SESSION['username']) && $_SESSION['isAdmin'] != '1')
{
  header('Location: ' . URL . 'login');
}
  $userEnc = json_encode($data, true);
  $userDec = json_decode($userEnc, true);
?>
<nav class="navbar">
  <ul class="nav nav-pills nav-justified">
    <li class="nav-item">
      <a class="nav-link" href="#" id="allUsersButton" onClick="return false;">Show all users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="" id="allBetsButton" onClick="return false;">Show all Bets</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="" id="addFighterButton" onClick="return false;">Add fighter</a>
    </li>
  </ul>
</nav>

<div class = "col-md-10" id="displayBox"><div>
