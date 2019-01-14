<?php
class DB {

	public function get($table, $field, $val,$conn) {
		$result = array();
		$query = mysqli_query($conn,"SELECT * FROM {$table} where {$field} = '{$val}' LIMIT 1") OR DIE ( $this->error() );

		while($row = mysqli_fetch_assoc($query)){
			$result = $row;
		}

		return $result;
	}

	public function insert($table, $data,$conn){
		$fields = array();
		$values = array();
		$result = 0;

		if(!empty($data)){
			foreach($data as $key => $val){
				$fields[] = $key;
				$values[] = $val;
			}

			$fields = implode(',',$fields);
			$values = "'".implode("','",$values)."'";
			$query = mysqli_query($conn,"INSERT INTO {$table} ({$fields}) VALUES ({$values})")  OR DIE ( $this->error() );
			if($query)
				$result = TRUE;
		}

		return $result;

	}

	public function upload($gambar,$tujuan){
		$nama_gambar = $_FILES[$gambar]['name'];
		$ukuran_gambar = $_FILES[$gambar]['size'];
		$file_tmp = $_FILES[$gambar]['tmp_name'];
			move_uploaded_file($file_tmp,$tujuan.'/'.$nama_gambar);
	}

	public function delete($table, $field, $val,$conn){
		$result = false;
		$query = mysqli_query($conn,"DELETE from {$table} WHERE ($field) = '{$val}'")  OR DIE ( $this->error() );

		if($query)
			$result = true;
		return $result;

	}

	public function update($table, $data, $field, $val,$conn){
		$updates = array();
		$result = false;

		if(!empty($data)){
			foreach($data as $key => $v){
				$updates[] = "{$key} = '{$v}'";
			}

			$updates = implode(', ', $updates);
			$query = "UPDATE {$table} SET {$updates} where {$field} = '{$val}'";
			$sql = mysqli_query($conn,$query)  OR DIE ( $this->error() );
			if($sql)
				$result = true;
		}

		return $result;

	}
	public function error(){
		echo "Error ".mysql_error().":";
	}
}
?>
