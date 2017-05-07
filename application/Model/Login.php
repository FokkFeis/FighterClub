<?php
namespace Mini\Model;

use Mini\Core\Model;

class Login extends Model
{
  public function signIn($user_email)
  {
    $sql = "SELECT id, email, name, password, isAdmin, coins_id FROM users INNER JOIN user_has_coins ON users.id = user_has_coins.coins_id WHERE email = :email LIMIT 1";
    $query = $this->db->prepare($sql);
    $parameters = array(':email' => $user_email);

    $query->execute($parameters);
    return $query->fetchAll();
  }
}

 ?>
