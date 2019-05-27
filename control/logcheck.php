<?php 
if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
	{

	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
  	$stmt = $pdo->prepare("SELECT * FROM users WHERE user=? AND password=?");
  	$stmt ->execute([$user,$pass]);
  	$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
  	$affected=$stmt->rowCount();
  	$stmt=null;
  	if ($affected != 0) {
         $_SESSION['use']=$user;
         echo '<script type="text/javascript"> window.open("index.php","_self");</script>'; 
  	}
  	else {
  		$error="<p>There is no user with given credentials. Please try again.</p>";
  	}
}
?>