<?php

class LoginHandler
{
    private $db;

    public function __construct($databaseConfig)
    {
        $this->db = new PDO(
            "mysql:host={$databaseConfig['host']};dbname={$databaseConfig['dbname']}",
            $databaseConfig['user'],
            $databaseConfig['password']
        );
        session_start();
    }

    public function login($username, $password)
    {
        $stmt = $this->db->prepare("SELECT id, password FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            return true;
        }

        return false;
    }

    public function register($username, $email, $password)
    {
        // Check if the username or email already exists
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $username, 'email' => $email]);

        if ($stmt->fetchColumn() > 0) {
            return "Username or email already exists";
        }

        // Insert the new user into the database
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return true;
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }
}
?>
