<?php
session_start();

class Session {
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function startSession($userId) {
        $_SESSION['user_id'] = $userId;
    }

    public function endSession() {
        session_unset();
        session_destroy();
    }
}
