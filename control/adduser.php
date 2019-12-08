<?php 

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

if(isset($post['submit'])){
    

    //

    if (empty($post['pass'])){
        $passError = "Password is required.";
    } else {
    if ($post['pass']!=$post['pass2']){
        $passError = "Passwords do not match.";
    }
    if (strlen($post['pass'])<7){
        $passError = "Password has to be above 6 letters.";
    }
    else {
        $pass = md5($post['pass']);
    }
    }

    $isbooster = $post['isbooster'];
    
    //

    if (empty($post['user'])) {
    $nameError = "Username is required.";
    } else {
    $username = test_input($post['user']);
    // check name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$name)) {
    $nameError = "Only letters, numbers and white space allowed.";
    }
    if (strlen($username)<7){
        $nameError = "Username has to be above 6 letters.";
    }
    }
    if (empty($post['description'])) {
    $description = "";
    } else {
    $description = test_input($post['description']);
    }
    
    




    //
    if (!$nameError && !$passError){
    $sql = "SELECT COUNT(user) AS num FROM users WHERE user = :username";
    $stmt0 = $pdo->prepare($sql);
    $stmt0->bindValue(':username', $username);
    $stmt0->execute();
    $row = $stmt0->fetch(PDO::FETCH_ASSOC);
    
    if($row['num'] == 0){
    $stmt = $pdo->prepare("INSERT INTO users (user,password,description,isbooster) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username,$pass,$description,$isbooster]);
    $affected=$stmt->rowCount();
    $stmt = null;
    $_SESSION['registered']=1;
    echo '<script type="text/javascript"> window.open("login.php","_self");</script>'; 
    }
    else{
    $error="<p style='color:red;'>This username already exists. Please try again.</p>";
}
}
}