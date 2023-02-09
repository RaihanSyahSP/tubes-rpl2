<?php
    class Discovery extends Controller
    {
        public function index()
        {
            $data['judul'] = 'Discovery';
            $this->view('templates/header', $data);
            $this->view('discovery/index');
            $this->view('templates/footer');
        }
    }
