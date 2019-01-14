<html lang="en">
	<head>
		<title>Fornt-End Toko Online </title>
		<link rel="stylesheet" href="<?= base_url() ?>bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="<?= base_url() ?>bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>bootstrap/ajax/jquery.min.js"></script>
	</head>
	<body>
		<?php $this->load->view('layout/top-menu') ?>
		<!-- tampilkan semua product -->
		<div class="row">
			<!-- looping products -->
		<?php foreach ($products as $product) : ?>
		  <div class="col-sm-3 col-md-3">
		    <div class="thumbnail">
		      <?= img([
		      		'src'		=> 'uploads/' .$product->image,
		      		'style' 	=> 'max-width:100%; max-height:100%; height:100px' 
		      ])  ?>
		      <div class="caption">
		        <h3 style="min-height: 60px;"><?= $product->name ?></h3>
		        <p><?= $product->description ?></p>
		        <p>
		        	<?= anchor('welcome/add_to_cart/' .$product->id, 'Buy', [
		        		'class' => 'btn btn-primary',
		        		'role' 	=> 'button'
		        	]) ?>
		        </p>
		      </div>
		    </div>
		  </div>
		<?php endforeach; ?>
		  <!-- end looping -->
		</div>
	</body>
</html>