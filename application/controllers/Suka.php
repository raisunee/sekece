<?php 

	class Suka extends CI_Controller
	{

			public function __construct(){
				parent::__construct();
				$this->load->model('M_suka');
				$this->load->model('M_user');
			}


		public function tambah_suka($id, $slug)
		{

			$data = array(
				'id_artikel' 	=> $id,
				'id_user'		=> $this->session->userdata('user_id')
			);

			// Cek Dislike
			$table = 'tdk_suka';
			$cek = $this->M_suka->get_where($table, $data)->num_rows();

			if($cek > 0)
			{

				$datanya = $this->M_suka->get_where($table, $data)->row();

				$where = array(
					'id'	=> $datanya->id
				);
				$hapus = $this->M_suka->hapus($table, $where);

			}

			// Proses Insert
			$table = 'suka';
			$insert = $this->M_suka->tambah($table, $data);



			if($insert){
				$this->session->set_flashdata('pesan', 'Kamu Suka Artikel ini');
			}else{
				$this->session->set_flashdata('pesan', 'Oops Gagal');
			}
			redirect('artikel/'.$slug);

		}


		public function tambah_tdksuka($id, $slug)
		{

			$data = array(
				'id_artikel' 	=> $id,
				'id_user'		=> $this->session->userdata('user_id')
			);


			// Cek Like
			$table = 'suka';
			$cek = $this->M_suka->get_where($table, $data)->num_rows();

			if($cek > 0)
			{

				$datanya = $this->M_suka->get_where($table, $data)->row();

				$where = array(
					'id'	=> $datanya->id
				);
				$hapus = $this->M_suka->hapus($table, $where);

			}


			$table = 'tdk_suka';
			$insert = $this->M_suka->tambah($table, $data);



			if($insert){
				$this->session->set_flashdata('pesan', 'Kamu Tidak Suka Artikel ini');
			}else{
				$this->session->set_flashdata('pesan', 'Oops Gagal');
			}
			redirect('artikel/'.$slug);

		}


	}

?>