<?php
/**
 * Created by PhpStorm.
 * User: WILLIAM
 * Date: 9/23/14
 * Time: 10:11 AM
 */

namespace Base;


class Config {
    public  static $SERVER = "";
    public  static $SERVER_PASSWORD ="";
    public  static $DATABASE_NAME ="";
    public static $DATABASE_TABLE="transactions";

    public function getServer(){
        return self::$SERVER;
    }
    public function getServerPassword(){
        return self::$SERVER_PASSWORD;
    }
    public function getDatabaseName(){
        return self::$DATABASE_NAME;
    }
} 