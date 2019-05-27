<?php
	$stmt = $pdo->prepare("SELECT * FROM auctions");
	$stmt->execute();
	$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if(!$arr) exit('No auctions found.');
	$stmt = null;
?>