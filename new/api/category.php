<?php
header('Content-Type: application/json');

require_once 'db.php';

class CategoryApi
{
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getCategories()
    {
        $conn = $this->db->getConnection();

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $categories = array();

        $sql = "SELECT * FROM category";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = array('id' => $row['ID'], 'name' => $row['CATEGORY']);
            }
        }

        $conn->close();

        return json_encode($categories);
    }
}

$database = new Database();
$categoryApi = new CategoryApi($database);
echo $categoryApi->getCategories();
?>
