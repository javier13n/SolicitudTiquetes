/**************************************************************
 *Autor: Javier Ramírez Aguilar.
 *Fecha: 17/11/2013 
 *Ultima modificación: 17/11/2013
 *
 *************************************************************/

function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function agregar(){

	var mensaje = document.getElementById('mensaje');
	var cedula = document.getElementById('cedula').value;
	
	var nombre = document.getElementById('nombre').value;
	var apellido1 = document.getElementById('apellido1').value;
	var apellido2 = document.getElementById('apellido2').value;
	var email = document.getElementById('email').value;
	var edad = document.getElementById('edad').value;
	var telefono1 = document.getElementById('telefono1').value;
	var telefono2 = document.getElementById('telefono2').value;
	var direccion = document.getElementById('direccion').value;
	var estado = "A";
	
	if(document.getElementById('estado').checked){
		estado = "A";
	}else{
		estado = "I";
	}
	
	if(validar()){
		var ajax = objetoAjax();
		
		ajax.open("POST", "clienteService.php", true);
		ajax.onreadystatechange=function() {
				if (ajax.readyState==4) { //respondio el ajax
					cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
					//alert(cadenafinal);
					mensaje.innerHTML = "<p id='msj' class='msg info'>Registro Exitoso</p>"; //injectar HTML en un DIV
					limpiar();
				}
			}		
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("accion=agregar&cedula="+cedula+"&nombre="+nombre+"&apellido1="+apellido1+"&apellido2="+apellido2+"&email="+email+"&edad="+edad+"&telefono1="+telefono1
		+"&telefono2="+telefono2+"&direccion="+direccion+"&estado="+estado);
	}
}

function validar(){
	var mensaje = document.getElementById('mensaje');
	var cedula = document.getElementById('cedula').value;
	var nombre = document.getElementById('nombre').value;
	var apellido1 = document.getElementById('apellido1').value;
	var apellido2 = document.getElementById('apellido2').value;
	var email = document.getElementById('email').value;
	var edad = document.getElementById('edad').value;
	var telefono1 = document.getElementById('telefono1').value;
	var telefono2 = document.getElementById('telefono2').value;
	var direccion = document.getElementById('direccion').value;
	var estado = document.getElementById('estado').value;
	
	
	if(cedula == "" || nombre == "" || apellido1 == "" || email == "" || telefono1 == "" ||
	direccion == ""){
		mensaje.innerHTML = "<p id='msj' class='msg warning'>Debe ingresar los campos requeridos</p>";
		return false;
	}
	return true;
}

function limpiar(){
	document.getElementById('cedula').value = '';
	document.getElementById('nombre').value = '';
	document.getElementById('apellido1').value = '';
	document.getElementById('apellido2').value = '';
	document.getElementById('email').value = '';
	document.getElementById('edad').value = '';
	document.getElementById('telefono1').value = '';
	document.getElementById('telefono2').value = '';
	document.getElementById('direccion').value = '';
	document.getElementById('estado').value = '';
}

function buscar(){
	//se obtienes por medio de DOM los div's para mostrar mensajes
	resultado = document.getElementById("tblCliente");
	
	ajax=objetoAjax();
	ajax.open("POST", "clienteService.php",true);		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) { //respondio el ajax
			cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
			//alert(cadenafinal);//prueba de mostrar la respuesta del ajax
			resultado.innerHTML  = cadenafinal; //injectar HTML en un DIV
		}
	}		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("accion=buscarTodos");
	//alert("accion=buscarTodos");//mostrar por un mensaje la información que se esta enviado por post
}

function eliminar(cedula){
	var mensaje = document.getElementById('mensajeConsultarCliente');
	if(confirm("Seguro que desea borrar el cliente?")){
		
		var ajax = objetoAjax();
		
		ajax.open("POST", "clienteService.php", true);
		ajax.onreadystatechange=function() {
				if (ajax.readyState==4) { //respondio el ajax
					cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
					//alert(cadenafinal);
					mensaje.innerHTML = "<p id='msj' class='msg info'>Registro Eliminado</p>"; //injectar HTML en un DIV
					buscar();
				}
			}		
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("accion=eliminar&cedula="+cedula);
		
	}
	
}

function modificar(){ 
	var mensaje = document.getElementById('mensaje');
	var cedula = document.getElementById('cedula').value;
	
	var id = document.getElementById('id').value;
	var nombre = document.getElementById('nombre').value;
	var apellido1 = document.getElementById('apellido1').value;
	var apellido2 = document.getElementById('apellido2').value;
	var email = document.getElementById('email').value;
	var edad = document.getElementById('edad').value;
	var telefono1 = document.getElementById('telefono1').value;
	var telefono2 = document.getElementById('telefono2').value;
	var direccion = document.getElementById('direccion').value;
	var estado = "A";
	
	if(document.getElementById('estado').checked){
		estado = "A";
	}else{
		estado = "I";
	}
	
	if(validar()){
		var ajax = objetoAjax();
		
		ajax.open("POST", "clienteService.php", true);
		ajax.onreadystatechange=function() {
				if (ajax.readyState==4) { //respondio el ajax
					cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
					//alert(cadenafinal);
					mensaje.innerHTML = "<p id='msj' class='msg info'>Los datos se modificaron con exito</p>"; //injectar HTML en un DIV
				}
		}		
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("accion=modificar&cedula="+cedula+"&nombre="+nombre+"&apellido1="+apellido1+"&apellido2="+apellido2+"&email="+email+"&edad="+edad+"&telefono1="+telefono1+"&id="+id
		+"&telefono2="+telefono2+"&direccion="+direccion+"&estado="+estado);
	}
}
		




