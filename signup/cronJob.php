<?php

$server_address = "localhost";              	//If you connecting remotely to this database you need to set the hostname of your server and you need to allow access to your ip from server 
    $database_name = "robulab1_register";   	    //Set your database name
    $username = "robulab1_robulab1";		    //Set your database username
    $password = "Robu@2021";		    //Set database password
    
    // Create connection
    $db = new mysqli($server_address, $username, $password, $database_name);
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
session_start();

$response = array();
$errors = array(); 

	date_default_timezone_set("Asia/Dhaka");
	$month=date('m');
	$year=date('y');
	if($month<4){
	    $joiningSemester="Spring-".$year;
	}
	else if($month<8){
	    $joiningSemester="Summer-".$year;
	}
	else if($month<12){
	    $joiningSemester="Fall-".$year;
	}
	
	
	
	
	
	$sql    = "SELECT * FROM memberInfo WHERE mailStatus=''";
	$result = mysqli_query($db, $sql);
	
	while($data = mysqli_fetch_array($result)){
        
        $email=$data['email'];
        $name=$data['name'];
        $hash=$data['hash'];
        $member_id=$data['memberID'];
        $cellnum=$data['cellnum'];
        sendMail($email, $name, $hash, $member_id);
        
        $query="UPDATE memberInfo set mailStatus='sent' where memberID='$member_id'";
        
        
        
        mysqli_query($db, $query);
        
        //SMS API Starts
        $nameT=explode(" ", $name);
		$user = $nameT[0];
        
        $token = "f44404aa288bd4f56c0799db4c8bacb2";
        
        $msg = "Hello $user, Your registration has been initiated. Please complete your registration at http://robulab.org/registration/?h=$hash&id=$member_id ";
        $url = "http://api.greenweb.com.bd/api.php";
        	$data= array(
        'to'=>"$cellnum",
        'message'=>"$msg",
        'token'=>"$token"
        ); // Add parameters in key value
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        
        //Result
        echo $smsresult;
        
        //Error Display
        echo curl_error($ch);
        
        
        
        //SMS API ENDS
        
        
        
//        echo $email ." - ". $name ." - " . $hash ." - ". $member_id ." - ";
	}
	
//	echo json_encode($response);
                                      



function sendMail($email, $name, $hash, $member_id){
$to = $email;
$subject = "ROBU Web System | Complete Registration!";

$user = $name;

$htmlContent = '
    <html>
    <head>
        <title>ROBU Web System | Complete Registration</title>
        <style>
        .button {
          background-color: #4CAF50;
          border: none;
          color: white;
          padding: 15px 25px;
          text-align: center;
          font-size: 16px;
          cursor: pointer;
        }
        
        .button:hover {
          background-color: green;
        }
        </style>
    </head>
    <body>
        <div align="center">
            <img src="https://robulab.org/assets/favicon.png" style="padding:20px; height:50px">
            <hr>
        </div>
        <div style="padding:20px;">
            <p>
                <b>Hello '.$name.',</b>
                <br><br>
                Congratulations!<br><br>You have succesfully initiated your registration process.<br><br>Please follow the link below to complete registration. Thank you!</p>
                <br><br>
                <a href="http://robulab.org/registration/?h='.$hash.'&id='.$member_id.'" target="_blank"><button style="background-color: #4CAF50;
          border: none;
          color: white;
          padding: 15px 25px;
          text-align: center;
          font-size: 16px;
          cursor: pointer;">Complete Registration Here</button></a>
                <br><br>
                Thanks
                <br>
                ROBU Web System Team
            </p>
        </div>
    </body>
</html>';

// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: ROBU LAB<info@robulab.org>' . "\r\n";
//$headers .= 'Cc: welcome@example.com' . "\r\n";
//$headers .= 'Bcc: welcome2@example.com' . "\r\n";

// Send email
if(mail($to,$subject,$htmlContent,$headers)):
    $successMsg = 'Email has sent successfully.';
else:
    $errorMsg = 'Email sending fail.';
endif;

}


?>