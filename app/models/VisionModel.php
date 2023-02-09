<?php
require '../vendor/autoload.php';

use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class VisionModel
{
    private $apiVisionKey = 'AIzaSyBqA8quUK86848QNsfIjvI7oavVWJM_e7Q';

    public function analyzeImage($image)
    {
        // $image = file_get_contents($_FILES['image']['tmp_name']);
        $url = "https://vision.googleapis.com/v1/images:annotate?key=" . $this->apiVisionKey;
        $data = [
            "requests" => [
                [
                    "image" => [
                        "content" => base64_encode($image)
                    ],
                    "features" => [
                        [
                            "type" => "LABEL_DETECTION",
                            "maxResults" => 10
                        ]
                    ]
                ]
            ]
        ];
        $options = [
            "http" => [
                "method" => "POST",
                "header" => "Content-Type: application/json",
                "content" => json_encode($data)
            ]
        ];
        $context = stream_context_create($options);
        $result = json_decode(file_get_contents($url, false, $context), true);
        return $result;
    }


    public function searchRecipe($image)
    {
        $imageAnnotator = new ImageAnnotatorClient([
            'credentials' => json_decode(file_get_contents('http://localhost/phpmvc/key.json'), true)
        ]);
        $response = $imageAnnotator->labelDetection($image);
        // $labels = $response->getLocalizedObjectAnnotations()[0];
        $labels = $response->getLabelAnnotations()[0];
        $ingredients = $labels->getName();
        echo $ingredients;
        return $ingredients;
    }
}
