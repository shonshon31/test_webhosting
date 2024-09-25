<?php
include 'callospa_resort_database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $packageCategory = $_POST['package_category'];
    $package = $_POST['package'];

    $sql = "SELECT check_in_date, check_in_time
            FROM amenity_reservations 
            WHERE package_category = ? AND package = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $packageCategory, $package);
    $stmt->execute();
    $result = $stmt->get_result();

    $bookedDates = [];

    while ($row = $result->fetch_assoc()) {
        $checkInDate = $row['check_in_date'];
        $checkInTime = $row['check_in_time'];

        $bookedDates[] = [
            'date' => $checkInDate,
            'time' => $checkInTime
        ];
    }

    $stmt->close();

    echo json_encode(['available' => empty($bookedDates), 'bookedDates' => $bookedDates]);
    exit;
}
