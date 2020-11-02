<?php 

	class U extends CI_Controller
	{

			public function __construct(){
				parent::__construct();
				$this->load->model('M_artikel');
				$this->load->model('M_kategori');
			}


			//============================================


		public function ke_register(){

			$data['judul'] = 'Sekece - Register';

			$this->load->view('user/auth/header', $data);
			$this->load->view('user/auth/register', $data);
			//$this->load->view('user/template/footer');

		}

		public function prosesRegister(){

			$this->load->model('M_user');
			$this->load->model('M_guest');

			// Insert untuk User

			$data_user = array(
				'username' => $this->input->post('username'),
				'password' => sha1($this->input->post('password')),
				'level'	   => 2,
				'status'   => 1
			);

			$input = $this->M_user->insert_user($data_user);
			$data  = $this->M_user->get_where($data_user)->row();

			// Insert untuk Guest

			$data_guest = array(
				'nama' 				=> $this->input->post('nama'),
				'tanggal_daftar'	=> date('Y-m-d'),
				'id_user'			=> $data->id,
				'status'			=> 1
			);

			$input = $this->M_guest->insert($data_guest);

			if($input){
				$this->session->set_flashdata('pesan','Berhasil Register, Silahkan Login!!');
				redirect('register');
			}else{
				echo "Gagal";
			}
			
		}




		public function ke_login()
		{

			$data['judul'] = 'Sekece - Login';

			$this->load->view('user/auth/header', $data);
			$this->load->view('user/auth/login', $data);
			//$this->load->view('user/template/footer');

		}


		public function prosesLogin()
		{

			$this->load->model('M_user');
			$this->load->model('M_guest');

				$username = $this->input->post('username');
				$password = sha1($this->input->post('password'));

			$cek = $this->M_user->cek_login($username, $password)->num_rows();
			$data = $this->M_user->cek_login($username, $password)->row();

			$where = array(
				'id_user'	=> $data->id
			);
			
			$data_guest = $this->M_guest->get_where($where)->row();

			if ($cek > 0) {

				$data_user = $this->M_user->cek_login($username, $password)->row();

				$data = array(
					'id_user'	=> $data_user->id
				);

				if ($data_user->level === '2'):
					$sess = array(
						'username'  => $data_user->username,
						'user_id'  	=> $data_user->id,
						'level'		=> 'guest',
						'status'	=> TRUE,
						'gender'	=> $data_guest->gender,
					);

					$this->session->set_userdata($sess);
					redirect('guest');
				
				else:

					$this->session->set_flashdata('pesan', 'Username atau Password Salah');
					redirect('login');

				endif;


			}else{
				$this->session->set_flashdata('pesan', 'Username atau Password Salah');
				redirect('login');
			}

		}


		public function logout()
		{

			session_destroy();
			redirect(base_url());

		}


		public function editFotoProfile()
		{

			$this->load->model('M_guest');
			$this->load->model('M_freelancer');

			$id = $this->session->userdata('user_id');
			
			$where = array(
				'id_user'	=> $id
			);

			if($this->session->userdata('level') === 'guest'):
				$data = $this->M_guest->get_where($where)->row();
			else:
				$data = $this->M_freelancer->get_where_custom($where)->row();
			endif;

			// Pertama Ganti PP
			if($data->foto === NULL):

					$config['upload_path']          = './assets/uploads/';
					$config['allowed_types']        = 'png|jpg';
					$config['max_width']            = 1000;
					$config['max_height']           = 1000;

			// Udah Pernah Ganti PP
			else:

				$nama = './assets/uploads/'.$data->foto;

				if(is_readable($nama) && unlink($nama)){
					$config['upload_path']          = './assets/uploads/';
					$config['allowed_types']        = 'png|jpg';
					$config['max_width']            = 1000;
					$config['max_height']           = 1000;
					
				}

			endif;

			$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('gambar'))
					{
							print_r($this->upload->display_errors());
					}else{
						$upload_data = $this->upload->data();

						// Ambil nama dari File
						$name = $upload_data['file_name'];

						$id = $data->id;

						$data = array(
							'foto'	=> $name
						);
						
						if($this->session->userdata('level') === 'guest'):
							$update = $this->M_guest->edit($data, $id);
						else:
							$update = $this->M_freelancer->edit($id, $data);
						endif;

						if ($update) {
							if($this->session->userdata('level') === 'guest'):
								redirect(base_url('profile/user/'.$this->session->userdata('username')));
							else:
								redirect('freelancer/pengaturan');
							endif;
						}else{
							echo "Gagal";
						}
					}


		}


	}

?>