<?php 
  	require('../control/database.php');
  	require('../control/add.php');

?>

<form method="post" action="login.php">
    <div><span>Username:</span><input type="text" name="user"></div>
    <div><span>Password:</span><input type="text" name="pass"></div>
    <div><span>Description:</span><input type="text" name="description"></div>
    <div><span>Are you a booster? 1 or 0:</span><input type="text" name="isbooster"></div>
    <button class="btn1" type="submit" name="submit" value="submit">Submit</button>
</form>