<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'config.php';
require '../includes/session.php';
require '../vendor/autoload.php';

class Auth {
    private $session;
    private $db;

    public function __construct(Database $db) {
        $this->session = new Session();
        $this->db = $db;
    }

    public function requireAuth() {
        if (!$this->session->isLoggedIn()) {
            header('Location: /hci/login.php');
            exit();
        }
    }

    public function requireGuest() {
        if ($this->session->isLoggedIn()) {
            header('Location: /hci/index.php');
            exit();
        }
    }

    public function requireRole($role) {
        $this->requireAuth();
        if ($this->session->getRole() !== $role) {
            header('Location: /hci/unauthorized.php');
            exit();
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'register') {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $verification_code = bin2hex(random_bytes(16));

        $stmt = $pdo->prepare("INSERT INTO users (email, password, first_name, last_name, verification_code) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$email, $password, $first_name, $last_name, $verification_code]);

        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'dreamsend08@gmail.com'; 
            $mail->Password = 'vius znoc zywj megk'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Or your SMTP port

            // Recipients
            $mail->setFrom('no-reply@hci-grocery.com', 'HCI Grocery');
            $mail->addAddress($email, "$first_name $last_name");

            // Content
            $mail->isHTML(true);
            $mail->Subject = "Verify your account";
            $mail->Body = "Hello $first_name,<br><br>Thank you for registering! Please use the following verification code to verify your account:<br><br><strong>$verification_code</strong><br><br>Best Regards,<br>Your Company Name";
            $mail->AltBody = "Hello $first_name,\n\nThank you for registering! Please use the following verification code to verify your account:\n\n$verification_code\n\nBest Regards,\nYour Company Name";

            $mail->send();
            echo "A verification email has been sent to $email.";
            header('Location: ../views/verify.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } elseif ($action === 'login') {
        // Login Logic
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: ../views/index.php');
        } else {
            echo "Invalid email or password.";
        }
    } elseif ($action === 'verify') {
        // Verification Logic
        $code = $_POST['code'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE verification_code = ? AND is_verified = 0");
        $stmt->execute([$code]);
        $user = $stmt->fetch();

        if ($user) {
            $stmt = $pdo->prepare("UPDATE users SET is_verified = 1 WHERE id = ?");
            $stmt->execute([$user['id']]);
            echo "Account verified!";
            header('Location: ../views/login.php');
        } else {
            echo "Invalid or expired verification code.";
        }
    }
}
?>
