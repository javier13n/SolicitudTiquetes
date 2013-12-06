/**************************************************************
 *Autor: Javier Ramírez Aguilar.
 *Fecha: 04/12/2013 
 *Ultima modificación: 04/12/2013
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
	var idDepartamento = document.getElementById('departamento').value;
	
	var nombre = document.getElementById('nombre').value;
	var apellido1 = document.getElementById('apellido1').value;
	var apellido2 = document.getElementById('apellido2').value;
	var email = document.getElementById('email').value;
	var login = document.getElementById('login').value;
	var contrasenna = document.getElementById('contrasenna').value;
	var confirmar = document.getElementById('confirmar').value;
	
	var estado = "A";
	
	if(document.getElementById('estado').checked){
		estado = "A";
	}else{
		estado = "I";
	}
	
	if(validar()){
		var ajax = objetoAjax();
		
		ajax.open("POST", "funcionarioService.php", true);
		ajax.onreadystatechange=function() {
				if (ajax.readyState==4) { //respondio el ajax
					cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
					//alert(cadenafinal);
					mensaje.innerHTML = "<p id='msj' class='msg info'>Registro Exitoso</p>"; //injectar HTML en un DIV
					limpiar();
				}
			}		
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("accion=agregar&idDepartamento="+idDepartamento+"&nombre="+nombre+"&apellido1="+apellido1+"&apellido2="+apellido2+"&email="+email+"&login="+login+"&contrasenna="+contrasenna
		+"&estado="+estado);
	}
}

function cargarComboBox(){
		//se obtienes por medio de DOM los div's para mostrar mensajes
	resultado = document.getElementById('cmbDepartamento');
	
	ajax=objetoAjax();
	ajax.open("POST", "funcionarioService.php",true);		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) { //respondio el ajax
			cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
			//alert(cadenafinal);//prueba de mostrar la respuesta del ajax
			resultado.innerHTML  = cadenafinal; //injectar HTML en un DIV
		}
	}		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("accion=buscarTodosDepartamento");
}

function cargarComboBox(id){
		//se obtienes por medio de DOM los div's para mostrar mensajes
	resultado = document.getElementById('cmbDepartamento');
	
	ajax=objetoAjax();
	ajax.open("POST", "funcionarioService.php",true);		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) { //respondio el ajax
			cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
			//alert(cadenafinal);//prueba de mostrar la respuesta del ajax
			resultado.innerHTML  = cadenafinal; //injectar HTML en un DIV
			var arr = new Array();
			arr = document.getElementById('departamento').getElementsByTagName('option');
			
			for (var i=0; i< arr.length; i++){
				if(document.getElementById('departamento').getElementsByTagName('option')[i].value == id){
					document.getElementById('departamento').getElementsByTagName('option')[i].selected = 'selected';
				}
			}
			
		}
	}		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("accion=buscarTodosDepartamento");
}

function cargarComboBoxModificar(){
		//se obtienes por medio de DOM los div's para mostrar mensajes
	resultado = document.getElementById('cmbDepartamento');
	
	ajax=objetoAjax();
	ajax.open("POST", "funcionarioService.php",true);		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) { //respondio el ajax
			cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
			//alert(cadenafinal);//prueba de mostrar la respuesta del ajax
			resultado.innerHTML  = cadenafinal; //injectar HTML en un DIV
		}
	}		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("accion=buscarTodosDepartamento");
}

function limpiar(){
	cargarComboBox();
	document.getElementById('nombre').value = "";
	document.getElementById('apellido1').value = "";
	document.getElementById('apellido2').value = "";
	document.getElementById('email').value = "";
	document.getElementById('login').value = "";
	document.getElementById('contrasenna').value = "";
	document.getElementById('confirmar').value = "";	
}

function validar(){

	var idDepartamento = document.getElementById('departamento').value;
	
	var nombre = document.getElementById('nombre').value;
	var apellido1 = document.getElementById('apellido1').value;
	var apellido2 = document.getElementById('apellido2').value;
	var email = document.getElementById('email').value;
	var login = document.getElementById('login').value;
	var contrasenna = document.getElementById('contrasenna').value;
	var confirmar = document.getElementById('confirmar').value;

	if(idDepartamento == "" || nombre == "" || apellido1 == "" || email == "" || login == "" ||
		contrasenna == "" || confirmar == ""){
		mensaje.innerHTML = "<p id='msj' class='msg warning'>Debe ingresar los campos requeridos</p>";
		return false;
	}
	
	if(contrasenna != confirmar){
		mensaje.innerHTML = "<p id='msj' class='msg warning'>Las contrase&ntilde;as no conciden</p>";
		return false;
	}
	return true;
}

function buscar(){
//se obtienes por medio de DOM los div's para mostrar mensajes
	resultado = document.getElementById('tblFuncionario');
	
	ajax=objetoAjax();
	ajax.open("POST", "funcionarioService.php",true);		
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) { //respondio el ajax
			cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
			//alert(cadenafinal);//prueba de mostrar la respuesta del ajax
			resultado.innerHTML  = cadenafinal; //injectar HTML en un DIV
		}
	}		
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	ajax.send("accion=buscarTodos");

}


function eliminar(id){
	var mensaje = document.getElementById('mensajeConsultarFuncionario');
	if(confirm("Seguro que desea borrar el funcionario?")){
		
		var ajax = objetoAjax();
		
		ajax.open("POST", "funcionarioService.php", true);
		ajax.onreadystatechange=function() {
				if (ajax.readyState==4) { //respondio el ajax
					cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
					//alert(cadenafinal);
					mensaje.innerHTML = "<p id='msj' class='msg info'>Registro Eliminado</p>"; //injectar HTML en un DIV
					buscar();
				}
			}		
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		ajax.send("accion=eliminar&id="+id);
		
	}
	
}


function modificar(){
	var mensaje = document.getElementById('mensaje');
	var idDepartamento = document.getElementById('departamento').value;
	var id =  document.getElementById('id').value;
	var nombre = document.getElementById('nombre').value;
	var apellido1 = document.getElementById('apellido1').value;
	var apellido2 = document.getElementById('apellido2').value;
	var email = document.getElementById('email').value;
	var login = document.getElementById('login').value;
	var contrasenna = document.getElementById('contrasenna').value;
	var confirmar = document.getElementById('confirmar').value;
	
	var estado = "A";
	
	if(document.getElementById('estado').checked){
		estado = "A";
	}else{
		estado = "I";
	}
	
	if(document.getElementById('cambio').checked){
	
		if(validar()){
			var ajax = objetoAjax();
			
			ajax.open("POST", "funcionarioService.php", true);
			ajax.onreadystatechange=function() {
					if (ajax.readyState==4) { //respondio el ajax
						cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
						
						mensaje.innerHTML = "<p id='msj' class='msg info'>Modificacion Exitosa</p>"; //injectar HTML en un DIV
						
					}
				}		
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			ajax.send("accion=modificarContrasenna&idDepartamento="+idDepartamento+"&nombre="+nombre+"&apellido1="+apellido1+"&apellido2="+apellido2+"&email="+email+"&login="+login+"&contrasenna="+contrasenna
			+"&estado="+estado+"&id="+id);
		}
	}else{
		if(validarSinContrasenna()){
			var ajax = objetoAjax();
			
			ajax.open("POST", "funcionarioService.php", true);
			ajax.onreadystatechange=function() {
					if (ajax.readyState==4) { //respondio el ajax
						cadenafinal=ajax.responseText; //forma de obtener lo que responde el ajax	
						//alert(cadenafinal);
						mensaje.innerHTML = "<p id='msj' class='msg info'>Modificacion Exitosa</p>"; //injectar HTML en un DIV
					
					}
				}		
			ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			ajax.send("accion=modificar&idDepartamento="+idDepartamento+"&nombre="+nombre+"&apellido1="+apellido1+"&apellido2="+apellido2+"&email="+email+"&login="+login+"&contrasenna="+contrasenna
			+"&estado="+estado+"&id="+id);
			}
		}
	}


function validarSinContrasenna(){

	var idDepartamento = document.getElementById('departamento').value;
	
	var nombre = document.getElementById('nombre').value;
	var apellido1 = document.getElementById('apellido1').value;
	var apellido2 = document.getElementById('apellido2').value;
	var email = document.getElementById('email').value;
	var login = document.getElementById('login').value;
	var contrasenna = document.getElementById('contrasenna').value;
	var confirmar = document.getElementById('confirmar').value;

	if(idDepartamento == "" || nombre == "" || apellido1 == "" || email == "" || login == ""){
		mensaje.innerHTML = "<p id='msj' class='msg warning'>Debe ingresar los campos requeridos</p>";
		return false;
	}
	return true;
}


