<?php

include("connections/conexion.php");
include_once("domains/Funcionario.php");

/*Autor: Javier Ramírez Aguilar
 *Fecha de creación: 03/12/2013
 *Ultima modificación: 03/12/2013
 */

$facturaAdodb->debug=FALSE;
class FuncionarioDao{
	
	public function __construct(){}
	
	public function agregar(Funcionario $funcionario){
		global $facturaAdodb;
		
		try{
			$sql = sprintf("insert into Funcionario(idDepartamento,nombre,apellido1, apellido2, email, login, contrasenna, " .
			"estado) values(%s,%s,%s,%s,%s,%s,%s,%s)", 
			$facturaAdodb->Param("idDepartamento"), 
			$facturaAdodb->Param("nombre"), 
			$facturaAdodb->Param("apellido1"), 
			$facturaAdodb->Param("apellido2"), 
			$facturaAdodb->Param("email"), 
			$facturaAdodb->Param("login"), 
			$facturaAdodb->Param("contrasenna"), 
			$facturaAdodb->Param("estado"));
			
			$sql = $facturaAdodb->Prepare($sql);
			
			$valores = array();
			
			$valores["idDepartamento"] = $funcionario->getIdDepartamento();	
			$valores["nombre"] = $funcionario->getNombre();
			$valores["apellido1"] = $funcionario->getApellido1();
			$valores["apellido2"] = $funcionario->getApellido2();
			$valores["email"] = $funcionario->getEmail();
			$valores["login"] = $funcionario->getLogin();
			$valores["contrasenna"] = $funcionario->getContrasenna();
			$valores["estado"] = $funcionario->getEstado();
				
			echo($sql);
			$resulSQL = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());	
		}catch(Exception $ex){
			throw new Exception("No se pudo agregar el funcionario " .$ex);
		}
	}

	public function modificarContrasenna(Funcionario $funcionario){
	
		global $facturaAdodb;
		
		try{
			$sql = sprintf("update Funcionario " . 
						   "set idDepartamento=%s,nombre=%s,apellido1=%s, apellido2=%s, email=%s, login=%s, contrasenna=%s, " .
						   "estado=%s " .
						   "where id=%s", 
			$facturaAdodb->Param("idDepartamento"), 
			$facturaAdodb->Param("nombre"), 
			$facturaAdodb->Param("apellido1"), 
			$facturaAdodb->Param("apellido2"), 
			$facturaAdodb->Param("email"), 
			$facturaAdodb->Param("login"), 
			$facturaAdodb->Param("contrasenna"), 
			$facturaAdodb->Param("estado"),
			$facturaAdodb->Param("id")
			);
			
			$sql = $facturaAdodb->Prepare($sql);
			
			$valores = array();
			
			$valores["idDepartamento"] = $funcionario->getIdDepartamento();	
			$valores["nombre"] = $funcionario->getNombre();
			$valores["apellido1"] = $funcionario->getApellido1();
			$valores["apellido2"] = $funcionario->getApellido2();
			$valores["email"] = $funcionario->getEmail();
			$valores["login"] = $funcionario->getLogin();
			$valores["contrasenna"] = $funcionario->getContrasenna();
			$valores["estado"] = $funcionario->getEstado();
			$valores["id"] = $funcionario->getId();
				
			
			$resulSQL = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());	
		}catch(Exception $ex){
			throw new Exception("No se pudo actualizar el funcionario " .$ex);
		}
	}

	public function modificar(Funcionario $funcionario){
	
		global $facturaAdodb;
		
		try{
			$sql = sprintf("update Funcionario " . 
						   "set idDepartamento=%s,nombre=%s,apellido1=%s, apellido2=%s, email=%s, login=%s, " .
						   "estado=%s " .
						   "where id=%s", 
			$facturaAdodb->Param("idDepartamento"), 
			$facturaAdodb->Param("nombre"), 
			$facturaAdodb->Param("apellido1"), 
			$facturaAdodb->Param("apellido2"), 
			$facturaAdodb->Param("email"), 
			$facturaAdodb->Param("login"), 
			$facturaAdodb->Param("estado"),
			$facturaAdodb->Param("id")
			);
			
			$sql = $facturaAdodb->Prepare($sql);
			
			$valores = array();
			
			$valores["idDepartamento"] = $funcionario->getIdDepartamento();	
			$valores["nombre"] = $funcionario->getNombre();
			$valores["apellido1"] = $funcionario->getApellido1();
			$valores["apellido2"] = $funcionario->getApellido2();
			$valores["email"] = $funcionario->getEmail();
			$valores["login"] = $funcionario->getLogin();
			$valores["estado"] = $funcionario->getEstado();
			$valores["id"] = $funcionario->getId();
				
			
			$resulSQL = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());	
		}catch(Exception $ex){
			throw new Exception("No se pudo actualizar el funcionario " .$ex);
		}
	}
	
	public function buscarTodos(){
		global $facturaAdodb;
		try{
			$sql = sprintf("select * from funcionario");
			$resultSql = $facturaAdodb->Execute($sql);
			return $resultSql;
		}catch (Exception $ex){
			throw new Exception("Error buscando los clientes");
		}
	}
	
	public function buscarPorId(Funcionario $funcionario){
		global $facturaAdodb;
		try{
			$sql = sprintf("select * from funcionario where id=%s",$facturaAdodb->Param("id"));
			$sql = $facturaAdodb->Prepare($sql);
			$valores = array();
			$valores["id"] = $funcionario->getId();
			$resultSql = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());
			return $resultSql;
		}catch (Exception $ex){
			throw new Exception("Error buscando los clientes");
		}
	}
	
	public function eliminar(Funcionario $funcionario){
		global $facturaAdodb;
		try{
			$sql = sprintf("delete from funcionario where id=%s",$facturaAdodb->Param("id"));
			$sql = $facturaAdodb->Prepare($sql);
			$valores = array();
			$valores["id"] = $funcionario->getId();
			$resultSql = $facturaAdodb->Execute($sql,$valores) or die($facturaAdodb->ErrorMsg());
		}catch(Exception $ex){
			throw new Exception("Error al tratar de eliminar el cliente ".$ex );
		}
	}		
	
	
}

?>