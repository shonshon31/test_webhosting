<?php

include 'callospa_resort_database.php';

$title = "Callospa Resort";

$mainHeader = "CALLOSPA";
$subHeader = "Resort";

$mainTitle = "EVENT RESERVATION FORM";
$subTitle = "Plan your perfect event by completing the form below. Choose your event type, date, and details to book our stunning venue.";

$navLinks = [
    "Home" => "HomePage.php",
    "Packages" => "PackagesPage.php",
    "Rooms" => "RoomsPage.php",
    "Events" => "EventsPage.php",
    "Amenities" => "AmenitiesPage.php",
    "Gallery" => "GalleryPage.php",
];

$packages = [
    "Exclusive Resort Venue" => [
        [
            "name" => "Day Resort Grounds Exclusive",
            "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
            "price" => "Php 15,000",
            "check-in-time" => "08:00 AM",
            "check-out-time" => "04:00 PM",
            "duration" => "08:00 AM to 04:00 PM",
            "guest" => 40,
            "description" => "Experience the ultimate day of relaxation with exclusive access to our resort. Enjoy unlimited swimming, lounging, and bonding time, all to yourself. Perfect for groups of up to 40 guests."
        ],
        [
            "name" => "Night Resort Grounds Exclusive",
            "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
            "price" => "Php 15,000",
            "check-in-time" => "05:00 PM",
            "check-out-time" => "07:00 AM",
            "duration" => "05:00 PM to 07:00 AM",
            "guest" => 40,
            "description" => "Enjoy a night of exclusive resort access! Dive into unlimited swimming, lounging, and bonding under the stars. Ideal for groups of up to 40 guests."
        ]
    ],
    "Reception Hall Venue" => [
        [
            "name" => "1 Day with Reception Hall ",
            "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
            "price" => "Php 47,200",
            "duration" => "8 hours",
            "guest" => 250,
            "description" => "Make your event unforgettable with our exclusive reception rall rental. Includes access to the reception hall and swimming pool, plus time for setup and teardown. Ideal for events with up to 10 guests staying in rooms. Note: Corkage fee applies for non-tie catering. A Php 5,000 security bond is required, refundable within 10 business days."
        ],
        [
            "name" => "24-Hour with Reception Hall",
            "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
            "price" => "Php 73,765",
            "duration" => "24 hours",
            "guest" => 250,
            "description" => "Enjoy full access to our reception hall for a whole day! This package includes the reception hall, swimming pool, and entire resort, with options for 6-pax, 10-pax, and 20-pax rooms, plus an executive suite for 2. Plus, enjoy complimentary total body spa pampering and signature massages for 2. Note: Corkage fee applies for non-tie catering. A Php 5,000 security bond is required, refundable within 10 business days."
        ]
    ],
    "Conference Room Venue" => [
        [
            "name" => "1 Day with Conference Room",
            "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
            "price" => "Php 47,200",
            "duration" => "8 hours",
            "guest" => 75,
            "description" => "Make your event unforgettable with our exclusive reception rall rental. Includes access to the reception hall and swimming pool, plus time for setup and teardown. Ideal for events with up to 10 guests staying in rooms. Note: Corkage fee applies for non-tie catering. A Php 5,000 security bond is required, refundable within 10 business days."
        ],
        [
            "name" => "24-Hour with Conference Room",
            "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
            "price" => "Php 73,765",
            "duration" => "24 hours",
            "guest" => 75,
            "description" => "Enjoy full access to our reception hall for a whole day! This package includes the reception hall, swimming pool, and entire resort, with options for 6-pax, 10-pax, and 20-pax rooms, plus an executive suite for 2. Plus, enjoy complimentary total body spa pampering and signature massages for 2. Note: Corkage fee applies for non-tie catering. A Php 5,000 security bond is required, refundable within 10 business days."
        ]
    ]
];

$cateringPreferences = [
    "Tie-Up Catering" => [
        "value" => "Tie-Up Catering",
        "description" => "No additional fees will apply."
    ],
    "Different Catering Service (Corkage Fee Applies)" => [
        "value" => "Different Catering Service (Corkage Fee Applies)",
        "description" => "A corkage fee will be charged for non-tie-up caterings."
    ],
    "None" => [
        "value" => "None",
        "description" => "None."
    ]
];

$contactInfo = [
    "name" => "Callospa Resort",
    "email" => "callos.realty.leasing@gmail.com",
    "address" => "H599+3gf, Marigman Rd, Antipolo, 1870, Rizal",
    "phone" => "+63 9178243715 / +63 983560798"
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="EventReservationForm.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.min.css">
</head>

<body>
    <header class="header">
        <div class="header-content">
            <div class="header-title">
                <h1><?php echo htmlspecialchars($mainHeader, ENT_QUOTES, 'UTF-8'); ?></h1>
                <p><?php echo htmlspecialchars($subHeader, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>

            <nav class="main-nav">
                <ul class="nav-links">
                    <?php
                    $currentPage = basename($_SERVER['PHP_SELF']);
                    foreach ($navLinks as $name => $link):
                        $isActive = (basename($link) == $currentPage || $currentPage == 'EventReservationForm.php' && basename($link) == 'EventsPage.php') ? 'active' : '';
                    ?>
                        <li><a href="<?php echo htmlspecialchars($link, ENT_QUOTES, 'UTF-8'); ?>" class="<?php echo $isActive; ?>"><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="image-section">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="images/1.jpg" alt="Background Image 1" class="background-image" />
                </div>
                <div class="mySlides fade">
                    <img src="images/1.jpg" alt="Background Image 2" class="background-image" />
                </div>
                <div class="mySlides fade">
                    <img src="images/1.jpg" alt="Background Image 3" class="background-image" />
                </div>
            </div>
            <div class="image-overlay"></div>
            <div class="image-text">
                <h1><?php echo htmlspecialchars($mainTitle, ENT_QUOTES, 'UTF-8'); ?></h1>
                <p><?php echo htmlspecialchars($subTitle, ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </section>

        <section class="reservation-form-section">
            <h2>Contact Information</h2>
            <form action="SubmitEventReservation.php" method="POST" enctype="multipart/form-data">
                <p>Fill in your contact details to help us get in touch with you regarding your reservation.</p>

                <label for="first-name">First Name (Required):</label>
                <input type="text" id="first-name" name="first_name" required><br>

                <label for="middle-name">Middle Name (Optional):</label>
                <input type="text" id="middle-name" name="middle_name"><br>

                <label for="last-name">Last Name (Required):</label>
                <input type="text" id="last-name" name="last_name" required><br>

                <label for="contact-number">Contact Number (Required):</label>
                <input type="tel" id="contact-number" name="contact_number" required><br>

                <label for="email">Email (Required):</label>
                <input type="email" id="email" name="email" required><br>

                <label for="handle">Facebook/Instagram Handle (Optional):</label>
                <input type="handle" id="handle" name="handle"><br>

                <label>Where did you hear about us? (Required)</label><br>
                <label><input type="checkbox" name="source[]" value="Facebook"> Facebook</label><br>
                <label><input type="checkbox" name="source[]" value="Word of Mouth"> Word of Mouth</label><br>
                <label><input type="checkbox" name="source[]" value="Returning Customer"> Returning Customer</label><br>
                <label><input type="checkbox" name="source[]" value="Google"> Google</label><br>
                <label><input type="checkbox" name="source[]" value="Others"> Others: <input type="text" name="source_other"></label><br>

                <h3>Reservation Details</h3>
                <p>Please fill out the following details about your reservation, including the type of package you're interested in, your check-in and check-out dates, check-in and check-out time, and the additional guest if needed.</p>

                <label for="package-category">Select Venue: (Required)</label>
                <select id="package-category" name="package_category" onchange="updatePackageOptions()" required>
                    <option value="">Select Venue</option>
                    <?php foreach (array_keys($packages) as $category): ?>
                        <option value="<?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?></option>
                    <?php endforeach; ?>
                </select><br>

                <label for="package">Select Venue Package: (Required)</label>
                <select id="package" name="package" required>
                    <option value="">Select Venue Package</option>
                </select><br>

                <div id="package-details" class="package-details">
                    <div id="package-images"></div>
                    <p id="package-price"></p>
                    <p id="package-duration"></p>
                    <p id="package-description"></p>
                </div>

                <label for="event-type">Type of Event: (Required)</label>
                <input type="text" id="event-type" name="event_type" required><br>

                <label for="check-in-date">Check-In Date (Required):</label>
                <input type="text" id="check-in-date" name="check_in_date" required onchange="calculateTotalCost()"><br>

                <label for="check-out-date">Check-Out Date (Required):</label>
                <input type="text" id="check-out-date" name="check_out_date" required onchange="calculateTotalCost()"><br>

                <label for="check-in-time">Check-In Time:</label>
                <input type="text" id="check-in-time" name="check_in_time" step="1800" required><br>
                <input type="hidden" id="hidden-check-in-time" name="check_in_time_hidden">

                <label for="check-out-time">Check-Out Time:</label>
                <input type="text" id="check-out-time" name="check_out_time" step="1800" required><br>
                <input type="hidden" id="hidden-check-out-time" name="check_out_time_hidden">

                <label for="guests">Number of Guests: (Required)</label>
                <p>The number of guests displayed is the <strong>maximum allowed.</strong></p>
                <input type="number" id="guests" name="guests" min="1" readonly><br>

                <label for="additional_guest">Add Additional Guests (Optional):</label>
                <p>If you want to have <strong>additional guests</strong>, there will be a charge of <strong>₱250.00 per person.</strong></p>
                <input type="number" id="additional_guest" name="additional_guest" min="0" placeholder="0" oninput="calculateTotalCost()"><br>

                <label for="catering_preference">Select Your Catering Preference: (Applicable for Venue-Only Package)</label>
                <p>If you choose <strong>our tie-up catering service</strong>, no additional fees will apply. However, if you select <strong>a different catering service</strong>, a corkage fee will be charged for non-tie-up caterings.</p>
                <select id="catering_preference" name="catering_preference" onchange="applyCorkageFee()" required>
                    <?php foreach ($cateringPreferences as $label => $details): ?>
                        <option value="<?php echo htmlspecialchars($details['value'], ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>

                <h3>Total Reservation Cost: <span id="total-cost">₱0.00</span></h3>
                <p>The price listed above shows the <strong> total cost of your reservation.</strong></p>
                <input type="hidden" id="total-cost-hidden" name="total_cost" value="0">

                <h3>25% Reservation Cost Deposit: <span id="discount-amount">₱0.00</span></h3>
                <p>This deposit is <strong>25% of the total reservation cost</strong> and must be paid to <strong>secure your booking.</strong></p>
                <input type="hidden" id="deposit-amount" name="deposit_amount" value="0">

                <h3>Remaining Balance Upon Check-In: <span id="remaining-balance">₱0.00</span></h3>
                <p>The price listed above shows the <strong> remaining balance of your reservation.</strong> The remaining balance will be <strong> due upon check-in.</strong></p>
                <input type="hidden" id="remaining-balance-hidden" name="remaining_balance" value="0">

                <h3>Payment Method</h3>
                <p><strong>Choose your preferred payment method</strong> from the options provided and <strong> scan the QR code to pay the 20% deposit amount.</strong> This will confirm your booking.</strong></p>

                <div class="payment-method-section">
                    <div class="payment-option">
                        <input type="radio" id="bdo" name="payment_method" value="BDO" onclick="showQRCode('bdo')">
                        <label for="bdo">BDO</label>
                    </div>
                </div>

                <div id="qr-code-section">
                    <div id="bdo-qr" class="qr-code-container" style="display:none;">
                        <img src="images/bdo-qr.png" alt="BDO QR Code" class="qr-code-image">
                    </div>
                </div>

                <h3>Payment Verification: (Required)</h3>
                <p>Upload an image of your proof of payment for verification after scanning the QR code. Please ensure the file name is <strong>Fullname_Proof_of_Payment_Date.</strong> Allowed formats are <strong>jpg, jpeg, or png.</strong></p><br>
                <label for="proof-of-payment">Upload Payment Confirmation (Required):</label>
                <input type="file" id="proof-of-payment" name="proof_of_payment" accept="image/*" required><br>

                <h3>Terms and Conditions: (Required)</h3>
                <p>Before proceeding with your reservation, please carefully <strong>review our terms and conditions.</strong> Your agreement to these terms is required for completing the booking process.</p>
                <div class="terms-container">
                    <input type="checkbox" id="termsAgree" name="agree" required>
                    <label for="termsAgree">I have read and agree with the <span class="terms-link" id="termsLink">Terms and Conditions</span></label>
                </div>

                <button type="submit">Submit Reservation</button>
            </form>
        </section>
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

    <!-- Terms and Conditions Modal -->
    <div id="termsModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Terms and Conditions</h2>
            <p>These terms and conditions govern your use of our resort and residences. By making a reservation or using our services, you agree to these terms.</p>
            <ul>
                <li><strong>General Information</strong></li>
                <ul>
                    <li>These terms and conditions apply to all guests and visitors of the resort.</li>
                    <li>The resort is not responsible for any personal belongings lost or damaged during your stay.</li>
                    <li>Guests are liable for any damage to the property or furnishings. The cost of repairs or replacements will be charged to the guest.</li>
                    <li>No smoking is allowed in rooms or public areas. Smoking violations will incur a cleaning fee.</li>
                    <li>We reserve the right to modify these terms at any time. Changes will be communicated through the contact details provided.</li>
                </ul>

                <li><strong>Event Reservation Policies</strong></li>
                <ul>
                    <li>All event reservations must be guaranteed with a valid payment method.</li>
                    <li>Rates and availability are subject to change. Prices confirmed at the time of booking are final.</li>
                    <li>Your event reservation is confirmed upon receipt of a confirmation email and a non-refundable deposit of 25% of the total event fee.</li>
                    <li>Cancellations made more than 14 days before the event will receive a full refund minus the deposit. Cancellations within 14 days will forfeit the deposit.</li>
                    <li>Any changes to the event details must be communicated at least 7 days in advance. Extensions are subject to availability and additional charges.</li>
                    <li>Noise levels must comply with local regulations. Failure to do so may result in additional charges.</li>
                </ul>

                <li><strong>Payment</strong></li>
                <ul>
                    <li>Payment is accepted via GCash, BDO, and BPI.</li>
                </ul>

                <li><strong>Responsibilities</strong></li>
                <ul>
                    <li>The event organizer is responsible for any damage to the venue or property. Any damage costs will be billed accordingly.</li>
                    <li>The resort is not responsible for any loss or theft of personal belongings. Please use the in-room safe for valuables.</li>
                </ul>
            </ul>
            <input type="checkbox" id="modalAgree" name="modalAgree" required>
            <label for="modalAgree">I have read and agree with the Terms and Conditions</label>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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

        // Calendar Function
        (function() {
            const today = new Date().toISOString().split('T')[0];
            document.querySelectorAll('#check-in-date, #check-out-date').forEach(input => input.min = today);
        })();

        // Update package options based on category
        function updatePackageOptions() {
            const category = document.getElementById('package-category').value;
            const packageSelect = document.getElementById('package');
            const packages = <?php echo json_encode($packages); ?>;
            const fieldsToClear = ['package-price', 'package-duration', 'package-description', 'check-in-time', 'check-out-time', 'guests'];
            const clearFields = () => fieldsToClear.forEach(id => document.getElementById(id).value = '');

            packageSelect.innerHTML = '<option value="">Select Package</option>';
            clearFields();
            document.getElementById('package-images').innerHTML = '';

            if (category && packages[category]) {
                packages[category].forEach(pkg => {
                    const option = document.createElement('option');
                    option.value = pkg.name;
                    option.textContent = pkg.name;
                    packageSelect.appendChild(option);
                });

                packageSelect.addEventListener('change', function() {
                    const selectedPkg = packages[category].find(pkg => pkg.name === this.value);
                    if (selectedPkg) {
                        document.getElementById('package-price').textContent = `Price: ${selectedPkg.price}`;
                        document.getElementById('package-duration').textContent = `Duration: ${selectedPkg.duration}`;
                        document.getElementById('package-description').textContent = selectedPkg.description;

                        const packageImages = document.getElementById('package-images');
                        packageImages.innerHTML = selectedPkg.images.map(img => `<img src="${img}" alt="${selectedPkg.name} image" style="width: 300px; margin: auto;">`).join('');

                        document.getElementById('guests').value = selectedPkg.guest;
                        const checkInTime = convertTo24HourFormat(selectedPkg["check-in-time"]);
                        const checkOutTime = convertTo24HourFormat(selectedPkg["check-out-time"]);

                        if (category === 'Exclusive Resort Venue') {
                            document.getElementById('check-in-time').value = checkInTime;
                            document.getElementById('check-out-time').value = checkOutTime;
                            document.getElementById('hidden-check-in-time').value = checkInTime;
                            document.getElementById('hidden-check-out-time').value = checkOutTime;
                        } else {
                            document.getElementById('check-in-time').readOnly = false;
                            document.getElementById('check-out-time').readOnly = false;
                            document.getElementById('hidden-check-in-time').value = '';
                            document.getElementById('hidden-check-out-time').value = '';
                        }

                        checkAvailability();
                        calculateTotalCost();
                    }
                });
            }
        }

        function convertTo24HourFormat(timeStr) {
            const time = timeStr.match(/(\d+):?(\d+)?\s*(AM|PM)/i);
            if (!time) return '';
            let [hours, minutes] = [parseInt(time[1], 10), parseInt(time[2] || '0', 10)];
            if (time[3].toUpperCase() === 'PM' && hours < 12) hours += 12;
            if (time[3].toUpperCase() === 'AM' && hours === 12) hours = 0;
            return ('0' + hours).slice(-2) + ':' + ('0' + minutes).slice(-2);
        }

        // Disable Booked Date and Time
        document.addEventListener('DOMContentLoaded', function() {
            const checkInDateInput = document.getElementById('check-in-date');
            const checkOutDateInput = document.getElementById('check-out-date');
            const checkInTimeInput = document.getElementById('check-in-time');
            const checkOutTimeInput = document.getElementById('check-out-time');
            const today = new Date().toISOString().split('T')[0];

            const checkInFlatpickr = flatpickr(checkInDateInput, {
                dateFormat: "Y-m-d",
                minDate: today,
                disable: [],
                onChange: function() {
                    checkAvailability();
                }
            });

            const checkOutFlatpickr = flatpickr(checkOutDateInput, {
                dateFormat: "Y-m-d",
                minDate: today,
                disable: [],
                onChange: function() {
                    checkAvailability();
                }
            });

            const checkInTimeFlatpickr = flatpickr(checkInTimeInput, {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                disable: [],
            });

            const checkOutTimeFlatpickr = flatpickr(checkOutTimeInput, {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                disable: [],
            });

            function checkAvailability() {
                const selectedPackageCategory = document.getElementById('package-category').value;
                const selectedPackage = document.getElementById('package').value;

                if (!selectedPackage || !selectedPackageCategory) {
                    return;
                }

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'check_eventsAvailability.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (this.status === 200) {
                        const response = JSON.parse(this.responseText);

                        // Clear previously disabled dates and times
                        checkInFlatpickr.set('disable', []);
                        checkOutFlatpickr.set('disable', []);
                        checkInTimeFlatpickr.set('disable', []);
                        checkOutTimeFlatpickr.set('disable', []);

                        if (!response.available) {
                            // Combine past dates and booked dates
                            const disabledDates = response.bookedDates.map(d => d.date);
                            checkInFlatpickr.set('disable', disabledDates);
                            checkOutFlatpickr.set('disable', disabledDates);

                            // Disable times for each date
                            response.bookedDates.forEach(dateInfo => {
                                if (checkInDateInput.value === dateInfo.date) {
                                    checkInTimeFlatpickr.set('disable', [{
                                        from: dateInfo.check_in_time,
                                        to: dateInfo.check_out_time
                                    }]);
                                }
                                if (checkOutDateInput.value === dateInfo.date) {
                                    checkOutTimeFlatpickr.set('disable', [{
                                        from: dateInfo.check_in_time,
                                        to: dateInfo.check_out_time
                                    }]);
                                }
                            });
                        }
                    }
                };

                xhr.send(`package_category=${encodeURIComponent(selectedPackageCategory)}&package=${encodeURIComponent(selectedPackage)}`);
            }

            document.getElementById('package').addEventListener('change', checkAvailability);
            document.getElementById('package-category').addEventListener('change', checkAvailability);
        });

        // Calculate total cost
        function calculateTotalCost() {
            const selectedPackage = document.getElementById('package').value;
            const checkInDate = new Date(document.getElementById('check-in-date').value);
            const checkOutDate = new Date(document.getElementById('check-out-date').value);
            const additionalGuests = parseInt(document.getElementById('additional_guest').value) || 0;
            if (!selectedPackage || isNaN(checkInDate) || isNaN(checkOutDate)) return;

            const packages = <?php echo json_encode($packages); ?>;
            const packageCategory = document.getElementById('package-category').value;
            const selectedPkg = packages[packageCategory].find(pkg => pkg.name === selectedPackage);
            if (!selectedPkg) return;

            const packagePrice = parseInt(selectedPkg.price.replace('Php ', '').replace(',', ''));
            const days = Math.ceil((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));
            const additionalGuestCost = additionalGuests * 250;
            const totalCost = (packagePrice * days) + additionalGuestCost;

            const depositAmount = totalCost * 0.25;
            const remainingBalance = totalCost - depositAmount;

            document.getElementById('total-cost').textContent = `₱${totalCost.toLocaleString()}`;
            document.getElementById('discount-amount').textContent = `₱${depositAmount.toLocaleString()}`;
            document.getElementById('remaining-balance').textContent = `₱${remainingBalance.toLocaleString()}`;

            document.getElementById('total-cost-hidden').value = totalCost;
            document.getElementById('deposit-amount').value = depositAmount;
            document.getElementById('remaining-balance-hidden').value = remainingBalance;
        }

        // Show QR Code Function
        function showQRCode(method) {
            document.querySelectorAll('.qr-code-container').forEach(container => container.style.display = 'none');
            const qrCodeSection = document.getElementById(`${method}-qr`);
            if (qrCodeSection) {
                qrCodeSection.style.display = 'block';
            }
        }

        // Modal Functions
        document.addEventListener('DOMContentLoaded', function() {
            const termsLink = document.getElementById('termsLink');
            const termsModal = document.getElementById('termsModal');
            const closeModal = document.getElementById('closeModal');
            const termsCheckbox = document.getElementById('termsAgree');
            const modalCheckbox = document.getElementById('modalAgree');

            termsCheckbox.disabled = true;

            termsLink.addEventListener('click', () => termsModal.style.display = 'flex');
            closeModal.addEventListener('click', () => termsModal.style.display = 'none');

            modalCheckbox.addEventListener('change', function() {
                if (modalCheckbox.checked) {
                    termsCheckbox.checked = true;
                    termsCheckbox.disabled = false;
                    termsModal.style.display = 'none';
                }
            });

            ['package', 'guests', 'additional_guest', 'check-in-date', 'check-out-date'].forEach(id => {
                document.getElementById(id).addEventListener('change', () => {
                    showPackageDetails();
                    updateGuestCount();
                    updateTimes();
                    calculateTotalCost();
                });
            });
        });
    </script>
</body>

</html>