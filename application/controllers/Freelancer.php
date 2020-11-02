	<?php 

	class freelancer extends CI_Controller
	{

		public function __construct(){
			parent::__construct();
			$this->load->model('M_freelancer');
			$this->load->model('M_user');
		}

		public function tambah_user()
		{

			$username = $this->input->post('username');
			$password = sha1($this->input->post('password'));

			$data = array(
				'username' => $username,	
				'password' => $password,
				'level'	   => 1
			);
			// tambah user
			$insert = $this->M_user->insert_user($data);

			
			if($insert){
				$this->session->set_flashdata('pesan', 'Berhasil Menambah User Penulis');
				redirect('admin/freelancer');
			}else{
				$this->session->set_flashdata('pesan', 'Gagal Menambah User Penulis');
				redirect('admin/freelancer');
			}

		}

		public function tambah()
		{

				// Upload
				$config['upload_path']          = './assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto'))
                { // Jika Upload Gagal
						$data = $this->upload->data();
						$fileName = $data['file_name'];
						$id = $this->input->post('user');

						$data = array(
							'id_user'			=> $id,
							'tanggal_daftar'	=> date('Y-m-d'),
							'nama'				=> $this->input->post('nama'),
							'deskripsi'			=> $this->input->post('deskripsi'),
							'foto'				=> $fileName
						);
                }
                else
                { // Jika Upload Berhasi;
                        $data = $this->upload->data();
						$fileName = $data['file_name'];
						$id = $this->input->post('user');

						$data = array(
							'id_user'			=> $id,
							'tanggal_daftar'	=> date('Y-m-d'),
							'nama'				=> $this->input->post('nama'),
							'deskripsi'			=> $this->input->post('deskripsi'),
							'foto'				=> $fileName
						);
                }

               	$insert = $this->M_freelancer->tambah($data);

               	// update status user
               	$data = array(
					   'status'	=> 1,
					   'level'  => 1
               	);
				$update = $this->M_user->update_user($data, $id);


               	if($insert){
					$this->session->set_flashdata('pesan', 'Berhasil Menambah User Penulis');
					redirect('login_admin');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Menambah User Penulis');
					redirect('login_admin');
				}

		}


		public function bef()
		{	

			$this->load->model('M_kategori');
			$this->load->model('M_freelancer');
			$this->load->model('M_artikel');

			$data['judul'] = "Daftar Freelancer/ ";
				// Kategori
				$data['kategori'] = $this->M_kategori->get()->result();

				// Index
				$data['jumlah_kategori'] = $this->M_kategori->get()->num_rows();
				$data['jumlah_freelancer'] = $this->M_freelancer->get()->num_rows();
				$data['jumlah_artikel'] = $this->M_artikel->get()->num_rows();

				// Penulis
				$data['freelancer'] = $this->M_freelancer->get()->result();
				$data['user_freelancer'] = $this->M_freelancer->get_user()->result();

				// Artikel
				$data['artikel'] = $this->M_artikel->get_join('kategori', 'freelancer')->result();

				$this->load->view('user/template/header', $data);
				$this->load->view('admin/freelancer/bef', $data);
				$this->load->view('user/template/footer', $data);

		}


			public function hapus($id)
			{

				$data = $this->M_freelancer->get_where($id)->row();
				
				$hapus = $this->M_freelancer->hapus($id);

				$this->M_user->hapus($data->id_user);

				if($hapus){
					$this->session->set_flashdata('pesan', 'Berhasil Menghapus Penulis');
					redirect('admin/freelancer');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal Menghapus Penulis');
					redirect('admin/freelancer');
				}

			}


			public function edit($id)
			{

				$data = array(
					'nama' 		=> $this->input->post('nama'),
					'deskripsi' => $this->input->post('deskripsi')
				);

				$edit = $this->M_freelancer->edit($id, $data);

				if($edit){
					$this->session->set_flashdata('pesan', '<i class="fas fa-exclamation"></i> Berhasil Mengedit Penulis');
					if($this->session->userdata('level') === 'admin'):
						redirect('admin/freelancer');
					else:
						redirect('freelancer/pengaturan');
					endif;
				}else{
					$this->session->set_flashdata('pesan', '<i class="fas fa-exclamation"></i> Gagal Mengedit Penulis');
					if($this->session->userdata('level') === 'admin'):
						redirect('admin/freelancer');
					else:
						redirect('freelancer/pengaturan');
					endif;
				}


			}
		
	}

 ?>