<?php
include('registration.php');
$hash=$_GET["h"];
$id=$_GET["id"];


$sql    = "SELECT * FROM memberInfo WHERE hash='$hash' AND memberID='$id'";
$result = mysqli_query($db, $sql);
$data=mysqli_fetch_assoc($result);
$fetchedHash=$data['hash'];
$fetchedEmail=$data['email'];

if($hash!="" || $id!=""){
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="ROBU Admin.">
  <meta name="author" content="Creative Department">
  <title>ROBU | Registration</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <!--<link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet">
  
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
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
              <p class="text-lead text-light">Fill up the required info and get registered to the<br> ROBU Web System </p>
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
    
    
    <style>
    #colorSelector{
        display:none;
    }
        input[type="file"] {
    display: none;
}
    #profile-img-tag{
        display:none;
    }
.custom-file-upload {
    border: 1px solid #FFFFFF;
    display: inline-block;
    padding: 4px 12px;
    cursor: pointer;
    border-radius: 20% ;
}
media only screen and (max-width: 600px) {
input[type="date"]:before {
  color: darkgrey;
  content: attr(placeholder) !important;
  margin-right: 0.5em;
  margin-top: 10px !important;
  
}
}
    </style>
    
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
           <?php
           if($hash==$fetchedHash){
           ?>
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign up with required credentials</small>
              </div>
              <form action="index.php"  method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-user"></i></span>
                    </div>
                    <input class="form-control" placeholder="Name" id="name" name="name" value="<?php echo $data['name'] ?>" type="text" required autofocus>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-id-card"></i></span>
                    </div>
                    <input class="form-control" placeholder="Student ID" value="<?php echo $data['studentID'] ?>" id="studentID" name="studentID" type="text" required>
                  </div>
                </div>
                
                <div class="form-group">
                    
                    <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-transgender"></i></span>
                    </div>
                    <select id="gender" name="gender" class="form-control" required>
                      
                      <option disabled selected value="NotSelected">Choose Your Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                      
                  </select>
                  </div>
                  
                </div>
                
                
                <div class="form-group">
                    
                    <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                    </div>
                    <select name="bracuDepartment"  class="form-control" required>
                      
                      <option disabled selected value="NotSelected">Department</option>
                      <option value="CSE">CSE</option>
                      <option value="EEE">EEE</option>
                      <option value="Architecture">Architecture</option>
                      <option value="ESS">ESS</option>
                      <option value="ENH">ENH</option>
                      <option value="MNS">MNS</option>
                      <option value="Pharmacy">Pharmacy</option>
                      <option value="BBS">BBS</option>
                      
                      
                      
                      
                  </select>
                  </div>
                  
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                    </div>
                    <input class="form-control" placeholder="Semester of Admission" name="admissionSemester" type="text" required>
                  </div>
                </div>
                
                 <div class="form-group">
                    
                    <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-igloo"></i></span>
                    </div>
                    <select name="rsInfo" class="form-control" required>
                      
                      <option disabled selected value="NotSelected">Completed RS ?</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                      
                  </select>
                  </div>
                  
                </div>
                
                
                <div class="form-group">
                    
                    <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-tint"></i></span>
                    </div>
                    <select name="bloodGroup" class="form-control" required>
                      
                      <option disabled selected value="NotSelected">Blood Group</option>
                      <option value="A+">A+</option>
                      <option value="A-">A-</option>
                      <option value="B+">B+</option>
                      <option value="B-">B-</option>
                      <option value="AB+">AB+</option>
                      <option value="AB-">AB-</option>
                      <option value="0+">0+</option>
                      <option value="0-">0-</option>
                      
                      
                      
                  </select>
                  </div>
                  
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                    </div>
                    <input class="form-control" placeholder="Birthday" name="birthday" type="date" required>
                  </div>
                </div>
                
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-palette"></i></span>
                    </div>
                    <input class="form-control" placeholder="Hobby" name="hobby" type="text" required>
                  </div>
                </div>
                
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-skating"></i></span>
                    </div>
                    <input class="form-control" placeholder="Interest" name="interest" type="text" required>
                  </div>
                </div>
                
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                    </div>
                    <input class="form-control" placeholder="Detailed Address (Present)" name="address" type="text" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                    </div>
                    <input class="form-control" placeholder="Facebook ID (Must be a clickable one)" name="fbID" type="text" required>
                  </div>
                </div>
                
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                    <input class="form-control" placeholder="Cellnumber" value="<?php echo $data['cellnum'] ?>" name="cellnum" type="text" required>
                  </div>
                </div>
                
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" value="<?php echo $data['email'] ?>" name="email" type="email" required>
                  </div>
                </div>
                
                
                
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <!--<button type="submit" id="update_registration" class="btn btn-primary">Complete Registration</button>-->
                  <input type="submit" name="registerAdmin" value="Complete Registration" class="btn btn-primary mt-4">
                </div>
              </form>
            </div>
            <?php
           }else{
               
               ?>
               <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <center><b>Sorry ! The link has been Expired</b></center>
              </div>
              
              
            </div>
               
               
               
               <?php
           }
            ?>
            
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
</script> | Made with ❤ for ROBU by <a href="https://www.facebook.com/tuhin.mridha.5" class="font-weight-bold ml-1" target="_blank"> Tuhin Mridha</a> 
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
  
</body>

</html>
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

</head>

<body>

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>403</h1>
				<h2>You are not Authorized</h2>
			</div>
		</div>
	</div>

</body>

</html>

<?php
}
?>