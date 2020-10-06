
<!DOCTYPE html>

<html>
<head>
	<title></title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
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

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Login
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login_doc.php">Doctors </a>
          <a class="dropdown-item" href="login_hos.php">Hospitals</a>
          <a class="dropdown-item" href="login_pat.php">Patients</a>
          <a class="dropdown-item" href="login_lab.php">Laboratories </a>
          <div class="dropdown-divider"></div>
          
        </div>
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
</html>

<?php
if(isset($_POST['reset']) && $_POST['id']=="" && $_POST['newpass']==""){
    $servername = "localhost:3308";
    $username = "bhavya";
    $password = "1111";
    $database="myDB";
    
            
    $conn=mysqli_connect($servername,$username,$password,$database);
        
    @$password = mysqli_real_escape_string($conn,$_POST['newpass']);
    @$uppass = mysqli_real_escape_string($conn,$_POST['new_pass']);
    @$id = mysqli_real_escape_string($conn,$_POST['id']);
        $password=isset($_POST['login']) ?  $_POST['login']:'';
        $uppass=isset($_POST['password']) ?  $_POST['password']:'';
    
         if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
            }
    $sql="UPDATE patient SET pass='$password' And conpass='$uppass' WHERE id='$id' AND ";
//    echo "$sql";
    if (mysqli_query($conn, $sql)) {
//        echo"password update successfully";
//        header('Location:login_pat.php');
        echo "<script>alert('Your password update successfully')</script>";
    }
    else{
        echo"<script>alert('Your patient ID is wrong')</script>";
    }
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>

    <body> 
        <form action method="post" action="forgetpass_pat.php" onsubmit="return validation()">
            <lable>Enter Patient ID</lable>
            <input type ="text" name="id" id="id"  class="fadeIn second"><br>
            <span id="pat" class="text-danger font-weight-bold"> *</span>
            <lable>Enter New Password</lable>
            <input type ="text" name="newpasss" id="newpass" ><br>
             <span id="password" class="text-danger font-weight-bold"> *</span>
            <lable>Retype password</lable>
            <input type="text" name="new_pass" id="new_pass" ><br>
            <span id="conpass" class="text-danger font-weight-bold"> *</span>

            <input type="submit" value="UPDATE" name="reset" id="reset"><br>
        </form>
        
        <script type="text/javascript">
		function validation(){

			var pass=document.getElementbyId('newpass').value;
			var confirmpass = document.getElementById('new_pass').value;
            
            
            if(pass=""){
                window.alert("password required")
				return false;
            }
            if((pass.length <= 5) || (pass.length > 20)) {
				document.getElementById('password').innerHTML =" ** Passwords lenght must be between  5 and 20";
				return false;	
			}
             if(confirmpass=""){
                document.getElementById('conpass').innerHTML =" ** Please fill the username field";
				return false;
            } 
                
            }
            </script>
    </body>			
</html>