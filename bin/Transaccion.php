<?php

class Transaccion
{
	private $parametros = array();
	private $tabla;
	private $conexion;
	
	function __construct ($conn, $tabla)
	{
		$this->tabla = $tabla;
		$this->conexion = $conn;
	}
	
	public function addParametro($campo, $valor)
	{
		$this->parametros[] = array($campo=>$valor);		
	}
	
	public function addParametros($array)
	{
		foreach($array as $parametro => $value)
		{
			$this->addParametro($parametro, $value);
		}				
	}	
	
	public function ejecutarInsert()
	{
		try
		{
			$conn = $this->conexion;
			$stmt = $conn->prepare($this->generaInsert());
			$stmt->execute($this->getValoresInsert());
			return true;
		} 
		catch(PDOException $e) 
		{
			echo $e->getMessage();
		}	
	}
	
	private function generaInsert()
	{
		$campos = '';
		$valores = '';
		
		foreach($this->parametros as $parametro)
		{
			foreach($parametro as $campo => $valor)
			{
				if(empty($campos))
				{
					$campos = $campo;
					$valores = '?';
				}
				else
				{
					$campos.= ','.$campo;
					$valores.= ',?';	
				}
			}
		}
		
		return "INSERT INTO ".$this->tabla."(".$campos.") VALUES(".$valores.")";
	}
	
	private function getValoresInsert()
	{
		$arrayValores = array();
		
		foreach($this->parametros as $parametro)
		{
			foreach($parametro as $campo => $valor)
			{
				$arrayValores[] = $valor;
			}
		}
		
		return $arrayValores;
	}
}
?>