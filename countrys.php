<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expense Voyage - Destinations</title>
</head>

<?php
include 'head.php';
?>

<body>
    <!-- Spiner & Topbar Start -->
    <?php
    include 'topbar.php';
    ?>
    <!-- Spiner & Topbar Start -->


    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0" style="display: flex; align-items: center;">
                <img src="img\logo-1.png" alt="">
                <h1 class="m-0"> Expenses Voyage</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="countrys.php" class="nav-item nav-link active">Destination</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Trips</a>
                        <div class="dropdown-menu m-0">
                            <a href="countrys.php" class="dropdown-item">Individual</a>
                            <a href="combine.php" class="dropdown-item">Package</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="team.php" class="nav-link nav-item">Our Guides</a>
                </div>

                <!-- Profile dropdown -->
                <?php if (isset($_SESSION['name'])): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle btn btn-primary rounded-pill py-2 px-4"
                            data-bs-toggle="dropdown">
                            <?php echo "Welcome, " . $_SESSION['name']; ?>
                        </a>
                        <div class="dropdown-menu m-0">
                            <a href="profile.php" class="dropdown-item">Profile</a>
                            <a href="logout.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="login/account.php" class="btn btn-primary rounded-pill py-2 px-4">Login / Register</a>
                <?php endif; ?>
            </div>

        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown text-uppercase" style="font-family: 'Protest Guerrilla', system-ui;
                        font-weight: 400;
                        font-style: normal;">Destinations</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item fw-bold fs-5"><a href="#">Home</a></li>
                                <li class="breadcrumb-item text-white active fw-bold fs-5" aria-current="page">
                                    Destination</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Destination Start -->
    <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
                <h1 class="mb-5">Popular Destination</h1>
            </div>
            <?php
            include 'db.php'; // Include your database connection
            
            // Fetch countries
            $query = "SELECT * FROM countries";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $countries = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>

            <div class="row g-3">
                <div class="col-lg-12 col-md-12">
                    <div class="row g-3">
                        <?php foreach ($countries as $country): ?>
                            <div class="col-lg-12 col-md-4 wow zoomIn" data-wow-delay="0.1s">
                                <a class="position-relative d-block overflow-hidden"
                                    href="services.php?country_id=<?php echo $country['id']; ?>">
                                    <img class="img-fluid" src="<?php echo htmlspecialchars($country['country_image']); ?>"
                                        alt="<?php echo htmlspecialchars($country['country_name']); ?>">
                                    <div class="text-light fw-bold position-absolute top-0 start-0 m-3 py-1 px-2 fs-4">30%
                                        OFF</div>
                                    <div
                                        class="text-light position-absolute bottom-0 end-0 m-3 py-1 px-2 text-uppercase fs-3 country-txt">
                                        <?php echo htmlspecialchars($country['country_name']); ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- Destination Start -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Text Column Only -->
                <div class="col-lg-12 wow fadeInUp text-center" data-wow-delay="0.3s">
                    <h1 class="mb-4">Welcome to <span class="text-primary">Expense Voyage</span></h1>
                    <p class="mb-4">At Expense Voyage, we specialize in creating unforgettable travel experiences across
                        the globe. Our dedicated team is committed to ensuring that every journey, whether a relaxing
                        getaway or an adventurous expedition, is perfectly tailored to your needs. From breathtaking
                        tropical escapes to cultural explorations in vibrant cities, we have the expertise and local
                        connections to make your travels extraordinary. Explore our diverse offerings and let us help
                        you embark on memorable adventures to some of the world’s most exciting destinations.</p>
                    <p class="mb-4">
                        What We Provide:
                    </p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Customized Travel
                                Itineraries</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Exotic Destination
                                Packages</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Adventure and Eco Tours
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Cultural Immersion
                                Experiences</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Luxury Travel Options</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Travel Support</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Process</h6>
                <h1 class="mb-5">3 Simple Steps</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px; background-color: #704924;">
                            <i class="fa fa-map fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Select Your Destination</h5>
                        <hr class="w-25 mx-auto bg-danger mb-1">
                        <hr class="w-50 mx-auto bg-danger mt-0">
                        <p class="mb-0">Browse our exclusive selection of destinations and choose the one that captures
                            your imagination.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px; background-color: #704924;">
                            <i class="fa fa-check-circle fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Confirm Your Booking</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Complete your booking through our secure platform to ensure your adventure is
                            set.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px; background-color: #704924;">
                            <i class="fa fa-suitcase fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Embark on Your Journey</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Relax and enjoy your travels as we take care of all the details for an
                            unforgettable experience.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process End -->




    <!-- Footer Start -->
    <?php include 'footer.php'; ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>

</html>