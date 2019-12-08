<?php
	$stmt = $pdo->prepare("SELECT * FROM auctions WHERE id = ? ");
	$stmt->execute([$_GET['id']]);
	$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if(!$arr) exit('No auction found.');
	$stmt = null;

	$stmt2 = $pdo->prepare("
		SELECT auctions.id, bid.amount, bid.userid, users.user 
		FROM auctions 
		INNER JOIN bid ON bid.auctionid=auctions.id 
		INNER JOIN users ON users.id=bid.userid
		WHERE auctions.id = ?
		ORDER BY bid.amount
		");

	$stmt2->execute([$_GET['id']]);
	$arr2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
	$stmt2 = null;

	$stmt3 = $pdo->prepare("
		SELECT auctions.authorid, users.user FROM auctions JOIN users on auctions.authorid=users.id WHERE auctions.id = ?
		");

	$stmt3->execute([$_GET['id']]);
	$namearr = $stmt3->fetch();
	$stmt3 = null;
?>