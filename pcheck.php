<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$response = '';
require './includes/dbh.inc.php';

$query = "SELECT * FROM eusers WHERE email = '$email'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if ($num_row >=1 ){
    
    if (password_verify($password, $row['password'])){

        $_SESSION['login'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['depart'] = $row['depart'];
        $_SESSION['cgname'] = $row['cgname'];
        $_SESSION['accomodation'] = $row['accomodation'];

        // $_SESSION['genfee'] = $row['genfee'];
        $response = 'You have successfully logged in';
        echo 'You have successfully logged in';
    }
    else{
        $response = 'Login Failed';
        echo 'Login Failed';
    }
}

echo json_encode($response);