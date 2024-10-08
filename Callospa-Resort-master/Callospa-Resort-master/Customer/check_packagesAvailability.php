<?php
include 'callospa_resort_database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $package = $_POST['package'];

    $sql = "SELECT check_in_date, check_out_date FROM package_reservations WHERE package = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $package);
    $stmt->execute();
    $result = $stmt->get_result();

    $bookedDates = [];

    while ($row = $result->fetch_assoc()) {
        $checkInDate = $row['check_in_date'];
        $checkOutDate = $row['check_out_date'];

        $currentDate = $checkInDate;
        while ($currentDate <= $checkOutDate) {
            $bookedDates[] = $currentDate;
            $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
        }
    }

    $stmt->close();

    echo json_encode(['available' => empty($bookedDates), 'bookedDates' => $bookedDates]);
    exit;
}
?>