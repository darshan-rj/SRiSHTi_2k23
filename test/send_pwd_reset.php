<?php
session_start();

$email = $_POST['email'];

if(isset($_POST['email'])){

    $token = bin2hex(random_bytes(16));

    $token_hash = hash("sha256", $token);
    
    $expiry = date("Y-m-d H:i:s", time() + 60*30);
    
    require  "database.php";
    
    
    $sql = "UPDATE eusers SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss",$token_hash, $expiry, $email);
    $stmt->execute();
    
    if($conn->affected_rows){
    
        $mail = require __DIR__ . '/mailer.php';
    
        $mail->setFrom("noreply@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = "Password Reset";
        $mail->Body = <<<END
    
        Click <a href="http://localhost/SRiSHTi_2k23_FINAL/reset-password.php?token=".$token.">here</a> to reset password.
        END;
        try{
            $mail->send();
        }catch(Exception $e){
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    
    echo "Message sent successfully. Please Check your inbox for more information";
}
else{
    echo "Enter your email if already registered";
}
