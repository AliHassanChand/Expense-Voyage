<?php
session_start();
include 'db.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the incoming data
    $data = json_decode(file_get_contents('php://input'), true);

    $userName = $data['userName']; // Get user name from the JSON payload
    $serviceId = $data['serviceId'];
    $categoryId = $data['categoryId'];
    $countryId = $data['countryId'];

    try {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO bookings (user_name, service_id, category_id, country_id) VALUES (:userName, :serviceId, :categoryId, :countryId)");
        
        // Bind parameters
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':serviceId', $serviceId, PDO::PARAM_INT);
        $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
        $stmt->bindParam(':countryId', $countryId, PDO::PARAM_INT);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Booking failed.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
