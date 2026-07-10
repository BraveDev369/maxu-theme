<?php

/*
	The Send Mail php Script for Contact Form
	Server-side data validation is also added for good data validation.
*/

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$message = $_POST['message'];

if( empty($name) ){
	die('لطفا نام خود را وارد کنید!');
}
else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
	die('لطفا یک ایمیل معتبر وارد کنید!');
}
else if( empty($message) ){
	die('لطفا پیام خود را وارد کنید!');
}
else{
	
	$formcontent="نام: $name\nایمیل: $email\nتلفن: $phone\nوبسایت: $website\nپیام: $message";
	
	//Place your Email Here
	$recipient = "info@sample.com";
	
	$mailheader = "From: $email \r\n";
	
	if( mail($recipient, 'پیام جدید در سایت', $formcontent, $mailheader) == false ){
		die('خطا در ارسال پیام!');
	}
	else{
		echo 'پیام شما با موفقیت ارسال شد!';
	}

}

?>