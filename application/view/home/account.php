<?php
# make some user info stuff here
# logout button needs to be added
if(!isset($_SESSION['username']))
{
  header('Location: ' . URL . 'login');
}

if($_SESSION['isAdmin'] === '1'){
    require APP . 'view/home/admin.php';
    $usersEnc = json_encode($users,true);
    $usersDec = json_decode($usersEnc,true);
}

  $userEnc = json_encode($data, true);
  $userDec = json_decode($userEnc, true);
  #var_dump($userDec);




 ?>
<div class = "col-md-10">
  <form class="" action="<?php echo URL ; ?>home/updateUserInfo" method="post">
    <div class="input-group">
      <span class="input-group-addon">Username</span>
      <input type="text" name = 'username' class="form-control" placeholder="<?php echo $userDec[0]['Username']; ?>">
      <span class ="input-group-btn">
        <button type='submit' class = 'btn btn-warning'>Update</button>
      <span>
    </div>
  </form>
  <form class ="" action="<?php echo URL ; ?>home/updateUserInfo" method="post">
    <div class="input-group">
      <span class="input-group-addon">Change password</span>
      <input type="password" name = 'password' class="form-control" placeholder="Password">
      <span class ="input-group-btn">
        <button type='submit' class = 'btn btn-warning'>Update</button>
      <span>
    </div>
  </form>
  <form class = "" action ="<?php echo URL ; ?>home/updateUserInfo" method="post">
    <div class="input-group">
      <span class="input-group-addon">Change email</span>
      <input type="text" name = 'email' class="form-control" placeholder="<?php echo $userDec[0]['Email']; ?>">
      <span class ="input-group-btn">
        <button type='submit' class = 'btn btn-warning'>Update</button>
      <span>
    </div>
  </form>

  <a class = "btn btn-danger" href="<?php echo URL; ?> home/signout">Signout</a>
</div>
</div>
