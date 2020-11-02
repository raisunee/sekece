<?php 

	class M_komentar extends CI_Model
	{

		public function tambah($data)
		{

			return $this->db->insert('komentar', $data);

		}


		public function get_where_freelancer($id_freelancer)
		{

			$this->db->select('*, komentar.id AS id_komentar, komentar.isi AS ISI, komentar.tanggal AS Tanggal, komentar.status AS Status, komentar.isi AS isi_komentar');
			$this->db->join('user','user.id=komentar.id_user');
			$this->db->join('artikel','artikel.id=komentar.id_artikel');
			$this->db->join('guest','guest.id_user=user.id');
			$this->db->where('artikel.freelancer', $id_freelancer);
			return $this->db->get('komentar');

		}


		public function get_where_join($id)
		{

			$this->db->select('*, komentar.id AS id_komentar, komentar.isi AS ISI, komentar.tanggal AS Tanggal, komentar.status AS Status, komentar.level AS Level');
			$this->db->join('artikel','artikel.id=komentar.id_artikel');
			$this->db->join('user','user.id=komentar.id_user');
			//$this->db->join('guest','guest.id_user=user.id');
			//$this->db->join('freelancer', 'freelancer.id_user=user.id');
			$this->db->where('komentar.status', 1);
			return $this->db->get_where('komentar', array('komentar.id_artikel' => $id));

		}


		public function edit($data, $where)
		{

			$this->db->where($where);
			return $this->db->update('komentar', $data);

		}

	}

?>