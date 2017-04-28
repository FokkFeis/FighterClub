<?php
namespace Mini\Model;

use Mini\Core\Model;

class Login extends Model
{
  public function signIn($user_email)
  {
    $sql = "SELECT id, email, name, password, isAdmin FROM users WHERE email = :email LIMIT 1";
    $query = $this->db->prepare($sql);
    $parameters = array(':email' => $user_email);

    $query->execute($parameters);
    return $query->fetchAll();
  }
}

 ?>
