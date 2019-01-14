<html>
	<head>
		<title>Admin Page | View All Products</title>
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
		<?php $this->load->view('backend/admin_menu') ?>
		<!-- dalam div row harus ada col yang di maksimum nilainya 12 -->
		<div class="row">
			<div class="col-sm-1"></div>
				<div class="col-sm-10">
					<h1>Products Table</h1>
					<table id="dataTable" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Product Name</th>
								<th>Product Image</th>
								<th>Description</th>
								<th>Price</th>
								<th>Stock</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($products as $product) : ?>
							<tr>
								<td><?= $product->id ?></td>
								<td><?= $product->name ?></td>
								<td><?php 
									$product_image = [	'src'	=> 'uploads/' . $product->image,
													  	'height' => 90,
													 ];	
									echo img($product_image) ?>
								</td>
								<td><?= $product->description ?></td>
								<td><?= $product->price ?></td>
								<td><?= $product->stock ?></td>
								<td>
									<?= anchor(	'admin/products/update/' .$product->id,
												'Edit',
												['class'=>'btn btn-default btn-sm'])
									?>
									<?= anchor(	'admin/products/delete/' .$product->id,
												'Delete',
												['class'=>'btn btn-danger btn-sm',
													'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'
												])
									?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<?=anchor('admin/products/create',
											'Add Product',
											['class'=>'btn btn-primary btn-sm'])
									?>
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