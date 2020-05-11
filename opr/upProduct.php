<?php 

	$id = $_GET['id'];
	$upName = $_POST['upName'];
	$upPrice = $_POST['upPrice'];
	$upYear = $_POST['upYear'];

	require_once '../config/config.php';
	require_once '../conexion/Conexion.php';

	$cnx = new Conexion;
	$db = $cnx->update($id, $upName, $upPrice, $upYear);

	if ($db === 1) {
		header('Location: ../index.php');
	} else {
		echo 'Error al Actualizar los Datos';
	}

 ?>