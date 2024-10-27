<?php

class AuthMiddleware {
    private static $auth;
    private static $publicRoutes = [
        '/hci/index.php',
        // Add other public routes if needed
    ];

    private static $authRoutes = [
        '/hci/login.php',
        '/hci/register.php',
        '/hci/forgot-password.php'
    ];

    public static function init(Auth $auth) {
        self::$auth = $auth;
    }

    public static function handle() {
        $currentPath = $_SERVER['SCRIPT_NAME'];

        // Check session timeout or expiry
        if (self::$auth->getSession()->checkSessionTimeout()) {
            header('Location: /hci/login.php?message=Session expired');
            exit();
        }

        // If the route requires guest access
        if (in_array($currentPath, self::$authRoutes)) {
            self::$auth->requireGuest();
            return;
        }

        // If the route is not public and requires authentication
        if (!in_array($currentPath, self::$publicRoutes)) {
            self::$auth->requireAuth();
        }
    }
}
