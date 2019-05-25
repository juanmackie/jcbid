<?php 
  	require('../control/database.php');
  	require('../control/add.php');
  	require('../control/log.php');

   	if($pdo->lastInsertID()){
        echo '<p>User added. You may now log in.</p>';
    }

?>

<form method="post" action="index.php">
    <div><span>Username:</span><input type="text" name="user"></div>
    <div><span>Password:</span><input type="text" name="pass"></div>
    <button class="btn1" type="submit" name="submit" value="submit">Submit</button>
</form>