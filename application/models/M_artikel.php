<?php 

	class M_artikel extends CI_Model
	{
		
		public function get(){

			return $this->db->get('artikel');

		}


		public function get_where($id){

			return $this->db->get_where('artikel', array('id' => $id));

		}


		public function get_where_user($where)
		{

			$this->db->select('*, artikel.id AS ID, freelancer.nama AS NAMA, kategori.nama AS Nama, artikel.status AS Status');
			$this->db->join('freelancer','freelancer.id=artikel.freelancer');
			$this->db->join('kategori','kategori.id=artikel.kategori');
			return $this->db->get_where('artikel', $where);

		}


		public function get_cari($judul){

			$this->db->select('*, artikel.id AS ID, freelancer.nama AS NAMA, kategori.nama AS Nama');
			$this->db->join('freelancer','freelancer.id=artikel.freelancer');
			$this->db->join('kategori','kategori.id=artikel.kategori');
			$this->db->like('judul',$judul);
			$this->db->order_by('tanggal', 'DESC');
			return $this->db->get_where('artikel');

		}


		public function get_slug($slug){

			$this->db->select('*, artikel.id AS ID, freelancer.nama AS NAMA, kategori.nama AS Nama');
			$this->db->join('freelancer','freelancer.id=artikel.freelancer');
			$this->db->join('kategori','kategori.id=artikel.kategori');
			return $this->db->get_where('artikel', array('slug' => $slug));

		}


		public function get_join($table, $table2, $limit = FALSE){

			$this->db->select('*, artikel.id AS ID, freelancer.nama AS NAMA, kategori.nama AS Nama, artikel.status AS Status');
			$this->db->join($table, $table.'.id = artikel.'.$table);
			$this->db->join($table2, $table2.'.id = artikel.'.$table2);
			if($limit !== FALSE):
				$this->db->limit($limit);
			endif;
			$this->db->order_by('tanggal', 'DESC');
			return $this->db->get('artikel');

		}


		public function get_join_dilihat($table, $table2){

			$this->db->select('*, artikel.id AS ID, freelancer.nama AS NAMA, kategori.nama AS Nama');
			$this->db->join($table, $table.'.id = artikel.'.$table);
			$this->db->join($table2, $table2.'.id = artikel.'.$table2);
			$this->db->order_by('dilihat', 'DESC');
			return $this->db->get('artikel');

		}

		public function get_join_kategori($table, $table2, $kategori){

			$this->db->select('*, artikel.id AS ID, freelancer.nama AS NAMA, kategori.nama AS Nama');
			$this->db->join($table, $table.'.id = artikel.'.$table);
			$this->db->join($table2, $table2.'.id = artikel.'.$table2);
			$this->db->where('kategori.nama', $kategori);
			$this->db->limit('4');
			return $this->db->get('artikel');

		}


		public function tambah($data){

			return $this->db->insert('artikel', $data);

		}


		public function hapus($id){

			// Hapus di DataBase
			$this->db->where('id', $id);
			return $this->db->delete('artikel');

		}


		public function edit($id, $data){

			$this->db->where('id', $id);
			return $this->db->update('artikel', $data);

		}


		public function tambah_views($slug)
		{

			// 	Ambil data Artikel
			$this->db->where('slug', $slug);
			$this->db->select('dilihat');
			$count = $this->db->get('artikel')->row();

			// tambah satu
			$this->db->where('slug', $slug);
			$this->db->set('dilihat', ($count->dilihat + 1));
			$this->db->update('artikel');

		}

	}

?>