<?php

include 'callospa_resort_database.php';

$title = "Callospa Resort";

$mainHeader = "CALLOSPA";
$subHeader = "Resort";

$mainTitle = "PACKAGES RESERVATION FORM";
$subTitle = "Easily book your stay by filling out the form below. Select your desired package, check-in and check-out dates, and provide your details to secure your reservation.";

$navLinks = [
    "Home" => "HomePage.php",
    "Packages" => "PackagesPage.php",
    "Rooms" => "RoomsPage.php",
    "Events" => "EventsPage.php",
    "Amenities" => "AmenitiesPage.php",
    "Gallery" => "GalleryPage.php",
];

$package = [
    "Couple's Blissfull Ovenight Package" => [
        "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
        "price" => "₱10,000",
        "check-in-time" => "05:00 PM",
        "check-out-time" => "07:00 AM",
        "description" => "<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Body Scrub, Facial,<br>Hair Spa, Signature Massage<br><br>Couples Dinner<br>1 Bottle of Red Wine<br>Couples Breakfast<br>Petals on Bed<br><br>Complementary: Free Use of Swimming Pool",
        "guests" => 2
    ],
    "Couple's Ovenight Package" => [
        "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
        "price" => "₱6,500",
        "check-in-time" => "05:00 PM",
        "check-out-time" => "07:00 AM",
        "description" => "<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Dinner<br>Couples Breakfast<br><br>Complementary: Free Use of Swimming Pool",
        "guests" => 2
    ],
    "Couple's Day Sanctuary Package" => [
        "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
        "price" => "₱5,800",
        "check-in-time" => "08:00 AM",
        "check-out-time" => "04:00 PM",
        "description" => "<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool",
        "guests" => 2
    ],
    "Day Resort Grounds Exclusive" => [
        "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
        "price" => "₱5,800",
        "check-in-time" => "08:00 AM",
        "check-out-time" => "04:00 PM",
        "description" => "<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool",
        "guests" => 2
    ],
    "Night Resort Grounds Exclusive" => [
        "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
        "price" => "₱5,800",
        "check-in-time" => "05:00 PM",
        "check-out-time" => "07:00 AM",
        "description" => "<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool",
        "guests" => 2
    ],
    "1 Day with Reception Hall" => [
        "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
        "price" => "₱5,800",
        "check-in-time" => "08:00 AM",
        "check-out-time" => "04:00 PM",
        "description" => "<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool",
        "guests" => 2
    ],
    "24 Hour with Reception Hall" => [
        "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
        "price" => "₱5,800",
        "check-in-time" => "08:00 AM",
        "check-out-time" => "08:00 AM",
        "description" => "<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool",
        "guests" => 2
    ],
    "1 Day with Conference Room" => [
        "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
        "price" => "₱5,800",
        "check-in-time" => "08:00 AM",
        "check-out-time" => "08:00 AM",
        "description" => "<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool",
        "guests" => 2
    ],
    "24 Hour with Conference Room" => [
        "images" => ["images/1.jpg", "images/1.jpg", "images/1.jpg", "images/1.jpg"],
        "price" => "₱5,800",
        "check-in-time" => "08:00 AM",
        "check-out-time" => "08:00 AM",
        "description" => "<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool",
        "guests" => 2
    ],
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
    <link rel="stylesheet" href="PackagesReservationForm.css" />
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
                        $isActive = (basename($link) == $currentPage || $currentPage == 'PackagesReservationForm.php' && basename($link) == 'PackagesPage.php') ? 'active' : '';
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
            <form action="SubmitPackageReservation.php" method="POST" enctype="multipart/form-data">
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
                <p>Please provide information about your stay, including the package you wish to book, your check-in and check-out dates.</p>

                <label for="package">Select Package (Required):</label>
                <select id="package" name="package" required onchange="showPackageDetails()">
                    <option value="" disabled selected>Select a package</option>
                    <?php foreach ($package as $pkgName => $details): ?>
                        <option value="<?php echo htmlspecialchars($pkgName, ENT_QUOTES, 'UTF-8'); ?>" data-guests="<?php echo $details['guests']; ?>" data-price="<?php echo htmlspecialchars($details['price'], ENT_QUOTES, 'UTF-8'); ?>" data-description="<?php echo htmlspecialchars($details['description'], ENT_QUOTES, 'UTF-8'); ?>" data-images="<?php echo implode(',', $details['images']); ?>">
                            <?php echo htmlspecialchars($pkgName, ENT_QUOTES, 'UTF-8'); ?>
                        </option>
                    <?php endforeach; ?>
                </select><br>

                <div id="package-details" style="display:none;">
                    <div id="package-images"></div>
                    <p id="package-price"></p>
                    <p id="package-description"></p>
                </div>

                <label for="check-in-date">Check-In Date (Required):</label>
                <input type="text" id="check-in-date" name="check_in_date" required onchange="calculateTotalCost()"><br>

                <label for="check-out-date">Check-Out Date (Required):</label>
                <input type="text" id="check-out-date" name="check_out_date" required onchange="calculateTotalCost()"><br>

                <label for="check-in-time">Check-In Time:</label>
                <input type="time" id="check-in-time" name="check_in_time" readonly><br>

                <label for="check-out-time">Check-Out Time:</label>
                <input type="time" id="check-out-time" name="check_out_time" readonly><br>

                <label for="guests">Number of Guests:</label>
                <p>The number of guests displayed is the <strong>maximum allowed</strong> for that particular room.</p>
                <input type="number" id="guests" name="guests" min="1" readonly required><br>

                <label for="additional_guest">Add Additional Guests (Optional):</label>
                <p>If you want to have <strong>additional guests</strong>, there will be a charge of <strong>₱250.00 per person.</strong></p>
                <input type="number" id="additional_guest" name="additional_guest" min="0" placeholder="0" oninput="calculateTotalCost()"><br>

                <h3>Total Reservation Cost: <span id="total-cost">₱0.00</span></h3>
                <p>The price listed above shows the <strong> total cost of your reservation.</strong></p>
                <input type="hidden" id="total-cost-hidden" name="total_cost" value="0">

                <h3>20% Reservation Cost Deposit: <span id="discount-amount">₱0.00</span></h3>
                <p>This deposit is <strong>20% of the total reservation cost</strong> and must be paid to <strong>secure your booking.</strong></p>
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

                <!-- File Upload -->
                <h3>Payment Verification</h3>
                <p>Upload an image of your proof of payment for verification after scanning the QR code. Please ensure the file name is <strong>Fullname_Proof_of_Payment_Date.</strong> Allowed formats are <strong>jpg, jpeg, or png.</strong></p><br>
                <label for="proof-of-payment">Upload Payment Confirmation (Required):</label>
                <input type="file" id="proof-of-payment" name="proof_of_payment" accept="image/*" required><br>

                <h3>Terms and Conditions</h3>
                <p>Before proceeding with your reservation, please carefully <strong>review our terms and conditions.</strong> Your agreement to these terms is required for completing the booking process.</p>
                <div class="terms-container">
                    <input type="checkbox" id="termsAgree" name="agree" required>
                    <label for="termsAgree">I have read and agree with the <span class="terms-link" id="termsLink">Terms and Conditions</span></label>
                </div>

                <input type="submit" value="Submit Reservation">
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
                    <li>Guests are liable for any damage to the property or furnishings.</li>
                    <li>No smoking is allowed in rooms or public areas. Smoking violations will incur a cleaning fee.</li>
                    <li>We reserve the right to modify these terms at any time. Changes will be communicated through the contact details provided.</li>
                </ul>
                <li><strong>Room Reservation Policies</strong></li>
                <ul>
                    <li>All reservations must be guaranteed with a valid payment method.</li>
                    <li>Rates and availability are subject to change. Prices confirmed at the time of booking are final.</li>
                    <li>A confirmation email will be sent upon successful booking. Please verify the details and contact us if any discrepancies are found.</li>
                    <li>A non-refundable deposit of 20% of the total room rate is required to secure the booking. The remaining balance is due upon check-in.</li>
                    <li>Cancellations must be made at least 7 days before the check-in date to receive a full refund, minus the non-refundable deposit. Cancellations within 7 days will forfeit the deposit.</li>
                    <li>Changes to your reservation, including date or room type adjustments, are subject to availability and may incur additional charges.</li>
                    <li>Failure to arrive on the scheduled date will result in a charge for the first night and cancellation of the remaining reservation.</li>
                </ul>
                <li><strong>Payment</strong></li>
                <ul>
                    <li>Payment is accepted via GCash, BDO, and BPI.</li>
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

        // Disable Dates Function
        document.addEventListener('DOMContentLoaded', function() {
            const checkInDateInput = document.getElementById('check-in-date');
            const checkOutDateInput = document.getElementById('check-out-date');
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

            function checkAvailability() {
                const selectedPackage = document.getElementById('package').value;

                if (!selectedPackage) {
                    return;
                }

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'check_packagesAvailability.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (this.status === 200) {
                        const response = JSON.parse(this.responseText);

                        const allDisabledDates = response.bookedDates;

                        checkInFlatpickr.set('disable', allDisabledDates);
                        checkOutFlatpickr.set('disable', allDisabledDates);
                    }
                };

                xhr.send(`package=${encodeURIComponent(selectedPackage)}`);
            }

            document.getElementById('package').addEventListener('change', checkAvailability);
        });

        // Package Data
        const packages = {
            "Couple's Blissfull Ovenight Package": {
                price: 10000,
                checkInTime: "17:00",
                checkOutTime: "07:00",
                guests: 2
            },
            "Couple's Ovenight Package": {
                price: 6500,
                checkInTime: "17:00",
                checkOutTime: "07:00",
                guests: 2
            },
            "Couple's Day Sanctuary Package": {
                price: 5800,
                checkInTime: "08:00",
                checkOutTime: "16:00",
                guests: 2
            },
            "Day Resort Grounds Exclusive": {
                price: 5800,
                checkInTime: "08:00",
                checkOutTime: "16:00",
                guests: 40
            },
            "Night Resort Grounds Exclusive": {
                price: 5800,
                checkInTime: "17:00",
                checkOutTime: "07:00",
                guests: 40
            },
            "1 Day with Reception Hall": {
                price: 5800,
                checkInTime: "08:00",
                checkOutTime: "16:00",
                guests: 250
            },
            "24 Hour with Reception Hall": {
                price: 5800,
                checkInTime: "08:00",
                checkOutTime: "08:00",
                guests: 250
            },
            "1 Day with Conference Room": {
                price: 5800,
                checkInTime: "08:00",
                checkOutTime: "16:00",
                guests: 75
            },
            "24 Hour with Conference Room": {
                price: 5800,
                checkInTime: "08:00",
                checkOutTime: "08:00",
                guests: 75
            },
        };

        // Show Package Details Function
        function showPackageDetails() {
            const packageSelect = document.getElementById('package');
            const packageDetails = document.getElementById('package-details');
            const option = packageSelect.querySelector(`option[value="${packageSelect.value}"]`);

            if (option) {
                const images = option.getAttribute('data-images').split(',');
                document.getElementById('package-images').innerHTML = images.map(image => `<img src="${image}" alt="Package Image" style="width: 300px; height: auto;">`).join('');

                document.getElementById('package-price').textContent = 'Price: ' + option.getAttribute('data-price');
                document.getElementById('package-description').innerHTML = 'Inclusions: ' + option.getAttribute('data-description');
                packageDetails.style.display = 'block';
            } else {
                packageDetails.style.display = 'none';
            }
        }

        // Update Guest Count Function
        function updateGuestCount() {
            const packageSelect = document.getElementById('package');
            const guestInput = document.getElementById('guests');
            const option = packageSelect.querySelector(`option[value="${packageSelect.value}"]`);

            guestInput.value = option ? option.getAttribute('data-guests') : '';
        }

        // Check-In and Check-Out Function
        function updateTimes() {
            const packageSelect = document.getElementById('package');
            const checkInDateInput = document.getElementById("check-in-date");
            const checkOutDateInput = document.getElementById("check-out-date");
            const checkInTimeInput = document.getElementById("check-in-time");
            const checkOutTimeInput = document.getElementById("check-out-time");

            const selectedPackage = packages[packageSelect.value];

            if (selectedPackage) {
                checkInTimeInput.value = checkInDateInput.value ? selectedPackage.checkInTime : "";
                checkOutTimeInput.value = checkOutDateInput.value ? selectedPackage.checkOutTime : "";
                checkInTimeInput.readOnly = !checkInDateInput.value;
                checkOutTimeInput.readOnly = !checkOutDateInput.value;
            } else {
                checkInTimeInput.value = "";
                checkOutTimeInput.value = "";
                checkInTimeInput.readOnly = false;
                checkOutTimeInput.readOnly = false;
            }
        }

        // Calculate Total Cost Function
        function calculateTotalCost() {
            const packageSelect = document.getElementById('package');
            const checkInDate = document.getElementById('check-in-date').value;
            const checkOutDate = document.getElementById('check-out-date').value;
            const guestInput = document.getElementById('guests');
            const additionalGuestsInput = document.getElementById('additional_guest');

            if (packageSelect.value && checkInDate && checkOutDate) {
                const pkg = packages[packageSelect.value];
                const packagePrice = pkg.price;
                const guestCount = parseInt(guestInput.value, 10) || pkg.guests;
                const additionalGuests = parseInt(additionalGuestsInput.value, 10) || 0;
                const additionalChargePerGuest = 250;

                const duration = (new Date(checkOutDate) - new Date(checkInDate)) / (1000 * 60 * 60 * 24);
                if (duration > 0) {
                    const totalGuests = guestCount + additionalGuests;
                    const additionalCharges = additionalGuests * additionalChargePerGuest;
                    const totalCost = (packagePrice * duration) + additionalCharges;

                    const discountAmount = totalCost * 0.20;
                    const remainingBalance = totalCost - discountAmount;

                    document.getElementById('total-cost').textContent = `₱${totalCost.toLocaleString()}.00`;
                    document.getElementById('total-cost-hidden').value = totalCost;
                    document.getElementById('discount-amount').textContent = `₱${discountAmount.toLocaleString()}.00`;
                    document.getElementById('deposit-amount').value = discountAmount;
                    document.getElementById('remaining-balance').textContent = `₱${remainingBalance.toLocaleString()}.00`;
                    document.getElementById('remaining-balance-hidden').value = remainingBalance;
                } else {
                    resetCostFields();
                }
            } else {
                resetCostFields();
            }
        }

        function resetCostFields() {
            document.getElementById('total-cost').textContent = "₱0.00";
            document.getElementById('total-cost-hidden').value = 0;
            document.getElementById('discount-amount').textContent = "₱0.00";
            document.getElementById('deposit-amount').value = 0;
            document.getElementById('remaining-balance').textContent = "₱0.00";
            document.getElementById('remaining-balance-hidden').value = 0;
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