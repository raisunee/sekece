<?php

	class M_suka extends CI_Model
	{


		public function tambah($table, $data)
		{

			return $this->db->insert($table, $data);

		}


		public function get_where($table, $where)
		{

			return $this->db->get_where($table, $where);

		}


		public function get_where_join($table, $where = FALSE, $data = FALSE)
		{

			$this->db->select('* , kategori.nama AS Nama');
			$this->db->join('artikel', $table.'.id_artikel=artikel.id');
			$this->db->join('user', $table.'.id_user=user.id');
			$this->db->join('kategori','artikel.kategori=kategori.id');
			$this->db->join('freelancer','artikel.freelancer=freelancer.id');
			$this->db->where($table.'.id_user', $data);
			return $this->db->get($table);

		}


		public function hapus($table, $where)
		{

			$this->db->where($where);
			return $this->db->delete($table);

		}


	}

?>