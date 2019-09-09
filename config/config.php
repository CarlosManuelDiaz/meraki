<?php
session_start();
/* DATABASE CONFIGURATION */

// Use to connect to ClearDB - Production
// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// $server = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $db = substr($url["path"], 1);
//

// Use to connect to ClearDB - Preproduction
// $server = 'us-cdbr-iron-east-02.cleardb.net';
// $username = 'b92c9ba0ebbc77';
// $password = 'f867167e';
// $db = 'heroku_1d5c50e9442bf45';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'meraki');
define("BASE_URL", "http://localhost/meraki/");

function getDB()
{
    $dbhost = DB_SERVER;
    $dbuser = DB_USERNAME;
    $dbpass = DB_PASSWORD;
    $dbname = DB_DATABASE;
    try {
        $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbConnection->exec("set names utf8");
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}