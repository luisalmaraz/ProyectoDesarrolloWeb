<?php 

session_start();

if(isset($_SESSION['usuario'])) {
	header('location: index.php');
} else {
	$correo = $_GET['correo'];
	$usuario = $_GET['usuario'];
	$clave = $_GET['clave'];
	$clave = hash('sha512', $clave);
	$conexion = new mysqli('localhost','root','','login_tuto');

	$insertar = "INSERT into login (correo, usuario, clave) VALUES ('$correo','$usuario','$clave')";
	$conexion->query($insertar);
	if($conexion->error){
	$datos = array('insertado' => "no");
	}
	else
	{
	$datos = array('insertado' => "si");	
	}
	echo json_encode($datos);

}
?>