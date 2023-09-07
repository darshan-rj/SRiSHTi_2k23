<?php
session_start();

require './includes/dbh.inc.php';

// if (!isset($_SESSION['email'])) {
//     header('Location: login.php');
//     exit;
// }

$email = $_SESSION['email'];
$get_user = mysqli_query($conn, "SELECT * FROM `gusers` WHERE `email`='$email'");

if (mysqli_num_rows($get_user) > 0) {
    $g_row = mysqli_fetch_array($get_user);
    $_SESSION['login_id'] = $g_row['google_id'];
    $_SESSION['name'] = $g_row['name'];
    $_SESSION['email'] = $g_row['email'];
    $_SESSION['profile_pic'] = $g_row['profile_image'];

} 
// else {
//     header('Location: logout.php');
//     exit;
// }


// @ob_start();
// session_start();

// $email = $_SESSION['email'];

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    include_once './includes/dbh.inc.php';


    $query = "SELECT * FROM eusers WHERE email = '$email'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $num_row = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    if ($num_row >= 1) {

        $_SESSION['login_id'] = $row['id'];
        // $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['mobile'] = $row['mobile'];
        $_SESSION['department'] = $row['department'];
        $_SESSION['cgname'] = $row['cgname'];
        $_SESSION['events'] = $row['events'];
        $_SESSION['workshops'] = $row['workshops'];
        $_SESSION['paperpres'] = $row['paperpres'];
        $_SESSION['flagship'] = $row['flagship'];
        $_SESSION['genfee'] = $row['genfee'];
    }


} else {
    // echo 'false';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRiSHTi 2k23 | PROFILE</title>

    <link rel="stylesheet" href="css/profile.css">

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>

    <link rel="stylesheet" href="js/jquery.min.js">
    <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
    <section>
        <div class="container my-4">
            <div class="row">

                <div class="card mx-auto" style="width:fit-content;">
                    <h4 class="title text-center px-4 py-2">PROFILE SECTION / DASHBOARD</h4>
                </div>
                <div>
                    <br>
                    <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4"
                        style="background: linear-gradient(to right,pink,rgb(175, 165, 175));">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            <li class="breadcrumb-item"><a href="#eve">Events Registered</a></li>
                            <li class="breadcrumb-item"><a href="#pay">Payment</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid my-5">
            <div class="row d-flex justify-content-center align-content-center align-items-center mx-auto">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="small">
                        <div class="card mb-4" id="col1card">
                            <div class="card-body">
                                <div class="imgBx1">
                                    <video class="vid" src="video1.mp4" type="video/mp4" autoplay loop muted>
                                </div>

                                <!-- class="links d-flex text-center align-items-center justify-content-center" -->
                                <!-- Button trigger modal -->

                                <div class="card mb-4 mb-md-0" id="editlogoutcard">
                                    <div class="card-body text-center">

                                        <br>
                                        <p class="mb-1">
                                            <?php echo $_SESSION['name']?>
                                        </p>

                                        <p class="mt-4 mb-1"><?php echo $_SESSION['cgname'] ?></p>

                                        <p class="mt-4 mb-1">SRiSHTi ID</p>

                                        <br>
                                        <div>
                                            <!-- The Modal -->
                                            <div class="modal" id="myModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Now</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="card mb-4">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <p class="mb-0"></p>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <p class="text-muted mb-0"><input
                                                                                    type="text"></p>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <p class="mb-0">
                                                                                Email
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <p class="text-muted mb-0"><input
                                                                                    type="text"></p>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <p class="mb-0">Phone</p>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <p class="text-muted mb-0"><input
                                                                                    type="number"></p>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <p class="mb-0">College</p>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <p class="text-muted mb-0"><input
                                                                                    type="text"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Button trigger modal -->
                                            <a class="btn me-4" data-bs-toggle="modal" data-bs-target="#myModal">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <a href="./logout.php" class="btn btn-dark text-white">Log out</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="circle1">
                                    <div class="imgBx1">
                                        <img src="<?php echo $_SESSION['profile_pic']; ?>"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prof-details" class="card mt-5">
                        <!-- <img src="assets/images/prf.jpeg" alt="..."> -->
                        <div class="card-body container-fluid my-4 mx-4 align-items-center justify-content-between">
                            <div class="row">
                                <div class="col-4">
                                    <h6 class="label">SRiSHTi ID :</h6>
                                </div>
                                <div class="col-8">
                                    <p class="input">SRiSHTi_<?php echo $_SESSION['login_id']?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <h6 class="label">Email:</h6>
                                </div>
                                <div class="col-8">
                                    <p class="input">
                                        <?php echo $_SESSION['email']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <!-- <div class="row">
                                <div class="col-4">
                                    <h6 class="label">Department :</h6>
                                </div>
                                <div class="col-8">
                                    <p class="input">BE EEE SW</p>
                                </div>
                            </div> -->
                            <!-- <hr> -->
                            <div class="row">
                                <div class="col-4">
                                    <h6 class="label">Phone :</h6>
                                </div>
                                <div class="col-8">
                                    <p class="input"><?php echo $_SESSION['mobile']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="container-fluid">
                        <h4 class="section-title text-center" id="eve">Events Registered</h4>
                        <div class="row my-5 align-items-center">
                            <div id="reg-gen" class="col-lg-6 col-md-6 col-sm-12">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-tech-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-tech" type="button" role="tab"
                                            aria-controls="pills-tech" aria-selected="true">TECHNICAL</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-non-tech-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-non-tech" type="button" role="tab"
                                            aria-controls="pills-non-tech" aria-selected="false">NON-TECHNICAL</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-bot-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-bot" type="button" role="tab"
                                            aria-controls="pills-bot" aria-selected="false">BOT EVENTS</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-tech" role="tabpanel"
                                        aria-labelledby="pills-tech-tab" tabindex="0">
                                        <div class="card h-auto">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat esse
                                                corporis architecto placeat quis possimus dolorum saepe voluptatem illo,
                                                vel, tempora sequi quos quidem magni laborum rem itaque sint dolore?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-non-tech" role="tabpanel"
                                        aria-labelledby="pills-non-tech-tab" tabindex="0">
                                        <div class="card h-auto">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel totam cum
                                                aliquid eligendi sint libero eum aperiam consectetur veniam vitae
                                                dolorum,
                                                soluta doloremque. Eveniet rerum vitae deserunt dolorum numquam
                                                consectetur.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-bot" role="tabpanel"
                                        aria-labelledby="pills-bot-tab" tabindex="0">
                                        <div class="card h-auto">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatum, at
                                                quasi fugiat quae dolore deleniti natus voluptatibus! Consequatur
                                                voluptatibus quo earum, velit, illum sed mollitia assumenda, molestiae
                                                maiores repellat voluptatem.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="reg-events" class="col-lg-6 col-md-6 col-sm-12">
                                <ul class="nav nav-pills mb-3 align-items-center" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-workshop-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-workshop" type="button" role="tab"
                                            aria-controls="pills-workshop" aria-selected="true">WORKSHOP</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-pps-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-pps" type="button" role="tab"
                                            aria-controls="pills-pps" aria-selected="false">PAPER <br>
                                            PRESENTATION</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-flag-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-flag" type="button" role="tab"
                                            aria-controls="pills-flag" aria-selected="false">FLAGSHIP</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-workshop" role="tabpanel"
                                        aria-labelledby="pills-workshop-tab" tabindex="0">
                                        <div class="card h-auto">
                                            <div class="card-body">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore,
                                                dolore?
                                                Non aut excepturi nobis rem. Quaerat incidunt voluptatem cupiditate enim
                                                minima ex ipsam totam nihil, itaque ipsa, quia vitae blanditiis?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-pps" role="tabpanel"
                                        aria-labelledby="pills-pps-tab" tabindex="0">
                                        <div class="card h-auto">
                                            <div class="card-body">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore iste
                                                totam
                                                odit dolore tempora enim, expedita quo inventore tenetur alias soluta
                                                quasi
                                                nam dolor sequi, quidem ratione. Rem, aliquam eum?
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-flag" role="tabpanel"
                                        aria-labelledby="pills-flag-tab" tabindex="0">
                                        <div class="card h-auto">
                                            <div class="card-body">
                                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Explicabo
                                                eaque
                                                molestias, cum neque facere debitis sit error possimus quisquam, nobis
                                                natus
                                                eveniet laboriosam perspiciatis doloremque distinctio fuga vel deserunt
                                                temporibus!
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <h4 class="section-title text-center" id="pay">Payment Details</h4>
                        <div class="card my-5">
                            <div class="card-body">
                                <div
                                    class="row text-center d-flex justify-content-center align-items-center align-content-center">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="card-title" style="font-weight:800;font-size:18px;">Pending Payments
                                        </div>
                                        <p class="pending-details my-4">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Cum quisquam sequi eius tenetur excepturi aspernatur alias. Laboriosam, hic,
                                            quod fuga placeat neque nobis, ad repellat maxime assumenda eveniet non
                                            distinctio?
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="card-title" style="font-weight:800;font-size:18px;">Successfull
                                            Payments
                                        </div>
                                        <p class="successful-details my-4">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut molestias
                                            possimus
                                            consequatur reiciendis qui, enim quidem aperiam, amet vel quis aut,
                                            inventore
                                            repellendus suscipit cupiditate odit minima obcaecati. Esse, veniam.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <div id="editModal" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Edit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div id="add_err2" style="color: white"></div>
                            <div class="mb-3" style="align-items:center">
                                <label for="name">Name :</label>
                                <input type="text" class="form-control-lg" id="name" placeholder="Name" name="text"
                                    value="RJ Darshan">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="email">Email :</label>
                                <input type="email" class="form-control-lg" id="email" placeholder="Enter email"
                                    name="email" value="example@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="number">Contact :</label>
                                <input type="number" class="form-control-lg" id="number" placeholder="Mobile No."
                                    name="mobile" value="9952549553">
                            </div>
                            <div class="mb-3">
                                <label for="accom">PSGIN / NON-PSGIAN :</label>
                                <input type="text" class="form-control-lg" id="accom" placeholder="Yes / No"
                                    name="accom">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>