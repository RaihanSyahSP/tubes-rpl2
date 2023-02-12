<?php

class Home extends Controller
{
    protected $image;
    protected $images;
    protected $inputText;
    protected $found = false;

    public function getImage()
    {
        if (isset($_POST['submitImg'])) {
            $images = $_FILES['uploadImage'];
            // valdiasi start
            $size = $images['size'];

            $limit = 5000000;
            if ($size > $limit) {
                Flasher::setFlash('Size', 'image', 'danger');
                return false;
            }
            //validasi end
            $pathImage = '/tubes-rpl2/public/image/' . $images['name'];
            if (move_uploaded_file($images['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $pathImage)) {
                $this->image = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $pathImage);
                return $this->image;
            }
        }
    }
    
    public function getUserInput()
    {
        if (isset($_POST['submitTxt'])) {
            $this->inputText = rtrim($_POST['inputText']);
            $regex = '/^[a-z]+((,)[a-z]+)*$/';
            if (!preg_match($regex, $this->inputText)) {
                Flasher::setFlash('Pattern', 'text', 'danger');
                return false;
            }
            return $this->inputText;
        } 
    }
    
    public function getRecipeFromImage()
    {   
        // var_dump($this->image);
        $image = $this->getImage();
        if ($image) {
            $responseImage = $this->model('VisionModel')->analyzeImage($image);
            $response = $responseImage['responses'][0]['labelAnnotations'];
            foreach ($response as $label) {
                $dataImage[] = $label['description'];
            }
            $ingredients = str_replace(' ', '', implode(',', $dataImage));
            $recipe = $this->model('SpoonacularModel')->searchRecipeWithInfo($ingredients);
            return $recipe;
        }
    }

    public function getRecipeFromUserInput()
    {
        $inputText = $this->getUserInput();
        
        $recipe = $this->model('SpoonacularModel')->searchRecipeWithInfo($inputText);
        return $recipe;
    }

    public function index()
    {
        if ( (isset($_POST["submitImg"])) || (isset($_POST["submitTxt"])) ) {
            $getImage = $this->getRecipeFromImage();
            $getText = $this->getRecipeFromUserInput();
            if ($getImage) {
                $data = $getImage;
            } else if ($getText) {
                $data = $getText;
            } else {
                $data = [];
                Flasher::setFlash('Data', 'image/text', 'danger');
            }
        } else {
            $data = [];
        }
        
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
