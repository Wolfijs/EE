<?php
require_once(__DIR__ . "/../api/db.php");

class LoginManager
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function loginUser($username, $password)
    {
        $con = $this->database->getConnection();

        $username = mysqli_real_escape_string($con, $username);

        if (!empty($username) && !empty($password) && !is_numeric($username)) {
            $query = "SELECT * FROM login WHERE username = '$username' LIMIT 1";
            echo "Debug: Query - $query\n";

            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                echo "Debug: Fetched user data - " . print_r($user_data, true) . "\n";

                if (password_verify($password, $user_data['password'])) {
                    echo "Debug: Password verification successful\n";
                    session_start();
                    $_SESSION['id'] = $user_data['id'];
                    header("Location: index.php");
                    die;
                } else {
                    echo "Debug: Password verification failed\n";
                    return 'password';
                }
            } else {
                echo "Debug: No matching user found\n";
                return 'username';
            }
        } else {
            return 'credentials';
        }
    }
}
?>
