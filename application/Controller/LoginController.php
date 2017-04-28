<?php
namespace Mini\Controller;
use Mini\Model\Login;
use Mini\Model\Home;
class LoginController
{
  public function index()
  {
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
      header('location: ' . URL . '');
    }
    require APP . 'view/_templates/header.php';
    require APP . 'view/_templates/sidebar.php';
    require APP . 'view/login/login.php';
    require APP . 'view/_templates/footer.php';
  }
  public function process()
  {
    if (isset($_POST['loginSubmit'])){
      $email = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);
      #this turned into some bullshit
      $data = new Login();
      $userData = $data->signIn($email);
      $result = json_encode($userData, true);
      $result = json_decode($result,true);

      if ($result[0]['email'] === $email AND password_verify($password, $result[0]['password']))
      {
        $_SESSION['email'] = $result[0]['email'];
        $_SESSION['username'] = $result[0]['name'];
        $_SESSION['isAdmin'] = $result[0]['isAdmin'];
        $_SESSION['ID'] = $result[0]['id'];
        header('location: ' . URL . 'home/account');
      }
      else{
        header('location: ' . URL . 'login/');
      }
    }
    else{
      echo "no worky";
    }
  }
}

 ?>
