<?php 

	class M_guest extends CI_Model
	{

		public function insert($data)
		{

			return $this->db->insert('guest', $data);
			
		}


		public function get_where($data)
		{

			return $this->db->get_where('guest', $data);

		}


		public function edit($data, $id)
		{

			$this->db->where('id_user', $id);
			return $this->db->update('guest', $data);

		}


	}

?>