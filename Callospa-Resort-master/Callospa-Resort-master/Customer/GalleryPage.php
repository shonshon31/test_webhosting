<?php
$title = "Callospa Resort";

$mainHeader = "CALLOSPA";
$subHeader = "Resort";

$mainTitle = "DISCOVER SERENITY AND ELEGANCE";
$subTitle = "Explore our gallery to experience the ultimate in relaxation and luxury. From our beautifully appointed rooms and stunning event spaces to our exceptional amenities, see for yourself why our bed and breakfast retreat is the perfect haven. Reserve your spot and immerse yourself in tranquility today!";

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="GalleryPage.css" />
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

        <section class="gallery-section">
            <div class="text-content">
                <h2>Our Gallery</h2>
                <p>Step into a visual journey through our stunning spaces, where elegance meets serenity. Discover the beauty of our resort through our carefully curated gallery.</p>
            </div>
            <div class="gallery-section-masonry-grid">
                <?php
                $images = ['1.jpg', '1.jpg', '1.jpg', '1.jpg', '1.jpg', '1.jpg'];
                foreach ($images as $image) {
                    echo '<div class="masonry-item"><img src="images/' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '"></div>';
                }
                ?>
            </div>
        </section>

        <section class="rooms-gallery-section">
            <div class="masonry-grid">
                <?php
                $images = ['1.jpg', '1.jpg', '1.jpg', '1.jpg', '1.jpg', '1.jpg'];
                foreach ($images as $image) {
                    echo '<div class="masonry-item"><img src="images/' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '"></div>';
                }
                ?>
            </div>
            <div class="text-content">
                <h2>Feature Rooms</h2>
                <p>Discover our finest accommodations, where luxury and comfort converge. Each room is thoughtfully designed to provide an exceptional experience, tailored to meet your highest expectations.</p>
            </div>
        </section>


        <section class="events-gallery-section">
            <div class="text-content">
                <h2>Events Spaces</h2>
                <p> Host your special occasions in our elegant event spaces, perfectly designed to make every moment unforgettable. From intimate gatherings to grand celebrations, our versatile venues offer the ideal setting for your event.</p>
            </div>
            <div class="masonry-grid">
                <?php
                $images = ['1.jpg', '1.jpg', '1.jpg', '1.jpg', '1.jpg', '1.jpg'];
                foreach ($images as $image) {
                    echo '<div class="masonry-item"><img src="images/' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '"></div>';
                }
                ?>
            </div>
        </section>

        <section class="amenities-gallery-section">
            <div class="masonry-grid">
                <?php
                $images = ['1.jpg', '1.jpg', '1.jpg', '1.jpg', '1.jpg', '1.jpg'];
                foreach ($images as $image) {
                    echo '<div class="masonry-item"><img src="images/' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($image, ENT_QUOTES, 'UTF-8') . '"></div>';
                }
                ?>
            </div>
            <div class="text-content">
                <h2>Our Amenities</h2>
                <p>Discover our exceptional amenities designed to enhance your stay, including luxurious spa services, state-of-the-art fitness facilities, and gourmet dining options.</p>
            </div>
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


    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 5000); // Change image every 5 seconds
        }
    </script>
</body>

</html>