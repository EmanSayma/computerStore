<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Computer Store</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>
<body>

	<div class="container">

		<h1>Simple Checkout System</h1>
		<hr>
		<div class="row">
			<div class="col-md-8">
				<div class="list-group">
				  <a href="#" class="list-group-item list-group-item-action active">
				    Products Catalog
				  </a>
				</div>
			</div>

			<div class="col-md-4">		        
			</div>
		</div>
       <hr>
       <div class="row">
         	<div class="col-md-8">
         		<h2>Sample Checkout Menues</h2>
         		<div class="card">
		           <?php require('Checkout.php'); ?>
		         </div>
            </div>
        </div>
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script type="text/javascript" src="./js/main.js"></script>
	
</body>
</html>