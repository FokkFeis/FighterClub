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

  //work in progress
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
      //todo

  }

  public function bet($user_id,$fight_id,$bet_amount,$won_char,$coins_id)
  {
    $sql = "CALL addBet(:user_id,:fight_id,:bet_amount,:won_char,:coins_id)";
    $query = $this->db->prepare($sql);
    $parameters = array(':user_id'=>$user_id,':fight_id'=>$fight_id,':bet_amount'=>$bet_amount,':won_char'=>$won_char,':coins_id'=>$coins_id);
    $query->execute($parameters);

  }

}

?>
