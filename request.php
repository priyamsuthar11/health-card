<?php
session_start();
//$_SESSION['doc'];
//$_SESSION['user'];
?>
<?php
//    session_start();
    global $conn;
    if(isset($_POST['login']) || isset($_POST['login_pat']) ||isset($_POST['submit']) ||isset($_SESSION['doc']) ) {
    $servername = "localhost:3308";
    $username = "bhavya";
    $password = "1111";
    $database="myDB";
    
            
    $conn=mysqli_connect($servername,$username,$password,$database);
        
    @$doc_id = mysqli_real_escape_string($conn,$_POST['login']);
    @$pat_id = mysqli_real_escape_string($conn,$_POST['login_pat']);
        
        $doc_id=isset($_POST['login']) ?  $_POST['login']:'';
        $pat_id=isset($_POST['login_pat']) ?  $_POST['login_pat']:'';
       
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO request(doc,pat) VALUES('$doc_id','$pat_id')";
         if (mysqli_query($conn, $sql)) {
             @$_SESSION['doc']=$_POST['login'];
             @$_SESSION['user']=$_POST['login_pat'];
             $_SESSION['doc']=isset($_SESSION['doc']) ? $_SESSION['doc']:'';
                $_SESSION['user']=isset($_SESSION['user']) ? $_SESSION['user']:'';

             
//             $_SESSION['doc']=isset($_SESSION['doc']);
//             $_SESSION['user']=isset($_SESSION['user']);
		          echo"<script>alert('New request has been sent successfully !')</script>";
             
             } else {
                echo "Error: " . $sql . " " . mysqli_error($conn);
             }
//             mysqli_close($conn);
//    
//        else{
//             echo"Sorry, your credentials are not valid, Please try again.";
//        }
//              @$_SESSION['doc']=$_POST['login'];
//             @$_SESSION['user']=$_POST['login_pat'];
//             $_SESSION['doc']=isset($_SESSION['doc']) ? $_SESSION['doc']:'';
//        $_SESSION['user']=isset($_SESSION['user']) ? $_SESSION['user']:'';
//        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//        $stmt->execute();
////fetching result would go here, but will be covered later
//        $stmt->close();
    mysqli_close($conn);
    }
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

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <style>
        
/* BASIC */

html {
  background-color: black;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: green;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: green;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}

        </style>
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
        <a class="nav-link" href="about.php">About us</a>
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
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
        
      <img src="image/login.svg" id="icon" alt="User Icon" width="50" height="60">
    </div>
 <h6 class="text-danger font-weight-bold">*All Fields Are required</h6>
    <!-- Login Form -->
    <form method =post action="request.php" onsubmit=" return validation()">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Please Enter Your Doctor ID" autocomplete ="off">
        <span id="doc_id" class="text-danger font-weight-bold">*</span> 
        <input type="text" id="login_pat" class="fadeIn second" name="login_pat" placeholder="Please Enter Patient ID" autocomplete ="off" >
        <span id="Pat_id" class="text-danger font-weight-bold">*</span> 

      <input type="submit" name="submit" class="fadeIn fourth" value="Send Request">
    </form>

  </div>
</div>
     
   </body>
    <script  type="text/javascript">
        function validation()
        {
            var id=document.getElementById('login').value;
            var pat_id=document.getElementById('login_pat').value;
            
            if(id==""){
                document.getElementById('doc_id').innerHTML =" * Please fill the username field";
				return false;
            }
            if(pat_id==""){
                document.getElementById('Pat_id').innerHTML =" * Please fill the username field";
				return false;
            }
        
        }
        
        </script>
</html>