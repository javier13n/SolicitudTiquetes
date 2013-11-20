<?php

include("connections/conexion.php");
include_once("domains/Cliente.php");

/*********************************************+
 * Autor: Javier Ramírez Aguilar
 * Fecha de creación: 17/11/2013
 * Ultima modificación: 17/11/2013
 * 
 * */
//$facturaAdodb->debug=true;
 class ClienteDao{
 		
	public function __construct(){}
	
	public function agregar(Cliente $cliente){
		echo("Entre a cliente dao");
		global $facturaAdodb;
		
		try{
			$sql = sprintf("insert into Cliente(id,nombre,apellido1, apellido2, email, edad, telefono1, " .
			"telefono2, direccion, estado) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)", 
			$facturaAdodb->Param("id"), 
			$facturaAdodb->Param("nombre"), 
			$facturaAdodb->Param("apellido1"), 
			$facturaAdodb->Param("apellido2"), 
			$facturaAdodb->Param("email"), 
			$facturaAdodb->Param("edad"), 
			$facturaAdodb->Param("telefono1"), 
			$facturaAdodb->Param("telefono2"), 
			$facturaAdodb->Param("direccion"), 
			$facturaAdodb->Param("estado"));
			
			$sql = $facturaAdodb->Prepare($sql);
			
			$valores = array();
			
			$valores["id"] = $cliente->getId();	
			$valores["nombre"] = $cliente->getNombre();
			$valores["apellido1"] = $cliente->getApellido1();
			$valores["apellido2"] = $cliente->getApellido2();
			$valores["email"] = $cliente->getEmail();
			$valores["edad"] = $cliente->getEdad();
			$valores["telefono1"] = $cliente->getTelefono1();
			$valores["telefono2"] = $cliente->getTelefono2();
			$valores["direccion"] = $cliente->getDireccion();
			$valores["estado"] = $cliente->getEstado();
				
			
			$resulSQL = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());	
		}catch(Exception $ex){
			throw new Exception("No se pudo agregar el cliente " .$ex);
		}
	}

	public function buscarTodos(){
		global $facturaAdodb;
		try{
			$sql = sprintf("select * from cliente");
			$resultSql = $facturaAdodb->Execute($sql);
			return $resultSql;
		}catch (Exception $ex){
			throw new Exception("Error buscando los clientes");
		}
	}
	
	public function eliminar(Cliente $cliente){
		global $facturaAdodb;
		try{
			$sql = sprintf("delete from cliente where id=".$cliente);
			$resultSql = $facturaAdodb->Execute($sql);
		}catch(Exception $ex){
			throw new Exception("Error al tratar de eliminar el cliente ".$ex );
		}
	}			
		
 }
 

?>