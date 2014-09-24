<?php
/**
 * Created by PhpStorm.
 * User: WILLIAM
 * Date: 9/22/14
 * Time: 12:35 PM
 */
class Receiver{
    private $service_name;
    private $business_number;
    private $transaction_reference;
    private $internal_transaction_id;
    private $transaction_timestamp;
    private $transaction_type;
    private $amount;
    private $first_name;
    private $middle_name;
    private $last_name;
    private $sender_phone;
    private $currency;
    private $account_number;
    private $signature;

    public function __construct($sn,$bn,$tr,$itr,$tt,$t_type,$amount,$first_name,$middle_name,$last_name,$sender_phone,
$currency,$account_number,$signature){
        $this -> service_name = $sn;
        $this -> business_number = $bn;
        $this -> transaction_reference = $tr;
        $this -> internal_transaction_id = $itr;

    }
}