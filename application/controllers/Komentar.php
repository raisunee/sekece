<?php 

	class Komentar extends CI_Controller
	{

			public function __construct(){
				parent::__construct();
				$this->load->model('M_komentar');
				$this->load->model('M_artikel');
			}

		public function tambah()
		{

			$data = array(
				'id_artikel'	=> $this->input->post('id_artikel'),
				'id_user'		=> $this->session->userdata('user_id'),
				'tanggal'		=> date('Y-m-d'),
				'isi'			=> $this->input->post('isi'),
				'status'		=> 1,
				'level'			=> 1
			);

			$insert = $this->M_komentar->tambah($data);

			$id = $this->input->post('id_artikel');
			$artikel = $this->M_artikel->get_where($id)->row();

			if($insert){
				$this->session->set_flashdata('pesan', 'Berhasil menambahkan Komentar');
			}else{
				$this->session->set_flashdata('pesan', 'Gagal menambahkan Komentar');
			}

			redirect('artikel/'.$artikel->slug);

		}


		public function edit($id, $status)
		{

			$where = array(
				'id'	=> $id
			);

			$data = array(
				'status'	=> $status
			);

			$update = $this->M_komentar->edit($data, $where);

			if($update){
				$this->session->set_flashdata('pesan', 'Berhasil Mengubah Status Komentar');
			}else{
				$this->session->set_flashdata('pesan', 'Gagal Mengubah Status Komentar');
			}

			redirect('freelancer/kelola_komentar');

		}


	}

?>