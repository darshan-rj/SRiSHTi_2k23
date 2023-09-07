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
$client->setRedirectUri('http://localhost/SRiSHTi_2k23_FINAL/signup.php');
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

        // // Storing data into session
        $_SESSION['id'] = $google_account_info->id;
        $_SESSION['full_name'] = $google_account_info->name;
        $_SESSION['email'] = $google_account_info->email;
        $_SESSION['profile_pic'] = $google_account_info->picture;

        // Storing data into database
        $id = mysqli_real_escape_string($conn, $google_account_info->id);
        $name = mysqli_real_escape_string($conn, $google_account_info->name);
        $email = mysqli_real_escape_string($conn, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($conn, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($conn, "SELECT `google_id` FROM `gusers` WHERE `google_id`='$id'");
        if (mysqli_num_rows($get_user) > 0) {
            $_SESSION['login_id'] = $id;
            header('Location: home.php');
            exit;
        } else {
            header('Location: form.php');
            // $insert = mysqli_query($conn, "INSERT INTO gusers (google_id, name, email, profile_image) VALUES ('$id', '$full_name', '$email','$profile_pic')");

            // if($insert){
            //     header('Location:form.php');
            // }
            // echo 'You have been redirected to get additional details';
        }
    } else {
        header('Location: signup.php');
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRiSHTi 2k23 | Sign Up</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Sign Up -->

    <script>
    $(document).ready(function() {
        // Submit form data via Ajax
        $("#supForm").on('submit', function(e) {

            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'http://localhost/SRiSHTi_2k23_FINAL/modules/add_user.php',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,

                beforeSend: function() {
                    $('.submitBtn').attr("disabled", "disabled");
                    // $('#success_msg').html('<p>Loading...</p>');
                },

                success: function(response) {
                    if (response.status == 1) {
                        $('#supForm')[0].reset();
                        $('#success_msg').html('<div class="alert alert-success"> \
                                                        <strong>' + response + '</strong> \ \ </div>');
                        window.location.href = "home.php";
                    } else {
                        $('#err_msg').html('<div class="alert alert-danger"> \
                                                        <strong>' + response + '</strong> \ \ </div>');
                        alert(response);
                    }
                    $('#supForm').css("opacity", "");
                    $(".submitBtn").removeAttr("disabled");
                }
            });
        });
    });
    </script>

    <!-- check box -->
    <!-- <script>
    $(document).ready(function() {
        $('input:checkbox').click(function() {
            $('input:checkbox').not(this).prop('checked', false);
        });
    });
    </script> -->

    <script type="text/javascript">
    $(document).ready(function() {
        $("#cgcheck").click(
            function() {
                if ($("#cgcheck").is(":checked")) {
                    $("#cgname").val("PSG College of Technology");
                    $("#cgname").prop("readonly", true);
                }else {
                    $('#cgname').val("");
                    $("#cgname").prop("readonly", false);
                }
            });
    });
    </script>


    <script type="text/javascript">
    $(document).ready(function() {
        $("#cgcheck1").click(
            function() {
                if ($("#cgcheck").is(":checked")) {
                    $("#cgname").val("PSG Institute of Technology");
                    $("#cgname").prop("readonly", true);
                } else {
                    $('#cgname').val("");
                    $("#cgname").prop("readonly", false);
                }
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
                style="background: #103cbe; height: auto;">
                <div class="featured-image mb-3">
                    <img src="images/1.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be
                    Verified
                </p>
            </div>

            <div id="rightbox" class="col-md-6 py-4 my-auto">
                <div class="sign-up" id="sign-up">
                    <div id="signup-options" class="signup-options" style="display: block;">
                        <div id="g_signup" class="g-signup">
                            <a href="<?php echo $client->createAuthUrl(); ?>" class="btn btn-light p-3 rounded-3 w-100">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" xmlns:v="https://vecta.io/nano"
                                    width="24" height="24" viewBox="0 0 186.69 190.5">
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
                                </svg>Sign Up with google</a>
                        </div>
                        <div class="my-4">
                            <p class="text-center">or</p>
                        </div>
                        <div class="email-signup">
                            <button onclick="show_signupform()" class="btn btn-light p-3 rounded-3 w-100">
                                <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
                                    <path
                                        d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.7-8 5.334L4 8.7V6.297l8 5.333 8-5.333V8.7z">
                                    </path>
                                </svg>
                                Sign Up with Email
                            </button>
                        </div>
                    </div>
                </div>
                <div id="sign-upform" class="sign-upform h-auto" style="display: none;">
                    <div class="header-text align-items-center">
                        <a onclick="show_signupform()" class="btn btn-light rounded-5 p-2"><svg class="me-2"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: rgba(0, 0, 0, 1);">
                                <path
                                    d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z">
                                </path>
                            </svg>Back</a>
                        <h2 class="text-center my-4">Sign Up</h2>
                    </div>


                    <form id="supForm">
                        <div id="success_msg"></div>
                        <div id="err_msg"></div>
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control form-control-lg bg-light rounded-3 w-100 fs-6"
                                placeholder="Your Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control form-control-lg bg-light rounded-3 w-100 fs-6"
                                placeholder="example@gmail.com">
                        </div>
                        <div class="form-group mb-3">
                            <label for="createpassword" class="form-label">Create Password</label>
                            <input type="password" id="createpassword" name="createpassword"
                                class="form-control form-control-lg bg-light rounded-3 w-100 fs-6">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" onclick="toggleP()"
                                    id="flexCheckChecked1">
                                <label class="form-check-label" for="flexCheckChecked1">
                                    Show Password
                                </label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="confirmpassword" class="form-label">Confirm Password</label>
                            <input type="password" id="confirmpassword" name="confirmpassword"
                                class="form-control form-control-lg bg-light rounded-3 w-100 fs-6">
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" onclick="toggleCP()"
                                    id="flexCheckChecked2">
                                <label class="form-check-label" for="flexCheckChecked2">
                                    Show Password
                                </label>
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Mobile Number</label>
                            <input type="number" id="phone" name="phone"
                                class="form-control form-control-lg bg-light rounded-3 w-100 fs-6">
                        </div>

                        <div class="form-group mb-3">
                            <label for="depart" class="form-label">Department <span style="font-size:0.7rem;">(as per ID
                                    card)</span></label>
                            <input type="text" id="depart" name="depart"
                                class="form-control form-control-lg bg-light rounded-3 w-100 fs-6">
                        </div>

                        <div class="form-group mb-3">
                            <label for="cgname" class="form-label">College Name <span style="font-size:0.7rem;">(as per
                                    ID Card)</span></label>
                            <div id="formcheck" class="form-check my-3">
                                <input class="form-check-input" name="cgname" type="checkbox" value="" id="cgcheck">
                                <label class="form-check-label" for="cgcheck">PSG CT</label>
                            </div>
                            <div id="formcheck" class="form-check my-3">
                                <input class="form-check-input" name="cgname" type="checkbox" value="" id="cgcheck1">
                                <label class="form-check-label" for="cgcheck1">PSG iTECH</label>
                            </div>
                            <input type="text" name="cgname" id="cgname"
                                class="form-control form-control-lg bg-light rounded-3 w-100 fs-6"
                                placeholder="Enter your College Name" value="">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="accomodation">Accomodation</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accomodation" id="accomodation_yes"
                                    value="Yes">
                                <label class="form-check-label" for="accomodation_yes">Yes</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="accomodation" id="accomodation_no"
                                    value="No">
                                <label class="form-check-label" for="accomodation_no">No</label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="submitBtn btn btn-lg btn-primary w-100 fs-6">Sign
                                Up</button>
                        </div>

                        <div class="row">
                            <small>Already have an account? <a id="loginbtn" href="login.php"
                                    onclick="show_signupmenu()">Login</a></small>
                        </div>
                    </form>
                    <div class="ret-btn mt-4 d-grid align-content-center justify-content-center">
                        <a href="home.php" class="btn btn-dark">Return to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="js/axios.min.js"></script>
    <script type="text/javascript" defer>
    window.addEventListener("load", () => {
        const signupForm = document.getElementById("supForm");
        let success_msg = document.getElementById("success_msg")
        let err_msg = document.getElementById("err_msg")

        signupForm.addEventListener('submit', (e) => {
            e.preventDefault();
            let data = new FormData(signupForm);

            axios({
                    method: 'post',
                    url: './modules/adduser.php',
                    data: data,
                })
                .then((response) => {
                   if(response.status == 1){

                   }
                })
                .catch((err) => {
                    throw err
                });
        });
    });
    </script> -->

    <script>
    function toggleP() {
        var x = document.getElementById("createpassword");
        var i = document.getElementsByClassName("fa-eye-slash")

        if (x.type === "password") {
            x.type = "text";
            i.target.classList.toggle("fa-eye");
        } else {
            x.type = "password";
            i.target.classList.toggle("fa-eye-slash");
        }
    }

    function toggleCP() {
        var y = document.getElementById("confirmpassword");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
    </script>





    <script>
    // prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function(e) {
        e.preventDefault();
    });

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