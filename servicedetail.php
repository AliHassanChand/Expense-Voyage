<?php
session_start();
include 'db.php'; // Database connection
include 'db2.php'; // Database connection for service details

// Initialize variables
$country_name = '';
$category_name = '';
$service_name = '';

// Check if country_id, category_id, and service_id are set in the URL
if (isset($_GET['country_id'], $_GET['category_id'], $_GET['service_id'])) {
    $country_id = intval($_GET['country_id']);
    $category_id = intval($_GET['category_id']);
    $service_id = intval($_GET['service_id']);

    // Fetch country name
    $country_query = "SELECT country_name FROM countries WHERE id = :country_id";
    $country_stmt = $conn->prepare($country_query);
    $country_stmt->bindParam(':country_id', $country_id, PDO::PARAM_INT);
    $country_stmt->execute();
    $country = $country_stmt->fetch(PDO::FETCH_ASSOC);
    $country_name = $country ? htmlspecialchars($country['country_name']) : '';

    // Fetch category name
    $category_query = "SELECT category_name FROM categories WHERE id = :category_id";
    $category_stmt = $conn->prepare($category_query);
    $category_stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $category_stmt->execute();
    $category = $category_stmt->fetch(PDO::FETCH_ASSOC);
    $category_name = $category ? htmlspecialchars($category['category_name']) : '';

    // Fetch service name
    $service_query = "SELECT service_name FROM service_detail WHERE id = :service_id";
    $service_stmt = $conn->prepare($service_query);
    $service_stmt->bindParam(':service_id', $service_id, PDO::PARAM_INT);
    $service_stmt->execute();
    $service = $service_stmt->fetch(PDO::FETCH_ASSOC);
    $service_name = $service ? htmlspecialchars($service['service_name']) : '';
} else {
    echo "Country, category, or service not selected.";
    exit; // Stop further processing if required parameters are missing
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = ''; // Or handle the case where the user is not logged in
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php' ?>

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
                    <a href="index.php" class="nav-item nav-link ">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="countrys.php" class="nav-item nav-link">Destination</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Trips</a>
                        <div class="dropdown-menu m-0">
                            <a href="countrys.php" class="dropdown-item active">Individual</a>
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
                        <h1 class="display-3 text-white animated slideInDown"
                            style="font-family: 'Protest Guerrilla', system-ui; font-weight: 400; font-style: normal;">
                            <?php echo $country_name; ?>: <?php echo $category_name; ?> <br>
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
    // Fetch service details
    $query = "SELECT * FROM service_detail WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$service_id]);
    $service = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($service): ?>
        <!-- Package Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0">
                    <!-- Large Picture at the Top -->
                    <div class="col-12 mb-4">
                        <img class="img-fluid w-100" src="<?php echo htmlspecialchars($service['img1']); ?>"
                            alt="<?php echo htmlspecialchars($service['service_name']); ?>"
                            style="object-fit: cover; height: 400px; width: 100%;">
                    </div>
                </div>
                <div class="row g-4 mb-4">

                    <!-- Additional Pictures in a Row -->
                    <div class="col-md-4 mb-4">
                        <img class="img-fluid w-100" src="<?php echo htmlspecialchars($service['img2']); ?>" alt="Pic 1"
                            style="object-fit: cover; height: 200px;">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img class="img-fluid w-100" src="<?php echo htmlspecialchars($service['img3']); ?>" alt="Pic 2"
                            style="object-fit: cover; height: 200px;">
                    </div>
                    <div class="col-md-4 mb-4">
                        <img class="img-fluid w-100" src="<?php echo htmlspecialchars($service['img4']); ?>" alt="Pic 3"
                            style="object-fit: cover; height: 200px;">
                    </div>
                </div>
                <div class="row g-5">
                    <!-- Details Section -->
                    <div class="col-lg-12">
                        <h6 class="section-title bg-white text-start text-primary pe-3">Event Voyage comforts you in <u
                                style="color: burlywood;"><i><?php echo htmlspecialchars($service['destination']); ?></i></u>
                        </h6>
                        <h1 class="mb-4">Welcome to <span
                                class="text-primary"><?php echo htmlspecialchars($service['service_name']); ?></span></h1>
                        <p class="mb-4"><?php echo htmlspecialchars($service['description']); ?></p>
                        <p class="mb-4">Price: <strong>PKR <?php echo number_format($service['price']); ?></strong> |
                            Duration: <strong><?php echo htmlspecialchars($service['duration']); ?></strong> </p>
                        <div class="row gy-2 gx-4 mb-4">
                            <?php
                            $facilities = explode(',', $service['facilities']);
                            foreach ($facilities as $facility): ?>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i
                                            class="fa fa-arrow-right text-primary me-2"></i><?php echo htmlspecialchars(trim($facility)); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <a class="btn btn-primary py-3 px-5 mt-2" href="#" data-bs-toggle="modal"
                            data-bs-target="#bookingModal" data-service-id="<?php echo htmlspecialchars($service_id); ?>"
                            data-category-id="<?php echo htmlspecialchars($category_id); ?>"
                            data-country-id="<?php echo htmlspecialchars($country_id); ?>">
                            BOOK NOW
                        </a>



                    </div>
                </div>
            </div>
        </div>
        <!-- Package End -->
    <?php else: ?>
        <p>Service not found.</p>
    <?php endif; ?>
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Booking Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please confirm your booking details:</p>
                <div id="bookingDetails"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmBooking">Confirm Booking</button>
            </div>
        </div>
    </div>
</div>

<script>
const bookingModal = document.getElementById('bookingModal');
bookingModal.addEventListener('show.bs.modal', (event) => {
    const button = event.relatedTarget; // Button that triggered the modal
    const userName = "<?php echo htmlspecialchars($_SESSION['name']); ?>"; // Get user name from session
    const serviceId = button.getAttribute('data-service-id');
    const categoryId = button.getAttribute('data-category-id');
    const countryId = button.getAttribute('data-country-id');

    // Prepare booking details
    const bookingDetails = `
        <strong>User Name:</strong> ${userName}<br>
        <strong>Service ID:</strong> ${serviceId}<br>
        <strong>Category ID:</strong> ${categoryId}<br>
        <strong>Country ID:</strong> ${countryId}<br>
    `;
    document.getElementById('bookingDetails').innerHTML = bookingDetails;

    // Handle confirmation button click
    document.getElementById('confirmBooking').onclick = function () {
        // Make AJAX call to book the trip
        fetch('book_trip.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ 
                userName, 
                serviceId, 
                categoryId, 
                countryId 
            }), // Send all necessary data
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Booking confirmed!');
                window.location.reload(); // Reload the page or redirect
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    };
});
</script>



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