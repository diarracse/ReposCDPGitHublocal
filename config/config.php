<?php 
$host='localhost';
$port=8888;
$dbname='VivreSaintFortunat';
$user='root';
$password='root';

$dsn='mysql:host='.$host.';port='.$port.';dbname='.$dbname;

$bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
?>
