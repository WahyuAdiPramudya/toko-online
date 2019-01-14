<html lang="en">
	<head>
		<title>Fornt-End Toko Online </title>
		<link rel="stylesheet" href="<?= base_url() ?>bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="<?= base_url() ?>bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>bootstrap/ajax/jquery.min.js"></script>
	</head>
	<body>
		<?php $this->load->view('layout/top-menu') ?>

		<?php if ($history != false) : ?>
		<?= $this->session->flashdata('message'); ?>
		<table class="table table-bordered table-striped table-hover">
				<tr>
					<th>Invoice ID</th>
					<th>Name Customer</th>
					<th>Invoice Date</th>
					<th>Due Date</th>
					<th>Total Amount</th>
					<th>Status</th>
				</tr>
			</thead>

			<tbody>
			<?php
				foreach ($history as $row): 
			?>
				<tr>
					<td><?= $row->id; ?></td>
					<td><?=$this->session->userdata('username')?></td>
					<td><?= $row->date ?></td>
					<td><?= $row->due_date ?></td>
					<td><?= $row->total ?></td>
					<td>
						<?= $row->status ?>
						<?php 
							if ($row->status == 'unpaid') {
							
							echo anchor('customer/payment_confirmation/'.$row->id,'Confirm Payment',
									array('class'=>'btn btn-primary btn-xs')
								  );
							}
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php else : ?>
			<p align="center">There are no shopping history for you.. <?= anchor('/', 'Shop Now'); ?></p>
		<?php endif; ?>
	</body>
</html>