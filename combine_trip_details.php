<?php
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expense Voyage - Home</title>
</head>

<?php
include 'head.php';
?>

<body>
    <!-- Spinner Start -->
   <?php include 'topbar.php'; ?>
    <!-- Spinner End -->


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
                    <a href="countrys.php" class="nav-item nav-link">Destination</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Trips</a>
                        <div class="dropdown-menu m-0">
                            <a href="countrys.php" class="dropdown-item">Individual</a>
                            <a href="combine.php" class="dropdown-item active">Package</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="team.php" class="nav-link nav-item">Our Guides</a>
                </div>

                <!-- Profile dropdown -->
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
                        <?php
                        include 'db.php'; // Include your database connection
                        
                        // Initialize variables
                        $country_name = 'Unknown Country'; // Default value if not found
                        $category_name = 'Adventure'; // Dummy category name
                        $service_name = 'Guided Tours'; // Dummy service name
                        
                        // Check if country_id is set in the URL
                        if (isset($_GET['country_id'])) {
                            $country_id = intval($_GET['country_id']);

                            // Prepare SQL query to fetch country name based on country_id
                            $country_query = "SELECT country_name FROM countries WHERE id = :country_id";
                            $country_stmt = $conn->prepare($country_query);
                            $country_stmt->bindParam(':country_id', $country_id, PDO::PARAM_INT);
                            $country_stmt->execute();
                            $country = $country_stmt->fetch(PDO::FETCH_ASSOC);

                            if ($country) {
                                $country_name = htmlspecialchars($country['country_name']);
                            } else {
                                echo "<p class='text-warning'>Country not found.</p>";
                            }
                        } else {
                            echo "<p class='text-warning'>Country not selected.</p>";
                        }
                        ?>

                        <!-- HTML Section -->
                        <h1 class="display-3 text-white animated slideInDown"
                            style="font-family: 'Protest Guerrilla', system-ui; font-weight: 400; font-style: normal;">
                            <?php echo $country_name; ?>:
                            <?php echo $category_name; ?> <br>
                            <?php echo $service_name; ?>
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Services</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">
                                    <?php echo $category_name; ?>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Navbar & Hero End -->


    <?php
    include 'db2.php'; // Ensure this file initializes $pdo correctly
    
    // Retrieve the trip ID from the URL parameter
    $trip_id = isset($_GET['trip_id']) ? intval($_GET['trip_id']) : 0;

    // Query to fetch the trip data from the combine_trips table
    $query = "SELECT * FROM combine_trips WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$trip_id]);

    $trip = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($trip): ?>
        <!-- Package Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0">
                    <!-- Large Picture at the Top -->
                    <div class="col-12 mb-4">
                        <img class="img-fluid w-100" src="<?php echo htmlspecialchars($trip['destination_img']); ?>"
                            alt="<?php echo htmlspecialchars($trip['destination']); ?>"
                            style="object-fit: cover; height: 400px;">
                    </div>
                </div>
                <div class="row g-4 mb-4">
                    <!-- Details Section -->
                    <div class="col-lg-12">
                        <h6 class="section-title bg-white text-start text-primary pe-3">
                            Explore the beauty of <u
                                style="color: burlywood;"><i><?php echo htmlspecialchars($trip['destination']); ?></i></u>
                        </h6>
                        <h1 class="mb-4">Welcome to your trip to <span
                                class="text-primary"><?php echo htmlspecialchars($trip['destination']); ?></span></h1>
                        <div class="trip-details">
                            <p class="mb-4"><strong>Country:</strong> <?php echo htmlspecialchars($trip['country']); ?></p>
                            <p class="mb-4"><strong>Departure Date:</strong>
                                <?php echo htmlspecialchars($trip['departure_date']); ?></p>
                            <p class="mb-4"><strong>Departure City:</strong>
                                <?php echo htmlspecialchars($trip['departure_city']); ?></p>
                            <p class="mb-4"><strong>Stops:</strong> <?php echo htmlspecialchars($trip['stops']); ?></p>
                            <p class="mb-4"><strong>Hotels:</strong> <?php echo htmlspecialchars($trip['hotels']); ?></p>
                            <p class="mb-4"><strong>Transportation Mode:</strong>
                                <?php echo htmlspecialchars($trip['transportation_mode']); ?></p>
                            <p class="mb-4"><strong>Duration:</strong>
                                <?php echo htmlspecialchars($trip['duration_days']); ?> days</p>
                            <p class="mb-4"><strong>Budget:</strong> PKR <?php echo number_format($trip['budget']); ?></p>
                            <p class="mb-4"><strong>Itinerary:</strong>
                                <?php echo nl2br(htmlspecialchars($trip['itinerary'])); ?></p>
                        </div>

                        <h6 class="section-title bg-white text-start text-primary pe-3 mt-4">Facilities</h6>
                        <div class="row gy-2 gx-4 mb-4">
                            <?php
                            $facilities = explode(',', $trip['facilities']);
                            foreach ($facilities as $facility): ?>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i
                                            class="fa fa-check text-success me-2"></i><?php echo htmlspecialchars(trim($facility)); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="text-center mt-4">
                            <a class="btn btn-primary py-3 px-5" href="booking.php?trip_id=<?php echo $trip['id']; ?>">Book
                                Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Package End -->
    <?php else: ?>
        <p class="text-danger">Trip not found.</p>
    <?php endif; ?>



    <!-- Team Start -->


     <!-- Team Start -->
     <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Tour Guide</h6>
                <h1 class="mb-5">Meet Our Team</h1>
            </div>
            <?php
            // Include database connection
            include 'db.php';

            // Fetch team members from database
            $sql = "SELECT full_name, designation, image_url, facebook_url, twitter_url, instagram_url FROM team";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $teamMembers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <div class="row g-4">
                <?php
                if (!empty($teamMembers)) {
                    // Loop through each team member and display their details
                    foreach ($teamMembers as $row) {
                ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid team_img" src="<?php echo htmlspecialchars($row['image_url']); ?>"
                                        height="" alt="">
                                </div>
                                <div class="position-relative d-flex justify-content-center" style="margin-top: -19px;">
                                    <a class="btn btn-square mx-1"
                                        href="<?php echo htmlspecialchars($row['facebook_url']); ?>"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square mx-1"
                                        href="<?php echo htmlspecialchars($row['twitter_url']); ?>"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square mx-1"
                                        href="<?php echo htmlspecialchars($row['instagram_url']); ?>"><i
                                            class="fab fa-instagram"></i></a>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="mb-0">
                                        <?php echo htmlspecialchars($row['full_name']); ?>
                                    </h5>
                                    <small>
                                        <?php echo htmlspecialchars($row['designation']); ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No team members found.";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Team End -->
    <!-- Team End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Company</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/package-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>