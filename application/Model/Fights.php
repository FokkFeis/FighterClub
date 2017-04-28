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
}

?>
