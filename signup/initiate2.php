<?php

include('../config/dbConfig.php');
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$studentID     = $_POST['studentID'];
	$cellnum     = $_POST['cellnum'];
	$name     = $_POST['name'];
	$joiningSemester="";
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
	
	
	
	
	
	$sql    = "SELECT * FROM memberInfo WHERE email='$email'";
	$result = mysqli_query($db, $sql);
	
	if (mysqli_num_rows($result) > 0) {
        	$response['error'] = true;
			$response['msg']   = "Student Already Exists !";
	} else {
	    
	    $hex_string = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        for($i=0; $i<9; $i++) {
            $member_id  .= $hex_string{rand(0,strlen($hex_string)-1)};
        }
        $hash=md5($member_id);

		$sql = "INSERT INTO memberInfo (id, studentID, cellnum, email, memberID, hash, name, joiningSemester) 
		VALUES (NULL,'$studentID', '$cellnum', '$email', '$member_id', '$hash', '$name', '$joiningSemester')";
		if (mysqli_query($db, $sql)) {
            $response['error'] = false;
			$response['msg']   = "Please Check Your SMS and Email for further Instruction";
			
			
			$nameT=explode(" ", $name);
			$user = $nameT[0];
            $username = "tuhinmridha";
            $password = "tuhin1234";
            $receiver = $cellnum;                                              // 01xxxxxxxxx - for Single
            // $receiver = "(01xxxxxxxxx,01xxxxxxxxx,01xxxxxxxxx)";                    // (01xxxxxxxxx,01xxxxxxxxx,01xxxxxxxxx) - for Multiple
            $sms_content = "Hello $user, Thank You For Getting Registered With ROBU. Proceed to The Following Link To Complete Registration Process. Besides, Check Your Email. Check Spam Folder If Not Found. Thank You. http://robulab.org/registration/?h=$hash&id=$member_id";
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://gosms.xyz/api/v1/sendSms",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => array('username' => $username,'password' => $password,'number' => $receiver,'sms_content' => $sms_content,'sms_type' => '1','masking' => 'non-masking'),
            ));
            $msg_response = curl_exec($curl);
            $err = curl_error($curl);
                        
            // echo $msg_response;
            curl_close($curl);
            
            
			
		} else {
// 			echo "Wrong Wrong Wrong";
	        $response['error'] = true;
			$response['msg']   = "Something Went Wrong";
		}
	}
	
	echo json_encode($response);
}

?>