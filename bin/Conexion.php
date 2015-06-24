<?php

$GLOBALS['conexion'] = iniciarConexion('mysql:host=localhost;dbname=goa', 'root','');

function iniciarConexion($stringConexion, $user, $pass)
{
	try 
	{
		$conn = new PDO($stringConexion, $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	catch (PDOException $ex) {
		echo "Sucedio un problema al realizar la conexión !!";
		exit;
	}   
}

function getConexion()
{
	return $GLOBALS['conexion'];
}
?>