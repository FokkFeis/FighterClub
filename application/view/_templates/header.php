
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fighter Club</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo URL; ?>css/master.css" rel="stylesheet">
    <!-- Bootstrap 4 cdn-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"></head>
<body>
<div class="container">
    <!-- navigation -->
    <div class="row">
      <div class="col-md-2"><img src="//placehold.it/150x150"></div> <!-- user picture -->
      <div class="col-md-10">
        <div class="navbar navbar-inverse">
            <div class="navbar-header"><a class="navbar-brand" href="<?php echo URL ; ?>">Fighters Club</a></div>
            <ul class="nav navbar-nav">
             <li><a href="<?php echo URL ; ?>fights/">Information Center</a></li>
             <?php if(!isset($_SESSION['username'])){
               ?><li><a href="<?php echo URL ; ?>login/">Login</a></li><?php
             } else{
               ?><li><a href="<?php echo URL ; ?>home/account">My Account</a></li><?php
             }?>


            </ul>
        </div>
      </div>
    </div>
