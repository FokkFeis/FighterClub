
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fighter Club</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->
    <link href="<?php echo URL; ?>css/master.css" rel="stylesheet">
    <!-- CSS <link href="<?php # echo URL; ?>css/style.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <!-- logo, check the CSS file for more info how the logo "image" is shown -->
    <!-- <div class="logo"></div> -->
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
