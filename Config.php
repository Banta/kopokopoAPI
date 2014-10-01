<?php
namespace Base;
class Config {
    public  static $SERVER = "";
    public  static $SERVER_PASSWORD ="";
    public  static $DATABASE_NAME =""; /* The name of the database where the Transactions table resides */
    public static $DATABASE_TABLE="transactions"; /* The name of the Table you use to store transactions */
    public static $API_KEY = "API_KEY";/* Your API key from your Kopo Kopo Account  */
    /*
     * @return the name of the server
     */
    public function getServer(){
        return self::$SERVER;
    }
    /*
     * @return the password to the server
     */
    public function getServerPassword(){
        return self::$SERVER_PASSWORD;
    }
    /*
     * @return the database name
     */
    public function getDatabaseName(){
        return self::$DATABASE_NAME;
    }
    /*
     * @return your Kopo Kopo account API key
     */
    public function getApiKey(){
        return self::$API_KEY;
    }
} 
?>