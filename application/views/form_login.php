<html lang="en">
	<head>
		<title>Fornt-End Toko Online </title>
		<link rel="stylesheet" href="<?= base_url(); ?>bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="<?= base_url(); ?>bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>bootstrap/ajax/jquery.min.js"></script>
	</head>
	<body>
		<?php $this->load->view('layout/top-menu') ?>

		<div><?= validation_errors() ?></div>
		<div><?= $this->session->flashdata('error') ?></div>
		<?= form_open('login',['class'=>'form-horizontal']) ?>
		  <div class="form-group">
		    <label for="username" class="col-sm-2 control-label">Username</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="username" name="username">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="password" class="col-sm-2 control-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="password" name="password">
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <div class="checkbox">
		        <label>
		          <input type="checkbox"> Remember me
		        </label>
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Login</button>
		    </div>
		  </div>
		</form>
		<?= form_close() ?>
	</body>
</html>