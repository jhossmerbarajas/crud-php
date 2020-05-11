<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<link rel="stylesheet" href="public/style/bootstrap.min.css">	
	<title>Document</title>
</head>
<body>
	
	 <nav class="navbar navbar-dark bg-dark">
        <a href="#" class="navbar-brand"> Product </a>
    </nav>

    <main>
        <section class="container">
            <div id="App" class="row pt-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Producte</h4>
                        </div>
                        <div class="card-body">
                            <form action="opr/data.php" method="POST" id="book-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nameProduct" id="name" placeholder="Name Product">
                                </div>
                                
                                <div class="form-group">
                                	<input type="number" class="form-control" min="0" name="priceProduct" placeholder="Ex. 00.0 Bs">
                                </div>

                                <div class="form-group">
                                    <input type="number" min="2000" max="2050" class="form-control" name="yearProduct" id="price" placeholder="Year 2000">
                                </div>
                                <input type="submit" id="save" class="btn btn-primary btn-block" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6" id="list-book">
                	
                	<table class="table">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Name Product</th>
					      <th scope="col">Price Product</th>
					      <th scope="col">Year Product</th>
					      <th scope="col">Actualizar</th>
					      <th scope="col">Eliminar</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					    	<?php 
		                		require_once 'config/config.php';
		                		require_once 'conexion/Conexion.php';
		                		$db = new Conexion;
		                		$cnx = $db->getData();
		                		
		                		foreach ($cnx as $key) {
		                	?>
		                			<th scope="row"><?php echo $key['id']; ?></th>
								      <td><?php echo $key['nameProduct']; ?></td>
								      <td><?php echo $key['priceProduct']; ?></td>
								      <td><?php echo $key['yearProduct']; ?></td>
								      <td> <a href="opr/update.php?id=<?php echo $key['id']; ?>" class="btn btn-success"> Actualizar </a> </td>
								      <td> <a href="opr/delete.php?id=<?php echo $key['id']; ?>" class="btn btn-danger"> Eliminar </a> </td>
								    </tr>
		                	
		                	<?php	
		                		}
		                	 ?>
					    
					  </tbody>
					</table>
					
                	
                </div>
            
            </div>
        </section>
    </main>

</body>
</html>