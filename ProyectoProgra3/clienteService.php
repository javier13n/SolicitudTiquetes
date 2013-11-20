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
			 $cliente->setId($_POST['id']);
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
		
		if($accion == "eliminar"){
			 $cliente->setId($_POST['id']);
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
				while (!$resultado->EOF){ //ciclo para recorrer cada una de las filas que retorno la consulta
					echo('
						<tr class="bg">
						  <td>'.$resultado->Fields("id").'</td>
						  <td>'.$resultado->Fields("nombre").'</td>
						  <td>'.$resultado->Fields("email").'</td>
						  <td>'.$resultado->Fields("edad").'</td>
						  <td>'.$resultado->Fields("telefono1").'</td>
						  <td>'.$resultado->Fields("telefono2").'</td>
						  <td>'.$resultado->Fields("direccion").'</td>
						  <td>'.$resultado->Fields("estado").'</td>
						  <td class="alignCenter"><a onClick="eliminar('.$resultado->Fields("id").')">Modificar</a> - <a>Eliminar</a></td>
						</tr>');  
					$resultado->MoveNext();
				}
				echo('</table>');
			}
		}


		
	}catch(Exception $ex){
		echo($ex);
	}
}	
	
?>