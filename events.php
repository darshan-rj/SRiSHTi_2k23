<?php
@ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SRiSHTi 2K22 - EVENTS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a74d0f3882.js" crossorigin="anonymous"></script>


    <!-- Template Main CSS File -->
    <link href="assets/css/style3.css" rel="stylesheet">
    <link href="assets/css/cards.css" rel="stylesheet">
    <link href="assets/css/common-styles.css" rel="stylesheet">
    <link href="assets/css/navbar.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/background.css" rel="stylesheet">
    <style type="text/css">
        marquee {
            width:100%;
            direction:left;
            color: white;
            font-size: 22px;
            font-family: "Play", sans-serif;
            padding-top: 18px;
            font-weight: bold;
        }
    </style>


    <link rel="stylesheet" href="https://unpkg.com/flickity@2.0/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2.0/dist/flickity.pkgd.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#btn_1").click(function() {
                evname = "TECH FETE";
                registerEvent(evname);
            });
            $("#btn_2").click(function() {
                evname = "TECH HOTSPOT";
                registerEvent(evname);
            });
            $("#btn_3").click(function() {
                evname = "EUCLIDEA";
                registerEvent(evname);
            });
            $("#btn_4").click(function() {
                evname = "TO 2 TOO";
                registerEvent(evname);
            });
            $("#btn_5").click(function() {
                evname = "CODEVERSE";
                registerEvent(evname);
            });
            $("#btn_6").click(function() {
                evname = "SHERLOCKS CIRCLE";
                registerEvent(evname);
            });
            $("#btn_7").click(function() {
                evname = "FLUTTER SHUTTER";
                registerEvent(evname);
            });
            $("#btn_8").click(function() {
                evname = "ILLUSTRATIQUE";
                registerEvent(evname);
            });
            $("#btn_9").click(function() {
                evname = "WORD BLITZ";
                registerEvent(evname);
            });
            $("#btn_10").click(function() {
                evname = "SYNCHRON";
                registerEvent(evname);
            });
            $("#btn_11").click(function() {
                evname = "READY SET SCAVANGE";
                registerEvent(evname);
            });
            $("#btn_12").click(function() {
                fsname = "TECHNODIUM";
                registerFlagEvent(fsname);
            });
            $("#btn_13").click(function() {
                fsname = "HACKATHON";
                registerFlagEvent(fsname);
            });
            $("#btn_14").click(function() {
                fsname = "BOTCLAR";
                registerFlagEvent(fsname);
            });
            $("#btn_15").click(function() {
                fsname = "MAZEMICE";
                registerFlagEvent(fsname);
            });
            
        });


        // function register_alert(evname) {
        //     alert(`You have Registered for ${evname}`);
        // }
        
        function generalfee(){
            ftype="GEN";
            $.ajax({
            type: "POST",
            url: "modules/pay_process.php",
            data: "type=" + ftype,
            success: function(html){
            if (html=='false') {
                $("#add_err1").html('<div class="alert alert-danger"> \
                                    <strong>Please Try Again Later.</strong> \ \
                                </div>');

                window.location.href="profile.php";
                
                }else {
                    window.location.href = html;
                }
            },
            beforeSend:function()
            {
                $("#add_err1").html("Loading...");
            }
        });
        }


        function registerEvent(evname) {

            $.ajax({
                type: "POST",
                url: "eregistered.php",
                data: "evname=" + evname,
                success: function(html) {
                    if (html == 'true') {

                        alert(`You have Registered for ${evname}`);

                    } else if (html == 'rem') {

                        alert("Already Registered");

                    } else if (html == 'genfee') {
                        var val = confirm("You Need to pay General fee! \n Do not close the page before the payment confirmation.");
                        if (val == true) {
                            generalfee();
                        }

                    } else if (html == 'full') {
                        alert("Oops! We're sorry. All the slots are full for this Event. Thank you for checking out.");

                    } else {

                        alert("Login before registering to a Event");
                        window.location.href = "login.php";
                        // alert(html);


                    }
                }

            });
        }

        function registerFlagEvent(fsname) {
            $.ajax({
                type: "POST",
                url: "flagregister.php",
                data: "fsname=" + fsname,
                success: function(html) {
                    if (html == 'true') {

                        alert(`You have Registered for ${fsname}`);


                    } else if (html == 'rem') {

                        alert("Already Registered");

                    } else if (html == 'genfee') {
                        var val = confirm("You Need to pay General fee! \n Do not close the page before the payment confirmation.");
                        if (val == true) {
                            generalfee();
                        }
                    } else {
                        alert("Login before registering to a Event")
                        window.location.href = "login.php";
                    }
                }

            });
        }
    </script>

</head>

<body>
<ul class="circles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>

    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none" ></i>

    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>

                <?php require_once 'user.php'; ?>

                <li><a href="index.php" class="nav-link scrollto"><i class="fas fa-home"></i> <span>Home</span></a></li>
                <li><a href="about.php" class="nav-link scrollto"><i class="fas fa-info-circle"></i> <span>About</span></a></li>
                <li><a href="#" class="nav-link scrollto active"><i class="fas fa-calendar-day"></i> <span>Events</span></a></li>
                <li><a href="workshop.php" class="nav-link scrollto"><i class="fas fa-chalkboard-teacher"></i> <span>&nbsp &nbsp &nbsp Workshop /<br>Paper Presentation</span></a></li>
                <li><a href="team.php" class="nav-link scrollto"><i class="fas fa-users"></i> <span>Team</span></a></li>
                <li><a href="schedule.php" class="nav-link scrollto"><i class="fas fa-hourglass-half"></i><span>Schedule</span></a></li>
                <li><a href="contact.php" class="nav-link scrollto"><i class="fas fa-question"></i> <span>FAQ / Contact</span></a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </header>

    <?php require_once 'header.php'; ?>


    
    <div class="container-fluid">
        <div id="header2" class="d-flex align-items-center header2 " style="top: 0px !important;">
        <div class="container d-flex align-items-center justify-content-center">

            <div class="logo">
                <h1>EVENTS</h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>
        </div>
    </div>

    <!-- container fluid comes here -->
        <div class="category-bar" style="top: 55px !important">
            <nav>
                <div id="sliding-bar"></div>
                <a href="#Tech">TECHNICAL</a>
                <a href="#NonTech">NON-TECHNICAL</a>
                <a href="#Flag">FLAGSHIP</a>
                <a href="#Bot">BOT EVENTS</a>
            </nav>
        </div>
        <?php if(isset($_SESSION['genfee']) && $_SESSION['genfee']=="unpaid"){?>
        <!-- Marquee Section Begin -->
    <section class="services spad" style="padding-bottom: 50px; padding-top: 0px;" id="Day1">
        <marquee scrollamount="10" onmouseover="this.stop()" onmouseleave="this.start()">
            Please pay the General Fee to register for Events. 
        </marquee>
    </section>
    <!-- Marquee Section End -->
    <?php } ?>


        <div class="card-area container">
            <!-- <div class="container"> -->
            <div class="row">
                <!-- Technical -->
                <div class="col-lg-12" id="Tech" style="padding-bottom: 50px;"><br></div>
                <div class="col-lg-12">
                    <h3 style="height: 70px; color: #d1d7e0;text-align: center; font-size: 30px; margin-bottom:20px; font-weight:500;">TECHNICAL EVENTS</h3>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                All you need is hands-on-experience in the field of electronics and the spirit of a true engineer to power through the tests we have for you!
                                            </p>
                                        </div>
                                        <div class="m_btn">
                                            <center><button id="div-1" type="button" class="btn btn-success">View Details</button></center>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/TECH/techfete.PNG" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">TECH FETE</h2>
                                        <h2 class="turn-on text-center " style="text-align: center;">CLICK HERE</h2>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                "Knowledge is power". To test your power in Network theory and Basic Electronics, "Watt" other opportunity better than TECH HOTSPOT?
                                            </p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-2" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo right-10" src="assets/img/icons/TECH/techhotspot.PNG" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">TECH HOTSPOT</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                The secret to a strong building is a strong foundation. Let's shake up the ground to test the stability of your minds through EUCLIDEA!
                                            </p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-3" type="button" class="btn btn-success">View Details</button>
                                        </div>


                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo right-10" src="assets/img/icons/TECH/euclidea.PNG" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">EUCLIDEA</h2>
                                        <h2 class="turn-on text-center " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2  col-md-6 col-sm-12 hide-2"></div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                Get ready to be flabbergasted by the high bars we have set, which requires your mind to go from Ordinary to Extraordinary in Duo Models!
                                            </p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-4" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo right-10" src="assets/img/icons/TECH/to 2 too.PNG" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">TØ 2 TÖÓ</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                You can have 99 problems, but writing a code shouldn't be one. Unleash the coder in you through CODEVERSE!
                                            </p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-5" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo right-10" src="assets/img/icons/TECH/codverse.PNG" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">CODEVERSE</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Non Technical -->
                <div class="col-lg-12" id="NonTech" style="padding-bottom: 50px;"><br></div>
                <div class="col-lg-12">
                    <h3 style="height: 70px;color: #d1d7e0;text-align: center;font-weight: 500; font-size: 30px; margin-bottom:20px;">NON - TECHNICAL EVENTS</h3>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter non_tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                Put on your detective hat and Find the hidden clues that will solve the secrets and mystery of a crime case.
                                                A treasure hunting adventure awaits for you!!</p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-6" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/NON-TECH/sherlock_s circle.png" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">SHERLOCK'S CIRCLE</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter non_tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                Speak through the pictures, let us see through your lens and show us your unique angles! Click through the campus and bag the prize.
                                            </p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-7" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/NON-TECH/flutter shutter.png" alt="">
                                        <h2 class="text card-title  text-center top-20" style="text-align: center;">FLUTTER-SHUTTER (PHOTOGRAPHY)
                                        </h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter non_tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                Are you a designer, talented in painting the pixels? Unleash your creativity through the plethora of challenges we have waiting for you! </p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-8" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/NON-TECH/illustrique.png" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">ILLUSTRATIQUE</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter non_tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                Unleash your hidden talents to decipher clues from words and get ready to go along a roller coaster ride of fun and trading!! 
                                            </p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-9" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/NON-TECH/wordblitz.png" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">WORD-BLITZ</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter non_tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                Connect the words! Create a tale! Traverse through maze! Synchron- An unique event where ur omnific skills elicit </p>
                                        </div>
                                        <div class="m_btn"> <button id="div-10" type="button" class="btn btn-success">View Details</button></div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/NON-TECH/synchron.png" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">SYNCHRON</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter non_tech_1">
                                        <div class="m_cnt">
                                            <p>
                                                Hey Potterheads!!
                                                Harry needs your help to save the mankind !!
                                                Come, play the exclusive treasure hunt to find the Horcruxes and win the battle with your Orating skills!! </p>
                                        </div>
                                        <div class="m_btn"> <button id="div-11" type="button" class="btn btn-success">View Details</button></div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/NON-TECH/ready set scavenge.png" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">READY SET SCAVENGE</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flagship -->
                <div class="col-lg-12" id="Flag" style="padding-bottom: 50px;"><br></div>
                <div class="col-lg-12">
                    <h3 style="height: 70px;color: #d1d7e0;text-align: center;font-weight: 500; font-size: 30px; margin-bottom:20px;">FLAGSHIP EVENTS</h3>
                </div>
                <div class="col-lg-2  col-md-6 col-sm-12 hide-2"></div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter flag_1">
                                        <div class="m_cnt">
                                            <p>
                                                An arena for passionate engineers to unleash your critical thinking skills and become an expertise in your area of interest.
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-12" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/FLAG/technodium.PNG" alt="">
                                        <h2 class="text card-title  text-center top-20" style="text-align: center;">TECHNODIUM </br>(PROJECT EXPO)</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter flag_1">
                                        <div class="m_cnt">
                                            <p>
                                                Pull out your most ingenious programming skill to crack up the code and bring out unique solutions for the problem statements.
                                            </p>
                                        </div>
                                        <div class="m_btn"> <button id="div-13" type="button" class="btn btn-success">View Details</button></div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/FLAG/code a thon.PNG" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">HACKATHON</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12 hide-2"></div>
                <!--Bot Events-->
                <div class="col-lg-12" id="Bot" style="padding-bottom: 50px;"><br></div>
                <div class="col-lg-12">
                    <h3 style="height: 70px;color: #d1d7e0;text-align: center;font-weight: 500; font-size: 30px; margin-bottom:20px;">BOT EVENTS</h3>
                </div>
                <div class="col-lg-2  col-md-6 col-sm-12 hide-2"></div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter bot_1">
                                        <div class="m_cnt">
                                            <p>
                                                Bombard your brains for the battle of the bots in a clearing game! Come join us in this robolution!
                                            </p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-14" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/BOT/clar.PNG" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">BOT-CLAR</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12">
                    <div class="card-container">
                        <div class="card">
                            <div class="box">
                                <div class="content">
                                    <div class="matter bot_1">
                                        <div class="m_cnt">
                                            <p>
                                                When nothing goes right, go left. But why move, when you can design bots to do things for you!
                                            </p>
                                        </div>
                                        <div class="m_btn">
                                            <button id="div-15" type="button" class="btn btn-success">View Details</button>
                                        </div>
                                        <!-- <a id="div-1" class="inside-page__btn inside-page__btn-2" style="color: #d1d7e0;">View details</a> -->
                                    </div>
                                </div>
                                <div class="image">
                                    <div class="img-div">
                                        <img class="event-logo" src="assets/img/icons/BOT/mazemice.PNG" alt="">
                                        <h2 class="text card-title  text-center" style="text-align: center;">MAZEMICE</h2>
                                        <h2 class="turn-on " style="text-align: center;">CLICK HERE</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-12 hide-2"></div>

            </div>
        </div>
    </div>
    </div>

    



    <?php require_once 'footer.php'; ?>


    <div id="id-modal-1" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_1">&times;</span>
            <h4>TÊCH FÊTÊ</h4>

            <h6 class="e_tag">"Every Detail Matters!"</h6>

            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingten">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseone" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapseone" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    Are you a victim of endless online classes?
                                    Bored of doing lab experiments using simulations?
                                    Feel like you've missed out on loads of fun and
                                    hands-on experience with circuits?
                                    Then this event is just for you!
                                    Welcome to Têch Fêtê, a soirée for those
                                    who love the practical side of engineering.
                                    Enter the world of electrical and electronic circuits.
                                    Answer mind-boggling questions that
                                    twist your brain into wires and think on
                                    your feet to move on to a final mysterious
                                    jackpot room filled with hardware surprises!
                                </p>
                            
                                <h5>Round 1: ELECTRIFY</h5>
                                <h6 class="r_tag">"Show your Potential beyond Resistance"</h6>
                                <p>The party starts with a good old round of pen-and-paper
                                    quiz with an electrifying twist. 4 sections of circuitry,
                                    1 fun-filled bonus. Plug in your minds and test out your
                                    abilities to get a VIP pass to the next round of the party!</p><br>
                                
                                <h5>Round 2: TECH-TAC-TOE</h5>
                                <h6 class="r_tag">"Get, Set, Explore!"</h6>
                                <p> Come quick and come armed with your knowledge and skills.
                                    First, compete against your opponents in a race against time
                                    to reach the top of the scoreboard. Beware! Your fate in the
                                    next phase depends on your score. Proceed to the
                                    final phase which consists of a mystery room. Explore and solve
                                    the various
                                    hardware-related challenges and beat the clock
                                    to win the ultimate jackpot!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwo" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapsetwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <div class="bullet">
                                    <h5>ROUND ONE: </h5>

                                    <p>
                                    <ol>
                                        <li>Participants should strictly adhere to the time limit.</li>
                                        <li>Participants are strictly prohibited from using the internet.</li>
                                        <li>Participants are advised not to indulge in any form of malpractice.</li>
                                        <li>Decision of the organisers / the judges will stand final.</li>
                                    </ol>
                                    </p>
                                    <h5>ROUND TWO: </h5>
                                    <p>
                                    <ol>
                                        <li>The participants must answer the questions addressed to them within the given time limit,
                                            late answers will not be accepted. Same goes for any pass questions attempted.</li>
                                        <li>The participants should not stay in the jackpot room longer than their specified time limit.
                                            If done so, they will be disqualified.</li>
                                    </ol>
                                    <h5>TEAM SIZE</h5>
                                    2 Participants
                                    </p>


                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE: </h5>
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>11.00AM - 12.00PM</div><br>
                                <h5>ROUND TWO: </h5>
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>2.00PM - 3.00PM</div><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9190804 24132">ANUSRI P - 90804 24132</a></li>
                                    <li><a style="color: white;" href=" tel:+9195854 95567">SATHAPPAN - 95854 95567</a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_1"><b>Register</b></button></center>
        </div>
    </div>
    <div id="id-modal-2" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_2">&times;</span>
            <h4>TECH HOTSPOT</h4>
            <h6 class="e_tag">"A nexus of networks!"</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>Enter the game of Tech Hotspot
                                    to unravel the mystery of basic networks,
                                    to glide past intriguing physics questions,
                                    to ease through elementary electronics
                                    and to finally seize the prize,
                                    with physics as your torch,
                                    network analysis as your map and electronics as your friend!
                                </p>
                                <h5>ROUND 1:Fetch-it-out</h5>
                                <h6 class="r_tag">"Tick before the clock ticks!"</h6>
                                <p>
                                    A minute has 60000 milliseconds!
                                    Can your neural networks work fast enough
                                    to solve 20 questions in 20 large minutes?
                                    It's mostly talent and a tad bit of luck,
                                    as you try matching the answers, spotting the errors and
                                    answering some engaging MCQs.
                                    Beat the clock and blast off to the final round where fun awaits you.
                                </p><br>
                                <h5>ROUND 2:Techno Xplore</h5>
                                <h6 class="r_tag">"Pop or pass!"</h6>

                                <p>
                                    What's more fun than popping some balloons?
                                    Yes! It's a quiz minus the boring buzzers, it's balloons!
                                    Find the answer, pop the balloon in front of you and
                                    gain points as well as earn bonus questions.
                                    The one with the most pops followed by the
                                    right answers wins this Tech Hotspot.
                                    Are you ready?
                                    The Tech throne of Tech Hotspot awaits you!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseven" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapseseven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                        </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeight" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapseeight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE: </h5>
                                <p>
                                <ol>
                                    <li> Participants should strictly adhere to the time limit.</li>
                                    <li> Participants are strictly prohibited from using the internet</li>
                                    <li> Participants are advised not to indulge in any form of malpractice.</li>
                                    <li> Decision of the organisers / the judges will stand final.</li>
                                </ol>
                                </p>
                                <h5>ROUND TWO: </h5>
                                <p>
                                <ol>
                                    <li>A balloon will be placed at the centre, the person who finishes the 1st question
                                        has to burst the balloon. He/she will receive the next two questions.</li>
                                    <li>Other participants have to sit for the next round table with the next 1 question.
                                        Participant with the highest mark will be chosen as winner and second highest mark will be
                                        chosen as runner.</li>
                                </ol>
                                <h5>TEAM SIZE</h5>
                                1-2 Participants
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsenine" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapsenine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND 1</h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>9.00AM -10.00AM</div><br>
                                <h5>ROUND 2 </h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>11.30AM - 12.30PM</div><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseten" aria-expanded="false" aria-controls="collapseten">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseten" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9181108 15874">SHUBIKSHA M - 81108 15874 </a></li>
                                    <li><a style="color: white;" href=" tel:+9187783 03379">GUNAVARSHINI R - 87783 03379 </a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_2"><b>Register</b></button></center>
        </div>
    </div>
    <div id="id-modal-3" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_3">&times;</span>
            <h4>EUCLIDEA</h4>
            <h6 class="e_tag">"Let the games begin!"</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeleven" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapseeleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    If you're looking for an event that challenges
                                    more than just what you learned from books,
                                    Look no further!
                                    Do you have what it takes to compete against people
                                    from all over the city in an enthralling set of rounds
                                    that test not only your knowledge of technology and electronics
                                    but also your skills to think on your feet and
                                    build your own way to victory.
                                    Find out by registering now!!!
                                </p>
                                <h5>ROUND 1: UNVEIL</h5>
                                <h6 class="r_tag">"Lets plickers!"</h6>
                                <p>
                                    Show us you're prepared to handle what's about to
                                    come your way and make your team stand out
                                    from the crowd by acing this simple quiz
                                    [ with a little twist ;) ] we've made for you.
                                    Prove your knowledge by putting your brains to the test.
                                    But remember, you're on a timer.
                                    A perfect warm up to get your neurons
                                    ready for the rounds to come.
                                </p><br>
                                <h5>ROUND 2: DARE-FIT-FINISH</h5>
                                <h6 class="r_tag">"Improvise,adapt,overcome."</h6>
                                <p>
                                    Good at building circuits? Good!
                                    But can you also complete all the tasks needed to obtain the components?
                                    Let your spontaneity and creativity take the driver's seat to
                                    secure your place in THE FINAL ROUND as you work your way
                                    through a bunch of tasks to collect all the components
                                    you need to build the best circuit you can think of.
                                    Didn't have the time to acquire all the components you had planned to?
                                    Well,
                                    Improvise,adapt,overcome

                                </p>
                                <h5>ROUND 3: TECHWRECK</h5>
                                <h6 class="r_tag">"Smart words win hard hearts"</h6>
                                <p>
                                    Be prepared to pull out all stops in the final round
                                    where you face-off directly against your rival teams in this battle of wits.
                                    Prove that you have superior knowledge of the technology
                                    around you that's shaping our world to cement your position as the victors.
                                    Build a compelling case for the technology given to you while
                                    also contrasting it with rival technologies
                                    (given to…..you guessed it, your rival teams)
                                    to convince the judges that your approach is the one to go with.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThirteen" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapseThirteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>PARTICIPATES NEED TO BE ON TIME.</li>
                                    <li>NO MALPRACTICE OR USE OF MOBILE PHONES.</li>
                                    </li>
                                </ol>
                                <h5>ROUND ONE:</h5>
                                <ol>
                                    <li>1 MINUTE PER QUESTION.</li>
                                    <li> ANSWERS GIVEN AFTER THE TIMER RUNS OUT WILL NOT BE CONSIDERED.</li>

                                </ol>
                                <h5>ROUND TWO:</h5>
                                <ol>
                                    <li>TEAMS NEED TO ADHERE TO THE TIME CONSTRAINTS GIVEN BY THE CONVENORS</li>
                                    <li>THE JUDGE'S DECISION WILL BE INDISPUTABLE</li>
                                </ol>
                                <h5>ROUND THREE:</h5>
                                <ol>
                                    <li>A MAXIMUM OF 10 MINS PER TEAM TO PRESENT THEIR IDEA THE JUDGE'S DECISION WILL BE INDISPUTABLE</li>
                                </ol>
                                <h5>TEAM SIZE</h5>
                                3 Participants
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingone">
                        <h4 class="panel-title">
                            <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefourteen" aria-expanded="false" aria-controls="collapseone">
                                DATE AND TIME
                                <span> </span>
                            </a>
                        </h4>
                    </div>
                    <div id="collapsefourteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                        <div class="panel-body">
                            <p>
                            <h5>ROUND ONE: </h5>
                            <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                            <h5>TIME</h5>
                                <div>11.30AM - 12.30PM</div><br>
                                <h5>ROUND TWO: </h5>
                                <h5>DATE</h5>
                                    <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                    <div>1.30PM - 2.30PM</div><br>
                                <h5>ROUND THREE: </h5>
                                <h5>DATE</h5>
                                    <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                    <div>3.30PM- 4.00PM</div><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefifteen" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapsefifteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9195002 88886">KRISHNA R S - 95002 88886 </a></li>
                                    <li><a style="color: white;" href=" tel:+9163623 74876">DHARUN DHARMARAJ - 63623 74876 </a></li>
                                </ul><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_3"><b>Register</b></button></center>
        </div>
    </div>
    </div>
    <div id="id-modal-4" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_4">&times;</span>
            <h4>TØ 2 TÖÓ</h4>
            <h6 class="e_tag">"Tip & Taste Technical as a Duo"</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesixteen" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapsesixteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    An exciting duo event that
                                    involves duo answers and duo questions.
                                    Tip and taste the flavor of the technical questions.
                                    Get ready to skim through question and answer aptly.
                                    Your clock is ticking and the fastest wins!
                                    Sharpen your coding, analog, and
                                    digital concepts to
                                    ace the event with your duo.
                                    The fastest & most precise duo
                                    that cracks all the duo challenges will bag the prize.

                                <h5>ROUND 1: TWEEDLEDEE</h5>
                                <h6 class="r_tag">"Choose, Check, Conquer" </h6>
                                <p>You are given the questions and guess what? the answers too! What's the catch?
                                Well, you should choose the answers among all the words given and then find
                                what two questions share the same answer.Tie your talents together to
                                tackle the round of Tweedledee!</p><br>

                                <h5>ROUND 2: CLONEXPLORE</h5>
                                <h6 class="r_tag">"Lock un-lock" </h6>
                                In the jumble of questions and a pack of answers, use the strategy of divide-and-conquer,
                                to find the answers.
                                Race against the clock and find the right pairs.A sharp eye
                                and quick wit would lead you two to the top of
                                Tø 2 Töó!


                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseventeen" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapseseventeen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeighteen" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapseeighteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE: </h5>
                                <ol>
                                    <li>Participants should strictly adhere to the time limit.</li>
                                    <li>Participants are strictly prohibited from using the internet</li>
                                    <li>Decision of the organisers / the judges will stand final.</li>
                                </ol>
                                <h5>ROUND TWO: </h5>
                                <ol>
                                    <li> Participants must refrain from communicating with each other and comply to
                                        the words of convenors.</li>
                                </ol>


                                <h5>TEAM SIZE</h5>
                                2 Participants</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsenineteen" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapsenineteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE: </h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>9.00AM - 10.00AM</div><br>
                                <h5>ROUND TWO: </h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>12.30PM - 1.30PM</div><br>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsetwenty" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapsetwenty" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9195005 87551">LAKSHMI PRIYA - 95005 87551</a></li>
                                    <li><a style="color: white;" href=" tel:+9193845 93698">MEGHA E - 93845 93698 </a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_4"><b>Register</b></button></center>
        </div>
    </div>
    <div id="id-modal-5" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_5">&times;</span>
            <h4> CODEVERSE</h4>
            <h6 class="e_tag">"I Got 99 Problems, But Writing Code Ain't One"</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse21" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse21" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    Coders Assemble!
                                    Here comes your piece of cake for competing and
                                    engaging in an offline technical symposium.
                                    Quit engaging online with virtual people - codeverse
                                    is there to have a battle on real ground!
                                    The spirit of competition is not only in competing but also
                                    tinkering your minds and there comes new ideas.
                                <h5>ROUND ONE:CODE BYTES</h5>
                                <h6 class="r_tag">"An abode of code"</h6>
                                <p>Have you heard of cipher-words?
                                Then this is what you have to look at.
                                The world of words has many games but this
                                welcomes you to the world of codes.Ten words containing
                                tons of programming insight is what you have to look for.
                                Finding output doesn't push you to your destination,
                                placing them at their place is what speaks.</p><br>
                                <h5>ROUND TWO:BACK TRACKER</h5>
                                <h6 class="r_tag">"Buckle up and code"</h6>
                                Solving a problem usually requires a question
                                if the answer is , given getting confused right.
                                A problem statement tells what to do and
                                how to do but the output only tells what you want.
                                This is like giving a playback button to your code ,
                                would you use it correctly?
                                Then get into the world of code-traveling past.



                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse22" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse22" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse23" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse23" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Participants should strictly adhere to the time limit.</li>
                                    <li>Participants are strictly prohibited from using the internet</li>
                                    <li>Participants are advised not to indulge in any form of malpractice.</li>
                                    <li>Decision of the organisers / the judges will stand final.</li>
                                    <li>There will be star questions for tie breaking. Participants are required to attend those
                                        questions.</li>
                                    <li>The participants will be judged on submission time and number of testcases passed.</li>
                                    <li>Participants can use python, c or c++</li>
                                </ol>
                                <h5>TEAM SIZE</h5>
                                1 Participant<br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse24" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse24" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE: </h5>
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>11.00AM - 12.00PM</div><br>
                                <h5>ROUND TWO: </h5>
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>2.30PM - 3.30PM</div><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse25" aria-expanded="false" aria-controls="collapse25">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse25" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9195669 63010">LAKSHMI PRIYADARSHINI M - 95669 63010</a></li>
                                    <li><a style="color: white;" href=" tel:+9190034 78744">ARCHIDHA R - 90034 78744</a></li>
                                </ul>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_5"><b>Register</b></button></center>
        </div>
    </div>


    <div id="id-modal-6" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_6">&times;</span>
            <h4> SHERLOCK'S CIRCLE</h4>
            <h6 class="e_tag">"The Game is A foot!"</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse26" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse26" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    This event is based on a crime-solving theme, there are 2 rounds in this event.
                                    Both rounds will be a treasure hunt rounds. In both rounds, a scenario will be given and the team members have to solve the riddles given to them in order to complete that scenario.
                                    The eligibility for clearing the rounds will be on time based.<br>
                                <h5>ROUND ONE:</h5>
                                <h6 class="r_tag">“My Mind Rebels at Stagnation, Give Me Problems, Give Me Work!"</h6>
                                <p>
                                    A criminal twist to the classic scavenger hunt! Find the secret code word, forage for each letter
                                    and use it to save the victims! The route, the locations and the secret code are different for each team.
                                    Think fast and be quick on your feet to move on to the second round!
                                </p>
                                <h5>ROUND TWO:</h5>
                                <h6 class="r_tag">"You See, But You Do Not Observe"</h6>
                                <p>
                                    From the team, one person will be designated as the 'pointer' and the other one will be the 'finder.
                                    The goal is to work together and solve a case while they are separated from each other!
                                </p>




                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse27" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse27" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse28" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse28" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Discussion with other teams is prohibited.</li>
                                    <li>Usage of mobile phones is restricted in second round.</li>
                                    <li>The decision of conveners and the volunteers will stand final in the matter of the winner list.</li>

                                </ol>
                                <h5>TEAM SIZE</h5>
                                2 Participants<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse29" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse29" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE: </h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>10.00AM - 11.30AM</div><br>
                                <h5>ROUND TWO: </h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>2.00PM - 3.30PM</div><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse30" aria-expanded="false" aria-controls="collapse30">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse30" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9163834 05138">SASHANK T M - 63834 05138 </a></li>
                                    <li><a style="color: white;" href=" tel:+9182811 31023">ABISHEKGURU A M - 82811 31023</a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_6"><b>Register</b></button></center>
        </div>
    </div>

    <div id="id-modal-7" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_7">&times;</span>
            <h4>FLUTTER-SHUTTER</h4>
            <h6 class="e_tag">“The painter constructs, the photographer discloses.”</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse31" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse31" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    “Photograph: A picture painted by the sun without instruction in art.”
                                    Are you someone who believes that photography is the universal art of making memories tangible? Then this event is right up your alley.
                                    Welcome to Flutter Shutter, a photographic contest.
                                    Get ready to unleash your potential and capture incredible scenes to make it all an indelible memory.<br>
                                </p>
                                <h5>ROUND 1:</h5>
                                <h6 class="r_tag">"Capture the moments that captivate your heart"</h6>
                                <p>
                                    Capture photograph of any theme and upload it in the google form.
                                    Upload the original picture and never spoil the true love of photograph by editing.
                                    Photos will be evaluated.
                                </p><br>
                                <h5>ROUND 2:</h5>
                                <h6 class="r_tag">"Don't limit your challenge, Challenge your limit"</h6>
                                <p>
                                    “If your photos aren't good enough, then you are not close enough”.
                                    Choose from a set of pre decided themes and capture within
                                    campus. Themes will not be revealed beforehand. Perfect picture
                                    don't need any filter. Capture pictures and collect the prizes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse32" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse32" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse33" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse33" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Participants are allowed to use both DSLR and mobile phones.</li>
                                    <li>The photograph must be original, and any kind of tools used to enhance the photographs
                                        is strictly prohibited (photoshop, snapchat, removing watermark, any kind of filters etc.).</li>
                                    <li>Participants indulging in any kind of malpractice will be disqualified from the event.</li>
                                    <li>Decision of the organisers / the judges will stand final.</li>
                                </ol>
                                <h5>TEAM SIZE</h5>
                                1-2 Participants<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse34" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse34" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">

                                <p>
                                <h5>ROUND ONE: </h5>
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>10.00AM - 11.30PM</div><br>
                                <h5>ROUND TWO: </h5>
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>1:45PM - 5:30PM</div><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse35" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse35" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9195003 98072">KHIRUTHIHA M S - 95003 98072 </a></li>
                                    <li><a style="color: white;" href=" tel:+9175989 09832">JACIN WESLY K - 75989 09832 </a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_7"><b>Register</b></button></center>
        </div>
    </div>

    <div id="id-modal-8" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_8">&times;</span>
            <h4>ILLUSTRATIQUE</h4>
            <h6 class="e_tag">" Design is so simple, that's why it is so complicated."</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse36" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse36" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    Design is intelligence made visible. Do you sense that your design skill
                                    is not acknowledged? It's about time to come through. This event is just
                                    for you! Welcome to Illustratique, a battle for those who flair at design.
                                    Enter the combat, and be victorious in the art. Everything that happens in
                                    our life is in design, then why can't we design it? Just be innovative and
                                    plan the way to conquer.
                                <h5>ROUND ONE</h5>
                                <h6 class="r_tag">"Make it simple, but significant"</h6>
                                Be quick-witted to sketch the theme given forthwith and design arts. Compete
                                with rivals and map out your poster easy on the eye. Examine elements like
                                Topography, Impact, Innovation, and other factors too.
                                <h5>ROUND TWO</h5>
                                <h6 class="r_tag">"Don't raise your voice, Improve your argument"</h6>
                                “When it comes to Persuasion, emotions trump intellect”.Persuade and
                                convince judges by illustrating your work and plotting their minds toward
                                you. Argue down , design the prizes and win the day.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse37" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse37" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse38" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse38" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li> Only one entry is allowed per each participant.</li>
                                    <li> Submission should be of the participants own creativity.</li>
                                    <li>Participants should bring their own device.Net facility alone will be provided</li>
                                    <li> Participants can use tools like Canva, Adobe Photoshop or any other design tools.</li>
                                    <li> Decision of the organisers/ the judges is final and binding.</li>
                                </ol>
                                <h5>TEAM SIZE</h5>
                                1 Participant<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse39" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse39" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE: </h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>10.00AM - 1.00PM</div><br>
                                <h5>ROUND TWO: </h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>2.00PM - 4.00PM</div><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse40" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse40" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9191104 609167">MONISHA G S - 91104 60916 </a></li>
                                    <li><a style="color: white;" href=" tel:+9163832 30089">SAKTHI GANESHWARI S - 63832 30089</a></li>
                                </ul>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_8"><b>Register</b></button></center>
        </div>
    </div>

    <div id="id-modal-9" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_9">&times;</span>
            <h4>WORD-BLITZ</h4>
            <h6 class="r_tag">"The Stakes Have Never Been Higher!"</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse41" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse41" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    This is a non-technical event with a plot to test the skills of participants
                                    in the areas of general knowledge, aptitude, logical reasoning with unravelling
                                    clues to find solutions. The deserving ones will be selected and tested on the
                                    skills which involve solving questions and intriguing puzzles with nail biting
                                    connections.
                                </p>
                                <h5>ROUND ONE:</h5>
                                <h6 class="r_tag">"Alphabets! Assemble"</h6>
                                <p>
                                    In each part, each team will be provided with 15 questions in 3 sets such that each
                                    set has 5 questions. One clue word will be hidden in each set which is obtained by
                                    combining the first letter of the answer of each question. The three clue words thus
                                    obtained, have to be connected and participants have to find the connecting word with
                                    the given number of letters. Teams also get a chance to view a clue picture relating
                                    to the connecting word if they fail to find the appropriate word. Points will be
                                    deducted if the team tends to use the clue picture.
                                </p>
                                <h5>ROUND TWO:</h5>
                                <h6 class="r_tag">"Solve, Buy, Compile!"</h6>
                                <p>
                                    The shortlisted teams qualified from Round 1, would receive 100 points as base points in the
                                    beginning of the round. Each team will be provided with a set of 16 questions which they will
                                    solve. On solving and giving the correct answer, the team would receive a part of an image
                                    that they should arrange and form a complete 4*4 pictures. Teams which fail to solve the
                                    set of questions can trade their points for each clue. Each clue would have different prices
                                    based on the difficulty of the questions. And at the end, the team with the maximum points
                                    and scores would be declared as the winners.
                                </p>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse42" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse42" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse43" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse43" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Usage of mobile phones and any form of malpractice is strictly prohibited.</li>
                                    <li>Participants should strictly adhere to the time limit.</li>
                                    <li>The decision of the convenors and the volunteers will stand final in the matter of the winner list.</li>
                                </ol>
                                <h5>TEAM SIZE</h5>
                                1-2 Participants<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse44" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse44" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>Round:ONE</h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>11.30AM - 12.30PM</div><br>
                                <h5>Round:TWO</h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>2.00PM - 3.00PM</div><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse45" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse45" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9199524 67379">SRIDHAR J - 99524 67379 </a></li>
                                    <li><a style="color: white;" href=" tel:+9190250 47749">SAMUTHRA G - 90250 47749</a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_9"><b>Register</b></button></center>
        </div>
    </div>

    <div id="id-modal-10" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_10">&times;</span>
            <h4>SYNCHRON</h4>
            <h6 class="e_tag">"All I Need is a Sheet of Paper and Something to Write With, and Then I Can Turn the World Upside Down."</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse46" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse46" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    This is a non-technical event basically with a plot to embrace the
                                    skills of participants in the field of logical, perspective and
                                    creative thinking with a set of disparate questions. The deserving
                                    ones will be tested on their omnificent skills.
                                <h5>ROUND 1: </h5>
                                <h6 class="r_tag">"Stitch a Story"</h6>
                                <p>
                                    Participants will be given 20 questions in a paper. The format of
                                    questions will be disparate, it is based on picture clues
                                    (based on any object or any famous personality), connections, puzzles,
                                    quiz and aptitude (to encourage logical thinking of the participants).
                                    After finding answers for every question the participants have to frame
                                    a story based on the answers obtained from each question. The story should
                                    contain all the answer words as a keyword and it should be creative and meaningful.
                                </p><br>
                                <h5>ROUND 2: </h5>
                                <h6 class="r_tag">"Riddle or Dare?"</h6>
                                <p>
                                    In round 2 there will be a maze, through which each team must traverse. Each team will be assigned
                                    with a volunteer and the volunteer will read out the questions to the team members. The 1st question will
                                    be an open question, where the first team to get the correct answer will be allowed to traverse through the
                                    maze followed by the rest of the teams.There will be a total 15 questions (boxes), some of the boxes will be
                                    in red and green colour. Red boxes indicate a dare which the participants will have to do, when the team
                                    lands on a green box they will be given a riddle, teams will get the dares and riddles through a chit draw.
                                    If a team is unable to answer a question a time penalty of 30 secs will be given to them, which will be added
                                    to their total time. Whichever team completes the maze with the shortest time (including the penalties) will
                                    be given a chance to select one product from 8 products on which they will have to prepare an advertisement.
                                    The rest of the teams will follow the same. After the teams have performed their advertisement both the scores
                                    of the maze and the advertisement will be added up to decide the winner.


                                </p>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse47" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse47" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li>All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li>All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li>ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li>Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li>Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li>Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li>The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li>All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li>Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li>All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse48" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse48" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Participants should strictly adhere to the time limit.</li>
                                    <li>Participants are strictly prohibited from using the mobile phones during the event.</li>
                                    <li>Participants are not encouraged for any forms of malpractice.</li>
                                    <li>The decision of the judge and the organizers will stand final in the sorting of winners list.</li>
                                </ol>
                                <h5>TEAM SIZE</h5>
                                1-2 Participants<br> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse49" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse49" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE: </h5>
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>12.30PM - 1.30PM</div><br>
                                <h5>ROUND TWO: </h5>
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>3.00PM - 4.00PM</div><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse50" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse50" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9182706 55835">DIVYADHARSHINI P- 82706 55835 </a></li>
                                    <li><a style="color: white;" href=" tel:+9189390 28008">AKASH U - 89390 28008</a></li>
                                </ul>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_10"><b>Register</b></button></center>
        </div>
    </div>

    <div id="id-modal-11" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_11">&times;</span>
            <h4>READY SET SCAVENGE</h4>
            <h6 class="e_tag">"Stupefy Potterheads"</h6>

            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse51" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse51" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    Are you angst about doing boring routines and needing a change? This event is for you!!
                                    It's an oppurtunity to feel delighted and flaunt the intellect within you.
                                    Welcome to Ready Set Scavenge, A safari hunt to carry out trials on your aptitude and general knowledge.
                                    Predate the prey by unraveling the incisive questions and make a killing.</p><br>
                                <h5>ROUND 1:</h5>
                                <h6 class="r_tag">"Hunt the Horcruxes"</h6>

                                <p>
                                    The travel starts with the Treasure hunt. A Horcrux is a piece of one's soul.
                                    7 Horcruxes are created by Voldemort and he can never die until the Horcruxes
                                    are destroyed. As you and Voldemort are mentally connected, Detect and Hunt
                                    the Horcruxes at different locations before Voldemort and Curse him.
                                </p><br>

                                <h5>ROUND 2: </h5>
                                <h6 class="r_tag">"We switch, you talk"</h6>

                                <p>
                                    Your triumphs will earn you house points, while any rule-breaking will lead to loss.
                                    A silver tongue will pave the path to Victory. Orate on the topic given and use spells to conquer the Hogwarts House Cup.

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse52" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse52" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse48" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse48" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Participants are should not google at any point of the event; it will be counted as malpractice.</li>
                                    <li>Team members should not talk with members of other teams or share answers.</li>
                                    <li> team engaging in malpractice will be eliminated.</li>
                                </ol>
                                <h5>TEAM SIZE</h5>
                                1-2 Participants<br> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse54" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse54" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>Round ONE</h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>11.30AM - 12.30PM</div><br>
                                <h5>Round TWO</h5>
                                <h5>DATE</h5>
                                <div>30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>2.00PM - 3.00PM</div><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse55" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse55" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9196636 47913">SUPREETHA K J - 96636 47913 </a></li>
                                    <li><a style="color: white;" href=" tel:+9194426 99720">KAILESH PRABHU R - 94426 99720 </a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_11"><b>Register</b></button></center>
        </div>
    </div>

    <div id="id-modal-12" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_12">&times;</span>
            <h4>TECHNODIUM</h4>
            <h6 class="e_tag">"Innovate, Indulge, Inspire!"</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse56" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse56" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    Got a great idea for an invention but not sure what to do with it? Enough waiting,
                                    the most awaited Project Expo is here - an arena for passionate engineers to unleash
                                    their critical thinking skills and expert in their area of interest.
                                    The event aims to help you improve your competency but also give you a platform to execute your ideas.</p>
                                <h5>ROUND 1: </h5>
                                <p>
                                <ol>
                                    <li>Each team has to send us two documents - a video (maximum duration of 1 minute talking about
                                        what your project desires to accomplish and what benefits it implicates on society) and an
                                        abstract as a single pdf (not exceeding 300 words) of your project within the deadline.</li>
                                    <li>The abstract should be in IEEE format. Please enclose details of the team members (Full Names, with Srishti ID, Department, Year of Study,
                                        Email ID, Contact Number - preferably WhatsApp Number, and Institution Name).</li>
                                    <li>The abstract and the video should be submitted on or before 22-10-2022 via email to <a href="mailto:technodiumsrishti22@gmail.com" style = " Color:#9C02F5;">technodiumsrishti22@gmail.com</a></li>
                                    <li>Make sure the name of the files submitted and the subject of the email correspond to the title of the project chosen.</li>
                                    <li>A committee will scrutinize all abstracts, and the teams will get shortlisted for the next round and
                                        intimated via email. Selected participants will have to confirm their participation before the event.</li>
                                </ol>
                                </p><br>
                                <h5>ROUND 2:</h5>
                                <p>
                                <ol>
                                    <li> The selected teams have to exhibit and explain their working model at PSG College of Technology.</li>
                                    <li> Participants should also submit a hard copy of their project proposal/paper in IEEE format on the day of the event.</li>
                                    <li> A working hardware model is mandatory</li>
                                    <li> PowerPoint presentation is optional, the time limit of which is limited to a span of 15 minutes.</li>
                                    <li> Each team will be questioned about their projects by the judges.</li>
                                </ol>
                                </p>
                                <h5>FEES: </h5>
                                <p>
                                The teams whose project got selected must pay a fee of Rs.350 excluding the general registration fee to present the project.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse57" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse57" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse48" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse48" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Each team can have a maximum of 4 members and a minimum of 2 members.</li>
                                    <li>The participants are expected to stick to the word limits.</li>
                                    <li>Project done should not be an imitation of someone else's work. Plagiarism of work or documentation is not encouraged.</li>
                                    <li>There are no restrictions on forming the teams (say participants of different departments are allowed to participate as a team).
                                        Once registered,futher changes cannot be made. A team member can only take part in one project presentation.</li>
                                    <li>All teams are expected to know of the hardware model.</li>
                                    <li>Abstracts sent after the deadline will not be taken into consideration.</li>
                                </ol>
                                <h5>TEAM SIZE</h5>
                                2-4 Participants<br>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse59" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse59" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>10.00AM - 4:00PM </div><br>

                                

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse60" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse60" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9193846 60021">D HARIHARAN - 93846 60021 </a></li>
                                    <li><a style="color: white;" href=" tel:+9182481 59951">PAVITHRA B - 82481 59951</a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_12"><b>Register</b></button></center>
        </div>
    </div>
    <div id="id-modal-13" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_13">&times;</span>
            <h4>HACKATHON</h4>
            <h6 class="e_tag">"Think. Code. Innovate." </h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse56" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse56" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    This event is a 24-Hour software-based hackathon wherein, the participants have to solve
                                    the provided problem statements within the stipulated time. The problems statements will
                                    be software-based, which are to be cracked by the participants by means of their programming
                                    and problem-solving skills. At the end, they will be judged based on various criteria like
                                    uniqueness, originality of solution and presentation skills.</p>
                                </p><br>
                        <h5>ROUND 1:</h5>
                                <p> The Round 1 is an abstract shortlisting round. You will be given a problem statement after which you will have to provide an abstract within a hour. The participants will be shortlisted based on the efficiency of the solution proposed. 
                                </p><br>
                                <h5>ROUND 2:</h5>
                                <p> This is where, you implement the proposed solution. You will be given 24 hours, after which it will be scrutinized by the judges.
                                </p>
                                <h5> FEES</h5>
                                <p>
                                 Each team must pay a fee of Rs.350 excluding the general registration fee to participate in the Hackathon.
                                </p>
                           
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse57" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse57" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cards and campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>
                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse48" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse48" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Each team can have 2 to 3 members.</li>
                                    <li>All the team members must be having their ID cards for verification, throughout the event.</li>
                                    <li>A team can have its members from different institutions as well.</li>
                                    <li>The teams aren't allowed to leave the college premises during the flow of the event. They must
                                        be within the college premises and be contactable at all times.</li>
                                    <li>All the necessary resources required for the event like Laptops, Smartphones, Wi-Fi Hotspot, etc.,
                                        must be brought by the participants themselves. No labs will be provided for the same.</li>
                                    <li>All the required software for programming, should also be installed in their devices well before
                                        hand in order to avoid wastage of time. No extra time will be provided for reasons concerning the same.</li>
                                    <li>Plagiarism is strictly prohibited. Any teams found to copy or use the same code, will be
                                        debarred from the event proceedings.</li>
                                    <li>Any team can be disqualified from the competition at the organizers' discretion. Reasons might
                                        include, but are not limited to breaking of the event rules, leaving the college premises during the event, breaking the code of conduct or any other unsporting behaviour.</li>
                                    <li>In case of any discrepancies, the final take shall lie with the organizers.</li>

                                </ol>
                                <h5>TEAM SIZE</h5>
                                2-3 Participants<br> </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse59" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse59" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>

                                <h5>DATE</h5>
                                <div>29 and 30 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>11:00 AM</div><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse60" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse60" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9190474 42244">AHILESH RAM - 90474 42244 </a></li>
                                    <li><a style="color: white;" href=" tel:+9193610 73014">DEEPA R S - 93610 73014 </a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_13"><b>Register</b></button></center>
        </div>
    </div>
    <div id="id-modal-14" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_14">&times;</span>
            <h4>BOT-CLAR</h4>
            <h6 class="e_tag">"Its designed to do that"</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse56" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse56" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                                <p>
                                    Where are all the bot enthusiasts? Come let's play a game of clearing objects with
                                    our self designed robots. Pool in all your ideas to make your bot push the objects
                                    out of the field.</p>
                                <h5>ROUND 1:</h5>
                                <p>
                                    We are starting with the players designing a bot to clear the objects in the given area.
                                    The shape and area of the field will be mentioned in the specification sheet. 5 to 10
                                    objects(not necessarily with same physical properties) are to be cleared off from the
                                    area.The shape of the field/platform in which the robot will move will be simple where
                                    its border will be marked at the edge of the field.The bot can be placed anywhere in this
                                    field but should not touch or cross the border line while moving around.The timekeeper marks
                                    the start and end time.

                                </p><br>
                                <h5>ROUND 2:</h5>
                                <p>Round 2 will have the same objective as the previous round, in difference with round 1, the
                                    complexity of shape of field/ platform is increased. The specification of the field will be
                                    mentioned in the specification sheet. The physical properties of the objects can also be varied.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse57" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse57" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cardsand campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse48" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES/SPECIFICATION<span> </span></a>
                            </h4>

                        </div>
                        <div id="collapse48" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Each team can have a maximum of 4 members.</li>
                                    <li>Participants must adhere to the specifications mentioned in the specification data sheet.</li>
                                    <li>The bot should work completely automatic not manually or semi-automatic.</li>
                                    <li>The bot that clears the field for a shorter period will be chosen first.</li>
                                    <li>Scoring points will be provided for each object pushed out of the area.</li>
                                    <li>In the event of tie, the bot with the quickest round time wins.
                                    <li>In the event of tie of both score and time, keep a playback until there is a clear winner.</li>
                                    <li>The scoring criteria will be announced at the outset of the event</li>
                                </ol>
                                <center><a href="assets/specification/Botclar.pdf" class="download" >DOWNLOAD SPECIFICATION SHEET</a></center><br><br>
                                <h5>TEAM SIZE</h5>
                                1-4 Participants<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse59" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse59" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE: </h5>
                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>11:00 AM</div><br>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse60" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse60" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9193607 38913">MADHAVAN H - 93607 38913 </a></li>
                                    <li><a style="color: white;" href=" tel:+9186676 06303">NIVASINI B - 86676 06303 </a></li>
                                </ul><br>


                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_14"><b>Register</b></button></center>
        </div>
    </div>
    <div id="id-modal-15" class="modal">
        <div class="modal-content">
            <span class="modal_close modal_close_15">&times;</span>
            <h4>MAZEMICE</h4>
            <h6 class="e_tag">"Our bots crew is up for success"</h6>
            <div class="description grid-lg-12 grid-md-12 grid-sm-12 grid-xs-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse56" aria-expanded="false" aria-controls="collapseThree">
                                    DESCRIPTION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse56" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                            <div class="panel-body">
                            <p>
                                    A great news for all the millennials out there with interest in designing a bot! Come
                                    with your peers to design a bot that is a line follower. The bot should be designed
                                    and programmed to track the path of the maze and reach its destination.
                                </p>
                                <h5>ROUND 1:</h5>
                                <p>
                                    Firstly, the bot designed should be able to detect and move on the track specified. Then the bot
                                    will have to move firmly in the path of that particular maze. There would be changes in direction
                                    of the track and bot should be able to trace it properly and move accordingly. There would be a
                                    destination for every maze. The bot should be able to move till the destination without any
                                    deviation from the track laid out. The maze provided will be of less complexity.
                                </p><br>
                                <h5>ROUND 2: </h5>
                                <p>
                                    The teams shortlisted in round 1 will now have a second round where the line follower bot will be put
                                    to test as the bot designed will now be expected to move on a complex maze.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse57" aria-expanded="false" aria-controls="collapseTwo">
                                    GENERAL RULES<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse57" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>
                                <ol>
                                    <li>Every participant must have registered individually before reporting to the event.If a team has 2 or more members each member must have registered individually.</li>
                                    <li> All participants are required to follow appropriate dress code (Boys- Shirt/Pant,Girls-Kurthi/Chudidhar).</li>
                                    <li> All registered participants must collect their respective SRiSHTi ID Cardsand campus map from the registration desk on the day of the events.</li>
                                    <li> ID card verification will be carried out before the event starts and the participant is required to have their ID card throughout the event.</li>
                                    <li> Late entries for events and workshops will not be permitted, the participants are also advised to report to the campus 30 mins prior to have a hassle-free experience.</li>
                                    <li> Important Guidelines and Information regarding the Symposium will be conveyed at the Inauguration Event (October 29th 8:00 am) of SRiSHTi 2k22, so participants must attend the same without fail.</li>
                                    <li> Any discrepancy during the event should be immediately reported to the event convenor and necessary actions would be taken. Any late response will not be taken into consideration.</li>
                                    <li> The judge's decision is final for all the events and will not be subjected to further discussion. Indulging in any malpractices will lead to immediate disqualification.</li>
                                    <li> All the participants should pay the general registration fee to attend the events. Apart from this, events such as Paper Presentation, Flagship Events, Workshop will have additional fee.</li>
                                    <li> Any forms of Inappropriate Behaviour will be highly condemned and necessary actions will be taken.</li>
                                    <li> All events will conclude by 3:00 pm on October 30th and the prize winners will be announced immediately at the valedictory event (October 30th4:00 pm) of SRiSHTi 2k22.</li>

                                </ol>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse48" aria-expanded="false" aria-controls="collapseThree">
                                    EVENT RULES/ SPECIFICATIION<span> </span></a>
                            </h4>
                        </div>
                        <div id="collapse48" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <p>
                                <h5>ROUND ONE:</h5>
                                <ol>
                                    <li> Participants can be of a group of 3 to 4 members.</li>
                                    <li> Participants should be present on time for the event.</li>
                                    <li> For the first round, the bot designed by the participants should be able to detect and move on the track specified.</li>
                                    <li> Time taken by the bot to reach the destination will be considered as the major criteria for judgment.</li>
                                    <li> The way in which the bot moves, that is without any deviation from the given line will also be taken into account.</li>
                                    <li>Decisions made by the judges stand final.</li>
                                </ol>
                                <h5>ROUND TWO:</h5>
                                <ol>
                                    <li>For the second round,a maze will be given.</li>
                                    <li>The bot designed will now be expected to move on the complex maze and reach its end.</li>
                                    <li>The bot shouldn't be taken again for any correction once it starts moving.</li>
                                    <li>The participant's knowledge about the bot they have designed will be tested.</li>

                                </ol>
                                <center> <a href="assets/specification/MazeMice.pdf" class="download" >DOWNLOAD SPECIFICATION SHEET</a></center><br><br>
                                <h5>TEAM SIZE</h5>
                                1-4 Participants<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingone">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse59" aria-expanded="false" aria-controls="collapseone">
                                    DATE AND TIME
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse59" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingone">
                            <div class="panel-body">
                                <p>

                                <h5>DATE</h5>
                                <div>29 OCTOBER 2022</div><br>
                                <h5>TIME</h5>
                                <div>9:00 AM</div><br>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                            <h4 class="panel-title">
                                <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse60" aria-expanded="false" aria-controls="collapsefive">
                                    CONTACT
                                    <span> </span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse60" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                            <div class="panel-body">
                                <p>

                                <ul>
                                    <li><a style="color: white;" href=" tel:+9194426 71132">AKSAYA KARTHIKA A - 94426 71132 </a></li>
                                    <li><a style="color: white;" href=" tel:+9195976 78840">SREE VARDHANI T - 95976 78840</a></li>
                                </ul><br>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h4 style="font-size: 20px; color: white;">There's a treasure waiting for the winners.</h4><br>
            <!--<button class="coming_soon">Coming soon</button>-->
            <center><button type="button" class="submitBtn" id="btn_15"><b>Register</b></button></center>
        </div>
    </div>
    </div>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


    <!-- jQuery 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
-->

    <script type="text/javascript">
        var marker = document.querySelector('#sliding-bar');
        var item = document.querySelectorAll('nav a');

        function indicator(e) {
            marker.style.left = e.offsetLeft + "px";
            marker.style.width = e.offsetWidth + "px";
        }

        item.forEach(link => {
            link.addEventListener('click', (e) => {
                indicator(e.target);
            })
        })
    </script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/events.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>