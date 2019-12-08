<?php
	$stmt = $pdo->prepare("SELECT balance FROM users WHERE user=?");
	$stmt->execute([$_SESSION['user']]);
	$row = $stmt->fetch();
	$balance=$row[balance];
	if (!$row){
		$balance="---";
	}
	$stmt = null;
?>