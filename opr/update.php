<?php 
	
	$id = $_GET['id'];
	
	require_once '../config/config.php';
	require_once '../conexion/Conexion.php';

	$db = new Conexion;
	$update = $db->getDataId($id);

 ?>
<!DOCTYPE html>
<html lang="en">
 <head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<link rel="stylesheet" href="../public/style/bootstrap.min.css">	
	<title>Update Product</title>
</head>
<body>
	
	<div class="container">
		<div class="row pt-5">
			<div class="col-md-4">
			        <div class="card">
			            <div class="card-header">
			                <h4>Update Product</h4>
			            </div>
			            <div class="card-body">
			                <form action="upProduct.php?id=<?php echo $update['id']; ?>" method="POST" id="book-form">
			                    <div class="form-group">
			                        <input type="text" class="form-control" name="upName" value="<?php echo $update['nameProduct']; ?>">
			                    </div>
			                                
			                    <div class="form-group">
			                      	<input type="number" class="form-control" min="0" name="upPrice" value="<?php echo $update['priceProduct'] ?>">
			                    </div>
			
			                    <div class="form-group">
			                        <input type="number" min="2000" max="2050" class="form-control" name="upYear" id="price" value="<?php echo $update['yearProduct'] ?>">
			                     </div>
			                    <input type="submit" id="save" class="btn btn-primary btn-block" value="Update">
			                </form>
			            </div>
			        </div>
			    </div>
		</div>
	</div>

</body>
</html>