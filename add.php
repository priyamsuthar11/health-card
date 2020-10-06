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

<style type="text/css">

	.btn btn-outline-success
	{
		margin: 50px;
	}
	#wer
	{
		margin : 30px;
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
   
            @$user=mysqli_real_escape_string($conn,$_POST['id']);
            @$sym=mysqli_real_escape_string($conn,$_POST['sym']);
            @$sugg=mysqli_real_escape_string($conn,$_POST['sugg']);
            @$file=mysqli_real_escape_string($conn,$_POST['file']);
            
            $dataTime = date("Y-m-d");
                // Get image name
                $image = $_FILES['image']['name'];
                // Get text        // image file directory
                $target = "images1/".basename($image);
                if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $msg = "Image uploaded successfully";
                }else{
                    $msg = "Failed to upload image";
                }

           
            $sql = "INSERT INTO information(id,sym,sugg,file,dt)
        VALUES('$user','$sym','$sugg','$image','$dateTime')";
//        
//        $sql1="SELECT doc, email from doctor WHERE email='$email'";
//        $result=mysqli_query($conn,$sql1);
//        $result=mysqli_query($conn,$sql);
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('Data Uploaded Successfully!!')</script>";
                header("Location: details.php");
            }
            else{
               echo "Error creating database: " . mysqli_error($conn);
            }

    mysqli_close($conn); 
}
?>
<a href="//24timezones.com/Ahmadabad/time" style="text-decoration: none" class="clock24" id="tz24-1582633593-c1423-eyJob3VydHlwZSI6MTIsInNob3dkYXRlIjoiMSIsInNob3dzZWNvbmRzIjoiMSIsInNob3d0aW1lem9uZSI6IjEiLCJ0eXBlIjoiZCIsImxhbmciOiJlbiJ9" title="time now Ahmadabad" target="_blank" rel="nofollow">india</a>
<script type="text/javascript" src="//w.24timezones.com/l.js" async></script>

<section id="wer">
	

<form action="add.php" method="post">
	  <h2 class="text-center ">Add details</h2>
    	 
  <div class="form-group col-md-8">
    <label for="exampleFormControlInput1" >Patient ID</label>
    <input type="text" required="required" name="id" class="form-control" id="exampleFormControlInput1" placeholder="enter Patient ID">
  </div>
    
  <div class="form-group col-md-8">
    <label for="exampleFormControlInput1" > Symptoms  </label>
    <input type="text" required="required" name="sym" class="form-control" id="exampleFormControlInput1" placeholder="enter patients symptoms">
  </div>
  

  <div class="form-group col-md-8">
    <label for="exampleFormControlTextarea1"> Suggestions...</label>
    <textarea class="form-control" required="required" name="sugg" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <div class="form-group col-md-8">
    <label for="exampleFormControlFile1">Please select your prescription image</label>
    <input type="file" required="required" f class="form-control-file" id="exampleFormControlFile1" name="image">
  </div>

       <button  type="submit"  name="submit" class="btn btn-outline-success"> Submit </button>
   
</form>
    </section>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> 
 
    <!-- Footer -->

</body>