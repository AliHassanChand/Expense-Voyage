<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expense Voyage - Services</title>
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
                    <?php
                    // Include your PDO database connection file
                    include('db.php'); // Adjust the path to your DB configuration
                    
                    // Get the country ID from the URL
                    $country_id = isset($_GET['country_id']) ? intval($_GET['country_id']) : 0;

                    // Initialize the country name variable
                    $country_name = '';

                    if ($country_id > 0) {
                        try {
                            // Prepare a PDO statement to fetch the country name
                            $query = "SELECT country_name FROM countries WHERE id = :id";
                            $stmt = $conn->prepare($query);
                            // Bind the country ID parameter
                            $stmt->bindParam(':id', $country_id, PDO::PARAM_INT);
                            // Execute the statement
                            $stmt->execute();

                            // Fetch the country name
                            if ($stmt->rowCount() > 0) {
                                $country_name = $stmt->fetchColumn();
                            } else {
                                $country_name = 'Unknown Country'; // Default name if country ID is not found
                            }
                        } catch (PDOException $e) {
                            die("ERROR: Could not execute query: " . $e->getMessage());
                        }
                    } else {
                        $country_name = 'Unknown Country'; // Default if no valid ID is passed
                    }
                    ?>

                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown text-uppercase" style="font-family: 'Protest Guerrilla', system-ui;
    font-weight: 400;
    font-style: normal;">Services In <?php echo htmlspecialchars($country_name); ?> </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item fs-5 fw-bold"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item fs-5 fw-bold"><a href="countrys.php">Destination</a></li>
                                <li class="breadcrumb-item fs-5 fw-bold text-white active" aria-current="page">Services
                                </li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Service Start -->
    <?php
    include 'db.php'; // Include your database connection
    
    // Check if country_id is set in the URL
    if (isset($_GET['country_id'])) {
        $country_id = intval($_GET['country_id']); // Get the country ID
    
        // Prepare SQL query to fetch services based on country_id
        $query = "SELECT * FROM categories WHERE country_id = :country_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':country_id', $country_id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch services
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "No country selected.";
    }
    ?>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
                <h1 class="mb-2">Our Services</h1>
                <p class="mb-5">At Expense Voyage, we are committed to crafting unforgettable travel experiences
                    tailored to your desires...</p>
            </div>

            <div class="row g-4">
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service): ?>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded pt-3">
                                <div class="p-4">
                                    <a href="sdetails.php?country_id=<?php echo htmlspecialchars($country_id); ?>&category_id=<?php echo htmlspecialchars($service['id']); ?>"
                                        class="text-decoration-none">
                                        <i class="<?php echo htmlspecialchars($service['icon']); ?> text-primary mb-4"></i>
                                        <h5><?php echo htmlspecialchars($service['category_name']); ?></h5>
                                        <p style="color: #888;"><?php echo htmlspecialchars($service['description']); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No services available for this country.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <!-- Service End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">What Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-1.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Alice Johnson</h5>
                    <p>San Francisco, USA</p>
                    <p class="mb-0">"The event was absolutely perfect! Everything was organized to the highest standard
                        and our guests were thrilled. Highly recommend!"</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-2.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Mark Smith</h5>
                    <p>London, UK</p>
                    <p class="mt-2 mb-0">"Amazing service from start to finish. The team took care of every detail and
                        made sure our event went off without a hitch. Thanks for making our day special!"</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-3.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Sophia Lee</h5>
                    <p>Toronto, Canada</p>
                    <p class="mt-2 mb-0">"From the planning stages to the execution, everything was handled with
                        professionalism and care. The event was a huge success thanks to this fantastic team!"</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-4.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Liam Brown</h5>
                    <p>Sydney, Australia</p>
                    <p class="mt-2 mb-0">"An exceptional experience! The event exceeded all our expectations. The
                        attention to detail and creativity were outstanding. Would definitely use their services again!"
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->



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