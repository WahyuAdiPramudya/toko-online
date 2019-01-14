<?php
	$id 			= $product->id;
if($this->input->post('is_submitted')){
	$name 			= set_value('name');
	$description 	= set_value('description');
	$price 			= set_value('price');
	$stock 			= set_value('stock');
}else{
	$name 			= $product->name;
	$description 	= $product->description;
	$price 			= $product->price;
	$stock 			= $product->stock;
}
?>

<html>
	<head>
		<title>Admin Page | Edit Products</title>
		<!-- load JQuery CDN -->
		<script type="text/javascript" language="javascript" src="<?= base_url() ?>bootstrap/jquery-1.10.2.min.js"></script>

		<!-- Load DataTable dan Bootstrap dari CDN -->
		<script type="text/javascript" language="javascript" src="<?= base_url() ?>bootstrap/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?= base_url() ?>bootstrap/dataTables.bootstrap.js"></script>
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>bootstrap/dataTables.bootstrap.css">
		<style>
			.row div{border:#000 0px solid;}
		</style>
	</head>

	<body>
		<!-- dalam div row harus ada col yang di maksimum nilainya 12 -->
		<div class="row">
			<div class="col-sm-1"></div>
				<div class="col-sm-10">
					<h1>Edit Product</h1>
					<div><?= validation_errors()?></div>
					<?= form_open_multipart('admin/products/update/' . $id, ['class'=>'form-horizontal']) ?>
						<form class="form-horizontal">
						  <div class="form-group">
						    <label for="name" class="col-sm-2 control-label">Product Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?= $name ?>">
						    </div>
						  </div>
							
						  <div class="form-group">
						    <label for="description" class="col-sm-2 control-label">Description</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" id="description" name="description"><?= $description ?></textarea>
						    </div>
						  </div>
							
						   <div class="form-group">
						    <label for="price" class="col-sm-2 control-label">Price</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="price" name="price" placeholder="" value="<?= $price ?>">
						    </div>
						  </div>
							
						   <div class="form-group">
						    <label for="stock" class="col-sm-2 control-label">Available Stock</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="stock" name="stock" placeholder="" value="<?= $stock ?>">
						    </div>
						  </div>

						  <div class="form-group">
						    <label for="userfile" class="col-sm-2 control-label">Prodcut Image</label>
						    <div class="col-sm-10">
						      <input type="file" class="form-control" name="userfile" >
						    </div>
						  </div>
							
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						    <input type="hidden" name="is_submitted" value="1" />
						      <button type="submit" class="btn btn-default">Save</button>
						    </div>
						  </div>
						</form>
					<?= form_close() ?>
				</div>
			<div class="col-sm-1"></div>
		</div>
		<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#dataTable').dataTable();
		} );
	</script>
	</body>
</html>