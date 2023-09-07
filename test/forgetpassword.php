<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>SRiSHTi 2K23 | Login</title>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>


</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe; height: 50vh;">
                <div class="featured-image mb-3">
                    <img src="images/1.png" class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be
                    Verified
                </p>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div id="rightbox" class="col-md-6 py-4 my-auto">
                <div id="login" class="login d-block">
                    <form action="./send_pwd_reset.php" method="post">

                        <div id="success_msg"></div>
                        <div id="err_msg"></div>

                        <div class="row align-items-center">
                            <div class="header-text align-items-center">
                                <h2 class="text-center my-4">Reset Password</h2>
                            </div>
                            <div class="input-group mt-3 mb-3">

                                <form id="rform">
                                    <div class="label">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" name="email" id="uemail"
                                            class="form-control form-control-lg bg-light fs-6"
                                            placeholder="example@gmail.com">
                                    </div>

                                    <div id="err_email"></div>
                                    <div class="submitbtn mx-auto d-grid align-content-center align-items-center">
                                        <button  class="btn btn-primary" type="submit" id="submit"
                                            name="submit">Send Link</button>
                                    </div>
                                </form>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>