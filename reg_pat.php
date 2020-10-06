<?php
session_start();
//$_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
 
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Health Card</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
       <li class="nav-item">
        <a class="nav-link" href="faq.php">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact1.php">Contact Us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
    </body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<body>
        <?php
global $conn;
    if(isset($_POST['submit'])){
$servername = "localhost:3308";
$username = "bhavya";
$password = "1111";
$database="myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
   
        @$user=mysqli_real_escape_string($conn,$_POST['user']);
        @$last=mysqli_real_escape_string($conn,$_POST['last']);
        @$emails=mysqli_real_escape_string($conn,$_POST['emails']);
        @$mobileNumber=mysqli_real_escape_string($conn,$_POST['mobileNumber']);
        @$pass=mysqli_real_escape_string($conn,$_POST['pass']);
        @$conpass=mysqli_real_escape_string($conn,$_POST['conpass']);
        @$blood=mysqli_real_escape_string($conn,$_POST['blood']);
        @$gender=mysqli_real_escape_string($conn,$_POST['gender']);
        
         $_SESSION['user']=$user;


$select="SELECT emails FROM patient where emails='$emails'";
$sql = "INSERT INTO patient(user,last,emails,mobileno,pass,conpass,blood,gender)
VALUES('$user','$last','$emails','$mobileNumber','$pass','$conpass','$blood','$gender')";
        
$sql1="SELECT id, emails from patient WHERE emails='$emails'";
    $result = mysqli_query($conn,$select);
//    echo $result;
   if(mysqli_num_rows($result ) > 0){
//       echo"<script>alert('Someone has Registered With This Id')</script>";
    die( "Someone Has Already Registrated With This Email Try Using Another Email ID!!" ) ;
   }
$result1=mysqli_query($conn,$sql1);
if (mysqli_query($conn, $sql)) {
//    
//    echo "<script>alert('You have Registrated Successfully & mail is has been sent to your gmail account')</script>";

    if($row=mysqli_fetch_assoc($result1)){
    $to_email = $_POST['emails'];
    $subject = 'Registration To Health Card';
    $message = 'Your Data Has been Registrated and you Patient Id as following' .$row['id']. 'And Password is ' .$pass . 'for more details contact to info@healthcard.com';
    $headers = 'From: noreply@healhcard . com';
    mail($to_email,$subject,$message,$headers);
//    echo"$row";
//    echo"<h3><center>Log In To See More Activity!</h3></center>";
}
     else {
         echo "Error creating database: " . mysqli_error($conn);
}
}
        
//        else {
////    echo "Error creating database: " . mysqli_error($conn);
//}

mysqli_close($conn);
    }
?>
    
<h1 class="text-center">Patient Registration Form</h1>
    <h6 class="text-danger font-weight-bold">*All Fields Are required</h6>

	<div class="container"><br>
		
		<div class="col-lg-6 m-auto d-block">
			
			<form action="reg_pat.php" onsubmit="return validation()" class="bg-light" method="post">
				<div class="form-group">
					<label for="user" class="font-weight-bold"> Username: </label>
                    <span id="username" class="text-danger font-weight-bold"> *</span>
					<input type="text" name="user" class="form-control" id="user" autocomplete="off">
					<span id="username" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label  class="font-weight-bold"> Last_name: </label>
                    <span id="lastname" class="text-danger font-weight-bold">*</span>
					<input type="text" name="last" class="form-control" id="last" autocomplete="off">
					<span id="lastname" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label class="font-weight-bold"> Email: </label>
                    <span id="emailids" class="text-danger font-weight-bold">*</span>
					<input type="text" name="emails" class="form-control" id="emails" autocomplete="off">
					<span id="emailids" class="text-danger font-weight-bold"></span>
				</div>
                <div class="form-group">
					<label class="font-weight-bold"> Password: </label>
                    <span id="passwords" class="text-danger font-weight-bold">*</span>
					<input type="text" name="pass" class="form-control" id="pass" autocomplete="off">
					<span id="passwords" class="text-danger font-weight-bold"> </span>
				</div>

				<div class="form-group">
					<label class="font-weight-bold"> Confirm Password: </label>
                    <span id="confrmpass" class="text-danger font-weight-bold">*</span>
					<input type="text" name="conpass" class="form-control" id="conpass" autocomplete="off">
					<span id="confrmpass" class="text-danger font-weight-bold"> </span>
				</div>

				<div class="form-group">
					<label class="font-weight-bold"> Mobile Number: </label>
                    <span id="mobileno" class="text-danger font-weight-bold">*</span>
					<input type="text" name="mobile" class="form-control" id="mobileNumber" autocomplete="off">
					<span id="mobileno" class="text-danger font-weight-bold"> </span>
				</div>
                
                    <!--<input type="submit" name="generate" value="Generate OTP" class="btn btn-success"autocomplete="off">
                <div class="form-group">
					<label class="font-weight-bold"> Enter OTP: </label>
                    <span id="otpnumber" class="text-danger font-weight-bold">*</span>
					<input type="text" name="otp" class="form-control" id="otp" autocomplete="off">
					<span id="otpnumber" class="text-danger font-weight-bold"> </span>
				</div>
                 <input type="submit" name="verify" value="Verify OTP" class="btn btn-success"autocomplete="off">-->

                <div class="form-group">
					<label class="font-weight-bold">Gender:</label>
                    <span id="gen" class="text-danger font-weight-bold">*</span>
                    <select id="gender" name="gender"  autocomplete="off" required>
                    <option value=""></option>    
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    <option value="o">Others</option>
                    </select>
					<span id="gen" class="text-danger font-weight-bold"> </span>
				</div>
                <div class="form-group">
					<label  class="font-weight-bold">Blood_group:</label>
                    <span id="gen" class="text-danger font-weight-bold">*</span>
                    <select id="blood" name="blood" autocomplete="off" required>
                    <option value=""></option>    
                    <option value="a">A+</option>
                    <option value="b">B+</option>
                    <option value="a+">A-</option>
                    <option value="b-">B-</option>
                    <option value="ab+">AB+</option>
                    <option value="ab-">AB-</option>
                    <option value="o+">O+</option>
                    <option value="o-">O-</option>
                        
                    </select>
					<span id="gen" class="text-danger font-weight-bold"> </span>
				</div>
                

				<input type="submit" name="submit" value="Submit" class="btn btn-success" 	autocomplete="off">
                <input type="reset" name="reset" value="Reset" class="btn btn-success" 	autocomplete="off">
                

			</form><br><br>


		</div>
	</div>
	<script type="text/javascript">
		function validation(){

			var user = document.getElementById('user').value;
            var last = document.getElementById('last').value;
			var pass = document.getElementById('pass').value;
			var confirmpass = document.getElementById('conpass').value;
			var mobileNumber = document.getElementById('mobileNumber').value;
			var emails = document.getElementById('emails').value;
           var gender = document.getElementById('gender').value;

			if(user == ""){
				document.getElementById('username').innerHTML =" ** Please fill the username field";
				return false;
			}
			if((user.length <= 2) || (user.length > 20)) {
				document.getElementById('username').innerHTML =" ** Username lenght must be between 2 and 20";
				return false;	
			}
			if(!isNaN(user)){
				document.getElementById('username').innerHTML =" ** only characters are allowed";
				return false;
			}
            if(last == ""){
				document.getElementById('lastname').innerHTML =" ** Please fill the username field";
				return false;
			}
			if((last.length <= 2) || (last.length > 20)) {
				document.getElementById('lastname').innerHTML =" ** Username lenght must be between 2 and 20";
				return false;	
			}
			if(!isNaN(last)){
				document.getElementById('lastname').innerHTML =" ** only characters are allowed";
				return false;
			}
            if(emails == ""){
				document.getElementById('emailids').innerHTML =" ** Please fill the email id field";
				return false;
			}
			if(emails.indexOf('@') <= 0 ){
				document.getElementById('emailids').innerHTML =" ** @ Invalid Position";
				return false;
			}

			if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
				document.getElementById('emailids').innerHTML =" ** . Invalid Position";
				return false;
			}
        

			if(pass == ""){
				document.getElementById('passwords').innerHTML =" ** Please fill the password field";
				return false;
			}
			if((pass.length <= 5) || (pass.length > 20)) {
				document.getElementById('passwords').innerHTML =" ** Passwords lenght must be between  5 and 20";
				return false;	
			}


			if(pass!=confirmpass){
				document.getElementById('confrmpass').innerHTML =" ** Password does not match the confirm password";
				return false;
			}

			if(confirmpass == ""){
				document.getElementById('confrmpass').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}
			if(mobileNumber == ""){
				document.getElementById('mobileno').innerHTML =" ** Please fill the mobile NUmber field";
				return false;
			}
			if(isNaN(mobileNumber)){
				document.getElementById('mobileno').innerHTML =" ** user must write digits only not characters";
				return false;
			}
			if(mobileNumber.length!=10){
				document.getElementById('mobileno').innerHTML =" ** Mobile Number must be 10 digits only";
				return false;
			}
            if(gender== ""){
				document.getElementById('gen').innerHTML =" ** Please fill this field";
				return false;
			}

		}

	</script>
</body>
</html>