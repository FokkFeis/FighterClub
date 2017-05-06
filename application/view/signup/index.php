<div class="container">
  <div class="col-md-5 offset-md-3 pull-down">
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
      <button type="submit" class="btn btn-primary" name = "signupSubmit">Signup</button>
      <p>Already a member? Sign in <a href="<?php echo URL ; ?>login/">here</a></p>
    </form>
  </div>
</div>
