<nav>
	<a id="logo" class="bubble" href="index.php"> <span></span> <text>jcbid_</text> </a>
	<a href="index.php"> Auction list </a>
	<a href="auctionstart.php"> Start an auction </a>
	<a href="#"> Help </a>

<?php
  if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
   {
   	$currentuser="Login";
   	$href="login.php";
 	$dashboard=0;
   }
   else{
 	$currentuser=$_SESSION['use'];
 	$dashboard=1;
 	$href="logout.php";
   }
  
?>

	<a href="<?php echo $href; ?>" class="navright logged bubble"><span></span> <text><i class="far fa-user-circle"></i>&nbsp;&nbsp;&nbsp;<?php echo $currentuser ?></text></a>
<?php if ($dashboard==1): ?>
	<a href="dashboard.php" class="navright bubble"><span></span> <text><i class="fas fa-circle-notch"></i>&nbsp;&nbsp;&nbsp;My Dashboard</text></a>
<?php endif; ?>
</nav>
<script src="../anim.js"></script>