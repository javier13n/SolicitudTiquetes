<?php
	
	/*********************************************
	 * Autor: Javier Ramírez Aguilar 
	 * Fecha: 17/11/2013
	 * Ultima modificación: 17/11/2013
	 */

	 
include("domains/Cliente.php");
include("dao/ClienteDao.php");
	 
class ClienteBo{

	private $clienteDao;
	
	public function __construct(){
		$this->clienteDao = new ClienteDao();
	}
	
	public function getClienteDao(){
		return $clienteDao;
	}
	
	public function setClienteDao(ClienteDao $clienteDao){
		$this->clienteDao = $clienteDao;
	}

	public function agregar(Cliente $cliente){
		try{
			//echo("Hola");
		//	echo($this->clienteDao->existeCliente($cliente));
			//if($this->clienteDao->existeCliente($cliente) > 0){
			$this->clienteDao->agregar($cliente);
		//	}else {
			//	throw new Exception("El cliente ya se encuentra en el sistema");
			//}
		}catch(Exception $ex){
			throw $ex;
		}
	}
	
	public function buscarTodos(){
		try{
			return $this->clienteDao->buscarTodos();
		}catch(Exception $ex){
			throw $ex;
		}
	}
	
	public function buscarPorCedula($cliente){
		try{
			return $this->clienteDao->buscarPorCedula($cliente);
		}catch(Exception $ex){
			throw $ex;
		}
	}

	public function eliminar(Cliente $cliente){
		try{
			$this->clienteDao->eliminar($cliente);
		}catch(Exception $ex){
			throw $ex;
		}
	}
	
	public function modificar(Cliente $cliente){
		try{
			$this->clienteDao->modificar($cliente);
		}catch(Exception $ex){
			throw $ex;
		}
	}
}

?>