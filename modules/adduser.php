<?php 
@ob_start();
session_start();

$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 

// If form is submitted 
if(isset($_POST['name']) || isset($_POST['email'])){ 
    // Get the submitted form data 
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $create_password = $_POST['create-password']; 
    $confirm_password = $_POST['confirm-password'];
    $mobile = $_POST['mobile'];
    // $department = $_POST['department']; 
    $cgname = $_POST['cgname'];
    $accomodation = $_POST['accomodation'];
     
    // Check whether submitted data is not empty 
    if(!empty($name) && !empty($email)){ 

        if (strlen($name) < 4) {
            $response['message'] = 'Full name is required.';
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
        } elseif (strlen($mobile) != 10) {
            $response['message'] = 'Mobile Number must be 10 digits.';
        } elseif (strlen($department) <= 2) {
            $response['message'] = 'Enter Your department name.';
        } elseif (strlen($cgname) <= 4) {
            $response['message'] = 'Enter your college name.';
        } elseif (strlen($password) <= 4) {
            $response['message'] = 'Password must be at least 4 characters.';    
        
            //VALIDATION
           
        }else{ 
                // Include the database config file 
                include_once '../config.php'; 
                

                $query = "SELECT * FROM members WHERE email='$email'";
	            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	            $num_row = mysqli_num_rows($result);

                if ($num_row < 1) {
                $spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
                // Insert form data in the database 
                $insert = $conn->query("INSERT INTO members (fname,email,password,mobile,cgname,events,workshops,paperpres,flagship,genfee,accomodation) VALUES ('$name','$email','$mobile','$department','$cgname','$spassword',' ',' ',' ',' ','unpaid','$accomodation')"); 
                
                
                $insert_ev = $conn->query("INSERT INTO events (fname,email,mobile) VALUE ('$name','$email','$mobile')");
			    $insert_ws = $conn->query("INSERT INTO workshops (fname,email,mobile) VALUE ('$name','$email','$mobile')");
                $insert_pp = $conn->query("INSERT INTO paperpres (fname,email,mobile) VALUE ('$name','$email','$mobile')");
                $insert_fs = $conn->query("INSERT INTO flagship (fname,email,mobile) VALUE ('$name','$email','$mobile')");
			    
                 
                    if($insert){ 

                        $_SESSION['login'] = $conn->$insert;
				        $_SESSION['fname'] = $name;
				        $_SESSION['email'] = $email;
				        $_SESSION['cgname'] = $cgname;
                        $response['status'] = 1; 
                        $response['message'] = 'Form data submitted successfully!'; 
                    } else {
                        $response['message'] = 'Error inserting data.';
                    }
                }else {
                    $response['message'] = 'Email already in system.';
                }
            
        } 
    }else{ 
         $response['message'] = 'Please fill all the mandatory fields (name and email).'; 
    } 
} 
 
// Return response 
echo json_encode($response);