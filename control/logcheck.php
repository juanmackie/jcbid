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
         $_SESSION['user']=$user;
         $_SESSION['userid']=$arr[0]['id'];
         $_SESSION['isbooster']=$arr[0]['isbooster'];
         echo '<script type="text/javascript"> window.open("index.php","_self");</script>'; 
  	}
  	else {
  		$error="<p style='color:red;'>There is no user with matching credentials. Please try again.</p>";
  	}
}
?>