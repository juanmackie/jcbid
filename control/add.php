<?php 

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if(isset($post['submit'])){
    $username = $post['user'];
    $pass = md5($post['pass']); //encrypt
    $description = $post['description'];
    $isbooster = $post['isbooster'];
    $stmt = $pdo->prepare("INSERT INTO users (user,password,description,isbooster) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username,$pass,$description,$isbooster]);
    $affected=$stmt->rowCount();
    $stmt = null;
}