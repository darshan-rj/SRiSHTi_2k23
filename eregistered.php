<?php

session_start();

if(isset($_SESSION['email'])){
    if(isset($_SESSION['genfee']) && $_SESSION['genfee']=='paid'){
        $evname = $_POST['evname'];
        $email = $_SESSION['email'];

        include_once 'includes/dbh.inc.php'; 

        $query = "SELECT events FROM members WHERE email='$email'";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        $count_query = "SELECT count('email') AS ev_count FROM events WHERE `$evname`='yes'";
        $count = mysqli_query($conn, $count_query) or die(mysqli_error($conn));
        $count1 = mysqli_fetch_array($count);

        $max_count=1000;
        if($evname=='SHERLOCKS CIRCLE'){
            $max_count=130;
        }else if($evname=='READY SET SCAVANGE'){
            $max_count=100;
        }

        if ($num_row = 1) {

            $_SESSION['events'] = $row['events'];
            $ev_arr = explode (", ", $_SESSION['events']); 
            
            if (in_array($evname, $ev_arr)){
                echo 'rem';
            }else {
                if($count1['ev_count'] > $max_count){
                    echo 'full';
                }else{
                    $query = "UPDATE members SET events=concat('$evname' , ', ' , events) WHERE email = '$email'" ;
                    $sql = "UPDATE events SET `$evname`='yes' WHERE email = '$email'";
                    $update = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    echo 'true';
                }
            }

        } else{
            echo 'false';
        }
    }else{
        echo 'genfee';
    }
}else{
    echo 'false';
}

?>