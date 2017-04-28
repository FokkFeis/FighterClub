<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fighter Club</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 4 cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/css/tether.min.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/master.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <a class="navbar-brand" href="<?php echo URL ; ?>">Fighters Club</a>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL ; ?>">Home</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Information Center</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo URL ; ?>fights/fighters">Fighters</a>
                    <a class="dropdown-item" href="<?php echo URL ; ?>fights/leaderboards">Leaderboards</a>
                    <a class="dropdown-item" href="<?php echo URL ; ?>fights/arena">Arena</a>
                  </div>
                </li>

                <?php if(!isset($_SESSION['username'])){?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL ; ?>login/">Login</a>
                </li>
                <?php } else{ ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL ; ?>home/account">My Account</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
          <div class="row">
            <div class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
              <div class="card">
                <img class="card-img-top" src="http://placehold.it/350x150" alt="User image">
                <div class="card-block">
                  <h4 class="card-title">Account overview</h4>
                  <ul class="list-group list-group-flush">
                    <?php if(isset($_SESSION['username'])){
                        foreach ($data as $key) {
                          ?>
                          <li class="list-group-item"><?php echo $key->Username ?></li>
                          <li class="list-group-item">Coins: <?php echo $key->Coins ?></li>
                        <?php }
                      } else{ ?>
                        <li class="list-group-item">Please login to see your info</li>
                        <a class="btn btn-primary" href="<?php echo URL ; ?>login/">Login</a>
                  <?php } ?>
                </div>
              </div>
            </div>
            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
