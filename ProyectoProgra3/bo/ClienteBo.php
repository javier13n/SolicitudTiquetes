<?php
	
	/*********************************************
	 * Autor: Javier Ram�rez Aguilar 
	 * Fecha: 17/11/2013
	 * Ultima modificaci�n: 17/11/2013
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
			$this->clienteDao->agregar($cliente);
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
}

?>