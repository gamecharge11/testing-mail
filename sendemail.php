<?php

// Define some constants
define( "RECIPIENT_NAME", "Ojasvi Garments" );
define( "RECIPIENT_EMAIL", "pranavskaimal30@gmail.com");
// define( "RECIPIENT_EMAIL", "sajith1433@gmail.com" );

$postVal = $_POST['data'];
// Read the form values
$success = false;
$senderName = isset( $postVal[0]['value'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $postVal[0]['value'] ) : "";
$senderEmail = isset( $postVal[1]['value'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $postVal[1]['value'] ) : "";
$phone = isset( $postVal[2]['value'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $postVal[2]['value'] ) : "";
$subject = isset( $postVal[3]['value'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $postVal[3]['value'] ) : "";
$message = isset( $postVal[4]['value'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $postVal[4]['value'] ) : "";

// If all values exist, send the email
if ( $senderName && $senderEmail && $phone && $message) {
    $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
    $headers = "From: " . $senderName . " <" . $senderEmail . ">";
    $msgBody = " Phone: " . $phone ." , Message: " . $message . "";
    $success = mail( $recipient, $headers, $msgBody );
    //Set Location After Successsfull Submission
    $response['status'] = 1;
    $response['msg'] = 'Successs';
    echo json_encode($response);
    
}else{
    
	//Set Location After Unsuccesssfull Submission
  	$response['status'] = 0;
    $response['msg'] = 'Failed';
    echo json_encode($response);
}

?>