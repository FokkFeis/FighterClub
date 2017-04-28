<?php ?>
<div class="row">
  <div class="col-md-2">
    <ul class="nav" role="menu">
      <h2> Account overview </h2>
      <?php
        if(isset($_SESSION['username']))
        {
          foreach ($data as $key) {
            echo "<h3>" . $key->Username . "<br></h3>";
            echo "<h3>Coins: " . $key->Coins . "<br></h3>";
          }
        }
        else{
          echo "You are not logged in!";
          echo "";
        }
      ?>
    </ul>
  </div>
