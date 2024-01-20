<?php
require_once 'db.php';

class EventManager
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addEvent($eventName, $artist, $category, $tickets, $date, $address, $country)
    {
        $conn = $this->db->getConnection();

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO events (event_name, artist, category, tickets, event_date, address, country) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssiiss", $eventName, $artist, $category, $tickets, $date, $address, $country);

        if ($stmt->execute()) {
            // Record inserted successfully
            return ['success' => true];
        } else {
            // Error inserting record
            return ['success' => false, 'error' => $conn->error];
        }
    }
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all necessary POST data is present
    $requiredFields = ['taskName', 'taskartist', 'categoryDropdown', 'tickets', 'date', 'taskaddress', 'countryDropdown'];
    
    $missingFields = array_diff($requiredFields, array_keys($_POST));

    if (empty($missingFields)) {
        // Retrieve form data
        $eventName = $_POST['taskName'];
        $artist = $_POST['taskartist'];
        $category = $_POST['categoryDropdown'];
        $tickets = $_POST['tickets'];
        $date = $_POST['date'];
        $address = $_POST['taskaddress'];
        $country = $_POST['countryDropdown'];

        // Create a new instance of the EventManager class
        $eventManager = new EventManager();

        // Call the addEvent method to insert data into the database
        $result = $eventManager->addEvent($eventName, $artist, $category, $tickets, $date, $address, $country);

        // Return a JSON response
        header('Content-Type: application/json');
        echo json_encode($result);
    } else {
        // Handle missing POST data
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Missing POST data', 'missingFields' => $missingFields]);
    }
}
?>
