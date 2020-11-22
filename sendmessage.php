<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 1000');
}
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

    
    $from = $_POST['email'];
    $to = 'abed.hussein.tech@gmail.com';
    
    $subject = $_POST['subject'];
    
    $headers = "From: " . strip_tags($from) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
    $headers .= "CC: ".strip_tags($from)."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    
    $message = 'اسم المرسل:- '.$_POST['first_name']." ".$_POST['last_name'];
    $message .= '<br/> البريد الالكتروني :-'.$_POST['email'];
    $message .= '<br/><hr/> الرسالة :- <br/>'.$_POST['message'];
    
  
    
    
    
    if (mail($to, $subject, $message, $headers)) {
        echo 'Your message has been sent.';
    } else {
        echo 'There was a problem sending the email.';
    }
}
?>