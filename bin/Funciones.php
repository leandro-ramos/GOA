<?php

//Funcion para imprimir un Select. Parametros:nombre, query, campo de la base.
function imprimirSelect($nombre, $query, $campo, $campoValor)
{
	$consulta = new Consulta(getConexion(), $query);		
	echo '<select class="form-control" name="'.$nombre.'">';	
	foreach($consulta->getFilas() as $fila)
	{
		echo "<option value='".$fila[$campoValor]."'>".$fila[$campo]."</option>";		
	}
	echo '</select>';
}

?>