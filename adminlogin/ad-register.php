<?php
// session_start();

$response = array(
    'status' => 0,
    'message' => ''
);


require '../config.php';


if (isset($_POST['submit'])) {
    $admin_email = $_REQUEST['email'];
    $admin_username = $_REQUEST['username'];
    $admin_password = $_REQUEST['password'];

    echo $admin_email;

    if (!empty($admin_email) && !empty($admin_username) && !empty($admin_password)) {

        if (filter_var($admin_email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid [official] email.';
        } elseif (strlen($admin_username) <= 4) {
            $response['message'] = 'ADMIN Username should be more than 4 characters';
        } elseif (strlen($admin_password) <= 8) {
            $response['message'] = 'Password must be atleast 8 characters';
        } else {
            $query = mysqli_query($conn, "SELECT * FROM admin WHERE email = $admin_email");
            $num_row = mysqli_num_rows($query);

            if ($num_row > 0) {
                $response['status'] = 1;
                $response['message'] = 'ADMIN already exists! Try to login with your credentials';
            } elseif ($num_row < 1) {
                $hashed_admin_password = password_hash($admin_password, PASSWORD_BCRYPT, array('cost => 12'));

                $insert_admin = mysqli_query($conn, "INSERT INTO admin (email, username, password) VALUES ('$admin_email', '$admin_username', '$admin_password')");

                if ($insert == true) {
                    $_SESSION['admin_email'] = $admin_email;
                    $_SESSION['admin_username'] = $admin_username;
                    $response['status'] = 1;
                    $response['message'] = 'ADMIN details are inserted successfully';
                } else {
                    $response['message'] = 'ERROR: Inserting ADMIN details failed! Please try again.';
                }
            }
        }
    } else {
        $response['message'] = 'Please Fill the mandatory fields (email, username and password)';
    }
}

echo json_encode($response);

?>