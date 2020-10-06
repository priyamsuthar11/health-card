<?php
	// Message details
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
//	$response = curl_exec($ch);
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
}	// Process your response here
?>