<?php
@ob_start();
// session_start();
// echo "hello";
$response = array(
    'status' => 0,
    'message' => 'ERROR in submitting data',
);

require './includes/dbh.inc.php';

// If form is submitted
if (isset($_POST['name']) && isset($_POST['email'])) {
    // Get the submitted form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    $create_password = $_POST['createpassword'];
    $confirm_password = $_POST['confirmpassword'];
    $mobile = $_POST['phone'];
    // $department = $_POST['department'];
    $cgname = $_POST['cgname'];
    $accomodation = $_POST['accomodation'];

    

    if (!empty($name) && !empty($email) && !empty($mobile) && !empty($cgname)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
        } elseif (!empty($create_password) && !empty($confirm_password) ) {
            $create_password === $confirm_password ? $password = $confirm_password : $response['message'] ="Password Mismatch";
            if (strlen($password) <= 8) {
                $response['message'] = 'Password must be at least 8 characters.';
            } elseif (!preg_match("#[0-9]+#", $password)) {
                $response['message'] = "Your Password Must Contain At Least 1 Number!";
            } elseif (!preg_match("#[a-z]+#", $password)) {
                $response['message'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
            } elseif (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
                $response['message'] = "Your Password Must Contain At Least 1 special character!";
            } elseif (!preg_match("#[A-Z]+#", $password)) {
                $response['message'] = "Your Password Must Contain At Least 1 Capital Letter!";
            } 
        } elseif (strlen($mobile) != 10) {
            $response['message'] = 'Mobile Number must be 10 digits.';
        } elseif (strlen($cgname) <= 4) {
            $response['message'] = 'Enter your college name (as per ID card).';
        } else {
            include_once './includes/dbh.inc.php'; // Include the database config file
            $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
            $num_row = mysqli_num_rows($result);
            if ($num_row < 1) {$spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

                $insert = mysqli_query($conn, "INSERT INTO eusers( name, email, password, mobile, cgname, accomodation) VALUES
        ('$name', '$email','$spassword', '$mobile', '$cgname', '$accomodation')");

                if ($insert) {
                    $_SESSION['login'] = $conn->$insert;
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['cgname'] = $cgname;
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
        $response['message'] = 'Please fill all the mandatory fields';
    }
    echo $response['message'];
}
