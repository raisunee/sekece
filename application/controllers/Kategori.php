<?php 
	
	class Kategori extends CI_Controller
	{
			public function __construct(){
				parent::__construct();
				$this->load->model('M_kategori');
			}


			public function ke_detail($kategori)
			{

				$this->load->model('M_artikel');

				$data['judul'] = 'Kategori '.ucfirst($kategori);


				//$where = array(
				//	'nama'	=> $kategori
				//);
				//$id_kategori = $this->M_kategori->get_where($where)->row();

				$table = 'freelancer';
				$table2 = 'kategori';

				$data['kategori'] = $this->M_artikel->get_join_kategori($table, $table2, $kategori)->result();

				$data['kategorinya'] = $kategori;

				$this->load->view('user/template/header', $data);
				$this->load->view('user/detail_kategori', $data);
				$this->load->view('user/template/footer');

			}


			public function tambah()
			{

				$data = array(
					'nama' => $this->input->post('nama')
				);

				$tambah = $this->M_kategori->tambah($data);
				if($tambah){
					$this->session->set_flashdata('pesan', 'Berhasil Menambah Kategori');
					redirect('admin/kategori');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Menambah Kategori');
					redirect('admin/kategori');
				}

			}

			public function hapus($id)
			{

				
				$hapus = $this->M_kategori->hapus($id);

				if($hapus){
					$this->session->set_flashdata('pesan', 'Berhasil Menghapus Kategori');
					redirect('admin/kategori');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Menghapus Kategori');
					redirect('admin/kategori');
				}

			}

			public function edit($id)
			{

				$data = array(
					'nama' => $this->input->post('nama')
				);

				$edit = $this->M_kategori->edit($id, $data);

				if($edit){
					$this->session->set_flashdata('pesan', 'Berhasil Mengedit Kategori');
					redirect('admin/kategori');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Mengedit Kategori');
					redirect('admin/kategori');
				}


			}

	}


 ?>