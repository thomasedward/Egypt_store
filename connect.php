<?php

//code for connect sql with  php

$dsn ='mysql:host=localhost;dbname=egypt_store';//data source name

$user = 'root';//user to connect

$pass = '';//passward

$option = array (
PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',

);

try 
{

$connect = new PDO($dsn , $user , $pass ,$option); //start new connect with pdo class

$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

#echo "connected";

//$q ="INSERT INTO items (name) VALUES ('pro3\r\n')"; //add product to database

//$connect->exec($q);

}

catch(PDOException $e)
{
    echo 'failed' . $e->getMessage();
}