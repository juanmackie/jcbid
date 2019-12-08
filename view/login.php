<?php
  	require('../control/database.php');
	require('head.php');
  	require('nav.php');
    require('../control/logcheck.php');
?>
<!--
<div class="downmiddle"> 
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
-->

<div class="downmiddle"> 
<div id="user-login" class="row">
		<?php 
	   	if($_SESSION['registered']==1){
	        echo '<p>Account succesfully created. You may now log in.</p>';
	        $_SESSION['registered']=0;
	    }
	    ?>
	<div class="col s12 z-depth-6 card-panel">
		<form method="post" class="login-form pd-s" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="row margin">
				<div class="input-field col s12">
					<i class="mdi-social-person-outline prefix"></i>
					<input class="validate" id="user" name="user" type="text" required>
					<label for="user" class="center-align">Username</label>
				</div>
			</div>
			<div class="row margin">
				<div class="input-field col s12">
					<i class="mdi-action-lock-outline prefix"></i>
					<input id="password" name="pass" type="password" required>
					<label for="pass">Password</label>
				</div>
			</div>
			<div class="row">          
				<div class="input-field col s12 m12 l12  login-text">
					<input type="checkbox" id="remember-me" />
					<label for="remember-me">Remember me</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<button type="submit" value="submit" name="login" class="btn waves-effect waves-light col s12">Login</a>
				</div>
			</div>
			<?php 
		    	if ($error): 
		    		echo $error; 
		    	endif; 
		    ?>
			<div class="row">
				<p class="margin center medium-small sign-up">You don't have an account? <a href="register.php">Register now!</a></p>
			</div>
		</form>
	</div>
</div>
</div>
