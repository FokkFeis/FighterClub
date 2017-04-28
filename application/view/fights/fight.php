<h1>Fight</h1>
<?php
  $fighter1;
  $fighter2;
  foreach ($fighters as $key) {
    if($key->FighterName == $_POST['fighter1']){
        $fighter1 = $key;
    }
    if($key->FighterName == $_POST['fighter2']){
        $fighter2 =$key;
    }
  }

$fighter1 = json_encode($fighter1, true);
$fighter1 = json_decode($fighter1,true);

$fighter2 = json_encode($fighter2, true);
$fighter2 = json_decode($fighter2,true);

$strength_diff = $fighter->compare($fighter1['strength'],$fighter2['strength']);
if($fighter1['strength'] > $fighter2['strength']){
  $f1_roll = $fighter->roll(1,6) * $strength_diff;
  $f2_roll = $fighter->roll(1,6);
}
else{
  $f1_roll = $fighter->roll(1,6);
  $f2_roll = $fighter->roll(1,6) * $strength_diff;

}




?>
