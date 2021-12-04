<?php 

include('../config/dbConfig.php');


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

    $errors = array(); 
    if(isset($_POST['registerAdmin'])){
        
        
        $name = $_POST['name'];
        $studentID = $_POST['studentID'];
        $gender = $_POST['gender'];
        $bracuDepartment = $_POST['bracuDepartment'];
        $admissionSemester = $_POST['admissionSemester'];
        $rsInfo = $_POST['rsInfo'];
        $bloodGroup = $_POST['bloodGroup'];
        $hobby = $_POST['hobby'];
        $interest = $_POST['interest'];
        $address = $_POST['address'];
        $fbID = $_POST['fbID'];
        $cellnum = $_POST['cellnum'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        
        $ip=$_SERVER['REMOTE_ADDR'];
        
        $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0; $i<32; $i++) {
            $hash_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
        }
        $hash=md5($hash_id);
        
        
        $sql = "UPDATE memberInfo SET name='$name', studentID='$studentID', gender='$gender', bracuDepartment='$bracuDepartment', admissionSemester='$admissionSemester', rsInfo='$rsInfo', bloodGroup='$bloodGroup', hobby='$hobby', interest='$interest', address='$address', fbID='$fbID', cellnum='$cellnum', email='$email', ip='$ip', hash='$hash', birthday='$birthday' WHERE email='$email'";
		mysqli_query($db, $sql);
		sendMail($email, $name);
        header("Location:../success/");
    
    }
    

function sendMail($email, $name){
    // Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 0;                                                   // Enable verbose debug output
    $mail->isSMTP();                                                        // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                                                 // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                               // Enable SMTP authentication
    $mail->Username   = 'roboticsclubbracu@gmail.com';                             // SMTP username
    $mail->Password   = 'Robulab123';                                                 // SMTP password
    $mail->SMTPSecure = 'TLS';                                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                                // TCP port to connect to

    //Recipients
    $mail->setFrom('hello@robulab.org', 'ROBU LAB');
    $mail->addAddress($email);
    $mail->addReplyTo('hello@robulab.org', 'Information');
//    $mail->addCC('info@example.com');
//    $mail->addBCC('info@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $message = '<html style="background-color:#F5F5F5; font-family:Tahoma, Geneva, sans-serif">';
    $message .= '<body style="padding:0"><div align="center">';
    $message .= '<h3 style="width:40%;background-color:#4CAF50;color:#FAFAFA;padding:30px;border-radius: 10px 10px 0px 0px;margin:0">Success! Registration Completed</h3>';
    $message .= '<div align="center"><p style="width:40%;background-color:#FAFAFA; margin:0;padding:30px;text-align:left">Hi <b>';
    $message .= $name;
    $message .= ',</b><br><br>Congratulations!<br><br>Your Registration has been Completed. The Interview Date is:  <b>4, 5 and 6</b> February . Interview Room is <b>Robotics Lab (UB50601)</b></p>';
    $message .='<br><br>';
    $message .='<b style="font-sze:15px">Best of luck for the interview session</b>';
    $message .= '</div></div></body></html>';

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'ROBU | Registration Succesful';
    $mail->Body    = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
} catch (Exception $e) {
    
}


}

    
    
    

?>