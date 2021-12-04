<?php
session_start();
include('../config/dbConfig.php');


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
	
	$sql    = "SELECT * FROM memberInfo WHERE email='$email' OR studentID='$studentID'";
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

		$sql = "INSERT INTO `memberInfo` (`memberID`, `joiningSemester`, `name`, `studentID`, `gender`, `bracuDepartment`, `admissionSemester`, `rsInfo`, `bloodGroup`, `birthday`, `hobby`, `interest`, `address`, `livingCountry`, `fbID`, `cellnum`, `email`, `password`, `approval`, `image`, `coverPhoto`, `robuDepartment`, `clubPosition`, `status`, `ip`, `interviewer`, `remarks`, `hash`, `aboutMe`, `bioText`, `safetyIP`, `timestamp`, `mailStatus`) VALUES ('$member_id','$joiningSemester','$name','$studentID', '', '', '', '', '', '', '', '', '', '', '', '$cellnum', '$email', '', '', '', '', '', '', '', '', '', '', '$hash', '', '', '', CURRENT_TIMESTAMP, '');";
		
	
		
		if (mysqli_query($db, $sql)) {
            $response['error'] = false;
			$response['msg']   = "Please Check Your SMS and Email for further Instruction";
			
		} else {
// 			echo "Wrong Wrong Wrong";
	        $response['error'] = true;
			$response['msg']   = "Something Went Wrong";
		}
	}
	
	echo json_encode($response);
}

?>