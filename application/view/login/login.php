<div class="col-md-10">
    <form class="form" action ="<?php echo URL ; ?>login/process" method="POST">
    <div class="form-group">
      <label class="sr-only" for="exampleInputEmail3">Email address</label>
      <input name="email" type="email" class="form-control" id="inputEmailLogin" placeholder="Email">
    </div>
    <div class="form-group">
      <label class="sr-only" for="exampleInputPassword3">Password</label>
      <input name="password" type="password" class="form-control" id="inputPasswordLogin" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-default" name="loginSubmit">Sign in</button>
  </form>
  <a href="<?php echo URL ; ?>signup/">new here? Signup here</a>
</div>
</div> <!-- end of sidebar -->
