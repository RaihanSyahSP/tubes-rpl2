<?php

class Discovery extends Controller
{

    public function index()
    {
        $page['judul'] = 'Discovery';
        $data = $this->model('SpoonacularModel')->getRandomRecipe();
        $this->view('templates/header', $page);
        $this->view('discovery/index', $data);
        $this->view('templates/footer');
    }
}
