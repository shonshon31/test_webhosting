<?php

include 'callospa_resort_database.php';

$title = "Callospa Resort";

$mainHeader = "CALLOSPA";
$subHeader = "Resort";

$mainTitle = "AMENITIES RESERVATION FORM";
$subTitle = "Book our premium amenities with ease by filling out the form below. Select your desired amenities and schedule to enhance your stay.";

$navLinks = [
    "Home" => "HomePage.php",
    "Packages" => "PackagesPage.php",
    "Rooms" => "RoomsPage.php",
    "Events" => "EventsPage.php",
    "Amenities" => "AmenitiesPage.php",
    "Gallery" => "GalleryPage.php",
];

$amenities = include 'amenities.php';

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
    <link rel="stylesheet" href="AmenitiesReservationForm.css" />
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
                        $isActive = (basename($link) == $currentPage || ($currentPage == 'AmenitiesReservationForm.php' && basename($link) == 'AmenitiesPage.php')) ? 'active' : '';
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
            <form action="SubmitAmenityReservation.php" method="POST" enctype="multipart/form-data">
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
                <p>Please fill out the following details about your reservation, including the type of package you're interested in, your check-in date, check-in time, and the number of guests to ensure we can accommodate everyone.</p>

                <label for="package-category">Select Package Category: (Required)</label>
                <select id="package-category" name="package_category" onchange="updatePackageOptions()">
                    <option value="">Select Category</option>
                    <?php foreach (array_keys($packages) as $category): ?>
                        <option value="<?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($category, ENT_QUOTES, 'UTF-8'); ?></option>
                    <?php endforeach; ?>
                </select><br>

                <label for="package">Select Package: (Required)</label>
                <select id="package" name="package" onchange="updatePackageDetails()">
                    <option value="">Select Package</option>
                </select><br>

                <div id="package-details" style="display:none;">
                    <p><strong>Price:</strong> <span id="package-price">--</span></p>
                    <p><strong>Duration:</strong> <span id="package-duration">--</span></p>
                    <p><strong>Description:</strong> <span id="package-description">--</span></p>
                </div><br>

                <label for="check-in-date">Check-In Date: (Required)</label>
                <input type="text" id="check-in-date" name="check_in_date" required onchange="calculateTotalCost()"><br>

                <label for="check-in-time">Check-In Time: (Required)</label>
                <input type="text" id="check-in-time" name="check_in_time" required><br>

                <label for="guests">Number of Guests: (Required)</label>
                <p>Enter the <stong>number of guests</strong> who will be using the amenities to ensure we can accommodate everyone properly.</strong></p>
                <input type="number" id="guests" name="guests" min="1" required><br>

                <h3>Total Reservation Cost: <span id="total-cost">₱0.00</span></h3>
                <p>The price listed above shows the <strong> total cost of your reservation.</strong></p>
                <input type="hidden" id="total-cost-hidden" name="total_cost" value="0">

                <h3>15% Reservation Cost Deposit: <span id="discount-amount">₱0.00</span></h3>
                <p>This deposit is <strong>15% of the total reservation cost</strong> and must be paid to <strong>secure your booking.</strong></p>
                <input type="hidden" id="deposit-amount-hidden" name="deposit_amount" value="0">

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

                <h3>Payment Verification (Required)</h3>
                <p>Upload an image of your proof of payment for verification after scanning the QR code. Please ensure the file name is <strong>Fullname_Proof_of_Payment_Date.</strong> Allowed formats are <strong>jpg, jpeg, or png.</strong></p><br>
                <label for="proof-of-payment">Upload Payment Confirmation (Required):</label>
                <input type="file" id="proof-of-payment" name="proof_of_payment" accept="image/*" required><br>

                <h3>Terms and Conditions (Required)</h3>
                <p><strong>Before proceeding with your reservation, please carefully review our terms and conditions. Your agreement to these terms is required for completing the booking process.</strong></p>
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

    <div id="termsModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Terms and Conditions</h2>
            <p>These terms and conditions govern your use of our resort and residences. By making a reservation or using our services, you agree to these terms.</p>
            <ul>
                <li><strong>General Information</strong></li>
                <ul>
                    <li>These terms and conditions apply to all guests and visitors of the resort.</li>
                    <li>No smoking is allowed in rooms or public areas. Smoking violations will incur a cleaning fee.</li>
                    <li>We reserve the right to modify these terms at any time. Changes will be communicated through the contact details provided.</li>
                </ul>

                <li><strong>Reservation Policies</strong></li>
                <ul>
                    <li>All reservations must be guaranteed with a valid payment method.</li>
                    <li>Rates and availability are subject to change. Prices confirmed at the time of booking are final.</li>
                    <li>Your reservation is confirmed once you receive a confirmation email. Ensure your email address is correct.</li>
                    <li>A non-refundable deposit of 15% of the total reservation amount is required. The balance is due at the time of use or check-in.</li>
                    <li>Maximum occupancy as specified at booking. Additional users may incur extra charges.</li>
                </ul>

                <li><strong>Cancellation and Changes</strong></li>
                <ul>
                    <li>Cancellations must be made at least 7 days before the scheduled arrival date to receive a full refund, minus any applicable fees.</li>
                    <li>Cancellations within 7 days of the scheduled arrival date will incur a cancellation fee equal to the first night’s stay.</li>
                    <li>Cancellations made within 3 days of the reservation will forfeit the deposit. Changes are subject to availability and may incur additional charges.</li>
                    <li>Requests for extension are subject to availability and extra charges.</li>
                </ul>

                <li><strong>Payment Methods</strong></li>
                <ul>
                    <li>Payments can be made via GCash, BDO, and BPI.</li>
                </ul>

                <li><strong>Liability and Responsibility</strong></li>
                <ul>
                    <li>The resort is not responsible for any personal belongings lost or damaged during your stay.</li>
                    <li>Guests are responsible for any damage caused to the hotel property during their stay. The cost of repairs or replacements will be charged to the guest.</li>
                    <li>Lost items are not the resort’s responsibility. Please use the in-room safe for valuables.</li>
                </ul>

                <li><strong>Reservation Use</strong></li>
                <ul>
                    <li>Arrive on time to fully utilize your reserved slot. Late arrivals may have their time reduced.</li>
                    <li>No pets are allowed in the amenities area.</li>
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

        // Update Package Options Function
        function updatePackageOptions() {
            const category = document.getElementById('package-category').value;
            const packageSelect = document.getElementById('package');
            packageSelect.innerHTML = '<option value="">Select Package</option>';

            if (category && packages[category]) {
                Object.keys(packages[category]).forEach(packageName => {
                    const option = document.createElement('option');
                    option.value = packageName;
                    option.textContent = packageName;
                    packageSelect.appendChild(option);
                });
            }
            updatePackageDetails();
        }

        // Update Package Details Function
        function updatePackageDetails() {
            const category = document.getElementById('package-category').value;
            const packageName = document.getElementById('package').value;
            const priceSpan = document.getElementById('package-price');
            const durationSpan = document.getElementById('package-duration');
            const descriptionSpan = document.getElementById('package-description');

            if (category && packageName && packages[category]) {
                const price = packages[category][packageName];
                priceSpan.textContent = `₱ ${price}`;
                durationSpan.textContent = 'Duration not specified';
                descriptionSpan.textContent = 'Description not specified';
                document.getElementById('package-details').style.display = 'block';
                calculateTotalCost();
            } else {
                priceSpan.textContent = '--';
                durationSpan.textContent = '--';
                descriptionSpan.textContent = '--';
                document.getElementById('package-details').style.display = 'none';
            }
        }

        // Disable Booked Date and Time
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            const checkInDateInput = document.getElementById('check-in-date');
            const checkInTimeInput = document.getElementById('check-in-time');

            const checkInFlatpickr = flatpickr(checkInDateInput, {
                dateFormat: "Y-m-d",
                minDate: today,
                disable: [],
                onChange: function(selectedDates) {
                    if (selectedDates.length > 0) {
                        checkAvailability(selectedDates[0]);
                    }
                }
            });

            const checkInTimeFlatpickr = flatpickr(checkInTimeInput, {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                disable: []
            });

            function checkAvailability(selectedDate) {
                const selectedPackageCategory = document.getElementById('package-category').value;
                const selectedPackage = document.getElementById('package').value;

                if (!selectedPackage || !selectedPackageCategory) {
                    return;
                }

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'check_amenitiesAvailability.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (this.status === 200) {
                        const response = JSON.parse(this.responseText);

                        // Clear previously disabled dates and times
                        checkInFlatpickr.set('disable', []);
                        checkInTimeFlatpickr.set('disable', []);

                        if (!response.available) {
                            const bookedDates = response.bookedDates;
                            const dateAvailability = {};

                            // Check availability of times for each date
                            bookedDates.forEach(dateInfo => {
                                if (!dateAvailability[dateInfo.date]) {
                                    dateAvailability[dateInfo.date] = [];
                                }
                                dateAvailability[dateInfo.date].push(dateInfo.time);
                            });

                            // Determine which dates should be disabled
                            const allBookedDates = Object.keys(dateAvailability).filter(date => {
                                // Disable date if all times are occupied
                                return dateAvailability[date].length === 24; // Assuming 24-hour times
                            });

                            checkInFlatpickr.set('disable', allBookedDates);

                            // Disable times for the selected date
                            if (selectedDate) {
                                const timesToDisable = dateAvailability[selectedDate.toISOString().split('T')[0]] || [];
                                checkInTimeFlatpickr.set('disable', timesToDisable.map(time => ({
                                    from: time,
                                    to: time
                                })));
                            }
                        }
                    }
                };

                xhr.send(`package_category=${encodeURIComponent(selectedPackageCategory)}&package=${encodeURIComponent(selectedPackage)}`);
            }

            document.getElementById('package').addEventListener('change', function() {
                // Reset date and time pickers on package change
                checkInDateInput.value = '';
                checkInTimeInput.value = '';
                checkInFlatpickr.clear();
                checkInTimeFlatpickr.clear();

                checkAvailability(checkInFlatpickr.selectedDates[0]);
            });

            document.getElementById('package-category').addEventListener('change', function() {
                // Reset date and time pickers on package category change
                checkInDateInput.value = '';
                checkInTimeInput.value = '';
                checkInFlatpickr.clear();
                checkInTimeFlatpickr.clear();

                checkAvailability(checkInFlatpickr.selectedDates[0]);
            });
        });

        // Package Prices
        const packages = {
            "Massage Therapies": {
                "Total Body Pampering": 2500,
                "Signature Massage": 500,
                "Signature Massage Child": 300,
                "Ventosa Massage": 1000,
                "Stone Massage": 1500,
                "Mandara Twins": 1500,
            },
            "Body Treatments": {
                "Body Scrub": 650,
                "Ear Candling": 350,
            },
            "Foot Treatment": {
                "Malaysian Foot Reflex": 300,
                "Foot Reflex": 500,
                "Foot Spa": 430,
            },
            "Hair Treatments": {
                "Hair Spa": 350,
            },
            "Nail Services": {
                "Manicure": 350,
                "Pedicure": 400,
                "Mani + Pedi": 650,
            },
            "Special Packages": {
                "Affordable Escap": 1200,
                "Kiddie Package": 750,
            }
        };

        // Calculate Total Cost Function
        function calculateTotalCost() {
            const packageCategory = document.getElementById('package-category').value;
            const packageName = document.getElementById('package').value;
            const numberOfGuests = parseInt(document.getElementById('guests').value) || 1;

            if (packageCategory && packageName && packages[packageCategory]) {
                const pricePerPackage = packages[packageCategory][packageName];
                const totalCost = pricePerPackage * numberOfGuests;
                const depositAmount = totalCost * 0.15;
                const remainingBalance = totalCost - depositAmount;

                document.getElementById('total-cost').textContent = `₱ ${totalCost.toFixed(2)}`;
                document.getElementById('total-cost-hidden').value = totalCost.toFixed(2);

                document.getElementById('discount-amount').textContent = `₱ ${depositAmount.toFixed(2)}`;
                document.getElementById('deposit-amount-hidden').value = depositAmount.toFixed(2);

                document.getElementById('remaining-balance').textContent = `₱ ${remainingBalance.toFixed(2)}`;
                document.getElementById('remaining-balance-hidden').value = remainingBalance.toFixed(2);
            }
        }

        document.getElementById('package-category').addEventListener('change', updatePackageOptions);
        document.getElementById('package').addEventListener('change', updatePackageDetails);
        document.getElementById('guests').addEventListener('input', calculateTotalCost);

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