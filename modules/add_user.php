<?php
@ob_start();
session_start();
// echo "hello";
$response = array(
    'status' => 0,
    'message' => 'Error submitting the form',
);

// if ($_SERVER["REQUEST_METHOD"] == 'POST') {

// If form is submitted
if (isset($_POST['name']) && isset($_POST['email'])) {
    // Get the submitted form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    $password = $_POST['createpassword'];
    $confirm_password = $_POST['confirmpassword'];
    $mobile = $_POST['phone'];
    $department = $_POST['depart'];
    $cgname = $_POST['cgname'];
    $accomodation = $_POST['accomodation'];

    // echo $accomodation;
    // $create_password === $confirm_password ? $password = $confirm_password : $response['message'] = 'Password Mismatch';
    // $password = $confirm_password;

    if (!empty($name) && !empty($email) && !empty($mobile) && !empty($cgname)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
        }
         elseif (strlen($mobile) != 10) {
            $response['message'] = 'Mobile Number must be 10 digits.';
        }
        elseif($password != $confirm_password)
        {
            $response['message'] = 'Password Mismatch';
        }
        // elseif (strlen($department) <= 2) {
        //     $response['message'] = 'Enter Your department name.';
        elseif (strlen($cgname) <= 4) {
            $response['message'] = 'Enter your college name (as per ID card).';
        } elseif (strlen($password) <= 8) {
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
        // elseif($accomodation == 'Yes'){
        //     $accomodation = 'Yes';
        // } elseif($accomodation == 'No'){
        //     $accomodation = 'No';
        // }
        else {
            // Include the database config file
            include_once '../includes/dbh.inc.php';

            // $result = mysqli_query($conn, "SELECT * FROM eusers WHERE email = '$email'");
            // $num_row = mysqli_num_rows($result);
            
            // $result2 = mysqli_query($conn, "SELECT * FROM gusers WHERE email = '$email'");
            // $num_row2 = mysqli_num_rows($result2);

            $result = mysqli_query($conn, "SELECT * FROM members WHERE email = '$email'");
            $num_row = mysqli_num_rows($result);
            
            if ($num_row < 1) {
                $spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

                $insert = mysqli_query($conn, "INSERT INTO `eusers`( name, email, password, mobile, depart, cgname, accomodation) VALUES ('$name', '$email','$spassword', '$mobile','$department', '$cgname', '$accomodation')");
                $insert = mysqli_query($conn, "INSERT INTO `members` (name, email, mobile, depart, cgname, accomodation) VALUES ('$name', '$email', '$mobile', '$department', '$cgname','$accomodation')");
                
                if ($insert == true) {
                    // $_SESSION['login'] = $conn->$insert;
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['mobile'] = $mobile;
                    $_SESSION['department'] = $department;
                    $_SESSION['cgname'] = $cgname;
                    $_SESSION['accomodation'] = $accomodation;
                    
                    $response['status'] = 1;
                    $response['message'] = 'Form data submitted successfully!';
                } else {
                    $response['message'] = 'Error inserting data.';
                }
            } else {
                $response['message'] = 'Email already in system.';
            }

        }
    } else {
        $response['message'] = 'Please fill all the mandatory fields.';

    }
    echo json_encode($response['message']);
}

// echo $name, $email, $create_password, $confirm_password, $mobile, $cgname, $accomodation;
// Check whether submitted data is not empty

// Return response
