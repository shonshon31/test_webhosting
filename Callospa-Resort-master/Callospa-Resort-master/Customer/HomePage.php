<?php
$title = "Callospa Resort";

$mainHeader = "CALLOSPA";
$subHeader = "Resort";

$mainTitle = "ESCAPE TO SERENITY";
$subTitle = "Unwind in the embrace of tranquility. Experience the ultimate retreat at our exclusive bed and breakfast, where every moment is meticulously crafted for your relaxation. Reserve your stay today and embark on your journey to peace and rejuvenation.";

$navLinks = [
    "Home" => "HomePage.php",
    "Packages" => "PackagesPage.php",
    "Rooms" => "RoomsPage.php",
    "Events" => "EventsPage.php",
    "Amenities" => "AmenitiesPage.php",
    "Gallery" => "GalleryPage.php",
];

$sections = [
    [
        "id" => "packages",
        "title" => "Special Packages",
        "content" => "Explore various packages that fit your budget perfectly.",
        "cta" => '<button type="button" class="cta" onclick="location.href=\'PackagesPage.php\'">Book Your Stay</button>',
        "image" => "images/1.jpg"
    ],
    [
        "id" => "rooms",
        "title" => "Cozy Accommodations",
        "content" => "Discover our collection of cozy rooms and suites, thoughtfully designed to offer each guest a truly unique and unforgettable stay.",
        "cta" => '<button type="button" class="cta" onclick="location.href=\'RoomsPage.php\'">Book Your Stay</button>',
        "image" => "images/1.jpg"
    ],
    [
        "id" => "events",
        "title" => "Memorable Events",
        "content" => "Host your special occasions in our versatile event spaces, ideal for everything from intimate gatherings to grand celebrations.",
        "cta" => '<button type="button" class="cta" onclick="location.href=\'EventsPage.php\'">Plan Your Event</button>',
        "image" => "images/1.jpg"
    ],
    [
        "id" => "amenities",
        "title" => "Exceptional Amenities",
        "content" => "Experience unparalleled relaxation and comfort with our exceptional amenities, designed to offer you the ultimate in tranquility and rejuvenation.",
        "cta" => '<button type="button" class="cta" onclick="location.href=\'AmenitiesPage.php\'">Explore Our Amenities</button>',
        "image" => "images/1.jpg"
    ]
];

$contactInfo = [
    "name" => "Callospa Resort",
    "email" => "callos.realty.leasing@gmail.com",
    "address" => "H599+3GF, Marigman Rd, Antipolo, 1870, Rizal",
    "phone" => "(+63)9178243715 / (+63)983560798"
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="HomePage.css" />
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
                                class="<?php echo basename($_SERVER['PHP_SELF']) == $link ? 'active' : ''; ?>">
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
            <?php foreach ($sections as $section): ?>
                <section id="<?php echo htmlspecialchars($section['id'], ENT_QUOTES, 'UTF-8'); ?>" class="selection">
                    <img src="<?php echo htmlspecialchars($section['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8'); ?>" class="section-image" />
                    <h2><?php echo htmlspecialchars($section['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <p><?php echo htmlspecialchars($section['content'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><?php echo $section['cta']; ?></p>
                </section>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="contact-info">
                <h3>Contact Us</h3>
                <div class="footer-icons">
                    <a href="https://www.facebook.com/profile.php?id=100064383150064" target="_blank" class="footer-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="viber://chat?number=639178334351" target="_blank" class="footer-icon"><i class="fab fa-viber"></i></a>
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