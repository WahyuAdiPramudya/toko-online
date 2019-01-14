<html lang="en">
	<head>
		<title>Payment Confirmation - Toko Online </title>
		<link rel="stylesheet" href="<?= base_url() ?>bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="<?= base_url() ?>bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>bootstrap/ajax/jquery.min.js"></script>
	</head>
	<body>
		<?php $this->load->view('layout/top-menu') ?>

		<div><?= validation_errors() ?></div>
		<div><?= $this->session->flashdata('error') ?></div>

		<?= form_open('customer/payment_confirmation/', ['class'=>'form-horizontal']); ?>

		  <div class="form-group">
		    <label for="username" class="col-sm-2 control-label">Invoice ID</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="username" name="invoice_id" value="<?= ($invoice_id != 0?$invoice_id:'')?>">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="password" class="col-sm-2 control-label">Amount Tranfered</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="password" name="amount">
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-2 col-sm-10">
		      <button type="submit" class="btn btn-default">Confirm My Payment</button>
		    </div>
		  </div>
		</form>
		<?= form_close() ?>
	</body>
</html>
	</body>
</html>