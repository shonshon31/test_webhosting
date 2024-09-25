<?php
header('Content-Type: application/json');

// Database connection parameters
$servername = "localhost";
$username = "root"; // Change if needed
$password = ""; // Change if needed
$dbname = "callospa_resort_database"; // Your database name

try {
    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to fetch events
    $stmt = $pdo->query('
        SELECT 
            first_name, 
            last_name, 
            package, 
            check_in_date, 
            check_in_time
            
        FROM 
            amenity_reservations'); // Adjust table name if necessary

    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Format the data for FullCalendar
    $formattedEvents = array_map(function($event) {
        // Default times if not available
        $checkInTime = !empty($event['check_in_time']) ? $event['check_in_time'] : '00:00:00';

        return [
            'title' => $event['first_name'] . ' ' . $event['last_name'] . ' - ' . $event['package'],
            'start' => $event['check_in_date'] . 'T' . $checkInTime,
        ];
    }, $events);

    // Output JSON
    echo json_encode($formattedEvents);

} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>