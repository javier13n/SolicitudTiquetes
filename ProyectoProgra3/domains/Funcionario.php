<?php

/******************************************************
 * Autor: Javier Ramírez A
 * Fecha: 02/12/2013
 * Ultima modificación: 02/12/2013
******************************************************/
	class Funcionario{
		private $id;
		private $idDepartamento;
		private $nombre;
		private $apellido1;
		private $apellido2;
		private $login;
		private $contrasenna;
		private $email;
		private $estado;
		
		public function __construct(){
			
		}
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getIdDepartamento(){
			return $this->idDepartamento;
		}		
		
		public function setIdDepartamento($idDepartamento){
			$this->idDepartamento = $idDepartamento;
		}
		
		public function getNombre(){
			return $this->nombre;
		}
		
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		
		public function getApellido1(){
			return $this->apellido1;
		}
		
		public function setApellido1($apellido1){
			$this->apellido1 = $apellido1;
		}
		
		public function getApellido2(){
			return $this->apellido2;
		}
		
		public function setApellido2($apellido2){
			$this->apellido2 = $apellido2;
		}
		
		public function getLogin(){
			return $this->login;
		}
		
		public function setLogin($login){
			$this->login = $login;
		}
		
		public function getContrasenna(){
			return $this->contrasenna;
		}
		
		public function setContrasenna($contrasenna){
			$this->contrasenna = $contrasenna;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
		
		public function getEstado(){
			return $this->estado;
		}
		
		public function setEstado($estado){
			$this->estado = $estado;
		}
	}

?>