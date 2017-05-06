<div class="container">
  <div class="col-md-5 offset-md-3 pull-down">
    <form class="form" action ="<?php echo URL ; ?>login/process" method="POST">
      <div class="form-group">
        <label class="sr-only" for="email">Email address</label>
        <input name="email" type="email" class="form-control" id="inputEmailLogin" placeholder="Email">
      </div>
      <div class="form-group">
        <label class="sr-only" for="password">Password</label>
        <input name="password" type="password" class="form-control" id="inputPasswordLogin" placeholder="Password">
      </div>
    <button type="submit" class="btn btn-primary" name="loginSubmit">Sign in</button>
    <p>If you don't have an account you can sign up <a href="<?php echo URL ; ?>signup/">here</a></p>
  </form>
  </div>
</div>
