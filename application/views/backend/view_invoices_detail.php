<html>
	<head>
		<title>Admin Page | View Invoice Detail</title>
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
					<h3>Items Ordered in Invoice# <?= $invoices->id; ?></h3>
					<table id="dataTable" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Product Id</th>
								<th>Product Name</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$total = 0;
								foreach ($orders as $order) {
								$subtotal = $order->qty * $order->price;
								$total += $subtotal;?>
							<tr>
								<td><?= $order->products_id; ?></td>
								<td><?= $order->products_name; ?></td>
								<td><?= $order->qty; ?></td>
								<td><?= $order->price; ?></td>
								<td><?= $subtotal; ?></td>
							</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"></td>
								<td><?=$total ?></td>
							</tr>
						</tfoot>
					</table>
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