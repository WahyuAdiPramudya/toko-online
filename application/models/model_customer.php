<?php 

class Model_customer extends CI_Model{

	public function get_shopping_history($user)
	{
		//  get all invoice identified by user
		$hasil = $this->db->select('i.*, SUM(o.qty * o.price) AS total')
						  ->from('tb_invoices i, tb_users u, tb_orders o')
						  ->where('u.username',$user)
						  ->where('u.user_id = i.user_id')
						  ->where('o.invoice_id = i.id')
						  ->group_by('o.invoice_id')
						  ->get();
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false; // if there are no matching records
		}
	}

	public function mark_invoice_confirmed($invoice_id, $amount)
	{
		$ret = true;
		// check the invoice
		$invoice = $this->db->where('id',$invoice_id)->limit(1)->get('tb_invoices');
		if ($invoice->num_rows() == 0) {
			$ret = $ret && false;
		}
		else{
			// check the amount
			$total = $this->db
						  ->select('SUM(qty * price) as total')
					   	  ->where('invoice_id',$invoice_id)	
						  ->get('tb_orders');
			if ($total->row()->total > $amount) {
				$ret = $ret && false;
			}else{
				// mark the invoice to paid
				$this->db->where('id',$invoice_id)->update('tb_invoices',array('status'=>'confirmed'));
			}
		}
		return $ret;
	}
}


?>