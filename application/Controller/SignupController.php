<?php

namespace Mini\Controller;

use Mini\Model\Signup;
use Mini\Model\Home;

Class SignupController
{
  public function index()
  {
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
    }
    require APP . 'view/_templates/header.php';
    require APP . 'view/_templates/sidebar.php';
    require APP . 'view/signup/index.php';
    require APP . 'view/_templates/footer.php';
  }
  public function process()
  {

    if (isset($_POST['signupSubmit'])){
      $username = htmlspecialchars($_POST['username']);
      $email = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);
      $hpass = password_hash($password, PASSWORD_DEFAULT);
      $signup = new Signup();
      $signup->addUser($username,$email,$hpass);
      header('location: ' . URL . 'login');
    }
    else{
      echo "no worky";
    }
  }
}

 ?>
