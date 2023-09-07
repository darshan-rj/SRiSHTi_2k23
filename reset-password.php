<?php
session_start();

$token = $_GET["token"];

$token_hash = hash ("sha256", $token);

$mysqli = require __DIR__ ."/includes/dbh.inc.php";

$sql = "SELECT * FROM euser WHERE reset_token_hash = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if($user === null){
    die("token not found");

}

if(strtotime($user['reset_token_expire_at']) <= time()){
    die("token has expired");
}

// echo "token is valid and hasn't expired";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Reset Password</h1>

    <form action="" method="post">

        <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

        <label for="password">New Password</label>
        <input type="password" name="password" id="password">

        <label for="password_confirmation">Repeat Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <button>Send</button>

    </form>
</body>

</html>