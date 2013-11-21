<?php
	/******************************************************
	 * Autor: Javier Ramírez Aguilar
	 * Fecha de creación: 17/11/2013 
	 * Ultima modificación: 17/11/2013
	 */
	class Cliente {
		private $id;
		private $cedula;
		private $nombre;
		private $apellido1;
		private $apellido2;
		private $email;
		private $edad;
		private $telefono1;
		private $telefono2;
		private $direccion;
		private $estado;
		
		public function __construct(){}
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getCedula(){
			return $this->cedula;	
		}
		
		public function setCedula($cedula){
			$this->cedula = $cedula;
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
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
		
		public function getEdad(){
			return $this->edad;
		}
		
		public function setEdad($edad){
			$this->edad = $edad;
		}
		
		public function getTelefono1(){
			return $this->telefono1;
		}
		
		public function setTelefono1($telefono1){
			$this->telefono1 = $telefono1;
		}
		
		public function getTelefono2(){
			return $this->telefono2;
		}
		
		public function setTelefono2($telefono2){
			$this->telefono2 = $telefono2;
		}
		
		public function getDireccion(){
			return $this->direccion;
		}
		
		public function setDireccion($direccion){
			$this->direccion = $direccion;
		}
		
		public function getEstado(){
			return $this->estado;
		}
		
		public function setEstado($estado){
			$this->estado = $estado;
		}
	}
?>