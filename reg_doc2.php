<!DOCTYPE html>
<html>
<head>
  <title></title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script type="text/javascript"></script>
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../js/bootstrap.js"></script>

    <style>
        .psh
        {
            margin-left: 50px;
            margin: 20px;
        }
    </style>


</head>
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
        @$id=mysqli_real_escape_string($conn,$_POST['doc_id']);
        @$spec=mysqli_real_escape_string($conn,$_POST['spec']);
        @$email=mysqli_real_escape_string($conn,$_POST['email']);
        @$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
        @$pass=mysqli_real_escape_string($conn,$_POST['pass']);
        @$confirm=mysqli_real_escape_string($conn,$_POST['confirm']);
        
        $sql = "INSERT INTO doctor(user,doc,spec,email,mobile,pass,conpass)
        VALUES('$user','$id','$spec','$email','$mobile','$pass','$confirm')";
        
        $sql1="SELECT doc, email from doctor WHERE email='$email'";
        $result=mysqli_query($conn,$sql1);
           
        $result=mysqli_connect($conn, $);
           if(mysqli_num_rows($result ) > 0){
        //       echo"<script>alert('Someone has Registered With This Id')</script>";
            die( "Someone Has Already Registrated With This Email Try Using Another Email ID!!" ) ;
           }
//        $result=mysqli_query($conn,$sql);
    if(mysqli_query($conn, $sql)) {

        echo "<script>alert('You have Registrated Successfully & mail is has been sent to your gmail account')</script>";
    }
    if($row=mysqli_fetch_assoc($result)){
    $to_email = $_POST['email'];
    $subject = 'Registration To Health Card';
    $message = 'Your Data Has been Registrated and you Patient Id as following' .$row['doc']. 'And Password is ' .$pass . 'for more details contact to info@healthcard.com';
    $headers = 'From: noreply@healhcard . com';
    mail($to_email,$subject,$message,$headers);
//    echo"$row";
//    echo"<h3><center>Log In To See More Activity!</h3></center>";
}
        else{
             echo "Error creating database: " . mysqli_error($conn);
    }

    mysqli_close($conn);
        }
?>
  

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
        <a class="nav-link" href="about.php">About us</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="faq.php">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<h1 class="text-center">Doctor Registration Form</h1>
    <h6 class="text-danger font-weight-bold">*All Fields Are required</h6>

<form class="psh" method="post" action="reg_doc2.php" onsubmit="return validation()">
<!--  <section id="form2">-->

  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="">Enter Your Full Name</label>
     <span id="username" class="text-danger font-weight-bold"> *</span>
      <input type="text" class="form-control" id="user" name="user"  placeholder="Full name" autocomplete="off">
       <span id="username" class="text-danger font-weight-bold"> </span>
    </div>
   
</div>

  <div class="form-row">
    
   <div class="form-group col-md-3">
      <label for="">Enter Your Doc ID</label>
     <span id="ids" class="text-danger font-weight-bold"> *</span>
    <input type="text" class="form-control" id="doc_id" name="doc_id" autocomplete="off">
    <span id="ids" class="text-danger font-weight-bold"> </span>

    </div>
    <div class="form-group col-md-5">
    <label for="">Specialization</label>
        <span id="special" class="text-danger font-weight-bold"> *</span>
     <select id="spec" class="form-control" name="spec" required>
        <option value="null"></option>
       <option value="ALLERGY & IMMUNOLOGY">ALLERGY & IMMUNOLOGY</option>
        <option value=" ANESTHESIOLOGY"> ANESTHESIOLOGY</option>
        <option value="DERMATOLOGY">DERMATOLOGY</option>
        <option value="DIAGNOSTIC RADIOLOGY">DIAGNOSTIC RADIOLOGY</option>
        <option value="EMERGENCY MEDICINE">EMERGENCY MEDICINE</option>
        <option value="FAMILY MEDICINE">FAMILY MEDICINE</option>
        <option value="INTERNAL MEDICINE">INTERNAL MEDICINE</option>
        <option value="MEDICAL GENETICS">MEDICAL GENETICS</option>
        <option value=" NEUROLOGY">NEUROLOGY</option>
        <option value="NUCLEAR MEDICINE">NUCLEAR MEDICINE</option>
        <option value="OBSTETRICS AND GYNECOLOGY">OBSTETRICS AND GYNECOLOGY</option>
        <option value="OPHTHALMOLOGY">OPHTHALMOLOGY</option>
        <option value="PATHOLOGY">PATHOLOGY</option>
        <option value="PEDIATRICS">PEDIATRICS</option>
        <option value="PHYSICAL MEDICINE & REHABILITATION">PHYSICAL MEDICINE & REHABILITATION</option>
        <option value=" PREVENTIVE MEDICINE">PREVENTIVE MEDICINE</option>
        <option value="PSYCHIATRY">PSYCHIATRY</option>
        <option value="RADIATION ONCOLOGY">RADIATION ONCOLOGY</option>
        <option value="SURGEN">SURGEN</option>
        <option value="UROLOGY">UROLOGY</option>
        <option value="">OTHERS</option>
        <span id="special" class="text-danger font-weight-bold"> </span>

<!--        <option selected  value="null" >Choose...</option>-->
      </select>
    </div>
  </div>
  

 <div class="form-row">
 
    <div class="form-group col-md-6">
      <label for="">Email</label>
     <span id="emails" class="text-danger font-weight-bold"> *</span>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
          <span id="emails" class="text-danger font-weight-bold"></span>

  </div>
  <div class="form-group">
    <div class="form-group col-md-6">
      <label for="">Mobile Number</label>
    <span id="mobileno" class="text-danger font-weight-bold"></span>
      <input type="text" class="form-control" id="mobile" name="mobile"  placeholder="Phone" size="60" autocomplete="off">
    <span id="mobileno" class="text-danger font-weight-bold"></span>

    </div>
    </div>
    </div>
  
  
<!--
  <div class="form-row">
    <div class ="form-group col-md-3">
      <label  for=""  >State</label>
      <input type="text" name="state">
      <select id required="required" ="" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="">City</label>
      <input type="text" name="city">
      <select id required="required" ="" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="">Pin code</label>
    
      <input type="text" class="form-control" id="" required="required" name="pincode">
    </div>
    
  </div>
-->
<!--
  <div class="form-group col-md-4">
      <label for="">Adhhar number</label>

      <input type="text" class="form-control" id="" required="required" name="aadhar">
    </div>
-->



  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputPassword4">Password</label>
      <span id="password" class="text-danger font-weight-bold"> *</span>
      <input type="password" class="form-control"  id="pass" name="pass"  placeholder="password" autocomplete="off">
                <span id="password" class="text-danger font-weight-bold"> </span>

    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Confirm password</label>
                <span id="conpass" class="text-danger font-weight-bold"> *</span>
      <input type="password" class="form-control" id="confirm" name="confirm" placeholder="confirm password" autocomplete="off">
                <span id="conpass" class="text-danger font-weight-bold"></span>
    </div>
    </div>
 <!-- <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> -->
  
				<input type="submit" name="submit" value="Submit" class="btn btn-success" 	autocomplete="off">
                <input type="reset" name="reset" value="Reset" class="btn btn-success" 	autocomplete="off">
</form>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
 
    <!-- Footer -->
<!-- Footer -->

<!-- Footer -->

<script type="text/javascript">
		function validation(){

			var user = document.getElementById('user').value;
            var doc = document.getElementById('doc_id').value;
           var spec = document.getElementById('spec').value;
            var pass = document.getElementById('pass').value;
			var confirmpass = document.getElementById('confirm').value;
			var mobile = document.getElementById('mobile').value;
			var email = document.getElementById('email').value;

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
            if(doc == ""){
				document.getElementById('ids').innerHTML =" ** Please fill the username field";
				return false;
			}
			if((doc.length <= 2) || (doc.length > 20)) {
				document.getElementById('ids').innerHTML =" ** Username lenght must be between 2 and 20";
				return false;	
			}
            if(spec == ""){
				document.getElementById('special').innerHTML =" ** Please fill this field";
				return false;
			}
            if(email== ""){
				document.getElementById('emails').innerHTML =" ** Please fill the email id field";
				return false;
			}
			if(email.indexOf('@') <= 0 ){
				document.getElementById('emails').innerHTML =" ** @ Invalid Position";
				return false;
			}

			if((email.charAt(email.length-4)!='.') && (email.charAt(emails.length-3)!='.')){
				document.getElementById('emails').innerHTML =" ** . Invalid Position";
				return false;
			}
        

			if(pass == ""){
				document.getElementById('password').innerHTML =" ** Please fill the password field";
				return false;
			}
            if(mobile == ""){
				document.getElementById('mobileno').innerHTML =" ** Please fill the mobile NUmber field";
				return false;
			}
			if(isNaN(mobile)){
				document.getElementById('mobileno').innerHTML =" ** user must write digits only not characters";
				return false;
			}
			if(mobile.length!=10){
				document.getElementById('mobileno').innerHTML =" ** Mobile Number must be 10 digits only";
				return false;
			}
			if((pass.length <= 5) || (pass.length > 20)) {
				document.getElementById('password').innerHTML =" ** Passwords lenght must be between  5 and 20";
				return false;	
			}


			if(pass!=confirmpass){
				document.getElementById('conpass').innerHTML =" ** Password does not match the confirm password";
				return false;
			}

			if(confirmpass == ""){
				document.getElementById('conpass').innerHTML =" ** Please fill the confirmpassword field";
				return false;
			}

		}
    </script>

</body>

</html>

