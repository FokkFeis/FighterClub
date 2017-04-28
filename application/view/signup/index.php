<div class="col-md-10">
    <form class="form" action ="<?php echo URL ; ?>signup/process" method="POST">
      <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">Email address</label>
        <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    <div class="form-group">
      <label class="sr-only" for="exampleInputEmail3">Username</label>
      <input name="username"type="text" class="form-control" id="inputUsername" placeholder="Username">
    </div>
    <div class="form-group">
      <label class="sr-only" for="exampleInputPassword3">Password</label>
      <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-default" name = "signupSubmit">Signup</button>
  </form>
  <a href="<?php echo URL ; ?>login/">Already a member? Sign in here</a>
</div>
</div> <!-- end of sidebar -->
