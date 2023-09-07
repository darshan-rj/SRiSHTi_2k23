<?php

$token = $_POST["token"];

$token_hash = hash  ("sha256", $token);

$mysqli = require __DIR__ ."/includes/dbh.inc.php";

$sql = "SELECT * FROM euser WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

$response = array(
    'status'=> 0,
    'message'=> ""
);

if($user === null){
    die("token not found");
}

if(strtotime($user['reset_token_expire_at']) <= time()){
    die("token has expired");
}

if (strlen($password) <= 8) {
    $response['message'] = 'Password must be at least 8 characters.';
    //VALIDATION
} elseif (!preg_match("#[0-9]+#", $password)) {
    $response['message'] = "Your Password Must Contain At Least 1 Number!";
} elseif (!preg_match("#[A-Z]+#", $password)) {
    $response['message'] = "Your Password Must Contain At Least 1 Capital Letter!";
} elseif (!preg_match("#[a-z]+#", $password)) {
    $response['message'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
} elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
    $response['message'] = "Your Password Must Contain At Least 1 special character!";
}

$spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));


$sql = "UPDATE eusers SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE email = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $password, $_SESSION['email']);
$stmt->execute();


echo "Password Updated Successfully. You can now login!";
?>