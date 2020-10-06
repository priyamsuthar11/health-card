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

<?php

if(isset($_POST['submit']) && $_POST['user']!=="" ) {
$servername = "localhost:3308";
$username = "root";
$password = "bhavya";
$dbname = "health_card";

$user = $_POST['user'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
@$comment = $_POST['Comment'];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO user_info (user, email, mobile, comment)
VALUES ('$user','$email','$mobile','$comment')";

if (mysqli_query($conn, $sql)) {
//    echo "<center><h4>Thanks for contacting us, we will get back to you shortly.</center></h4>";
    echo"<script>alert('Thanks for contacting us, we will get back to you shortly.')</script>";
   // <!-- header("location: userinfo.php"); -->/
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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

</br>
</br>
<section>
  <h2 class="text-center ">Contact us! </h2>
  <div class="w-50 m-auto">
     <form action="contact1.php" method="post" onsubmit="return validation()">
       <div class="form-group">
         <label>
           Username
         </label>
         <input type="text"  id="user" name="user"  autocomplete="off" class="form-control" >
           <span id="user_name" class="text-danger" "font-weight-bold"></span>
       </div>

       <div class="form-group">
         <label>
           Email Id
         </label>
         <input type="text" name="email" id="email" autocomplete="off" class="form-control" >
           <span id="email_id"  class="text-danger" "font-weight-bold"></span>
       </div>


       <div class="form-group">
         <label>
           Mobile 
         </label>
         <input type="tel" name="mobile" id="mobile" autocomplete="off" class="form-control" >
           <span id="mobile_number"  class="text-danger" "font-weight-bold"></span>
       </div>

       <div class="form-group">
         <label>
           Comments
         </label>
         <textarea class ="form-control" name="comments" id="Comment" required ></textarea>
           <span id="comment"  class="text-danger" "font-weight-bold"></span>
       </div>
       <button  type="submit"class="btn btn-outline-success"> Submit </button>
     </form>
    </div>
</section>
 
<script type="text/javascript">
    

    function validation(){

    
        var user = document.getElementById('user').value;
      var mobileno = document.getElementById('mobile').value;
      var emails = document.getElementById('email').value;
      var comments=document.getElementById('Comment').values;


      if(user == ""){
        document.getElementById('user_name').innerHTML =" ** Please fill the username field";
        return false;
      }
      if((user.length <= 2) || (user.length > 20)) {
        document.getElementById('user_name').innerHTML =" ** Username lenght must be between 2 and 20";
        return false; 
      }
      if(!isNaN(user)){
        document.getElementById('user_name').innerHTML =" ** only characters are allowed";
        return false;
      }
      if(emails == ""){
        document.getElementById('email_id').innerHTML =" ** Please fill the email id field";
        return false;
      }
      if(emails.indexOf('@') <= 0 ){
        document.getElementById('email_id').innerHTML =" ** @ Invalid Position";
        return false;
      }

      if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
        document.getElementById('email_id').innerHTML =" ** . Invalid Position";
        return false;
      }
      if(mobileno==""){
            document.getElementById('mobile_number').innerHTML =" ** Please fill the mobile Number field";
            return false;
            }
        if(isNAN(mobileno)){
            document.getElementById('mobile_number').innerHTML =" **  user must write digits only not characters";
            return false;
        }
        if(mobileno.length!=10)
            {
                document.getElementById('mobile_number').innerHTML =" ** Mobile Number must be 10 digits only";
                return false;
            }
        if(comments==""){
            document.getElementById('Comment').innerHTML =" ** Please write something";
            return false;
            
        }
        if(comments.length>=20){
            document.getElementById('Comment').innerHTML =" ** Please write something";
            return false;
        }

      

    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 

</body>
</html>