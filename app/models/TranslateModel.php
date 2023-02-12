<?php

Class TranslateModel 
{
     private $apiKey = 'AIzaSyBqA8quUK86848QNsfIjvI7oavVWJM_e7Q';


    public function translate($text)
    {
        // Target language
        $target = 'id';

        // URL for the Google Translate API
        $url = 'https://translation.googleapis.com/language/translate/v2?key=' . $this->apiKey . '&q=' . rawurlencode($text) . '&target=' . $target;

        // Get the response from the API
        $response = file_get_contents($url);

        // Decode the JSON response
        $json = json_decode($response, true);

        // Get the translated text
        $translatedText = $json['data']['translations'][0]['translatedText'];

        return $translatedText;
    }

}