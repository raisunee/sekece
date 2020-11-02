<?php

    class Home extends CI_Controller
    {

        public function __construct(){

            parent::__construct();
            $this->load->model('M_artikel');
            $this->load->model('M_kategori');

        }


        public function index()
        {

            $data['judul'] = "Selamat Datang";

            $this->load->view('lp/home', $data);

        }

    }

?>