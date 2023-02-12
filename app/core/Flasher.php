<?php

class Flasher
{
    public static $check = false;

    public static function setFlash($message, $upload, $type) {
        $_SESSION['flash'] = [
            'message' => $message,
            'upload' => $upload,
            'type' => $type
        ];
    }

    public static function getFlash() {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show role="alert">
                    <strong>' . $_SESSION['flash']['message'] . '</strong> of the uploaded <strong>' . $_SESSION['flash']['upload'] . '</strong> doesn\'t match.You should check in again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
            unset($_SESSION['flash']);
            self::$check = true;
        }  else {
            self::$check = false;
        }
    }
}
