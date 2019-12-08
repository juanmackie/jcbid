<?php 

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($post['submit'])){
    if (empty($_SESSION['userid'])){
        $msg = "Log in first to start an auction.";
    } elseif ($_SESSION['isbooster']==1){
        $msg = "You must be a CLIENT type account to start an auction.";
    }
    else{
    $fromleague = $post['fromleague'];
    $fromdiv = $post['fromdiv'];
    $fromlp = $post['fromlp'];
    $toleague = $post['toleague'];
    $todiv = $post['todiv'];
    $tolp = $post['tolp'];
    $authorid = $_SESSION['userid'];
    $dateend = $post['dateend'];
    $stmt = $pdo->prepare("INSERT INTO auctions (fromleague,fromdiv,fromlp,toleague,todiv,tolp,authorid,dateend) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$fromleague,$fromdiv,$fromlp,$toleague,$todiv,$tolp,$authorid,$dateend]);
    $affected=$stmt->rowCount();
    $stmt = null;
    $msg = "Your auction has been added.";
    }
    }

?>