
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="phone.php" method="post">
        <input type="text" name="mobileNumber" id ="mobileNUmber" placeholder="enter number">
        <input type="submit" name="generate" value="generate OTP">
        <input type="text" name="otp" id="otp" placeholder="enter otp" >
        <input type="submit" value="verify" name="verify">
    </form>
</body>
</html>
<?php
if(isset($_POST['generate'])){
    $apiKey = urlencode('woVNK+hUOrA-5HDvXFBoaSciBZuF8GavMC57ta5lPp');
    $sender = urlencode('TXTLCL');
	@$numbers = $_POST['mobileNumber'];
    $otp =mt_rand(100000,999999);  
    setcookie("otp");
	$message = "hey your otp is ".$otp;
//	$numbers = implode(',', $numbers);
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
        echo "otp sent";
	curl_close($ch);
if(isset($_POST['verify'])){
    $verotp=$_POST['otp'];
    if($verotp==$_COOKIES('otp')){
            echo"otp verified";
        }
    else{
        echo"otp is wrong";
    }
}
}
?>