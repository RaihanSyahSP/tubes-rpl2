<?php

class Home extends Controller
{
    protected $image;
    protected $inputText;

    public function getImage()
    {
        if (isset($_POST['submitImg'])) {
            $images = $_FILES['uploadImage'];
            $pathImage = '/tubes-rpl2/public/image/' . $images['name'];
            if (move_uploaded_file($images['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $pathImage)) {
                $this->image = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $pathImage);
                return $this->image;
            }
        } else {
            $this->image = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/tubes-rpl2/public/image/strawberry.jpg');
            return $this->image;
        }
    }

    public function getUserInput()
    {
        if (isset($_POST['submitTxt'])) {
            $this->inputText = strim($_POST['inputText']);
            return $this->inputText;
        } else {
            return "Text goblok mana nih";
        }
    }

    public function getRecipeFromImage()
    {
        $this->image = $this->getImage();
        $responseImage = $this->model('VisionModel')->analyzeImage($this->image);
        $response = $responseImage['responses'][0]['labelAnnotations'];
        foreach ($response as $label) {
            $data[] = $label['description'];
        }
        $ingredients = str_replace(' ', '', implode(',', $data));
        $recipe = $this->model('SpoonacularModel')->searchRecipeWithInfo($ingredients);
        return $recipe;
    }

    public function getRecipeFromUserInput()
    {
        $this->inputText = $this->getUserInput();
        $ingredients = str_replace(' ', '', implode(',', $this->inputText));
        $recipe = $this->model('SpoonacularModel')->searchRecipeWithInfo($ingredients);
        return $recipe;
    }

    public function index()
    {
        // $image = $this->getImage();
        if ($this->image === null) {
            $data = $this->getRecipeFromImage();
        } elseif ($this->inputText === null) {
            $data = $this->getRecipeFromUserInput();
        } else {
            $data = [];
        }
        // var_dump($data);
        // $data = $this->model('VisionModel')->analyzeImage($image);
        // $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
