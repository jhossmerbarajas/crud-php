<?php 

	$id = $_GET['id'];

	require_once '../config/config.php';
	require_once '../conexion/Conexion.php';

	$cnx = new Conexion;
	$db = $cnx->delete($id);

	if ($db === true) {
		header('Location: ../index.php');
	} else {
		echo 'Error al Eliminar los Datos';
	}

 ?>