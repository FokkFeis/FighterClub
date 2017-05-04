
<form class="" action="<?php echo URL ; ?>home/updateUserInfo" method="post">
  <div class="input-group">
    <span class="input-group-addon">Username</span>
    <select name="selectedUser" class="form-control" id="selectedUser">
      <?php foreach ($users as $user) {
        echo "<option value=" . $user->Username .">". $user->Username . "</option>";}
        ?>
    </select>
    <span class ="input-group-btn">
      <input class="btn btn-danger" type="submit" name="makeAdmin" value="Make admin">
    <span>
  </div>
</form>
