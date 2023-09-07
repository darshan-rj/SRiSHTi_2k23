<?php
session_start();

require './includes/dbh.inc.php';

if (isset($_SESSION['id'])) {
    header('Location: profile.php');
    exit;
}

require 'vendor/autoload.php';
// Creating new google client instance
$client = new Google_Client();
// Enter your Client ID
$client->setClientId('230143215869-qaal5lo8polmfvjjdg0b93c5rbiumbo3.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/SRiSHTi_2k23_FINAL/login.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!isset($token["error"])) {
        $client->setAccessToken($token['access_token']);
        // getting profile information
        $google_oauth = new Google\Service\Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        $_SESSION['id'] = $google_account_info->id;
        $_SESSION['full_name'] = $google_account_info->name;
        $_SESSION['email'] = $google_account_info->email;
        $_SESSION['profile_pic'] = $google_account_info->picture;

        $email = $google_account_info->email;
        // // Storing data into database
        // $id = mysqli_real_escape_string($conn, $google_account_info->id);
        // $full_name = mysqli_real_escape_string($conn, trim($google_account_info->name));
        // $email = mysqli_real_escape_string($conn, $google_account_info->email);
        // $profile_pic = mysqli_real_escape_string($conn, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($conn, "SELECT `email` FROM `gusers` WHERE `email`='$email'");

        if (mysqli_num_rows($get_user) > 0) {
            $_SESSION['email'] = $email;
            header('Location: profile.php');
            exit;
        } else {
            echo "<script>alert('User Not Found');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>SRiSHTi 2K23 | Login</title>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {

        $("#submit").click(function() {
            email = $("#uemail").val();
            password = $("#upassword").val();
            $.ajax({
                type: "POST",
                url: "http://localhost/SRiSHTi_2k23_FINAL/pcheck.php",
                data: "email=" + email + "&password=" + password,
                success: function(html) {
                    if (html == 'true') {
                        $("#success_msg").html(
                            '<div class="alert alert-success"> \ <strong>Authenticated</strong> \ \ </div>'
                        );
                        window.location.href = "home.php";

                    } else if (html == 'false') {
                        $("#err_msg").html(
                            '<div class="alert alert-danger"> \ <strong>Email not found!</strong> \ \ </div>'
                        );
                    } else if (html == 'pass') {
                        $("#err_msg").html(
                            '<div class="alert alert-danger"> \ <strong>Wrong Password!</strong> \ \ </div>'
                        );
                    } else {
                        $("#err_msg").html(
                            '<div class="alert alert-danger"> \ <strong>Error</strong> Processing request. Please try again. \ \ </div>'
                        );
                    }
                },
                beforeSend: function() {
                    $("#success_msg").html("loading...");
                }
            });
            return false;
        });
    });
    </script>

    <!-- reset password -->
    <script type="text/javascript">
    $(document).ready(function() {

        $("#fgpwdsubmit").click(function() {

            email = $("#remail").val();

            $.ajax({
                type: "POST",
                url: "",
                data: "email=" + email,
                success: function(html) {
                    if (html == 'true') {

                        $("#add_err4").html('<div class="alert alert-success"> \
                                                        <strong>Check your Email!</strong> \ \
                                                    </div>');

                        //window.location.href = "index.php";

                    } else if (html == 'false') {
                        $("#add_err4").html('<div class="alert alert-danger"> \
                                                        <strong>Email not found!</strong> \ \
                                                    </div>');


                    } else {
                        $("#add_err4").html('<div class="alert alert-danger"> \
                                                        <strong>Error</strong> processing request. Please try again. \ \
                                                    </div>');

                    }
                },
                beforeSend: function() {
                    $("#add_err4").html("loading...");
                }
            });
            return false;
        });
    });
    </script>

</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe; height: 90vh;">
                <div class="featured-image mb-3">
                    <img src="images/1.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be
                    Verified
                </p>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div id="rightbox" class="col-md-6 py-4 my-auto">
                <?php
if (isset($_GET["newpwd"])) {
    if ($_GET["newpwd"] == "passwordupdated") {
        echo '<div class="rpwdsuccess" style="color: white">Your password has been reset!</div>';
    }
}
?>
                <div id="login" class="login d-block">
                    <form action="">

                        <div id="success_msg"></div>
                        <div id="err_msg"></div>

                        <div class="row align-items-center">
                            <div class="header-text align-items-center">
                                <h2 class="text-center my-4">Login</h2>
                            </div>
                            <div class="input-group mt-3 mb-3">
                                <a href="<?php echo $client->createAuthUrl(); ?>"
                                    class="btn btn-lg btn-light w-100 fs-6">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" xmlns:v="https://vecta.io/nano"
                                        width="20px" height="20px" viewBox="0 0 186.69 190.5">
                                        <g transform="translate(1184.583 765.171)">
                                            <path clip-path="none" mask="none"
                                                d="M-1089.333-687.239v36.888h51.262c-2.251 11.863-9.006 21.908-19.137 28.662l30.913 23.986c18.011-16.625 28.402-41.044 28.402-70.052 0-6.754-.606-13.249-1.732-19.483z"
                                                fill="#4285f4" />
                                            <path clip-path="none" mask="none"
                                                d="M-1142.714-651.791l-6.972 5.337-24.679 19.223h0c15.673 31.086 47.796 52.561 85.03 52.561 25.717 0 47.278-8.486 63.038-23.033l-30.913-23.986c-8.486 5.715-19.31 9.179-32.125 9.179-24.765 0-45.806-16.712-53.34-39.226z"
                                                fill="#34a853" />
                                            <path clip-path="none" mask="none"
                                                d="M-1174.365-712.61c-6.494 12.815-10.217 27.276-10.217 42.689s3.723 29.874 10.217 42.689c0 .086 31.693-24.592 31.693-24.592-1.905-5.715-3.031-11.776-3.031-18.098s1.126-12.383 3.031-18.098z"
                                                fill="#fbbc05" />
                                            <path
                                                d="M-1089.333-727.244c14.028 0 26.497 4.849 36.455 14.201l27.276-27.276c-16.539-15.413-38.013-24.852-63.731-24.852-37.234 0-69.359 21.388-85.032 52.561l31.692 24.592c7.533-22.514 28.575-39.226 53.34-39.226z"
                                                fill="#ea4335" clip-path="none" mask="none" />
                                        </g>
                                    </svg><small>Sign In with Google</small>
                                </a>
                            </div>
                            <div class="">
                                <p class="text-center">or</p>
                            </div>

                            <form id="login-form">
                                <div class="label">
                                    <label for="email" class="form-label">Email</label>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" name="email" id="uemail"
                                        class="form-control form-control-lg bg-light fs-6"
                                        placeholder="example@gmail.com">
                                </div>

                                <div id="err_email"></div>

                                <div class="label">
                                    <label for="password" class="form-label">Password</label>
                                </div>
                                <div class="input-group mb-1">
                                    <input type="password" name="password" id="upassword"
                                        class="form-control form-control-lg bg-light fs-6">
                                </div>

                                <div id="err_password"></div>

                                <div class="input-group mt-2 mb-5 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" onclick="toggleP()"
                                            id="passwordcheck">
                                        <label class="form-check-label" for="passwordcheck">
                                            Show Password
                                        </label>
                                    </div>
                                    <div class="forgot">
                                        <!-- <small><a href="" data-bs-toggle="modal" data-bs-target="#forgetpassword">Forgot
                                                Password?</a></small> -->
                                                <small><a href="./test/forgetpassword.php">Forgot Password?</a></small>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <button type="submit" id="submit" name="submit"
                                        class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                                </div>

                                <div class="row">
                                    <small>Don't have account? <a id="signupbtn" href="signup.php"
                                            onclick="show_signupmenu()">Sign
                                            Up</a></small>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="forgetpassword" tabindex="-1" aria-labelledby="forgetpasswordlabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="forgetpasswordlabel">Forget Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="remail" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">The participant will be receiving a mail to reset
                                    password.</div>
                            </div>
                            <button type="submit" id="fgpwdsubmit" name="submit" class="btn btn-primary mx-auto">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function toggleP() {
        var y = document.getElementById("upassword");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }

    function show_signupmenu() {
        var login = document.getElementById('login');
        var options = document.getElementById('sign-up');
        // var form = document.getElementById('sign-upform');

        if (login.style.display === "block") {
            login.style.display = 'none';
            options.style.display = 'block';
            // form.style.display = 'none';
        }
    }

    function show_signupform() {
        var form = document.getElementById('sign-upform');
        var options = document.getElementById('signup-options');
        if (form.style.display === "none") {
            options.style.display = "none";
            form.style.display = "block";
        } else {
            options.style.display = "block";
            form.style.display = "none";
        }
    }
    </script>
</body>

</html>