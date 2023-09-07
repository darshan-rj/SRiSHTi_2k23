<?php
// @ob_start();
session_start();

$response = array(
    "status" => 0,
    "message" => "ERROR Submitting the Form",
);

$id = $_SESSION["id"];
$name = $_SESSION["full_name"];
$email = $_SESSION["email"];
$profile_pic = $_SESSION["profile_pic"];

if (isset($_POST['phone']) && isset($_POST['cgname']) && isset($_POST['depart']) && isset($_POST['cgcheck']) && isset($_POST['accomodation'])) {
    $mobile = $_POST['phone'];
    $department = $_POST['depart'];
    $cgcheck = $_POST['cgcheck'];
    $cgname = $_POST['cgname'];
    $accom = $_POST['accomodation'];

    // echo $name, $email, $mobile, $department, $cgname, $accom;

    // Check whether submitted data is not empty
    if (!empty($mobile) && !empty($department) && !empty($cgname) && !empty($accom)) {
        if (strlen($mobile) != 10) {
            $response['message'] = 'Mobile Number must be 10 digits.';
        } elseif (strlen($department) <= 5) {
            $response['message'] = 'Enter your department as per your ID card.';
        } 
        // elseif ($accom == 'Yes') {
        //     $accom = 'Yes';
        // } elseif ($accom == 'No') {
        //     $accom = 'No';
        // }
         elseif ($cgcheck == 'PSG CT') {
            $cgname = 'PSG College of Technology';
        } elseif ($cgcheck == 'PSG iTECH') {
            $cgname = 'PSG Institute of Technology';
        }elseif($cgcheck == 'other'){
            $cgname = '';
        } elseif (strlen($cgname) <= 5) {
            $response['message'] = 'Enter your college name as per your ID card.';
        } else {
            require './includes/dbh.inc.php';

            $query = mysqli_query($conn, "SELECT * FROM `members` WHERE email = '$email'");
            $num_rows = mysqli_num_rows($query);

            $query2 = mysqli_query($conn, "SELECT * FROM `members` WHERE mobile = '$mobile'");
            $num_rows2 = mysqli_num_rows($query2);

            // $query3 = mysqli_query($conn, "SELECT * FROM `eusers` WHERE email = '$email'");
            // $num_rows3 = mysqli_num_rows($query3);

            if ($num_rows > 0) {
                $response['status'] = 1;
                $response['message'] = 'Your have already Registered! Try to login';
            } elseif ($num_rows2 > 0) {
                $response['message'] = 'Mobile Number your have entered has already submitted';
            } 
            // elseif ($num_rows3 > 0) {
            //     $response['message'] = 'You have already Registered using email method! Try to login using your credentials';
            // } 
            else {
                $insert = mysqli_query($conn, "INSERT INTO `gusers` (google_id, name, email, profile_image, mobile, depart, cgname, accomodation) VALUES ('$id', '$name', '$email', '$profile_pic', '$mobile', '$department', '$cgname','$accom')");
                $insert = mysqli_query($conn, "INSERT INTO `members` (name, email, mobile, depart, cgname, accomodation) VALUES ('$name', '$email', '$mobile', '$department', '$cgname','$accom')");

                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['mobile'] = $mobile;
                $_SESSION['depart'] = $department;
                $_SESSION['cgname'] = $cgname;
                $_SESSION['accomodation'] = $accom;

                if ($insert) {
                    $response['status'] = 1;
                    $response['message'] = 'Form data submitted successfully';
                } else {
                    $response['message'] = 'ERROR: submitting data';
                }
            }
        }
    } else {
        $response['message'] = 'Please fill all the mandatory fields.';
    }
    echo json_encode($response['message']);
}

// echo json_encode($response['status']);
