<?php
session_start();
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
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <style>
         canvas{
                margin-right: auto;
                margin-left: auto;
                display: block;
            }
            p{
                margin-right: auto;
                margin-left: auto;
                display: block;
                text-align: "center";
            }
            </style>
    </head>
<body>
<h1 align="center">Download Your E-Health Card</h1>
<script>alert('Upload Picture To Generate ID Card')</script>
    <?php
//if(isset($_POST['submit'])){
$servername = "localhost:3308";
$username = "bhavya";
$password = "1111";
$database="myDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);
    @$_SESSION['myusername']=isset($_SESSION['myusername']) ? $_SESSION['myusername']:'';
    $pat=$_SESSION['myusername'];

    $sql ="SELECT id,user,last,blood,gender,mobileno FROM patient WHERE id='$pat'";
$result=mysqli_query($conn,$sql);
//$row=mysqli_fetch_assoc($result);
    while($row=mysqli_fetch_assoc($result)){
        echo"<canvas id='new' width='500' height='250' style='border:1px solid #000;'></canvas>";
        echo"<script>
        var canvas = document.getElementById('new');
        var ctx = canvas.getContext('2d');
        function save()
        {
        datau=canvas.toDataURL('image/jpeg;base64;');
        //window.location.href=datau
        anchor=document.getElementById('download');
        anchor.href=datau;
        anchor.innerHTML='Download';
        }
        
        function gene(){
//        var canvas = document.getElementById('new');
//            var ctx = canvas.getContext('2d');
            
            ctx.font = '30px Arial';
            ctx.fillText('Patient Id is :".$row['id']."', 10, 50);
            ctx.fillText('User Name is :".$row['user']."', 10, 90);
            ctx.fillText('Last Name is :".$row['last']."', 10, 130);
            ctx.fillText('Blood Group is :".$row['blood']."', 10, 180);
            ctx.fillText('Gender is :".$row['gender']."', 10, 220);
            ctx.rect(330, 30, 120, 100);
            ctx.stroke();
            
            youphot=document.getElementById('uploadPreview')
            ctx.drawImage(youphot,330, 30, 120, 100)
            document.getElementById('sav').disabled=false
            }
            
            function PreviewImage() {
                var prr = new FileReader();
                prr.readAsDataURL(document.getElementById('imagefile').files[0]);

                prr.onload = function (ev) {
                    document.getElementById('uploadPreview').src = ev.target.result;
                };
            };

    
            </script>";
//
//        echo"hey is".$row["id"];
    }

mysqli_close($conn);
?>    
<p>
</p>
<p>Click on the button to save your ID:

    <button id='sav' type="button" class="btn btn-default btn-sm" onClick= "return save();" disabled>
    <span class="glyphicon glyphicon-floppy-disk"></span> Save my ID
    </button><a href="" id="download" download="HEALTHCARD_id.jpeg"></a>
    </p>
Please Upload Your Image :
	<input type='file' id='imagefile' onChange="return PreviewImage();"/>
	<img id="uploadPreview" style="width: 50px; height: 50px;" />
	
<input name="submit" type="button" id="res" value="Reset" onclick="return res();">
<input name=submit type='button' id='upd' value='Update!' onClick="return gene();">
    
    </body>
</html>
