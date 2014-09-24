<?php
namespace Base;
class Transaction{
    private $_service_name;
    private $_business_number;
    private $_transaction_reference;
    private $_internal_transaction_id;
    private $_transaction_timestamp;
    private $_transaction_type;
    private $_amount;
    private $_first_name;
    private $_middle_name;
    private $_last_name;
    private $_sender_phone;
    private $_currency;
    private $_account_number;
    private $_signature;
    
    public function __construct($service_name,$business_number,$transaction_reference,$internal_transaction_id,$transaction_timestamp, $transaction_type,
                                $amount, $first_name,$middle_name,$last_name,$sender_phone,$currency,$account_number,$signature){
        $this -> _service_name = $service_name;
        $this -> _business_number = $business_number;
        $this -> _transaction_reference = $transaction_reference;
        $this -> _internal_transaction_id = $internal_transaction_id;
        $this -> _transaction_timestamp = $transaction_timestamp;
        $this -> _transaction_type = $transaction_type;
        $this -> _amount = $amount;
        $this -> _first_name = $first_name;
        $this -> _middle_name = $middle_name;
        $this -> _last_name = $last_name;
        $this -> _sender_phone = $last_name;
        $this -> _currency = $currency;
        $this -> _account_number = $account_number;
        $this -> _signature = $signature;

    }

    public function getServiceName(){
        return $this -> _service_name;
    }
    public function getBusinessNumber(){
        return $this -> _business_number;
    }
    public function getTransactionReference(){
         return $this -> _transaction_reference;
    }
    public function getInternalTransactionId(){
        return $this -> _internal_transaction_id;
    }
    public function getTransactionTimestamp(){
        return $this -> _transaction_timestamp;
    }
    public function getAmount(){
        return $this -> _amount;
    }
    public function getFirstName(){
        return $this -> _first_name;
    }
    public function getMiddleName(){
        return $this -> _middle_name;
    }
    public function getLastName(){
        return $this -> _last_name;
    }
    public function getCurrency(){
        return $this -> _currency;
    }
    public function getAccountNumber(){
        return $this -> _account_number;
    }
    public function getSignature(){
        return $this -> _signature;
    }
    public function push(){
      $connection = mysql_connect(Config::$SERVER,Config::$SERVER_PASSWORD);
      mysql_select_db(Config::$DATABASE_NAME,$connection);
      $query = "INSERT INTO ".Config::$DATABASE_TABLE."(service_name,business_number,transaction_reference,internal_t_id,
      transaction_timestamp,amount,first_name,middle_name,last_name,currency,account_number,signature) VALUES(".
          '$this ->_service_name'.','.'$this->_business_number'.','.'$this -> _transaction_reference'.','.'$this -> _internal_transaction_id'.','.
         '$this -> _transaction_timestamp'.','.'$this-> _amount'.','.'$this -> _first_name'.','.'$this -> _middle_name'.','.'$this ->_last_name'.','.
        '$this -> _currency'.','.'$this -> _account_number'.','.'$this -> _signature'.")";
    }
}