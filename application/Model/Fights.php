<?php
namespace Mini\Model;

use Mini\Core\Model;

class Fights extends Model
{
  public function getAllFighters()
  {
    $sql = "SELECT * FROM Allfighters;";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

  public function getTop10Fighters()
  {
    $sql = "SELECT * FROM Allfighters ORDER BY strength DESC LIMIT 10;";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }
  //such long function name much wow
  public function getFighterAndLeagueID()
  {
    //such long sql query much wow
    $sql = "SELECT Allfighters.*, leagues.ID AS LeagueID FROM Allfighters JOIN leagues ON Allfighters.League = leagues.name";
    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();

  }
  public function getFighter($name)
  {
    $sql = "SELECT * FROM Allfighters WHERE FighterName = :name LIMIT 1";
    $query = $this->db->prepare($sql);
    $parameters = array(':name' => $name);
    $query->execute($parameters);
    return $query->fetch();
  }

  public function newFighter($fightername)
  {
    $sql = "CALL addFighter(:name);";
    $query = $this->db->prepare($sql);
    $parameters = array(':name'=>$fightername);
    $query->execute($parameters);
  }

  public function roll($rolls, $sides)
  {
    $num = 0;
    while($rolls--) {
        $num += (floor(mt_rand(1, $sides)) % $sides) + 1;
    }
    return $num;
  }

  public function compare($fighter1, $fighter2)
  {

    if($fighter1 > $fighter2){
      return ($fighter1 / $fighter2);
    }
    else{
      return ($fighter2 / $fighter1);
    }
  }

  public function ajaxAddFight($f1,$f2,$result)
  {
    $sql = "CALL addFight(:fighter1,:fighter2,:result)";
    $query = $this->db->prepare($sql);
    $parameters = array(':fighter1'=>$f1,':fighter2'=>$f2,':result'=>$result);
    $query->execute($parameters);
  }
  public function getLastFightID()
  {
    $sql = "select ID from fights order by ID desc LIMIT 1";
    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetch();
  }

  public function bet($user_id,$fight_id,$bet_amount,$won_char,$coins_id)
  {
    $sql = "CALL addBet(:user_id,:fight_id,:bet_amount,:won_char,:coins_id)";
    $query = $this->db->prepare($sql);
    $parameters = array(':user_id'=>$user_id,':fight_id'=>$fight_id,':bet_amount'=>$bet_amount,':won_char'=>$won_char,':coins_id'=>$coins_id);
    $query->execute($parameters);

  }
  public function updateStrength($mmr, $fighterid)
  {
    $sql ="CALL updateStrength(:strength,:fighterID)";
    $query = $this->db->prepare($sql);
    $parameters = array(':strength'=>$mmr, ':fighterID'=>$fighterid);
    $query->execute($parameters);
  }

  public function updateWins($fighterID)
  {
    $sql = "CALL updateWins(:fighterID)";
    $query = $this->db->prepare($sql);
    $parameters = array(':fighterID'=>$fighterID);
    $query->execute($parameters);
  }

}

?>
