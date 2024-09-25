<?php
include 'callospa_resort_database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $handle = $_POST['handle'];
    $sources = isset($_POST['source']) ? implode(',', $_POST['source']) : '';
    $source_other = isset($_POST['source_other']) ? $_POST['source_other'] : '';
    $package_category = mysqli_real_escape_string($conn, $_POST['package_category']);
    $package = mysqli_real_escape_string($conn, $_POST['package']);
    $event_type = mysqli_real_escape_string($conn, $_POST['event_type']);
    $check_in_date = mysqli_real_escape_string($conn, $_POST['check_in_date']);
    $check_out_date = mysqli_real_escape_string($conn, $_POST['check_out_date']);
    $check_in_time = isset($_POST['check_in_time']) ? $_POST['check_in_time'] : (isset($_POST['check_in_time_hidden']) ? $_POST['check_in_time_hidden'] : '');
    $check_out_time = isset($_POST['check_out_time']) ? $_POST['check_out_time'] : (isset($_POST['check_out_time_hidden']) ? $_POST['check_out_time_hidden'] : '');
    $guests = intval($_POST['guests']);
    $additional_guest = intval($_POST['additional_guest']);
    $catering_preference = mysqli_real_escape_string($conn, $_POST['catering_preference']);
    $total_cost = floatval($_POST['total_cost']);
    $deposit_amount = floatval($_POST['deposit_amount']);
    $remaining_balance = floatval($_POST['remaining_balance']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);

    if (empty($first_name) || empty($last_name) || empty($contact_number) || empty($email) || empty($package_category) || empty($package) || empty($event_type) || empty($check_in_date) || empty($check_out_date) || empty($guests) || empty($catering_preference) || empty($payment_method)) {
        die("Please fill in all required fields.");
    }

    $proof_of_payment = '';
    if (isset($_FILES['proof_of_payment']) && $_FILES['proof_of_payment']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['proof_of_payment']['tmp_name'];
        $fileName = $_FILES['proof_of_payment']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = array('jpg', 'jpeg', 'png');

        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadFileDir = './uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $proof_of_payment = $fileName;
            } else {
                die("Error moving the uploaded file.");
            }
        } else {
            die("Upload failed. Allowed file types: jpg, jpeg, png.");
        }
    }

    // Combine sources and source_other
    $combined_sources = $sources;
    if (!empty($source_other)) {
        if (!empty($combined_sources)) {
            $combined_sources .= ', ';
        }
        $combined_sources .= $source_other;
    }

    $stmt = $conn->prepare("INSERT INTO event_reservations (first_name, middle_name, last_name, contact_number, email, handle, sources, source_other, package_category, package, event_type, check_in_date, check_out_date, check_in_time, check_out_time, guests, additional_guest, catering_preference, total_cost, deposit_amount, remaining_balance, payment_method, proof_of_payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisssssssssssiisdddss", $first_name, $middle_name, $last_name, $contact_number, $email, $handle, $sources, $source_other, $package_category, $package, $event_type, $check_in_date, $check_out_date, $check_in_time, $check_out_time, $guests, $additional_guest, $catering_preference, $total_cost, $deposit_amount, $remaining_balance, $payment_method, $proof_of_payment);

    if ($stmt->execute()) {
        $title = "Callospa Resort";
        $mainHeader = "CALLOSPA";
        $subHeader = "Resort";
        $mainTitle = "RESERVATION CONFIRMATION";
        $subTitle = "Thank you for choosing Callospa Resort! Your reservation has been successfully completed.";

        $navLinks = [
            "Home" => "HomePage.php",
            "Packages" => "PackagesPage.php",
            "Rooms" => "RoomsPage.php",
            "Events" => "EventsPage.php",
            "Amenities" => "AmenitiesPage.php",
            "Gallery" => "GalleryPage.php",
        ];

        $contactInfo = [
            "name" => "Callospa Resort",
            "email" => "callos.realty.leasing@gmail.com",
            "address" => "H599+3gf, Marigman Rd, Antipolo, 1870, Rizal",
            "phone" => "+63 9178243715 / +63 983560798"
        ];

        $currentPage = basename($_SERVER['PHP_SELF']);
?>

        <!DOCTYPE html>
        <html lang='en'>

        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Event Reservation Confirmation</title>
            <link rel='stylesheet' href='SubmitEventReservation.css'>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        </head>

        <body>

            <header class='header'>
                <div class='header-content'>
                    <div class='header-title'>
                        <h1><?php echo htmlspecialchars($mainHeader, ENT_QUOTES, 'UTF-8'); ?></h1>
                        <p><?php echo htmlspecialchars($subHeader, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                    <nav class='main-nav'>
                        <ul class='nav-links'>
                            <?php
                            foreach ($navLinks as $name => $link) {
                                $linkBase = basename($link);
                                $isActive = ($currentPage == $linkBase || ($currentPage == 'SubmitEventReservation.php' && $linkBase == 'EventsPage.php')) ? 'active' : '';
                                echo "<li><a href='" . htmlspecialchars($link, ENT_QUOTES, 'UTF-8') . "' class='$isActive'>" . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "</a></li>";
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </header>

            <main>
                <section class='image-section'>
                    <div class='slideshow-container'>
                        <div class='mySlides fade'>
                            <img src='images/1.jpg' alt='Background Image 1' class='background-image' />
                        </div>
                        <div class='mySlides fade'>
                            <img src='images/1.jpg' alt='Background Image 2' class='background-image' />
                        </div>
                        <div class='mySlides fade'>
                            <img src='images/1.jpg' alt='Background Image 3' class='background-image' />
                        </div>
                    </div>
                    <div class='image-overlay'></div>
                    <div class='image-text'>
                        <h1><?php echo htmlspecialchars($mainTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
                        <p><?php echo htmlspecialchars($subTitle, ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </section>

                <div class='container'>
                    <h2 class="reservation-summary">RESERVATION SUMMARY</h2>
                    <p class="reservation-summary">Thank you for booking with us! Please review the details of your reservation below to confirm that all information is correct.</p>

                    <h2>Contact Information:</h2>
                    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($first_name . ' ' . ($middle_name ? $middle_name . ' ' : '') . $last_name, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($contact_number, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Facebook/Instagram:</strong> <?php echo htmlspecialchars($handle, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>How Did You Hear About Us?:</strong> <?php echo htmlspecialchars($combined_sources, ENT_QUOTES, 'UTF-8'); ?></p>

                    <h2>Reservation Details:</h2>
                    <p><strong>Package-Category:</strong> <?php echo htmlspecialchars($package_category, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Package:</strong> <?php echo htmlspecialchars($package, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Type of Event:</strong> <?php echo htmlspecialchars($event_type, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Check-In Date and Time:</strong> <?php echo date('F j, Y', strtotime(htmlspecialchars($check_in_date, ENT_QUOTES, 'UTF-8'))) . ($check_in_time ? ', at ' . date('h:i A', strtotime(htmlspecialchars($check_in_time, ENT_QUOTES, 'UTF-8'))) : ''); ?></p>
                    <p><strong>Check-Out Date and Time:</strong> <?php echo date('F j, Y', strtotime(htmlspecialchars($check_out_date, ENT_QUOTES, 'UTF-8'))) . ($check_out_time ? ', at ' . date('h:i A', strtotime(htmlspecialchars($check_out_time, ENT_QUOTES, 'UTF-8'))) : ''); ?></p>
                    <p><strong>Number of Guests:</strong> <?php echo htmlspecialchars($guests, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Additional Guests:</strong> <?php echo htmlspecialchars($additional_guest, ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Catering Preference:</strong> <?php echo htmlspecialchars($catering_preference, ENT_QUOTES, 'UTF-8'); ?></p>

                    <h2>Payment Summary:</h2>
                    <p><strong>Total Cost:</strong> ₱<?php echo number_format($total_cost, 2); ?></p>
                    <p><strong>Deposit Amount:</strong> ₱<?php echo number_format($deposit_amount, 2); ?></p>
                    <p><strong>Remaining Balance:</strong> ₱<?php echo number_format($remaining_balance, 2); ?></p>
                    <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($payment_method, ENT_QUOTES, 'UTF-8'); ?></p>

                    <?php if ($proof_of_payment): ?>
                        <div class='payment-image'>
                            <h2>Proof of Payment:</h2>
                            <p>Thank you for providing your payment confirmation! Below is the image of the payment proof you uploaded. Please keep this for your records.</p>
                            <img src='./uploads/<?php echo htmlspecialchars($proof_of_payment, ENT_QUOTES, 'UTF-8'); ?>' alt='Payment Confirmation' style='max-width: 100%; height: auto;'>
                            <p>We will send your invoice to your email shortly. If you have any questions or need further support with your reservation, feel free to reach out to us. We are committed to making your stay enjoyable and smooth. We look forward to welcoming you and hope you have a wonderful experience at our resort!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </main>

            <footer class="footer">
                <div class="footer-content">
                    <div class="contact-info">
                        <h3>Contact Us</h3>
                        <div class="footer-icons">
                            <a href="https://www.facebook.com/your-facebook-page" target="_blank" class="footer-icon"><i class="fab fa-facebook-f"></i></a>
                            <a href="viber://chat?number=your-viber-number" target="_blank" class="footer-icon"><i class="fab fa-viber"></i></a>
                        </div>
                        <address>
                            <p><?php echo htmlspecialchars($contactInfo['name'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p>Email: <a href="mailto:<?php echo htmlspecialchars($contactInfo['email'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($contactInfo['email'], ENT_QUOTES, 'UTF-8'); ?></a></p>
                            <p>Phone: <?php echo htmlspecialchars($contactInfo['phone'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p>Address: <?php echo htmlspecialchars($contactInfo['address'], ENT_QUOTES, 'UTF-8'); ?></p>
                        </address>
                    </div>
                    <div class="map-section">
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.550152718443!2d121.16622007584576!3d14.567698385914731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c74c837569df%3A0x73e3b8d8e8705966!2sCallospa%20Resort!5e0!3m2!1sen!2sph!4v1724142092622!5m2!1sen!2sph" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></p>
            </footer>

            <script>
                // Slideshow Function
                (function() {
                    let slideIndex = 0;

                    function showSlides() {
                        const slides = document.querySelectorAll(".mySlides");
                        slides.forEach(slide => slide.style.display = "none");

                        slideIndex = (slideIndex + 1) % slides.length;
                        slides[slideIndex].style.display = "block";

                        setTimeout(showSlides, 3000);
                    }
                    showSlides();
                })();
            </script>
        </body>

        </html>

<?php
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>