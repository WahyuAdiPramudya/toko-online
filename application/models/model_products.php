<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_products extends CI_Model {

	public function all(){
		// query semua record di table products
		$hasil = $this->db->get('tb_products');
		if ($hasil->num_rows() > 0 ) {
			return $hasil->result();
		}else{
			return array();
		}
	}

	public function find($id)
	{
		// Query mencari record berdasarkan ID-nya
		$hasil = $this->db->where('id',$id)
					  ->limit(1)
					  ->get('tb_products');
		if ($hasil->num_rows() > 0 ) {
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function create($data_products){
		# Query INSERT INTO
		
		$this->db->insert('tb_products', $data_products);
	}

	public function update($id, $data_products){
		# Query UPDATE FROM... WHERE id=...

		$this->db->where('id', $id)
				 ->update('tb_products', $data_products);
	}	

	public function delete($id){
		# Query DELETE FROM... WHERE id=...
		
		$this->db->where('id', $id)
				 ->delete('tb_products');
	}

}