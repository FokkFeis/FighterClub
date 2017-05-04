<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\Home;

class HomeController
{

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {

      // load views
      if(isset($_SESSION['username'])){
        $name = htmlspecialchars($_SESSION['username']);
        $myUser = new Home();
        $data = $myUser->getMyUser($name);
      }

      require APP . 'view/_templates/header.php';
      #require APP . 'view/_templates/sidebar.php';
      require APP . 'view/home/index.php';
      require APP . 'view/_templates/footer.php';
    }

    public function account(){
      if(isset($_SESSION['username'])){
        $name = htmlspecialchars($_SESSION['username']);
        $myUser = new Home();
        $data = $myUser->getMyUser($name);
      }
      if($_SESSION['isAdmin'] === '1'){
          $myUsers = new Home();
          $users = $myUsers->showAllUsers();

      }

      require APP . 'view/_templates/header.php';
      #require APP . 'view/_templates/sidebar.php';
      require APP . 'view/home/account.php';
      require APP . 'view/_templates/footer.php';
    }

    public function admin(){
      if(isset($_SESSION['username'])){
        $name = htmlspecialchars($_SESSION['username']);
        $myUser = new Home();
        $data = $myUser->getMyUser($name);
      }
      if($_SESSION['isAdmin'] === '1'){
          $myUsers = new Home();
          $users = $myUsers->showAllUsers();
      }
      require APP . 'view/_templates/header.php';
      require APP . 'view/home/admin.php';
      require APP . 'view/_templates/footer.php';
    }

    public function allUsers()
    {
      if($_SESSION['isAdmin'] === '1'){
        $myUsers = new Home();
        $users = $myUsers->showAllUsers();
        require APP . 'view/home/allUser.php';
      }
      else{
        header('location: ' . URL);
      }
    }

    public function allBets(){
      #$allBets = new Home();
      if($_SESSION['isAdmin'] === '1'){
        require APP . 'view/home/allBets.php';
      }
      else{
        header('location' . URL);
      }
    }

    public function addFighter()
    {
      if($_SESSION['isAdmin'] === '1')
      {
        require APP . 'view/home/addFighter.php';
      }
    }

    public function makeAdmin()
    {
      if($_SESSION['isAdmin'] === '1'){
        $myUsers = new Home();
        $users = $myUsers->showAllUsers();
        require APP . 'view/home/makeAdmin.php';
      }
      else{
        header('location: ' . URL);
      }
    }

    public function signout()
    {
      session_destroy();
      header('Location: ' . URL . 'login/');
    }

    public function updateUserInfo(){
      $userUpdate = new Home();

      if(isset($_POST['username'])){
        $new_username = $_POST['username'];
        $userUpdate->updateUsername((int)$_SESSION['ID'],$new_username);
        $_SESSION['username'] = $new_username;
        header('Location: ' . URL . 'home/account');
      }

      if(isset($_POST['email'])){
        $new_email = $_POST['email'];
        $userUpdate->updateEmail((int)$_SESSION['ID'],$new_email);
        $_SESSION['email'] = $new_email;
        header('Location: ' . URL . 'home/account');
      }

      if(isset($_POST['password'])){
        $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $userUpdate->updatePassword((int)$_SESSION['ID'],$new_password);
        header('Location: ' . URL . 'home/account');
      }

      if(isset($_POST['makeAdmin']) && isset($_POST['selectedUser'])){
        $selectedUser = $_POST['selectedUser'];
        $userUpdate->makeAdmin($selectedUser);
        header('Location: ' . URL . 'home/admin');
      }
    }

    public function userStats()
    {
      if(isset($_SESSION['username'])){
        $name = htmlspecialchars($_SESSION['username']);
        $myUser = new Home();
        $data = $myUser->getMyUser($name); #For sidebar
        $userData = $myUser->getUserStats($name);
      }

      require APP . 'view/_templates/header.php';
      require APP . 'view/home/userStats.php';
      require APP . 'view/_templates/footer.php';
    }
    /**
     * Page->Fighters
     * Lists fighters
     *
     */
}
