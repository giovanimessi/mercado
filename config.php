<?php

$dsn = "mysql:dbname=mercado;host=localhost";
$dbuser = "root";
$dbpass= "";

try{

	$pdo = new PDO($dsn,$dbuser,$dbpass);

}catch(PDOException $ex){
	echo "Falha na conexão. ".$ex->getMessage();

}



?>