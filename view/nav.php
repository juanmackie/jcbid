<nav>
	<a id="logo" class="bubble" href="index.php"> <span></span> <text>jcbid_</text> </a>
	<a href="index.php"> Auction list </a>
	<a href="auctionstart.php"> Start new auction </a>

<script> $('.dropdown-trigger').dropdown(); </script>
<?php
  if(!isset($_SESSION['user'])) // If session is not set then redirect to Login Page
   {
   	$currentuser="Login";
   	$href="href='login.php' class='navright logged bubble'";
 	$dashboard=0;
   }
   else{
 	$currentuser=$_SESSION['user'];
 	$dashboard=1;
 	$href="href='logout.php' class='navright logged bubble dropdown-trigger' data-target='dropdown1'";
   }
  
  require('../control/getbalance.php');

?>
  
  <a class="balance" href="#">Balance: <?php echo $balance;?> <i class="fab fa-ethereum"></i></a>
	<a <?php echo $href; ?>><span></span> <text><i class="far fa-user-circle"></i>&nbsp;&nbsp;&nbsp;<?php echo $currentuser ?></text></a>
<?php if ($dashboard==1): ?>
	<a href="#" class="navright bubble"><span></span> <text><i class="fas fa-circle-notch"></i>&nbsp;&nbsp;&nbsp;My Dashboard</text></a>
<?php endif; ?>
</nav>
<ul id='dropdown1' class='dropdown-content'>
    <li><a href="logout.php">Logout</a></li>
  </ul>
<script src="../anim.js"></script>
