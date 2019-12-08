<?php	
require('../control/database.php'); 
?>
<!doctype html>
<body>
  <?php 
	require('head.php');
  	require('nav.php');
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
			<label><button class="btn" type="submit" value="filter"> Filter </button></label>
		</div>
  </form>
	</div>
	<div class="display">
		<?php require('../control/fetch.php');

		foreach ($arr as $auct) {
			$auct[fromleaguelow]=$auct[fromleague];
			$auct[toleaguelow]=$auct[toleague];
			$auct[fromleague]=ucfirst($auct[fromleague]);
			$auct[toleague]=ucfirst($auct[toleague]);
			if ($auct[minbid]==NULL)
				$auct[minbid]="--";
			$imgwidth="70px";

			echo "<a class='offer' href='auction.php?id=$auct[id]'>";

			echo "<div>From: <b>$auct[fromleague]</b>, division <b>$auct[fromdiv]</b>, <b>$auct[fromlp]</b> LP<br>To: <b>$auct[toleague]</b>, division <b>$auct[todiv]</b>, <b>$auct[tolp]</b> LP</div>";

			echo "<div class='ranks offerright'><img src='../assets/tier-icons/$auct[fromleaguelow]_$auct[fromdiv]' width='$imgwidth'>
			<i class='fas fa-angle-double-right mg-lr' style='font-size: 3em; color: #606060;'></i>
			<img src='../assets/tier-icons/$auct[toleaguelow]_$auct[todiv]' width='$imgwidth'></div>";

			echo "<div class='offerright'>Lowest bid: <b>$auct[minbid]</b> ETH<br>Date end: <b>$auct[dateend]</b></div>";

			echo "</a>";
		}
		?>
  <script>  
  $( document ).ready(function() {
    console.log( "ready!" );
}); </script>

	</div>
</div>
</body>

</html>