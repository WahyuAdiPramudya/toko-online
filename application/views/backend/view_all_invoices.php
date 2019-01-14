<html>
	<head>
		<title>Admin Page | View All Invoice</title>
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
								<th>Invoice Id</th>
								<th>Date</th>
								<th>Due Date</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($invoices as $invoice) : ?>
							<tr>
								<td><?=$invoice->id; ?></td>
								<td><?=$invoice->date?></td>
								<td><?=$invoice->due_date?></td>
								<td><?=$invoice->status?></td>
								<td>
									<?= anchor(	'admin/invoices/detail/' .$invoice->id,
												'Details',
												['class'=>'btn btn-default btn-sm'])
									?>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
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