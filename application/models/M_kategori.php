<?php 

	class M_kategori extends CI_Model
	{
		
		public function get(){

			return $this->db->get('kategori');

		}

		public function get_where($data){

			return $this->db->get_where('kategori', $data);

		}

		public function get_limit(){

			$this->db->limit('9');
			return $this->db->get('kategori');

		}

		public function tambah($data)
		{

			return $this->db->insert('kategori', $data);

		}

		public function hapus($id)
		{

			$this->db->where('id', $id);
			return $this->db->delete('kategori');

		}

		public function edit($id, $data)
		{

			$this->db->where('id', $id);
			return $this->db->update('kategori', $data);

		}

	}

?>