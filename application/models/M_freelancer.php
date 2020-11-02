<?php 

	class M_freelancer extends CI_Model
	{
		
		public function get(){

			return $this->db->get('freelancer');

		}

		public function get_where($id){

			return $this->db->get_where('freelancer', array('id' => $id));

		}

		public function get_where_custom($where){

			return $this->db->get_where('freelancer', $where);

		}

		public function get_user()
		{

			return $this->db->get_where('user', array('level' => 2, 'status' => 1));

		}

		public function tambah($data)
		{

			return $this->db->insert('freelancer', $data);

		}

		public function hapus($id)
		{

			$this->db->where('id', $id);
			return $this->db->delete('freelancer');

		}

		public function edit($id, $data)
		{

			$this->db->where('id', $id);
			return $this->db->update('freelancer', $data);

		}


	}

?>