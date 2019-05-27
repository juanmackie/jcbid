<?php
  	require('../control/database.php');
  	require('../control/add.php');
  	//require('../control/log.php');
	require('head.php');
  	require('nav.php');
    require('../control/logcheck.php');
?>

<div class="down"> 
	<div class="midform">
		<?php 
	   	if($pdo->lastInsertID()){
	        echo '<p>User added. You may now log in.</p>';
	    }
    	if ($error): 
    		echo $error; 
    	endif; ?>
		<form method="post" action="">
		    <div><span>Username:</span><input type="text" name="user"></div>
		    <div><span>Password:</span><input type="password" name="pass"></div>
	    <button class="btn1" type="submit" name="login" value="submit">Submit</button>
		</form>
	<a href="register.php" class="f6 link dim black db">Sign up</a>
	</div>
</div>
