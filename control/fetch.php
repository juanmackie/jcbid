<?php
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

	if (isset($post)){
		$toadd=" AND (";
		if ($post['diamond']=='on'){
			$toadd=$toadd."auctions.toleague = 'diamond'";
		}
		if ($post['platinum']=='on'){
			if (strlen($toadd)>7){
				$toadd=$toadd." OR ";
			}
			$toadd=$toadd."auctions.toleague = 'platinum'";
		}
		if ($post['gold']=='on'){
			if (strlen($toadd)>7){
				$toadd=$toadd." OR ";
			}
			$toadd=$toadd."auctions.toleague = 'gold'";
		}
		if ($post['silver']=='on'){
			if (strlen($toadd)>7){
				$toadd=$toadd." OR ";
			}
			$toadd=$toadd."auctions.toleague = 'silver'";
		}
		if ($post['bronze']=='on'){
			if (strlen($toadd)>7){
				$toadd=$toadd." OR ";
			}
			$toadd=$toadd."auctions.toleague = 'bronze'";
		}
		$toadd=$toadd.") ";
	}
	
	$stmt = $pdo->prepare("SELECT auctions.*, MIN(bid.amount) as minbid FROM auctions LEFT JOIN bid ON auctions.id=bid.auctionid 
		WHERE auctions.dateend > NOW() $toadd GROUP BY auctions.id");
	$stmt->execute();
	$arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if(!$arr) exit('No auctions found.');
	$stmt = null;
?>