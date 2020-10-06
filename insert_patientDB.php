<? php
if(isset($_POST['user']) && $_POST['user']!=="") {
        $servername = "localhost";
        $username = "bhavya";
        $password = "1111";
        $dbname = "patient1";
        $conn =mysqli_connect($servername,$username,$password,$dbname);

        if($conn === false)
            {
                die("ERROR : could not able to execute ".mysqli_error());
            }

 
        $user=mysqli_real_escape_string($conn,$_POST['user']);
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $emails=mysqli_real_escape_string($conn,$_POST['emails']);
        $mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
        $pass=mysqli_real_escape_string($conn,$_POST['pass']);
        $conpass=mysqli_real_escape_string($conn,$_POST['conpass']);
        $blood=mysqli_real_escape_string($conn$,_POST['blood']);
        $gender=mysqli_real_escape_string($conn,$_POST['gender']);

        $sql="INSERT INTO patient_db1(user, name, emails, mobile, pass,conpass,blood,gender)
        VALUES('$user','$name','$emails','$mobile','$pass','$conpass','$blood','$gender')";
        
        if(mysqli_query($conn,$sql))
        {
            echo "data is inserted";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
}
?>
