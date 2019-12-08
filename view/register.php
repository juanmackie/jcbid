<?php 
  	require('../control/database.php');
  	require('../control/adduser.php');
	  require('head.php');
  	require('nav.php');
?>

<!--
<div class="downmiddle"> 
	<div class="midform">
<form method="post" action="login.php">
    <div><span>Username:</span><input type="text" name="user" required></div>
    <div><span>Password:</span><input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]){8,}" 
	title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required ></div>
    <div><span>Description:</span><input type="text" name="description"></div>
    <div><span>Are you a booster?: </div>
	<div></span> True<input type="radio" value=1 name="isbooster"> False <input type="radio" value=0 name="isbooster"></div>	
    <button class="btn1" type="submit" name="submit" value="submit">Submit</button>
</form>
</div>
</div>
-->

<div class="downmiddle">
<div id="register-page" class="row">
  <div class="col s12 z-depth-6 card-panel">
    <form class="register-form pd-s" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">        
      <div class="row margin">
        <div class="input-field col s12">
          <i class="mdi-social-person-outline prefix"></i>
          <input id="username" type="text" class="validate" name="user" required>
          <label for="username" class="center-align">Username</label>
          <?php if ($nameError){ 
            echo "<p style='color:red;'>$nameError</p>";
        } ?>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="mdi-action-lock-outline prefix"></i>
          <input id="password" type="password" class="validate" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]){8,}" 
  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
          <label for="pass">Password</label>
          <?php if ($passError){ 
            echo "<p style='color:red;'>$passError</p>";
        } ?>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="mdi-action-lock-outline prefix"></i>
          <input id="confirm_pass" type="password" name="pass2" required>
          <label for="confirm_pass">Re-type password</label>
        </div>
      </div>
      <div class="row margin center-align">
        <input id="client" value=0 name="isbooster" type="radio" checked />
        <label for="client">Client</label>
        <input id="booster" value=1 name="isbooster" type="radio" />
        <label for="booster">Booster <i>(requires validation)</i></label>
      </div><?php echo "$error"; ?>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" value="submit" name="submit" class="btn waves-effect waves-light col s12">Register Now</a>
        </div>
        <div class="input-field col s12">
          <p class="margin center medium-small sign-up">Already have an account? 
        <a href="login.php">Login</a></p>
        </div>
      </div>
    </form>
  </div>
</div>
</div>