<?php 

	class Artikel extends CI_Controller
	{

			public function __construct(){
				parent::__construct();
				$this->load->model('M_artikel');
				$this->load->model('M_kategori');
			}

		public function ke_edit($id)
		{

			$this->load->model('M_freelancer');

			$data['judul'] 		= "Halaman Edit Artikel";
			$data['artikel'] 	= $this->M_artikel->get_where($id)->row();
			$data['kategori'] 	= $this->M_kategori->get()->result();
			$data['freelancer'] 	= $this->M_freelancer->get()->result();

			$where = array(
				'id_user' => $this->session->userdata('user_id')
			);
			$data['data_freelancer'] = $this->M_freelancer->get_where_custom($where)->row();

			$this->load->view('admin/freelancer/template/header', $data);
			$this->load->view('admin/'.$this->session->userdata('level').'/edit_artikel', $data);
			$this->load->view('admin/freelancer/template/footer', $data);

		}


		public function publishkan($id)
		{

			$data = array(
				'status'	=> 1
			);

			$update = $this->M_artikel->edit($id, $data);

				if($update){
					$this->session->set_flashdata('pesan', 'Berhasil Publish Artikel');
					redirect(base_url('mystore'));
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Publish Artikel');
					redirect(base_url('mystore'));
				}

		}


		public function draftkan($id)
		{

			$data = array(
				'status'	=> 0
			);

			$update = $this->M_artikel->edit($id, $data);

				if($update){
					$this->session->set_flashdata('pesan', 'Berhasil Draft Artikel');
					redirect(base_url('mystore'));
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Draft Artikel');
					redirect(base_url('mystore'));
				}

		}


		public function tambah()
		{

			// Upload
				$config['upload_path']          = './assets/thumbnail/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto'))
                { // Jika Upload Gagal
                        echo "Gagal";
                }
                else
                { // Jika Upload Berhasi;
                        $data = $this->upload->data();
						$fileName = $data['file_name'];

						$slug = str_replace(' ', '-', $this->input->post('slug'));

						if($this->input->post('0') !== null){

							$status = '0';

						} elseif($this->input->post('1') !== null) {

							$status = '1';

						}

						$data = array(
							'judul'				=> $this->input->post('judul'),
							'slug'				=> $slug,
							'gambar'			=> $fileName,
							'isi'				=> $this->input->post('isi'),
							'kategori'			=> $this->input->post('kategori'),
							'tag'				=> $this->input->post('tag'),
							'tanggal'			=> date('Y-m-d'),
							'status'			=> $status,
							'freelancer'			=> $this->input->post('freelancer')
						);
						
                }
               	
                $insert = $this->M_artikel->tambah($data);

               	if($insert){
					$this->session->set_flashdata('pesan', 'Berhasil Menambah Artikel');
					redirect(base_url('mystore'));
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Menambah Artikel');
					redirect(base_url('mystore'));
				}

		}


		public function hapus($id)
		{

			// Ambil Data
			$data = $this->M_artikel->get_where($id)->row();

			// Hapus Thumbnail(Foto)
			$thumbnail = $data->gambar;
			$path = APPPATH.'../assets/thumbnail/'.$thumbnail;
			unlink($path);

			// Hapus di DataBase
			$hapus = $this->M_artikel->hapus($id);

			if($hapus){
					$this->session->set_flashdata('pesan', 'Berhasil Menghapus Artikel');
					redirect(base_url('mystore'));
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Menghapus Artikel');
					redirect(base_url('mystore'));
				}


		}


		public function edit($id)
		{		

				if(!empty($_FILES['foto']['name'])): // Jika thumbnai mau diubah

					// Upload
					$config['upload_path']          = './assets/thumbnail/';
	                $config['allowed_types']        = 'gif|jpg|png';

	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('foto'))
	                { // Jika Upload Gagal
	                        echo "Gagal";
	                }
	                else
	                { // Jika Upload Berhasi;

	                		// Hapus Thumbnail Lama
		                	$thumbnail = $this->input->post('gambar_sekarang');
							$path = APPPATH.'../assets/thumbnail/'.$thumbnail;
							unlink($path);

	                        $data = $this->upload->data();
							$fileName = $data['file_name'];
					}

				endif;


				if($this->input->post('0') !== null){

					$status = '0';

				} elseif($this->input->post('1') !== null) {

					$status = '1';

				} else {

					$status = $this->input->post('status');

				}

				$slug = str_replace(' ', '-', $this->input->post('slug'));


				if(!empty($_FILES['foto']['name'])):

					$data = array(
						'judul'				=> $this->input->post('judul'),
						'slug'				=> $slug,
						'gambar'			=> $fileName,
						'isi'				=> $this->input->post('isi'),
						'kategori'			=> $this->input->post('kategori'),
						'tag'				=> $this->input->post('tag'),
						'status'			=> $status,
						'freelancer'		=> $this->input->post('freelancer')
					);

				else:

					$data = array(
						'judul'				=> $this->input->post('judul'),
						'slug'				=> $slug,
						'isi'				=> $this->input->post('isi'),
						'kategori'			=> $this->input->post('kategori'),
						'tag'				=> $this->input->post('tag'),
						'status'			=> $status,
						'freelancer'		=> $this->input->post('freelancer')
					);

				endif;

				$edit = $this->M_artikel->edit($id, $data);

				if($edit){
					$this->session->set_flashdata('pesan', 'Berhasil Mengedit Artikel');
					redirect(base_url('mystore'));
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Mengedit Artikel');
					redirect(base_url('mystore'));
				}

		}

	}

 ?>