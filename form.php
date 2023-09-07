<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRiSHTi 2k23 | SIGN UP</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>

    <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<script>
$(document).ready(function() {
    $('#dataForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'http://localhost/SRiSHTi_2k23_FINAL/add-details.php',
            data: new FormData(this),
            // dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#submitbtn').attr("disabled", "disabled");
                // $('#success_msg').html('<p>Loading...</p>');
            },
            success: function(response) {
                if (response.status == 1) {
                    console.log(response)
                    $('#additional-data-form')[0].reset();
                    $('#add_err2').html('<div class="alert alert-success">\<strong>' +
                        response + '</strong> \ \ </div>');
                    // window.location.href = "home.php";
                } else {
                    $('#add_err2').html('<div class="alert alert-danger"> \ <strong>' +
                        response + '</strong> \ \ </div>');
                    alert(response);
                }
                $('#dataForm').css("opacity", "");
                $('#submitbtn').removeAttr("disabled");
            }
        });
    });
});
</script>

<!-- check box -->
<script type="text/javascript">
$(document).ready(function() {
    $("#cgcheck").click(
        function() {
            if ($("#cgcheck").is(":checked")) {
                $("#cgname").val("PSG College of Technology");
                $("#cgname").prop("readonly", true);
            } else {
                $('#cgname').val("");
                $("#cgname").prop("readonly", false);
            }
        });
});
</script>

<!-- check box -->
<script type="text/javascript">
$(document).ready(function() {
    $("#cgcheck1").click(
        function() {
            if ($("#cgcheck1").is(":checked")) {
                $("#cgname").val("PSG Institute of Technology");
                $("#cgname").prop("readonly", true);
            } else {
                $('#cgname').val("");
                $("#cgname").prop("readonly", false);
            }
        });
});
</script>


<body>

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

                <div class="xtra-details">
                    <div class="container">
                        <h4 class="add-details">ADDITIONAL DETAILS</h4>
                        <div id="add_err2"></div>
                        <form id="dataForm">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Mobile</label>
                                <input type="tel" class="form-control" name="phone" id="phone">
                            </div>
                            <div class="mb-3">
                                <label for="deprt" class="form-label">Department</label>
                                <input type="text" class="form-control" name="depart" id="depart">
                            </div>
                            <div class="form-group mb-3">
                                <label for="cgname" class="form-label">College Name <span style="font-size:0.7rem;">(as per ID Card)</span></label>
                                <div class="form-check my-3">
                                    <input class="form-check-input" name="cgcheck" type="radio" value="PSG CT" id="cgcheck">
                                    <label class="form-check-label" for="cgcheck">PSG CT</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input" name="cgcheck" type="radio" value="PSG iTECH" id="cgcheck1">
                                    <label class="form-check-label" for="cgcheck1">PSG iTECH</label>
                                </div>
                                <div class="form-check my-3">
                                    <input class="form-check-input" name="cgcheck" type="radio" value="" id="cgcheck2">
                                    <label class="form-check-label" for="cgcheck2">Other</label>
                                </div>
                                <input type="text" name="cgname" id="cgname"
                                    class="form-control form-control-lg bg-light rounded-3 w-100 fs-6"
                                    placeholder="Enter your College Name" value="">
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <label class="form-label">Accomodation</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="accomodation"
                                        id="accomodation_yes" value="Yes">
                                    <label class="form-check-label" for="accomodation_yes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="accomodation"
                                        id="accomodation_no" value="No">
                                    <label class="form-check-label" for="accomodation_no">No</label>
                                </div>
                            </div>

                            <!-- <div class="input-group">
                                <i class='bx bxs-lock-alt'></i>
                                <label>Accomodation Needed ?</label>
                                <input type="text" class="form-control" id="accomodation" name="accomodation">
                            </div> -->
                            <!-- <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->

                            <button type="submit" name="submit" id="submitbtn"
                                class="btn btn-primary mx-auto text-center">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="ret-btn d-grid justify-content-center align-content-center mx-auto my-4">
                    <a href="home.php" class="btn btn-dark">Return to Home</a>
                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        const maxChecks = 1;
        let selectedCount = 0;

        document.querySelector('.formcheck').addEventListener('click', event => {
            if(event.target.type === "checkbox"){
                selectedCount = event.target.checked ? selectedCount + 1 :selectedCount - 1;
            }
            if (selectedCount >= maxChecks){
                document.querySelector('input:not(:checked)').forEach(input => input.disabled = true);
            } else{
                document.querySelector('input').forEach(input => input.disabled = false);
            }
        })
    </script> -->
</body>

</html>