<?php
include('../config/dbConfig.php');
date_default_timezone_set('Asia/Dhaka');
$date=date('d');
$month=date('m');
$hour=date('H');
$sql ="SELECT * FROM serviceStatus where serviceName='FresherRegistration'";
$result=mysqli_query($db, $sql);
$data = mysqli_fetch_array($result);
$newData=explode("-",$data['countdownDate']);
echo $newData[0];
 if($data['status']=="running"){
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="ROBU Admin">
  <meta name="author" content="Creative Department">
  <title>ROBU | Register</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="../index.php">
          <img src="../assets/img/brand/white.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.php">
                  <img src="../assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#">
                <i class="ni ni-circle-08"></i>
                <span class="nav-link-inner--text">Register</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Login</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Welcome!</h1>
              <p class="text-lead text-light">Fill up the form below to get Started !</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Provide Sign up credentials</small>
              </div>
              <form role="form">
                  <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input id="name" class="form-control" placeholder="Name" type="text">
                  </div>
                </div>
                  
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                    </div>
                    <input onkeypress="return AvoidSpace(event)" id="studentID" class="form-control" maxlength="8" placeholder="Student ID" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input onkeypress="return AvoidSpace(event)" id="email" class="form-control" placeholder="Email" type="email">
                  </div>
                </div>
                <div class="form-group">
                    <small style="color:red;" >** Please Avoid Using +88 or any country code before the number</small>
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                    
                    <input id="cellnum" maxlength="11" class="form-control" placeholder="Cell Number (Do Not use +88 ❌). (Ex:019xxxxxxxx ✅)  " type="text">
                  </div>
                </div>
                
                <div class="text-center">
                  <button id="initiate_button" type="button" class="btn btn-primary mt-4">Initiate Registration</button>
                </div>
                <p>If you face any problem with the registration please mail us at: <strong>bracurobu@gmail.com</strong> / contact us at: <strong> 01771107288(from 11AM - 5PM) </strong>/ message us in our facebook page at:<a href="https://www.facebook.com/BRACU.Robotics.Club/">Robotics Club of BracU</a></p>
                <p>If you are trying for second time or can not register i.e [Student already exist] here please visit the following form at: <a href="https://forms.gle/chBHuoxfEuEmsX6LA">Google Form Link</a></p>
                <p>For further Update and completing registration/recruitment keep an eye on our Facebook Page and your Email(<strong>check spam if mail not found</strong>) </p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="copyright text-center text-xl-left text-muted">
             <script type="text/javascript">
  document.write(new Date().getFullYear());
</script> | All right reserves by <a href="https://robulab.org" class="font-weight-bold ml-1" target="_blank"> ROBU</a> 
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="../" class="nav-link" target="_blank">ROBU Team</a>
            </li>
            <li class="nav-item">
              <a href="../about/" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="../blog/" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/mxTuhin/ROBU_MIT/blob/master/LICENSE" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.7/dist/sweetalert2.all.min.js"></script>
  
  
  
  
   <script>
var input = document.getElementById("cellnum");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("initiate_button").click();
  }
});
</script>
  
  
  <script>
			$("#initiate_button").click(function () {
			        
			       var StudentID = $("#studentID").val();
			       var Email = $("#email").val();
			       var CellNum = $("#cellnum").val();
			       var Name = $("#name").val();
			       
			
			       if (Email == "" || CellNum=="") {
			           Swal.fire({
			               type: 'error',
			               title: 'Oops...',
			               text: 'Email/Cell Number field is empty.',
			               showConfirmButton: true,
			               confirmButtonColor: '#43A047',
			               confirmButtonText: 'Retry',
			               allowOutsideClick: false,
			               allowEscapeKey: false,
			           })
			       } else {
			           Swal.fire({
			               title: 'Processing Request...',
			               showConfirmButton: false,
			               allowOutsideClick: false,
			               allowEscapeKey: false,
			               onBeforeOpen: () => {
			                   Swal.showLoading()
			               }
			           });
			
			           $.ajax({
			               type: "POST",
			               url: 'initiate.php',
			               data: {
			                   email: Email,
			                   studentID:StudentID,
			                   cellnum: CellNum,
			                   name:Name
			               },
			               dataType: "JSON",
			               success: function (data) {
			                   if (data.error) {
			                       Swal.fire({
			                           type: 'error',
			                           title: 'Oops...',
			                           text: data.msg,
			                           showConfirmButton: true,
			                           confirmButtonColor: '#43A047',
			                           confirmButtonText: 'Retry',
			                           allowOutsideClick: false,
			                           allowEscapeKey: false,
			                       })
			                   } else {
			                       Swal.fire({
                                        type: 'success',
                                        title: data.msg,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        html: 'Redirecting in <strong>3</strong> seconds...',
                                        timer: 3000,
                                        onBeforeOpen: () => {
                                            timerInterval = setInterval(() => {
                                                Swal.getContent().querySelector(
                                                        'strong')
                                                    .textContent = (Swal
                                                    .getTimerLeft() / 1000)
                                                    .toFixed(0)
                                            }, 1000)
                                        },
                                        onClose: () => {

                                            clearInterval(timerInterval)
                                            window.location.replace("../signup/");
                                        }
                                    });

			                   }
			               }
			           });
			       }
			});
		</script>
		
		<script>
		    function AvoidSpace(event) {
            var k = event ? event.which : window.event.keyCode;
            if (k == 32){
                Swal.fire('Space is not Allowed');
                return false;
            } 
        }
        

		</script>
</body>
    <?php
}
else{

?>
 <html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Go Back !</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:700,900" rel="stylesheet">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Bangers&display=swap" rel="stylesheet">

</head>

<body style="background-color:black">

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Wait . </h1>
<!--				<h2>Registration session is over. Try Next Semester <span style="color:red"> ❤ </span></h2>-->
                <h2>Registration :  </h2>
			</div><br><br><br><br>
            <p style="color:white; font-size:55px; font-family: 'Bangers', cursive; background: -webkit-linear-gradient(#eee, #3194ad);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;" id="demo"></p>
		
	</div>
    </div>

    <script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $newData[1] ?>/<?php echo $newData[2] ?>/<?php echo $newData[0] ?> <?php echo $data['timer'] ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Out Of Designated Time Slot";
  }
}, 1000);
</script>

</body>

</html>
<?php
}
?>
