
<html>
<head>
	<title></title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
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

       <li class="nav-item">
        <a class="nav-link" href="faq.php">FAQ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
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
 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php
global $conn;
    if(issset($_POST['submit'])){
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

$sql = "INSERT INTO patient(user,last,emails,mobileno,pass,conpass,blood,gender)
VALUES('$user','$last','$emails','$mobileNumber','$pass','$conpass','$blood','$gender')";
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('submitted Successfully')</script>";
//    echo"<h3><center>Log In To See More Activity!</h3></center>";
     
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
    }
?>
    </body>
    </head>

</html>