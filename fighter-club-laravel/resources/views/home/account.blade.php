@include('header')
<div class="container-fluid">
  <form class="" action="/home/updateUserInfo" method="post">
    <div class="input-group">
      <span class="input-group-addon">Username</span>
      <input type="text" name = 'username' class="form-control" placeholder="Username">
      <span class ="input-group-btn">
        <button type='submit' class = 'btn btn-warning'>Update</button>
      <span>
    </div>
  </form>
  <form class ="" action="home/updateUserInfo" method="post">
    <div class="input-group">
      <span class="input-group-addon">Change password</span>
      <input type="password" name ='password' class="form-control" placeholder="Password">
      <span class ="input-group-btn">
        <button type='submit' class ='btn btn-warning'>Update</button>
      <span>
    </div>
  </form>
  <form class = "" action ="home/updateUserInfo" method="post">
    <div class="input-group">
      <span class="input-group-addon">Change email</span>
      <input type="text" name = 'email' class="form-control" placeholder="Email">
      <span class ="input-group-btn">
        <button type='submit' class ='btn btn-warning'>Update</button>
      <span>
    </div>
  </form>
</div>
<hr>
@include('footer')