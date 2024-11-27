<?php

//include the connection file
include('connection.php');


//create an instance of Connection class
$connection = new Connection ();

//call the createDatabase methods to create database "chap4Db"
$connection->createDatabase('clientsDATA');


$query0 = "CREATE TABLE Cities (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
cityName VARCHAR(30) NOT NULL)";

$query = "

CREATE TABLE Clients (
   id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   fullNAME VARCHAR(30) NOT NULL,
  email VARCHAR(50) UNIQUE,
  password VARCHAR(80),
  numTELE BIGINT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


";

//call the selectDatabase method to select the chap4Db
$connection->selectDatabase('clientsDATA');

//call the createTable method to create table with the $query
$connection->createTable($query0);
$connection->createTable($query);


?>