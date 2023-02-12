<?php

class Flasher
{
    public static $check = false;

    public static function setFlash($message, $category, $type, $found) 
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'category' => $category,
            'found' => $found,
            'type' => $type
        ];
    }

    public static function getFlash() 
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show role="alert">
                    <strong>' . $_SESSION['flash']['message'] . '</strong> of the uploaded <strong>' . $_SESSION['flash']['category'] . '</strong> doesn\'t ' . $_SESSION['flash']['found'] . ', You should check it again!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            unset($_SESSION['flash']);
            self::$check = true;
        }  else {
            self::$check = false;
        }
    }
}
