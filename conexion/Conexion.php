<?php 

	class Conexion {

		private $host;
		private $user;
		private $pass;
		private $db;

		public function __construct() {

			$this->host = constant('HOST');
			$this->user = constant('USER');
			$this->pass = constant('PASS');
			$this->db = constant('DB');

		}

		public function connect () {

			try {
				
				$cnx = 'mysql:host=' . $this->host . '; dbname=' . $this->db;
				$opt = [
						PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
						PDO::ATTR_EMULATE_PREPARES => false
						];
				$pdo = new PDO($cnx, $this->user, $this->pass, $opt);
				return $pdo;

			} catch (PDOException $e) {
				
				echo 'Error al Conectar con la Base de Datos en la Línea ' . $e->getLinea();
				echo '<br />';
				echo $e->getMessage();

			}

		}

		public function getData() {

			try {
				
				$query = $this->connect()->prepare('SELECT * FROM product');
				$query->execute();

				$row = $query->fetchAll(PDO::FETCH_ASSOC);
				return $row;

			} catch (PDOException $e) {
				
				echo 'Error al Consultar los datos en la Línea ' -> $e->getLine();
				echo "<br /> <br />";
				echo $e->getMessage();

			}

		}

		public function insert($nameProduct, $priceProduct, $yearProduct) {

			try {

				$insert = $this->connect()->prepare('INSERT INTO product (nameProduct, priceProduct, yearProduct) VALUES (:nameProduct, :priceProduct, :yearProduct)');
				$insert->execute([
					"nameProduct" => $nameProduct,
				    "priceProduct" => $priceProduct,
				    "yearProduct" => $yearProduct
				]);
				
				$row = $insert->rowCount();
				return $row;

			} catch (PDOException $e) {
				echo 'Error al Insertar el Dato ' . $e->getLine();
				echo '<br />';
				echo $e->getMessage();
			}
		}


		// Update Product

		public function getDataId($id) {
			try {
				
				$query = $this->connect()->prepare('SELECT * FROM product WHERE id = :id');
				$query->execute(['id' => $id]);

				$row = $query->fetch(PDO::FETCH_ASSOC);
				return $row;

			} catch (PDOException $e) {
				
				echo 'Error al Consultar los datos en la Línea ' -> $e->getLine();
				echo "<br /> <br />";
				echo $e->getMessage();

			}
		}

		public function update($id, $upName, $upPrice, $upYear) {
			try {
				
				$query = 'UPDATE product SET nameProduct = :nameProduct, priceProduct = :priceProduct, yearProduct = :yearProduct WHERE id = :id';
				$sql = $this->connect()->prepare($query);
				$sql->bindParam(':nameProduct', $upName, PDO::PARAM_STR);
				$sql->bindParam(':priceProduct', $upPrice, PDO::PARAM_STR);
				$sql->bindParam(':yearProduct', $upYear, PDO::PARAM_STR);
				$sql->bindParam(':id', $id, PDO::PARAM_STR);
				$sql->execute();

				return $row = $sql->rowCount();

			} catch (PDOException $e) {
				echo 'Error al Actualizar los Datos en la Línea ' . $e->getLine();
				echo '<br /> <br />';
				echo $e->getMessage();
			}
		}

		// Hasta Aquí Update Product 


		//Eliminar Datos
		public function delete($id) {

			try {
				
				$query = $this->connect()->prepare('DELETE FROM product WHERE id= :id');
				$row = $query->execute(['id' => $id]);
				return $row;

			} catch (PDOException $e) {
				echo 'Error al Eliminar los Datos en la Línea ' . $e->getLine();
				echo '<br /> <br />';
				echo $e->getMessage();
			}

		}
	}

 ?>