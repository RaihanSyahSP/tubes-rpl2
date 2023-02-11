<?php

class Discovery extends Controller
{
    public function index()
    {
        $page['judul'] = 'Discovery';
        $this->view('templates/header', $page);
        $this->view('discovery/index');
        $this->view('templates/footer');
    }
}
