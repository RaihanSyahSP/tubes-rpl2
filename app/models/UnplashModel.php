<?php

Class UnplashModel 
{
    private $apiKey = '';

    public function getRandomBg() {
        $url = '"https://api.unsplash.com/photos/random/?client_id=' . $this->apiKey . '&topics=food';

    }
}