<?php	
	require('../control/database.php'); 
	require('../control/bidauction.php');
	require('../control/fetchauction.php');
	require('nav.php'); 
?>
<!doctype html>
<body>
  <?php 
	require('head.php');
  ?>

  <div class="down"> 
	<div class="sidebar">
		<form method="post" action="index.php">
		<div class="filter">
			<input type="checkbox" name="diamond" id="check">
  			<label for="check">Diamond</label>
		</div>
		<div class="filter">
			<input type="checkbox" name="platinum" id="check2">
  			<label for="check2">Platinum</label>
		</div>
		<div class="filter">
			<input type="checkbox" name="gold" id="check3">
  			<label for="check3">Gold</label>
		</div>
		<div class="filter">
			<input type="checkbox" name="silver" id="check4">
  			<label for="check4">Silver</label>
		</div>
		<div class="filter">
			<input type="checkbox" name="bronze" id="check5">
  			<label for="check5">Bronze</label>
		</div>
		<div class="filter">
			<label><button class="btn" type="submit" value="filter"> Filter </label>
		</div>
  </form>
	</div>

	<div class="display">
		<?php 
		#var_export($arr);

		foreach ($arr as $auct) {
			$auct[fromleaguelow]=$auct[fromleague];
			$auct[toleaguelow]=$auct[toleague];
			$auct[fromleague]=ucfirst($auct[fromleague]);
			$auct[toleague]=ucfirst($auct[toleague]);
			$imgwidth="70px";

			echo "<div class='offerdetails'><h5>Auction details <small>(id $auct[id])</small></h5></div>";
			echo "<div class='offerdetailsfirst'>Owner: <b>$namearr[user]</b></div>";
			echo "<div class='offerdetails'>";
			echo "<div>From: <b>$auct[fromleague]</b>, division <b>$auct[fromdiv]</b>, <b>$auct[fromlp]</b> LP<br>To: <b>$auct[toleague]</b>, division <b>$auct[todiv]</b>, <b>$auct[tolp]</b> LP</div>";

			echo "<div class='ranks offerright'><img src='../assets/tier-icons/$auct[fromleaguelow]_$auct[fromdiv]' width='$imgwidth'>
			<i class='fas fa-angle-double-right mg-lr' style='font-size: 3em; color: #606060;'></i>
			<img src='../assets/tier-icons/$auct[toleaguelow]_$auct[todiv]' width='$imgwidth'></div>";

			echo "</div>";
			echo "<div class='offerdetails2'>Date end: <b> $auct[dateend] </b></div>";
		}


		// Show auctions

        if (!$arr2){
        	echo "<p>No bids found. Be first!</p>";
        }
        else {
			echo "<div class='offerdetails2'> 
			<table class='highlight'>
        <thead>
          <tr>
              <th>Username</th>
              <th>Bid</th>
          </tr>
        </thead>

        <tbody>";

		foreach ($arr2 as $bidinfo) {
		echo "<tr>
            <td>$bidinfo[user]</td>
            <td>$bidinfo[amount] ETH</td>
          </tr>";
		}
		echo 
		"</tbody>
      	</table>
			</div>";

		 
		}
		if(isset($_SESSION['user']))
		   {
		   	echo "
		   	<div class='col s12 z-depth-6 card-panel'>
			    <form class='register-form pd-s' method='post' action='";htmlspecialchars($_SERVER['PHP_SELF']); echo "'>        
			      <div class='row margin'>
			        <div class='input-field col s12'>
			          <input id='bid' type='text' class='validate' name='bid' required>
			          <label for='bid' class='center-align'>
			          <i class='fab fa-ethereum'></i> Your bid</label>";

			          if ($error){ 
			            echo $error;
			        }
			        echo "
			        </div>
			        <div class='input-field col s12'>
			          <button type='submit' value='submit' name='submit' class='btn waves-effect waves-light col s12'>Bid Now</a>
			        </div>
			        </div>
			      </div>
			  ";
		   }
		   else{
		 	echo "Log in to bid.";
		   }
		?>
	</div>
</div>

</body>

</html>