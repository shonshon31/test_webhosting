<?php
include 'callospa_resort_database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $packageCategory = $_POST['package_category'];
    $package = $_POST['package'];

    $sql = "SELECT check_in_date, check_out_date, check_in_time, check_out_time 
            FROM event_reservations 
            WHERE package_category = ? AND package = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $packageCategory, $package);
    $stmt->execute();
    $result = $stmt->get_result();

    $bookedDates = [];

    while ($row = $result->fetch_assoc()) {
        $checkInDate = $row['check_in_date'];
        $checkOutDate = $row['check_out_date'];
        $checkInTime = $row['check_in_time'];
        $checkOutTime = $row['check_out_time'];

        // Include date and time together
        $currentDate = $checkInDate;
        while ($currentDate <= $checkOutDate) {
            $bookedDates[] = [
                'date' => $currentDate,
                'check_in_time' => $checkInTime,
                'check_out_time' => $checkOutTime
            ];
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }
    }

    $stmt->close();

    echo json_encode(['available' => empty($bookedDates), 'bookedDates' => $bookedDates]);
    exit;
}
?>