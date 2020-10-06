<? php
$name=$_POST['name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$mobile_number=$_POST['mobile_number'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$blood_group=$_POST['blood_group'];
$gender=$_POST['gender'];

if (!empty($name) || !empty($last_name) || !empty($email) || !empty($mobile_number) || !empty($passowrd) || !empty($confirm_password) || !empty($blood_group) ||!empty($gender) {
    $host ="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="patient";
    $conn =new mysqli($host,$dbUsername,$dbPassword,$dbname);
//    echo"data is submitted!!";
    if(mysqli_connect_error()){
        die('connection Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else{
//        $SELECT="SELECT email FROM patient_db where email=? Limit=1 ";
//        $INSERT="INSERT INTO patient_db (name,last_name,password,confirm_password,mobile_number,email,blood_group,gender)
//        values(?,?,?,?,?,?,?,?,?)");
//        $stmt = $conn->prepare($INSERT);
//        $stmt->bind_param("s", $email);
//        $stmt->execute();
//        $stmt->bind_result($email);
//        $stmt->store_result(); 
//        $rnum = $stmt->num_rows;
//        
//        if($rnum==0)
//        {
//             $stmt->close();
            $stmt-> $conn->prepare("INSERT INTO patient_db (name,last_name,email,mobile_number,password,confirm_password,blood_group,gender)
        values(?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssisssss",$name,$last_name,$email,$mobile_number,$password,$confirm_password,$blood_group,$gender);
            $stmt->execute();
             echo"data is submitted!!";
        
            $stmt->close();
            $conn->close();
        }
//    }
}
else{
    echo"all fields are required";
    die();
}
?>