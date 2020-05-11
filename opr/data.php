<?php 
	
	// --------------------------------------------------------------------
	// ---------------------- Insertar Datos ------------------------------
	// --------------------------------------------------------------------
	
		$nameProduct = $_POST['nameProduct'];
		$priceProduct = $_POST['priceProduct'];
		$yearProduct = $_POST['yearProduct'];

		require_once '../config/config.php';
		require_once '../conexion/Conexion.php';

		$db = new Conexion;
		$resultInsert = $db->insert($nameProduct, $priceProduct, $yearProduct);

		if ($resultInsert == 1) {
				echo "<script> alert('Dato REgistrado'); </script>";
				header('Location: ../index.php');
			} else {
				echo 'Error al Guardar los Datos';
		}

	
	// --------------------------------------------------------------------
	// ----------------- Hasta Aquí Insertar Datos ------------------------
	// --------------------------------------------------------------------
	
 ?>