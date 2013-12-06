<?php

/*
 * Autor: Javier Ramírez A
 * Fecha: 17/11/2013
 * 
 * */
	
require_once("bo/ClienteBo.php");
require_once("domains/Cliente.php");


if(isset($_POST['accion'])){
	$accion = $_POST['accion'];
	
	try{
		
		$clienteBo = new ClienteBo();
		$cliente = new Cliente();
		
		if($accion == "agregar"){
			 $cliente->setCedula($_POST['cedula']);
			 $cliente->setNombre($_POST['nombre']);
			 $cliente->setApellido1($_POST['apellido1']);
			 $cliente->setApellido2($_POST['apellido2']);
			 $cliente->setEmail($_POST['email']);
			 $cliente->setEdad($_POST['edad']);
			 $cliente->setTelefono1($_POST['telefono1']);
			 $cliente->setTelefono2($_POST['telefono2']);
			 $cliente->setDireccion($_POST['direccion']);
			 $cliente->setEstado($_POST['estado']);
			 $clienteBo->agregar($cliente);
		}
		
		if($accion == "modificar"){
			 $cliente->setId($_POST['id']);
			 $cliente->setCedula($_POST['cedula']);
			 $cliente->setNombre($_POST['nombre']);
			 $cliente->setApellido1($_POST['apellido1']);
			 $cliente->setApellido2($_POST['apellido2']);
			 $cliente->setEmail($_POST['email']);
			 $cliente->setEdad($_POST['edad']);
			 $cliente->setTelefono1($_POST['telefono1']);
			 $cliente->setTelefono2($_POST['telefono2']);
			 $cliente->setDireccion($_POST['direccion']);
			 $cliente->setEstado($_POST['estado']);
			 $clienteBo->modificar($cliente);
						
		}
		
		if($accion == "eliminar"){
			 $cliente->setCedula($_POST['cedula']);
			 $clienteBo->eliminar($cliente);
		}
		
		if($accion == "buscarTodos"){
			$resultado = $clienteBo->buscarTodos();
			
			if($resultado->RecordCount() > 0){
					echo('<table class="tbl">
						<tr>
						  <th>Cedula</th>
						  <th>Nombre</th>
						  <th>Email</th>
						  <th>Edad</th>
						  <th>Telefono 1</th>
						  <th>Telefono 2</th>
						  <th>Direccion</th>
						  <th>Estado</th>
						  <th>Accion</th>
						</tr>');
				$i = 0;
				while (!$resultado->EOF){ //ciclo para recorrer cada una de las filas que retorno la consulta
					
					if($i % 2 == 0){
						echo('<tr class="bg">');
					}else{
						echo('<tr>');
					}
					
					$estado = "";
					if($resultado->Fields("estado") == "A"){
						$estado = "Activo";
					}else{
						$estado = "Inactivo";
					}
					$nombre = $resultado->Fields("nombre") . " " . $resultado->Fields("apellido1") . " " . $resultado->Fields("apellido2");
					
					echo('
						  <td>'.$resultado->Fields("cedula").'</td>
						  <td>'.$nombre.'</td>
						  <td>'.$resultado->Fields("email").'</td>
						  <td>'.$resultado->Fields("edad").'</td>
						  <td>'.$resultado->Fields("telefono1").'</td>
						  <td>'.$resultado->Fields("telefono2").'</td>
						  <td>'.$resultado->Fields("direccion").'</td>
						  <td>'.$estado.'</td>
						  <td class="alignCenter"><a class="textDecoration"href="modificarCliente.php?cedula='.$resultado->Fields("cedula").'">Modificar</a>-
						  <a onClick="eliminar('.$resultado->Fields("cedula").');">Eliminar</a></td>
						</tr>');  
					$resultado->MoveNext();
					$i = $i + 1;
				}
				echo('</table>');
			}
		}


		
	}catch(Exception $ex){
		echo($ex);
	}
}	
	
?>