<?php
class SpoonacularModel
{
    // private $apiKey = '81ac51da8e2048c19144b453cbf15c65';
    private $apiKey = 'b45d5854806c49ae955763d19945bb2e';

    public function searchRecipe($ingredients)
    {
        $url = "https://api.spoonacular.com/recipes/findByIngredients?ingredients=$ingredients&apiKey=" . $this->apiKey;
        $options = [
            "http" => [
                "method" => "GET",
                "header" => "Content-Type: application/json",
            ]
        ];
        $context = stream_context_create($options);
        $result = json_decode(file_get_contents($url, false, $context), true);
        return $result;
    }
}
