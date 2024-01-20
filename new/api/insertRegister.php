<?php
require 'db.php';

class UserRegistration
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function registerUser($username, $email, $password)
    {
        if ($this->validateInputs($username, $email, $password)) {
            if ($this->saveToDatabase($username, $email, $password)) {
                $response = array('message' => 'Registration successful!');
            } else {
                $response = array('message' => 'Error: ' . $this->db->getConnection()->error);
            }

            echo json_encode($response);
        }
    }

    private function validateInputs($username, $email, $password)
    {
        // Add any validation logic here
        return true;
    }

    private function saveToDatabase($username, $email, $password)
    {
        $conn = $this->db->getConnection();

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password before saving

        $sql = "INSERT INTO login (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

        return $conn->query($sql);
    }
}

// Usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $userRegistration = new UserRegistration($db);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRegistration->registerUser($username, $email, $password);
}
?>
