<?php
namespace Mini\Model;

use Mini\Core\Model;

class Signup extends Model
{
  public function addUser($username,$email,$password)
  {
    $sql = "CALL addUser(:username,:email,:password)";
    $query = $this->db->prepare($sql);
    $parameters = array(':username' => $username, ':email' => $email, ':password' => $password);

    $query->execute($parameters);
  }
}

 ?>
