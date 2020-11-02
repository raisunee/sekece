<?php 

	class Admin extends CI_Controller
	{

		public function dash_admin($page){
			//Load Model
			$this->load->model('M_kategori');
			$this->load->model('M_freelancer');
			$this->load->model('M_artikel');
			//
			if($this->load->view('admin/admin/'.$page,'',TRUE) === ''){

				echo "Terjadi Kesalahan";

			} else {

				if($page === "index"):
					$judul = 'Admin';
				else:
					$judul = ucfirst(str_replace('_', ' ', $page));
				endif;

				$data['judul'] = "Halaman ".$judul;
				// Kategori
				$data['kategori'] = $this->M_kategori->get()->result();

				// Index
				$data['jumlah_kategori'] = $this->M_kategori->get()->num_rows();
				$data['jumlah_freelancer'] = $this->M_freelancer->get()->num_rows();
				$data['jumlah_artikel'] = $this->M_artikel->get()->num_rows();

				// freelancer
				$data['freelancer'] = $this->M_freelancer->get()->result();
				$data['user_freelancer'] = $this->M_freelancer->get_user()->result();

				// Artikel
				$data['artikel'] = $this->M_artikel->get_join('kategori', 'freelancer')->result();
					// Tambah Artikel
				

				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/admin/'.$page, $data);
				$this->load->view('admin/template/footer', $data);

			}

		}

		public function dash_freelancer($page){

			$this->load->model('M_artikel');
			$this->load->model('M_freelancer');
			$this->load->model('M_kategori');
			$this->load->model('M_komentar');


			$data['judul'] = "Halaman freelancer";

			$where = array(
				'id_user' => $this->session->userdata('user_id')
			);
			$data['data_freelancer'] = $this->M_freelancer->get_where_custom($where)->row();


			$where = array(
				'freelancer' => $data['data_freelancer']->id
			);
			$data['artikel'] = $this->M_artikel->get_where_user($where)->result();

			$data['kategori'] = $this->M_kategori->get()->result();


			$data['jumlah_artikel'] = $this->M_artikel->get_where_user($where)->num_rows();

			$id_freelancer = $data['data_freelancer']->id;
			$data['jumlah_komentar'] = $this->M_komentar->get_where_freelancer($id_freelancer)->num_rows();

			// Ambil Data Komentar
			$id_freelancer = $data['data_freelancer']->id;
			$data['list_komentar']	= $this->M_komentar->get_where_freelancer($id_freelancer)->result();
			

			$this->load->view('admin/freelancer/template/header', $data);
			$this->load->view('admin/freelancer/'.$page, $data);
			$this->load->view('admin/freelancer/template/footer', $data);

		}

		public function logout(){

			session_destroy();

			redirect(base_url());

		}

		public function register()
		{

			$data['judul'] = "Register";
			$this->load->view('admin/register', $data);

		}
		
		public function login()
		{

			$data['judul'] = "Login";
			$this->load->view('admin/login', $data);

		}


		public function loginp_admin()
		{
			$this->load->model('M_user');

			$username = $this->input->post('username');
			$password = sha1($this->input->post('password'));

			$cek = $this->M_user->cek_login($username, $password)->num_rows();
			$data = $this->M_user->cek_login($username, $password)->row();
			if ($cek > 0) {
				
				if($data->level === '0'){
					$level = 'admin';
					$sess = array(
					'username' 	=> $data->username,
					'level' 	=> $level,
					'user_id'	=> $data->id,
					'status'	=> TRUE
					);
					$this->session->set_userdata($sess);
					redirect('admin/index');

				}elseif($data->level === '1'){
					$level = 'freelancer';
					$sess = array(
					'username' 	=> $data->username,
					'level' 	=> $level,
					'user_id'	=> $data->id,
					'status'	=> TRUE
					);
					$this->session->set_userdata($sess);
					redirect('guest');

				}

			} else {

				$this->session->set_flashdata('pesan', 'username / Password Salah !');
				redirect('login_admin');

			}

		}


		// FREELANCER
		public function index()
		{	

			$this->load->model('M_artikel');
			$this->load->model('M_freelancer');
			$this->load->model('M_kategori');
			$this->load->model('M_komentar');


			$data['judul'] = "Halaman freelancer/ ";

			$where = array(
				'id_user' => $this->session->userdata('user_id')
			);
			$data['data_freelancer'] = $this->M_freelancer->get_where_custom($where)->row();


			$where = array(
				'freelancer' => $data['data_freelancer']->id
			);
			$data['artikel'] = $this->M_artikel->get_where_user($where)->result();

			$data['kategori'] = $this->M_kategori->get()->result();


			$data['jumlah_artikel'] = $this->M_artikel->get_where_user($where)->num_rows();

			$id_freelancer = $data['data_freelancer']->id;
			$data['jumlah_komentar'] = $this->M_komentar->get_where_freelancer($id_freelancer)->num_rows();

			// Ambil Data Komentar
			$id_freelancer = $data['data_freelancer']->id;
			$data['list_komentar']	= $this->M_komentar->get_where_freelancer($id_freelancer)->result();

			$this->load->view('user/template/header', $data);
			$this->load->view('admin/freelancer/mystore', $data);
			$this->load->view('user/template/footer', $data);

		}

	}

?>