<?php
// session_start();
session_regenerate_id(true);
// change the information according to your database
$conn = mysqli_connect("localhost","root","darshan","srishti_23");
// CHECK DATABASE CONNECTION
if(mysqli_connect_errno()){
    echo "Connection Failed".mysqli_connect_error();
    exit;
}