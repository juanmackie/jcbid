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
		<div class="filter">
			<label><input type="checkbox"> filter 1</label>
		</div>
		<div class="filter">
			<label><input type="checkbox"> filter 2</label>
		</div>
		<div class="filter">
			<label><input type="checkbox"> filter 3</label>
		</div>
		<div class="filter">
			<label><input type="checkbox"> filter 4</label>
		</div>
	</div>
	<div class="display">
		<?php require('../control/fetch.php');

		foreach ($arr as $auct) {
			$auct[fromleague]=ucfirst($auct[fromleague]);
			$auct[toleague]=ucfirst($auct[toleague]);
			echo "<a class='offer' href='auction.php'>";
			echo "<div>From: <b>$auct[fromleague]</b>, division <b>$auct[fromdiv]</b>, <b>$auct[tolp]</b> LP<br>To: <b>$auct[toleague]</b>, division <b>$auct[todiv]</b>, <b>$auct[tolp]</b> LP</div>";
			echo "<div class='offerright'>Lowest bid: <b>$auct[lowestbid]</b>$<br>Date end: <b>$auct[dateend]</b></div>";
			echo "</a>";
		}
		?>
	</div>
</div>

</body>

</html>