<?php

class Home extends Controller
{

    public function getImage()
    {
        if (isset($_POST['submit'])) {
            $images = $_FILES['uploadImage'];
            $pathImage = '/phpmvc/public/image/' . $images['name'];
            if (move_uploaded_file($images['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $pathImage)) {
                $image = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $pathImage);
                // var_dump($image);
                return $image;
            }
        } else {
            $image = file_get_contents($_SERVER['DOCUMENT_ROOT'] .'/tubes-rpl2/public/image/strawberry.jpg');
            return $image;
        }
    }

    public function getRecipeByIngredients()
    {
        $image = $this->getImage();
        $responseImage = $this->model('VisionModel')->analyzeImage($image);
        $response = $responseImage['responses'][0]['labelAnnotations'];
        foreach ($response as $label) {
            $data[] = $label['description'];
        }
        $ingredients = str_replace(' ', '', implode(',', $data));
        echo '<pre>';
        echo $ingredients;
        echo '</pre>';
        $recipe = $this->model('SpoonacularModel')->searchRecipe($ingredients);
        return $recipe;
    }


    public function index()
    {
        // $image = $this->getImage();
        $data = $this->getRecipeByIngredients();
        // $data = $this->model('VisionModel')->analyzeImage($image);
        // $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
