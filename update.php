<?php
 $servername = "localhost:3308";
    $username = "bhavya";
    $password = "1111";
    $database="myDB";    
            
    $conn=mysqli_connect($servername,$username,$password,$database);
$id=$_GET['id'];
$name=$_POST['sym'];
$gender=$_POST['sugg'];
$address=$_POST['doc'];
//$phone=$_POST['phone'];
//$post=$_POST['post'];
 
$sql="update health_details set name='$id', gender='$name', 
address='$gender', phone='$address' where id=$id";

 
// Set a constant
define ("FILEREPOSITORY","profile_images/");
 
// Make sure that the file was POSTed.
if (is_uploaded_file($_FILES['pimage']['tmp_name']))
{
// Was the file a JPEG?
if ($_FILES['pimage']['type'] != "image/jpeg") {
echo "<p>Profile image must be uploaded in JPEG format.</p>";
} else {
 
//$name = $_FILES['classnotes']['name'];
$filename=$id.".jpg";
 
unlink(FILEREPOSITORY.$filename);
$result = move_uploaded_file($_FILES['pimage']['tmp_name'],
FILEREPOSITORY.$filename);
//$result = move_uploaded_file($_FILES['pimg']['tmp_name'],
"http://localhost/php_crud/profile_images/28.jpg";
if ($result == 1) echo "<p>File successfully uploaded.</p>";
else echo "<p>There was a problem uploading the file.</p>";
}
}
 
header('location:index.php');
 
?>