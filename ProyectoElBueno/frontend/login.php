<?php 

session_start();


$correo = $_GET['correo'];
$clave = $_GET['clave'];
$clave = hash('sha512', $clave);


$conexion = new mysqli('localhost','root','','login_tuto');
//SOLO ES CADENA DE TEXTO CON EL QUERY
$login = "SELECT * FROM login WHERE correo = '$correo' AND clave = '$clave'";


$resultado = $conexion->query($login);




	if($datosUsuario = $resultado->fetch_object()){
	
		$datos = array('insertado' => "si");
		$_SESSION['usuario'] = $datosUsuario->correo;
	}else{
		$datos = array('insertado' => "no");
	}

echo json_encode($datos);

?>