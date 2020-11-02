<?php 

	class User extends CI_Controller
	{

		public function index()
		{

			$data['judul'] = 'Sekece - Welcome';

			$this->load->view('user/landpage/header', $data);
			$this->load->view('user/landpage/index', $data);
			$this->load->view('user/template/footer');

		}
		
		public function lp2()
		{

			$this->load->model('M_artikel');
			$this->load->model('M_kategori');


			$data['judul'] = 'YaHallo/ ';

			//Kategori
			$data['kategori'] = $this->M_kategori->get()->result();

			// Data Artikel
			$data['artikel'] = $this->M_artikel->get_join('kategori', 'freelancer', '3')->result();

			//Popular Artikel
			$data['populer'] = $this->M_artikel->get_join_dilihat('kategori', 'freelancer')->result();

			//Kategori
			$data['artikel_kategori'] = $this->M_artikel->get_join_kategori('kategori', 'freelancer', 'General')->result();

			$this->load->view('user/template/header', $data);
			$this->load->view('user/index', $data);
			$this->load->view('user/template/footer');
			
		}



		public function ke_detail($slug){

			$this->load->model('M_artikel');
			$this->load->model('M_komentar');
			$this->load->model('M_suka');

			$data['isi']	= $this->M_artikel->get_slug($slug)->row();

			$data['judul']	= $data['isi']->judul.' - WeMedia';

			// Ambil Data Like & Dislike
			$table = 'suka';
			$where = array(
				'id_artikel'	=> $data['isi']->ID
			);

			// Like
			$data['jml_like'] = $this->M_suka->get_where($table, $where)->num_rows();

			// Dislike
			$table = 'tdk_suka';
			$data['jml_dislike'] = $this->M_suka->get_where($table, $where)->num_rows();

			$this->load->helper('cookie');

			$check_visitor = $this->input->cookie($slug, FALSE);

			$ip = $this->input->ip_address();


			if($check_visitor == false) {

				$cookie = array(
					"name"		=> $slug,
					"value"		=> $ip,
					"expire"	=> time() + 7200,
					"secure"	=> false
				);

				$this->input->set_cookie($cookie);
				$this->M_artikel->tambah_views($slug);

			}

			// Daftar Komentar
			$id = $data['isi']->ID;
			$data['kmtr'] = $this->M_komentar->get_where_join($id)->result();


			// Cek Like
			$where = array(
				'id_artikel'	=> $data['isi']->ID,
				'id_user'		=> $this->session->userdata('user_id')
			);

			$table = "suka";
			$data['cek_suka'] = $this->M_suka->get_where($table, $where)->num_rows();

			$table = "tdk_suka";
			$data['cek_tdksuka'] = $this->M_suka->get_where($table, $where)->num_rows();


			$this->load->view('user/template/header', $data);
			$this->load->view('user/detail', $data);
			$this->load->view('user/template/footer');

		}


		public function ke_pencarian(){

			$this->load->model('M_artikel');

			$data['judul']	= 'Hasil Pencarian '.$_GET['cari'];

			// Ambil Artiker berdasarkan Judul
			$cari = $_GET['cari'];
			$data['artikel'] = $this->M_artikel->get_cari($cari)->result();

			$this->load->view('user/template/header', $data);
			$this->load->view('user/pencarian', $data);
			$this->load->view('user/template/footer');


		}

		public function ke_explore() {

			$data['judul'] = 'Explore/ ';

			$this->load->view('user/template/header', $data);
			$this->load->view('user/explore', $data);
			$this->load->view('user/template/footer');

		}


		// DESIGN
		public function ke_design() {

			$data['judul'] = 'Design/ ';

			$this->load->view('user/template/header', $data);
			$this->load->view('user/design', $data);
			$this->load->view('user/template/footer');

		}

			public function ke_logo() {

				$this->load->model('M_artikel');
				$this->load->model('M_kategori');

				$data['judul'] = 'Logo/ ';

				//Kategori
				$data['kategori'] = $this->M_kategori->get()->result();

				// Data Artikel
				$data['artikel'] = $this->M_artikel->get_join('kategori', 'freelancer', '3')->result();

				//Popular Artikel
				$data['populer'] = $this->M_artikel->get_join_dilihat('kategori', 'freelancer')->result();

				//Kategori
				$data['artikel_kategori'] = $this->M_artikel->get_join_kategori('kategori', 'freelancer', 'General')->result();

				$this->load->view('user/template/header', $data);
				$this->load->view('user/logo', $data);
				$this->load->view('user/template/footer');

			}


		public function ke_profile($status, $username)
		{	

			$this->load->model('M_user');
			$this->load->model('M_guest');
			$this->load->model('M_suka');
			$this->load->model('M_freelancer');


			if($status === "user"):
				$folder = "guest";
			else:
				$folder = "freelancer";
			endif;

			if($this->load->view('user/'.$folder.'/profile','', TRUE) === ''){

				echo "Terjadi Kesalahan";

			} else {

				
				if($status === "user"):
					// Data
					$data_user = array(
						'username' => $username
					);
					$data['user'] = $this->M_user->get_where($data_user)->row();
					

					$where = array(
						'id_user' => $data['user']->id
					);
					$data['profil']	= $this->M_guest->get_where($where)->row();

				else:
					
					// Data
					$data_user = array(
						'username' => $username
					);
					$data['user'] = $this->M_user->get_where($data_user)->row();
					

					$where = array(
						'id_user' => $data['user']->id
					);
					$data['profil']	= $this->M_freelancer->get_where_custom($where)->row();	

				endif;


				$data['judul'] = "Profile ".$username;

				$data_user = array(
					'username' => $username
				);
				$data['user'] = $this->M_user->get_where($data_user)->row();
				$datanya = $this->M_user->get_where($data_user)->row();
				
				// Artikel yg Disukai
				$table = "suka";
				$id = $datanya->id;
				$data['sukai'] = $this->M_suka->get_where_join($table, FALSE, $id)->result();


				$this->load->view('user/template/header', $data);
				$this->load->view('user/'.$folder.'/profile', $data);
				$this->load->view('user/template/footer', $data);

			}

		}


		public function ubahUsername()
		{

			$this->load->model('M_user');

			$lama = $this->input->post('usernameLama');
			$baru = $this->input->post('usernameBaru');


			$data = array(
				'username' => $this->session->userdata('username')
			);

			$data_username = $this->M_user->get_where($data)->row();



			if($lama === $data_username->username):

				// Cek
				$where = array(
					'username' => $baru
				);
				$cek = $this->M_user->get_where($where)->num_rows();
				if($cek > 0){

					$this->session->set_flashdata('pesan', 'Username Baru telah terpakai, Coba yang lain');
					if($this->session->userdata('level') === 'guest'):
						redirect('profile/user/'.$this->session->userdata('username'));
					else:
						redirect('freelancer/pengaturan');
					endif;

				}else{

					$data = array(
					'username' => $baru
					);

					$id = $data_username->id;

					$this->M_user->update_user($data, $id);
					$sess = array(
						'username' => $baru
					);
					$this->session->set_userdata($sess);

					if($this->session->userdata('level') === 'guest'):
						$this->session->set_flashdata('pesan', 'Username telah diubah, Silahkan re-Login');
						redirect('profile/user/'.$baru);
					else:
						$this->session->set_flashdata('pesan', 'Username telah diubah, Silahkan re-Login Penulis');
						redirect('freelancer/pengaturan');
					endif;

				}


			else:

				$this->session->set_flashdata('pesan', 'Username Lama tidak sesuai');
				if($this->session->userdata('level') === 'guest'):
					redirect('profile/user/'.$baru);
				else:
					redirect('freelancer/pengaturan');
				endif;

			endif;


		}


		public function ubahPassword()
		{

			$this->load->model('M_user');

			$lama = sha1($this->input->post('passwordLama'));
			$baru = sha1($this->input->post('passwordBaru'));


			$data = array(
				'username' => $this->session->userdata('username')
			);


			$data_username = $this->M_user->get_where($data)->row();


			if($lama === $data_username->password):

					$data = array(
						'password' => $baru
					);

					$id = $data_username->id;

					$this->M_user->update_user($data, $id);

					$this->session->set_flashdata('pesan', 'Password telah diubah, Silahkan re-Login');
					if($this->session->userdata('level') === 'guest'):
						redirect('profile/user/'.$this->session->userdata('username'));
					else:
						redirect('freelancer/pengaturan');
					endif;

			else:

					$this->session->set_flashdata('pesan', 'Password gagal diubah');
					if($this->session->userdata('level') === 'guest'):
						redirect('profile/user/'.$this->session->userdata('username'));
					else:
						redirect('freelancer/pengaturan');
					endif;

			endif;

		}

	}

?>