<?php
class SpoonacularModel
{
    // private $apiKey = '81ac51da8e2048c19144b453cbf15c65';
    // private $apiKey = 'b45d5854806c49ae955763d19945bb2e';
    // private $apiKey = 'e40028151c0c4617937d086177004a13';
    private $apiKey = "26858ba79e5e4d4caf8b2cb793156bdd";
    private $url;

    public function checkQuota()
    {
        // Initialize a cURL session
        $ch = curl_init();

        // Set the URL for the request
        curl_setopt($ch, CURLOPT_URL, $this->url);

        // Set the option to return the response as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the option to include the response headers in the output
        curl_setopt($ch, CURLOPT_HEADER, true);

        // Execute the request
        $response = curl_exec($ch);

        // Get the response headers
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers = substr($response, 0, $header_size);

        // Get the values of X-API-Quota-Request and X-API-Quota-Used
        preg_match("/X-API-Quota-Request: (.*)\r\n/", $headers, $matches);
        if (!empty($quota_request)) {
            $quota_request = $matches[1];
        } else {
            $quota_request = "Not found";
        }
        preg_match("/X-API-Quota-Used: (.*)\r\n/", $headers, $matches);
        if (!empty($quota_used)) {
            $quota_used = $matches[1];
        } else {
            $quota_used = "Not found";
        }

        // Close the cURL session
        curl_close($ch);
        return $quota_request;
        return $quota_used;
    }

    // public function searchRecipeWithInfo($ingredients)
    // {
    //     $url = "https://api.spoonacular.com/recipes/findByIngredients?ingredients=$ingredients&apiKey=" . $this->apiKey;
    //     // $url = "http://localhost:4433/tubes-rpl2/dummySpoonacular.json";
    //     $options = [
    //         "http" => [
    //             "method" => "GET",
    //             "header" => "Content-Type: application/json",
    //         ]
    //     ];
    //     $context = stream_context_create($options);
    //     $result = json_decode(file_get_contents($url, false, $context), true);
    //     // var_dump($result);

    //     // $this->checkQuota();
    //     return $result;
    // }

    public function getRandomRecipe() {
        $url = "https://api.spoonacular.com/recipes/random?number=10&apiKey=" . $this->apiKey;
        $options = [
            "http" => [
                "method" => "GET",
                "header" => "Content-Type: application/json",
            ]
        ];
        $context = stream_context_create($options);
        $responseRandom = json_decode(file_get_contents($url, false, $context), true);
        $randomRecipe = $responseRandom['recipes'];
        // $this->checkQuota();
        return $randomRecipe;
  }

    public function searchRecipeWithInfo($ingredients)
    {
        
        $url = "https://api.spoonacular.com/recipes/complexSearch?apiKey=" . $this->apiKey . "&number=5&includeIngredients=$ingredients&addRecipeNutrition=true&instructionsRequired=true";
        // $url = "http://localhost:4433/tubes-rpl2/dummySpoonacular.json";
        $options = [
            "http" => [
                "method" => "GET",
                "header" => "Content-Type: application/json",
            ]
        ];
        $context = stream_context_create($options);
        $json_response = json_decode(file_get_contents($url, false, $context), true);
        $result = $json_response["results"];
        // echo "<pre>";
        // var_dump($result);
        // echo "</pre>";

        // $this->checkQuota();
        return $result;
    }
}
