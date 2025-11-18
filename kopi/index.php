<?php
// Connect to MySQL
$mysqli = new mysqli("localhost", "root", "", "kopi_shop");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch hot coffees
$hot_coffees = $mysqli->query("SELECT * FROM menu WHERE category='hot'");

// Fetch cold coffees
$cold_coffees = $mysqli->query("SELECT * FROM menu WHERE category='cold'");
// Fetch pastries
$pastries = $mysqli->query("SELECT * FROM menu WHERE category='pastry'");
// Fetch salads
$salad = $mysqli->query("SELECT * FROM menu WHERE category='salad'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KOPI</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.php" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">kopi</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="service.html" class="nav-item nav-link">Service</a>
                    <a href="menu.php" class="nav-item nav-link">Menu</a>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="coffee-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Experience Exquisite Aromas</h2>
                        <h1 class="display-1 text-white m-0">Crafted with Passion</h1>
                        <h2 class="text-white m-0">* Since 1950 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Indulge in Authentic Flavors</h2>
                        <h1 class="display-1 text-white m-0">From Finest Beans</h1>
                        <h2 class="text-white m-0">* Since 1950 *</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#coffee-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#coffee-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Discover Our Coffee Journey</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Story</h1>
                    <h5 class="mb-3">Crafting Excellence Since 1950</h5>
                    <p>From the heart of our roastery to your cup, our journey began in 1950 with a passion for delivering unparalleled coffee experiences. Over the decades, we've refined our craft, sourcing the finest beans and perfecting our roasting process to bring out the rich flavors and aromas in every cup. Today, our legacy continues as we remain dedicated to providing exceptional coffee moments for generations to come.</p>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.png" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Vision</h1>
                    <p>At our core, we're dedicated to sourcing the finest beans while championing sustainability and ethical practices. We envision a future where every cup of coffee not only delights the senses but also contributes positively to the environment and communities. From supporting fair trade initiatives to minimizing our carbon footprint, we strive to lead by example in the coffee industry, ensuring a brighter and more sustainable future for all.</p>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Quality Assurance</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Ethical Sourcing</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Environmental Sustainability</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Service Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Services</h4>
                <h1 class="display-4">Premium Coffee Experience</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-1.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-chart-line service-icon"></i>Increased Productivity</h4>
                            <p class="m-0">Boost your productivity with our premium coffee beans. Experience heightened focus and energy levels to tackle your day with vigor.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-2.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-coffee service-icon"></i>Fresh Coffee Beans</h4>
                            <p class="m-0">Indulge in the rich aroma and flavor of freshly roasted coffee beans. Sourced from the finest coffee regions, our beans are carefully selected to ensure exceptional quality and taste in every cup.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-3.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-award service-icon"></i>Best Quality Coffee</h4>
                            <p class="m-0">Experience coffee perfection with our commitment to quality. From bean to cup, we prioritize excellence, ensuring that each sip of our coffee delivers unparalleled taste and satisfaction.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="img/service-4.jpg" alt="">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-suitcase service-icon"></i>Flexible Workplace</h4>
                            <p class="m-0">Create a cozy environment with our delicious coffee blends. Whether you're relaxing at home or in your office, savor the rich taste and aroma of our carefully crafted beverages.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

<!-- Menu Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
            <h1 class="display-4">Explore Our lovely Menu</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h1 class="mb-5">Hot Coffee</h1>
                <?php while ($row = $hot_coffees->fetch_assoc()): ?>
                <div class="row align-items-center mb-5">
                    <div class="col-8 col-sm-9">
                        <h4><?php echo $row['name']; ?></h4>
                        <p class="m-0"><?php echo $row['description']; ?></p>
                    </div>
                    <div class="col-4 col-sm-3 position-relative">
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php echo $row['image']; ?>" alt="">
                        <h5 class="menu-price" style="position: absolute; top: 10px; right: 10px;">$<?php echo $row['price']; ?></h5>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="col-lg-6">
                <h1 class="mb-5">Cold Coffee</h1>
                <?php while ($row = $cold_coffees->fetch_assoc()): ?>
                <div class="row align-items-center mb-5">
                    <div class="col-8 col-sm-9">
                        <h4><?php echo $row['name']; ?></h4>
                        <p class="m-0"><?php echo $row['description']; ?></p>
                    </div>
                    <div class="col-4 col-sm-3 position-relative">
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php echo $row['image']; ?>" alt="">
                        <h5 class="menu-price" style="position: absolute; top: 10px; right: 10px;">$<?php echo $row['price']; ?></h5>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="col-lg-6">
    <h1 class="mb-5">Pastry</h1>
    <?php while ($row = $pastries->fetch_assoc()): ?>
    <div class="row align-items-center mb-5">
        <div class="col-8 col-sm-9">
            <h4><?php echo $row['name']; ?></h4>
            <p class="m-0"><?php echo $row['description']; ?></p>
        </div>
        <div class="col-4 col-sm-3 position-relative">
            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php echo $row['image']; ?>" alt="">
            <h5 class="menu-price" style="position: absolute; top: 10px; right: 10px;">$<?php echo $row['price']; ?></h5>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<div class="col-lg-6">
    <h1 class="mb-5">Salad</h1>
    <?php while ($row = $salad->fetch_assoc()): ?>
    <div class="row align-items-center mb-5">
        <div class="col-8 col-sm-9">
            <h4><?php echo $row['name']; ?></h4>
            <p class="m-0"><?php echo $row['description']; ?></p>
        </div>
        <div class="col-4 col-sm-3 position-relative">
            <img class="w-100 rounded-circle mb-3 mb-sm-0" src="<?php echo $row['image']; ?>" alt="">
            <h5 class="menu-price" style="position: absolute; top: 10px; right: 10px;">$<?php echo $row['price']; ?></h5>
        </div>
    </div>
    <?php endwhile; ?>
</div>

        </div>
    </div>
</div>
<!-- Menu End -->



    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h4>
                <h1 class="display-4">Our Clients Say</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-1.jpg" alt="Client 1">
                        <div class="ml-3">
                            <h4>Althea Benedictos</h4>
                            <i>CEO, Company ABC</i>
                        </div>
                    </div>
                    <p class="m-0">We had a wonderful experience at the restaurant. The atmosphere was cozy, and the food was delicious. Highly recommended!</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-2.jpg" alt="Client 2">
                        <div class="ml-3">
                            <h4>Darell Gatchalian</h4>
                            <i>Project Manager</i>
                        </div>
                    </div>
                    <p class="m-0">The service was excellent, and the staff was very friendly. I'll definitely be coming back for more!</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-3.jpg" alt="Client 3">
                        <div class="ml-3">
                            <h4>Shane Enriquez</h4>
                            <i>Flight Attentant</i>
                        </div>
                    </div>
                    <p class="m-0">I've been a regular customer for years now, and the quality of service and food has never disappointed me.</p>
                </div>
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="img/testimonial-4.jpg" alt="Client 4">
                        <div class="ml-3">
                            <h4>Alex Atayde</h4>
                            <i>Flight Attendant</i>
                        </div>
                    </div>
                    <p class="m-0">The restaurant has a great ambiance, perfect for a casual hangout or a special occasion. I'm impressed!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
        <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Get In Touch</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Poblacion, Calumpit, Bulacan</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+639952606183</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>axeldelgado.business@gmail.com</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Follow Us</h4>
                <p>Stay connected with us on social media for the latest updates and promotions.</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Open Hours</h4>
                <div>
                    <h6 class="text-white text-uppercase">Monday - Friday</h6>
                    <p>8.00 AM - 8.00 PM</p>
                    <h6 class="text-white text-uppercase">Saturday - Sunday</h6>
                    <p>2.00 PM - 8.00 PM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Menu</h4>
                <p>Explore our delicious menu offerings to satisfy your coffee cravings.</p>
                <a href="menu.php" class="btn btn-primary btn-lg font-weight-bold">View Menu</a>
            </div>
        </div>
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">KOPI</a>. All Rights Reserved.</a>
            </p>
            <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="#">Group of Axel Delgado</a></p>
        </div>
    </div>
    <!-- Footer End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>