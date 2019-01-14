<?php

class Model_orders extends CI_Model {

	public function process()
	{
			$invoice =  array(
				'date' 		=> date('Y-m-d H:i:s'),
				'due_date'	=> date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1, date('Y'))),
				'user_id'	=> $this->get_logged_user_id(),
				'status' 	=> 'unpaid'

			);
			$this->db->insert('tb_invoices', $invoice);
			$invoice_id = $this->db->insert_id();

			// put ordered items in orders table
			foreach ($this->cart->contents() as $items) {
				$data = array(
							'invoice_id'	=> $invoice_id,
							'products_id'	=> $items ['id'],
							'products_name'	=> $items ['name'],
							'qty'			=> $items ['qty'],
							'price'			=> $items ['price']
				);
				$this->db->insert('tb_orders', $data);
			}
		return TRUE;
	}
	public function all()
	{
		// get all invoice form table
		$hasil = $this->db->get('tb_invoices');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}

	public function get_invoice_by_id($invoice_id)
	{
		$hasil = $this->db->where('id',$invoice_id)->limit(1)->get('tb_invoices');
		if ($hasil->num_rows() > 0) {
			return $hasil->row();
		}else{
			return false;
		}
	}

	public function get_orders_by_invoice($invoice_id)
	{
		$hasil = $this->db->where('invoice_id', $invoice_id)->get('tb_orders');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		}else{
			return false;
		}
	}

	public function get_logged_user_id()
	{
		$hasil = $this->db
					  ->where('username', $this->session->userdata('username'))
					  ->limit(1)
					  ->get('tb_users');
		if ($hasil->num_rows() > 0) {
			return $hasil->row()->user_id;
		}else{
			return 0;
		}
	}
}