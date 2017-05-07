<?php
namespace Mini\Controller;

use Mini\Model\Fights;
use Mini\Model\Home;

class FightsController
{
  public function index()
  {
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
    }
    require APP . 'view/_templates/header.php';
    require APP . 'view/fights/index.php';
    require APP . 'view/_templates/footer.php';
  }

  public function leaderboards()
  {
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
    }
    $fighter = new Fights();
    $allFighters = $fighter->getTop10Fighters();
    require APP . 'view/_templates/header.php';
    require APP . 'view/fights/leaderboards.php';
    require APP . 'view/_templates/footer.php';
  }

  public function fighters()
  {
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
    }
    $fighter = new Fights();
    $allFighters = $fighter->getAllFighters();
    $fightersWithLeagueID = $fighter->getFighterAndLeagueID();
    require APP . 'view/_templates/header.php';
    require APP . 'view/fights/fighters.php';
    require APP . 'view/_templates/footer.php';
  }

  public function arena()
  {
    if(isset($_POST['fighterResult'])){
      require APP . '/view/fights/results.php';
    }


    $fighter = new Fights();
    $allFighters = $fighter->getAllFighters();
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
    }
    require APP . 'view/_templates/header.php';
    require APP . '/view/fights/arena.php';
    require APP . '/view/_templates/footer.php';
  }
  public function newFighter()
  {
    $fighter = new Fights();
    if(isset($_POST['newFighter']))
    {
      $fighter->newFighter($_POST['newFighter']);
      header('Location: ' . URL . 'fights/fighters');
    }
    else{
      header('Location: ' . URL . 'home/admin');
    }
  }

  public function fight()
  {
  $fighter = new Fights();
  $fighters = $fighter->getAllFighters();
  require APP . '/view/fights/fight.php';
  }

  public function ajaxGetFighter()
  {
    if(isset($_GET['fighterName'])){
      $fighter = new Fights();
      $name = htmlspecialchars($_GET['fighterName']);
      $selectedFighter = $fighter->getFighter($name);
      $jsonFighter = json_encode($selectedFighter);
      echo $jsonFighter;
    }
  }

  public function results()
  {
    $fighter1ID = htmlspecialchars($_POST['fighter1ID']);
    $fighter2ID = htmlspecialchars($_POST['fighter2ID']);
    $fighterResult = htmlspecialchars($_POST['fighterResult']);
    $user_betOn = htmlspecialchars($_POST['user_betOn']);
    $user_bet = htmlspecialchars($_POST['user_bet']);
    $user_won = htmlspecialchars($_POST['user_won']);
    $user_id = htmlspecialchars($_SESSION['ID']);

      $fights = new Fights();
      $fights->ajaxAddFight($fighter1ID,$fighter2ID,$fighterResult);
      $lastfightID = $fights->getLastFightID();
      $fights->bet((int)$_SESSION['ID'], (int)$lastfightID->ID, (int)$user_bet, (int)$user_won, (int)$_SESSION['CoinID']);
    var_dump($user_won);
    print_r((int)$lastfightID->ID);
    echo $lastfightID[0];
  }
}

 ?>
