<?php
namespace Mini\Model;

use Mini\Core\Model;
class Home extends Model
{
  public function getMyUser($username)
  {
    $sql = "SELECT * FROM showMyUser WHERE Username = :username";
    $query = $this->db->prepare($sql);
    $parameters = array(':username' => $username);

    // useful for debugging: you can see the SQL behind above construction by using:
    // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

    $query->execute($parameters);
    return $query->fetchAll();
  }

  public function showAllUsers()
  {
    $sql = "SELECT * FROM showmyuser";
    $query = $this->db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
  }

  public function updateUsername($userID,$nUsername)
  {
    $sql ="CALL updateUsername(:id, :username);";
    $query = $this->db->prepare($sql);
    $parameters = array(':id' => $userID, ':username' => $nUsername);
    $query->execute($parameters);

  }

  public function updateEmail($userID,$nEmail)
  {
    $sql ="CALL updateEmail(:id, :email);";
    $query = $this->db->prepare($sql);
    $parameters = array(':id' => $userID, ':email' => $nEmail);
    $query->execute($parameters);
  }
  
  public function updatePassword($userID,$nPassword)
  {
    $sql ="CALL updatePassword(:id, :password);";
    $query = $this->db->prepare($sql);
    $parameters = array(':id' => $userID, ':password' => $nPassword);
    $query->execute($parameters);
  }
}
 ?>
