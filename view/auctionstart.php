<?php 
  	require('../control/database.php');
  	require('../control/auctionstart.php');
	   require('head.php');
  	require('nav.php');
?>
<div class="downmiddle">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <?php echo "<p>$msg</p>"; ?>
    <div class="row">
      <div class='input-field col s12 m6'>
          <select class='browser-default' name='fromleague' required>
            <option value='' disabled selected>From League</option>
            <option value='bronze'>Bronze</option>
            <option value='silver'>Silver</option>
            <option value='gold'>Gold</option>
            <option value='platinum'>Platinum</option>
            <option value='diamond'>Diamond</option>
          </select>
        </div>
        <div class='input-field col s12 m6'>
          <select class='browser-default' name='toleague' required>
            <option value='' disabled selected>To League</option>
            <option value='bronze'>Bronze</option>
            <option value='silver'>Silver</option>
            <option value='gold'>Gold</option>
            <option value='platinum'>Platinum</option>
            <option value='diamond'>Diamond</option>
          </select>
        </div>
      </div>

    <div class="row">
      <div class='input-field col s12 m6'>
          <select class='browser-default' name='fromdiv' required>
            <option value='' disabled selected>From Division</option>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
          </select>
        </div>
        <div class='input-field col s12 m6'>
          <select class='browser-default' name='todiv' required>
            <option value='' disabled selected>To Division</option>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
          </select>
        </div>
      </div>

    <div class="row">
      <div class='input-field col s12 m6'>
          <p class="range-field">
            <input type="range" id="test5" name="fromlp" min="0" max="100" required/>
          </p>
          <label>From LP</label>
        </div>
        <div class='input-field col s12 m6'>
          <p class="range-field">
            <input type="range" name="tolp" id="test5" min="0" max="100" required/>
          </p>
          <label>To LP</label>
        </div>
      </div> 
      <?php 
      $tomorrow = date("Y-m-d", time() + 86400);
      ?>
      <input type="hidden" id="dateend" name="dateend" value="<?php echo $tomorrow;?>">
    <button class="btn" type="submit" name="submit" value="submit">Add Auction</button>
</form>
</div>
</div>
</div>