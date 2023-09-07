<?php
// session_start();

$response = array(
    'status' => 0,
    'message' => ''
);


require '../config.php';


if (isset($_POST['submit'])) {
    $admin_email = $_POST['email'];
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRiSHTi 2k23 | ADMIN</title>

    <link rel="stylesheet" href="css/ad-login.css">



    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <!-- Top bar -->
    <section class="top-nav my-4">
        <div class="container px-4 py-2 d-flex justify-content-between align-items-center align-content-center w-100">
            <picture class="brand">
                <img class="psg-logo" src="../assets/icons/PSG LOGO-copy.png" alt="" width="24px" height="30px" />
                <img class="ieee-logo" src="../assets/icons/IEEE LOGO .png" alt="" width="32px" height="32px" />
                <img class="ieeesc-logo" src="../assets/icons/IEEE LOGO - SC.png" alt="" width="28px" height="30px" />
            </picture>

            <p class="top-nav-title my-auto">
                IEEE STUDENTS CHAPTER
                <span> 12951</span>
            </p>

            <a href="../home.php" class="reg-btn">Back to SRiSHTi</a>
        </div>
    </section>

    <section class="registration mt-5">
        <h2 class="section-title text-center text-decoration-underline">ADMIN REGISTRATION</h2>

        <div class="entry-section w-100 d-flex flex-row justify-content-center">
            <div class="entry-nav">
                <ul class="nav nav-pills d-flex justify-content-around px-4 mt-5 mb-4">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-login-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login"
                            aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-register-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-register" type="button" role="tab" aria-controls="pills-register"
                            aria-selected="true">Register</button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tab-content">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel"
                        aria-labelledby="pills-login-tab" tabindex="0">
                        <div class="card p-5">
                            <form action="" class="ad-loginform d-grid align-content-center justify-content-center">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username">
                                </div>
                                <label for="password" class="form-label">Password</label>
                                <div class="mb-3 d-flex align-items-center">
                                    <input type="password" class="form-control" id="password">
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </div>
                                <div id="password" class="form-text font-monospace"><span
                                        class=" text-decoration-underline">Note:</span> Don't share your
                                    password with anyone.</div>

                                <button type="submit" class="btn text-center btn-primary px-5 py-2 my-4">Login</button>
                                <p>Don't have an admin login ? <a href="#tab-register">Register</a></p>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade show" id="pills-register" role="tabpanel"
                        aria-labelledby="pills-register-tab" tabindex="0">
                        <div class="card p-5">
                            <form  method="POST"
                                class="ad-registerform d-grid align-content-center justify-content-center">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" aria-describedby="email">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Create Username</label>
                                    <input type="text" class="form-control" id="username" aria-describedby="username">
                                </div>
                                <label for="password" class="form-label">Create Password</label>
                                <div class="mb-3 d-flex align-items-center">
                                    <input type="password" class="form-control" id="password2">
                                    <i class="bi bi-eye-slash" id="togglePassword2"></i>
                                </div>
                                <div id="password" class="form-text font-monospace"><span
                                        class=" text-decoration-underline">Note:</span> Don't share your
                                    password with anyone.</div>

                                <button type="submit"
                                    class="btn text-center btn-primary px-5 py-2 my-4">Register</button>
                                <p>Have you already registered ? <a data-bs-target="#pills-login"
                                        href="#pills-login">Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <script>
        const togglePassword = document
            .querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            togglePassword.classList.toggle('bi-eye');
        });

        const togglePassword2 = document
            .querySelector('#togglePassword2');
        const password2 = document.querySelector('#password2');
        togglePassword.addEventListener('click', () => {
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);
            // Toggle the eye and bi-eye icon
            togglePassword2.classList.toggle('bi-eye');
        });
    </script>
</body>

</html>