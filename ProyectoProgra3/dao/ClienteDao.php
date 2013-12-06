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
			$sql = sprintf("insert into Cliente(cedula,nombre,apellido1, apellido2, email, edad, telefono1, " .
			"telefono2, direccion, estado) values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)", 
			$facturaAdodb->Param("cedula"), 
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
			
			$valores["cedula"] = $cliente->getCedula();	
			$valores["nombre"] = $cliente->getNombre();
			$valores["apellido1"] = $cliente->getApellido1();
			$valores["apellido2"] = $cliente->getApellido2();
			$valores["email"] = $cliente->getEmail();
			$valores["edad"] = $cliente->getEdad();
			$valores["telefono1"] = $cliente->getTelefono1();
			$valores["telefono2"] = $cliente->getTelefono2();
			$valores["direccion"] = $cliente->getDireccion();
			$valores["estado"] = $cliente->getEstado();
				
			echo($sql);
			$resulSQL = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());	
		}catch(Exception $ex){
			throw new Exception("No se pudo agregar el cliente " .$ex);
		}
	}

	public function modificar(Cliente $cliente){
	
		global $facturaAdodb;
		
		try{
			$sql = sprintf("update Cliente " . 
						   "set cedula=%s,nombre=%s,apellido1=%s, apellido2=%s, email=%s, edad=%s, telefono1=%s, " .
						   "telefono2=%s, direccion=%s, estado=%s " .
						   "where id=%s", 
			$facturaAdodb->Param("cedula"), 
			$facturaAdodb->Param("nombre"), 
			$facturaAdodb->Param("apellido1"), 
			$facturaAdodb->Param("apellido2"), 
			$facturaAdodb->Param("email"), 
			$facturaAdodb->Param("edad"), 
			$facturaAdodb->Param("telefono1"), 
			$facturaAdodb->Param("telefono2"), 
			$facturaAdodb->Param("direccion"), 
			$facturaAdodb->Param("estado"),
			$facturaAdodb->Param("id")
			);
			
			$sql = $facturaAdodb->Prepare($sql);
			
			$valores = array();
			
			$valores["cedula"] = $cliente->getCedula();	
			$valores["nombre"] = $cliente->getNombre();
			$valores["apellido1"] = $cliente->getApellido1();
			$valores["apellido2"] = $cliente->getApellido2();
			$valores["email"] = $cliente->getEmail();
			$valores["edad"] = $cliente->getEdad();
			$valores["telefono1"] = $cliente->getTelefono1();
			$valores["telefono2"] = $cliente->getTelefono2();
			$valores["direccion"] = $cliente->getDireccion();
			$valores["estado"] = $cliente->getEstado();
			$valores["id"] = $cliente->getId();
				
			
			$resulSQL = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());	
		}catch(Exception $ex){
			throw new Exception("No se pudo actualizar el cliente " .$ex);
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
	
	public function buscarPorCedula(Cliente $cliente){
		global $facturaAdodb;
		try{
			$sql = sprintf("select * from cliente where cedula=%s",$facturaAdodb->Param("cedula"));
			$sql = $facturaAdodb->Prepare($sql);
			$valores = array();
			$valores["cedula"] = $cliente->getCedula();
			$resultSql = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());
			return $resultSql;
		}catch (Exception $ex){
			throw new Exception("Error buscando los clientes");
		}
	}
	
	public function existeCliente(Cliente $cliente){
		try{
			$resultSql = $this->buscarPorCedula($cliente);
			return $resultSql->RecordCount();
		}catch(Exception $ex){
			throw $ex;
		}
	}
	
	public function eliminar(Cliente $cliente){
		global $facturaAdodb;
		try{
			$sql = sprintf("delete from cliente where cedula=%s",$facturaAdodb->Param("cedula"));
			$sql = $facturaAdodb->Prepare($sql);
			$valores = array();
			$valores["cedula"] = $cliente->getCedula();
			$resultSql = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());
		}catch(Exception $ex){
			throw new Exception("Error al tratar de eliminar el cliente ".$ex );
		}
	}			
		
 }
 

?>