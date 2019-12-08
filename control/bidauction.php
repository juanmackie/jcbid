<?php
	if(isset($_POST['submit']))   // it checks whether the user clicked login button or not 
	{
    $sql = "SELECT MIN(amount) AS minbid FROM bid WHERE auctionid = :auctid";
    $stmt0 = $pdo->prepare($sql);
    $stmt0->bindValue(':auctid', $_GET['id']);
    $stmt0->execute();
    $row = $stmt0->fetch(PDO::FETCH_ASSOC);
    $stmt0 = null;


	$sql = "SELECT authorid FROM auctions WHERE id = :auctid";
    $stmt0 = $pdo->prepare($sql);
    $stmt0->bindValue(':auctid', $_GET['id']);
    $stmt0->execute();
    $rowauthor = $stmt0->fetch(PDO::FETCH_ASSOC);
    $stmt0 = null;

	$sql = "SELECT balance FROM users WHERE id = :userid";
    $stmt0 = $pdo->prepare($sql);
    $stmt0->bindValue(':userid', $rowauthor['authorid']);
    $stmt0->execute();
    $row2 = $stmt0->fetch(PDO::FETCH_ASSOC);
    $stmt0 = null;
	
    
    if(($row['minbid'] <= $_POST['bid']) and (isset($row['minbid']))){
    	$error="<p style='color:red;'>You must bid LOWER price than the lowest to take this order.</p>";
    }
    elseif($row2['balance'] < $_POST['bid']){
    	$error="<p style='color:red;'>Auction owner does not have enough currency.</p>".$row2['balance'].$_POST['bid'] ;
    }
    elseif($_SESSION['isbooster']==0){
    	$error="<p style='color:red;'>You must be have a BOOSTER type account to bid in this auction.</p>";
    }
    else{
	    $stmt = $pdo->prepare("INSERT INTO bid (auctionid,userid,amount) VALUES (?, ?, ?)");
	    $stmt->execute([$_GET['id'],$_SESSION['userid'],$_POST['bid']]);
	    $affected=$stmt->rowCount();
	    $stmt = null;
	    #$stmt = $pdo->prepare("UPDATE users SET balance = ? WHERE id = ?");
	    #$stmt->execute([$row2['balance']-$_POST['bid'],$_SESSION['userid']]);
	    #$stmt = null;
	    $error="<p>Your bid has been added.</p>";
    }
}

?>