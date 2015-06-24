<?php
include("Sistema.php");

//LLamadas que se ejecutan desde AJAX

if(isset($_POST['Funcion']))
{
	switch($_POST['Funcion'])
	{
	case 'generaIncidencia':
		
		generaIncidencia();
		
		break;
		
	case 'countIncidencias':
		
		countIncidencias();
		
		break;		
	}
}

function generaIncidencia()
{
	if(isset($_POST['apertura']) && isset($_POST['beneficiario']) && isset($_POST['mtcn']) &&
			isset($_POST['monto']) && isset($_POST['destino']))
	{
		$transaccion = new Transaccion(getConexion(), 'incidencias');
		
		$parametros = array(
		'id_apertura' => $_POST['apertura'],
		'beneficiario'=> $_POST['beneficiario'],
		'mtcn'		  => $_POST['mtcn'],
		'monto'       => $_POST['monto'],
		'destino'     => $_POST['destino'],
		'observaciones'=> $_POST['txtObservaciones'],
		'fecha_alta'  => date('Y-m-d:h:i',time()),
		'id_agente'   =>  1,
		'id_operador' => 0,
		'id_tipo'     => 12
		);		
		
		$transaccion->addParametros($parametros);		
		
		$transaccion->ejecutarInsert();
	}
	else
	{
		echo "falto un campo";
	}
}

//Funcion que devuelve la cantidad de incidencias pendientes
function countIncidencias()
{
	$query = 'SELECT COUNT(*) AS cantidad FROM incidencias WHERE id_operador = 0';
	
	$consulta = new Consulta(getConexion(), $query);
	
	echo $consulta->getColumna('cantidad');
}

?>