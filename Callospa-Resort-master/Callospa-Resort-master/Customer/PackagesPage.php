<?php
$title = "Callospa Resort";

$mainHeader = "CALLOSPA";
$subHeader = "Resort";

$mainTitle = "EXPLORE OUR PACKAGES";
$subTitle = "Discover our unique packages, each thoughtfully designed to combine comfort and elegance, ensuring a memorable stay.";

$navLinks = [
    "Home" => "HomePage.php",
    "Packages" => "PackagesPage.php",
    "Rooms" => "RoomsPage.php",
    "Events" => "EventsPage.php",
    "Amenities" => "AmenitiesPage.php",
    "Gallery" => "GalleryPage.php",
];

$roomPackages = [
    ["name" => "Couple's Blissful Overnight Package", "image" => "images/1.jpg", "alt" => "Couple's Blissful Overnight Package", "price" => "₱10,000", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Body Scrub, Facial,<br>Hair Spa, Signature Massage<br><br>Couples Dinner<br>1 Bottle of Red Wine<br>Couples Breakfast<br>Petals on Bed<br><br>Complementary: Free Use of Swimming Pool"],
    ["name" => "Couple's Overnight Package", "image" => "images/1.jpg", "alt" => "Couple's Overnight Package", "price" => "₱6,500", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Dinner<br>Couples Breakfast<br><br>Complementary: Free Use of Swimming Pool"],
    ["name" => "Couple's Day Sanctuary Package", "image" => "images/1.jpg", "alt" => "Couple's Day Sanctuary Package", "price" => "₱5,800", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool"],
];

$eventPackages = [
    ["name" => "Day Resort Grounds Exclusive", "image" => "images/1.jpg", "alt" => "Day Resort Grounds Exclusive", "price" => "₱10,000", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Body Scrub, Facial,<br>Hair Spa, Signature Massage<br><br>Couples Dinner<br>1 Bottle of Red Wine<br>Couples Breakfast<br>Petals on Bed<br><br>Complementary: Free Use of Swimming Pool"],
    ["name" => "1 Day with Reception Hall", "image" => "images/1.jpg", "alt" => "1 Day with Reception Hall", "price" => "₱6,500", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Dinner<br>Couples Breakfast<br><br>Complementary: Free Use of Swimming Pool"],
    ["name" => "1 Day with Conference Room", "image" => "images/1.jpg", "alt" => "1 Day with Conference Room", "price" => "₱5,800", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool"],
    ["name" => "Night Resort Grounds Exclusive", "image" => "images/1.jpg", "alt" => "Night Resort Grounds Exclusive", "price" => "₱10,000", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Body Scrub, Facial,<br>Hair Spa, Signature Massage<br><br>Couples Dinner<br>1 Bottle of Red Wine<br>Couples Breakfast<br>Petals on Bed<br><br>Complementary: Free Use of Swimming Pool"],
    ["name" => "24 Hour with Reception Hall", "image" => "images/1.jpg", "alt" => "24 Hour with Reception Hall", "price" => "₱6,500", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Dinner<br>Couples Breakfast<br><br>Complementary: Free Use of Swimming Pool"],
    ["name" => "24 Hour with Conference Room", "image" => "images/1.jpg", "alt" => "24 Hour with Conference Room", "price" => "₱5,800", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool"],
];

$spaPackages = [
    ["name" => "Couple's Blissful Overnight Package", "image" => "images/1.jpg", "alt" => "Couple's Blissful Overnight Package", "price" => "₱10,000", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Body Scrub, Facial,<br>Hair Spa, Signature Massage<br><br>Couples Dinner<br>1 Bottle of Red Wine<br>Couples Breakfast<br>Petals on Bed<br><br>Complementary: Free Use of Swimming Pool"],
    ["name" => "Couple's Overnight Package", "image" => "images/1.jpg", "alt" => "Couple's Overnight Package", "price" => "₱6,500", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Dinner<br>Couples Breakfast<br><br>Complementary: Free Use of Swimming Pool"],
    ["name" => "Couple's Day Sanctuary Package", "image" => "images/1.jpg", "alt" => "Couple's Day Sanctuary Package", "price" => "₱5,800", "description" => "Inclusions:<br>Couple's Suite<br><br>Spa Services:<br>Sauna, Jacuzzi, Signature Massage<br><br>Couples Lunch<br><br>Complementary: Free Use of Swimming Pool"],
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
    <link rel="stylesheet" href="PackagesPage.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                    <?php foreach ($navLinks as $name => $link): ?>
                        <li>
                            <a href="<?php echo htmlspecialchars($link, ENT_QUOTES, 'UTF-8'); ?>"
                                class="<?php echo basename($_SERVER['PHP_SELF']) == basename($link) ? 'active' : ''; ?>">
                                <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </li>
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

        <div class="sections-wrapper">
            <section id="packages" class="section">
                <h2 class="section-title">Room Packages</h2>
                <p class="section-subtitle">Browse our exclusive packages, each crafted to deliver a unique blend of comfort and style, making your stay truly unforgettable.</p>
                <div class="packages-list">
                    <?php foreach ($roomPackages as $package): ?>
                        <article class="package">
                            <img class="package-image" src="<?php echo htmlspecialchars($package['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($package['alt'], ENT_QUOTES, 'UTF-8'); ?>" />
                            <h3 class="package-name"><?php echo htmlspecialchars($package['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <p class="package-price"><?php echo htmlspecialchars($package['price'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="package-description"><?php echo $package['description']; ?></p>
                            <button type="button" onclick="location.href='PackagesReservationForm.php'">Book Now</button>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>

        <div class="sections-wrapper">
            <section id="packages" class="section">
                <h2 class="section-title">Event Packages</h2>
                <p class="section-subtitle">Browse our exclusive packages, each crafted to deliver a unique blend of comfort and style, making your stay truly unforgettable.</p>
                <div class="packages-list">
                    <?php foreach ($eventPackages as $package): ?>
                        <article class="package">
                            <img class="package-image" src="<?php echo htmlspecialchars($package['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($package['alt'], ENT_QUOTES, 'UTF-8'); ?>" />
                            <h3 class="package-name"><?php echo htmlspecialchars($package['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <p class="package-price"><?php echo htmlspecialchars($package['price'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="package-description"><?php echo $package['description']; ?></p>
                            <button type="button" onclick="location.href='PackagesReservationForm.php'">Book Now</button>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>

        <div class="sections-wrapper">
            <section id="packages" class="section">
                <h2 class="section-title">Spa Packages</h2>
                <p class="section-subtitle">Browse our exclusive packages, each crafted to deliver a unique blend of comfort and style, making your stay truly unforgettable.</p>
                <div class="packages-list">
                    <?php foreach ($spaPackages as $package): ?>
                        <article class="package">
                            <img class="package-image" src="<?php echo htmlspecialchars($package['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($package['alt'], ENT_QUOTES, 'UTF-8'); ?>" />
                            <h3 class="package-name"><?php echo htmlspecialchars($package['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                            <p class="package-price"><?php echo htmlspecialchars($package['price'], ENT_QUOTES, 'UTF-8'); ?></p>
                            <p class="package-description"><?php echo $package['description']; ?></p>
                            <button type="button" onclick="location.href='PackagesReservationForm.php'">Book Now</button>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
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