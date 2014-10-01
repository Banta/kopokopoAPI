<?php
/**
 * Created by PhpStorm.
 * User: WILLIAM
 * Date: 10/1/14
 * Time: 11:27 AM
 */

/*
 * A script to demonstrate how to receive the request from kopokopo api and
 * instantiate a new transaction object
 * send json response back
 * and push the transaction object to the database
 */
include("Transaction.php");

// Get all the fields from the post request
if(isset($_POST['service_name'])){
    $service_name = $_POST['service_name'];
}

if(isset($_POST['business_number)'])){
    $business_number = $_POST['business_number'];
}
if(isset($_POST['transaction_reference'])){
    $transaction_reference = $_POST['transaction_reference'];
}
if(isset($_POST['internal_transaction_id'])){
    $internal_transaction_id = $_POST['internal_transaction_id'];
}

if(isset($_POST['transaction_timestamp'])){
    $transaction_timestamp = $_POST['transaction_timestamp'];
}
if($_POST['transaction_type']){
    $transaction_type = $_POST['transaction_type'];
}
if($_POST['amount']){
    $amount = $_POST['amount'];
}
if(isset($_POST['first_name'])){
    $first_name = $_POST['first_name'];
}
if(isset($_POST['last_name'])){
    $last_name = $_POST['last_name'];
}
if(isset($_POST['middle_name'])){
    $middle_name = $_POST['middle_name'];
}
if(isset($_POST['sender_phone'])){
    $sender_phone = $_POST['sender_phone'];
}

if(isset($_POST['currency'])){
    $currency = $_POST['currency'];
}

if(isset($_POST['account_number'])){
    $account_number = $_POST['account_number'];
}

if(isset($_POST['signature'])){
    $signature = $_POST['signature'];
}

// create a Base64 encoded signature using API_KEY as the secret key
// the signature is a Base64 encoded HMAC(Hash Message Authentication Code)
// Described well in the KopoKopo API documentation
$base_string = "service_name=".$service_name.
    "&business_number=".$business_number.
    "&transaction_reference=".$transaction_reference.
    "&internal_transaction_id=".$internal_transaction_id.
    "&transaction_timestamp=".$transaction_timestamp.
    "&transaction_type=".$transaction_type.
    "&amount=".$amount.
    "&first_name=".$first_name.
    "&last_name=".$last_name.
    "&middle_name=".$middle_name.
    "&sender_phone=".$sender_phone.
    "&currency=".$currency.
    "&account_number=".$account_number;

$symmetric_key = \Base\Config::$API_KEY;
$signature_created = base64_encode( hash_hmac("sha1",$base_string,$symmetric_key,true));

// compare the created signature with signature send from Kopo Kopo

if($signature_created == $signature){
    // create a new Transaction object
    $transaction = new \Base\Transaction($service_name,$business_number,$transaction_reference,$internal_transaction_id,$transaction_timestamp,$transaction_type,$amount,$first_name,$middle_name,$last_name,$sender_phone,$currency,$account_number,$signature);
    // push this transaction to the database
    $transaction -> push();

    $message = "Thank you ".$first_name." ".$last_name." for your payment of ".$amount.". We value your business.";

    // create the response
    $response = array();
    $response["status"] = "01";
    $response["duration"] = "Accepted";
    $response["subscriber_message"] = $message;

    echo json_encode($response);
}
else{
    // create the response
    $response = array();
    $response["status"] = "03";

    echo json_encode($response);
}
?>