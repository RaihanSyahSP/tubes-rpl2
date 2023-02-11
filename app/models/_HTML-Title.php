<?php

class HTMLTitle {
    protected $title;

    public function getPageTitle() {
        return $this->title;
    }

    public function setPageTitle($title) {
        $this->title = $title;
    }
}