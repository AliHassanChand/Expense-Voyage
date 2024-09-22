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
                    <a href="countrys.php" class="nav-item nav-link ">Destination</a>

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
                        <?php
                        include 'db.php'; // Include your database connection
                        
                        // Initialize variables
                        $country_name = '';
                        $category_name = '';

                        // Check if both country_id and category_id are set in the URL
                        if (isset($_GET['country_id']) && isset($_GET['category_id'])) {
                            $country_id = intval($_GET['country_id']);
                            $category_id = intval($_GET['category_id']);

                            // Prepare SQL query to fetch country name based on country_id
                            $country_query = "SELECT country_name FROM countries WHERE id = :country_id";
                            $country_stmt = $conn->prepare($country_query);
                            $country_stmt->bindParam(':country_id', $country_id, PDO::PARAM_INT);
                            $country_stmt->execute();
                            $country = $country_stmt->fetch(PDO::FETCH_ASSOC);

                            if ($country) {
                                $country_name = htmlspecialchars($country['country_name']);
                            }

                            // Prepare SQL query to fetch category name based on category_id
                            $category_query = "SELECT category_name FROM categories WHERE id = :category_id";
                            $category_stmt = $conn->prepare($category_query);
                            $category_stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
                            $category_stmt->execute();
                            $category = $category_stmt->fetch(PDO::FETCH_ASSOC);

                            if ($category) {
                                $category_name = htmlspecialchars($category['category_name']);
                            }
                        } else {
                            echo "Country or category not selected.";
                        }
                        ?>

                        <!-- HTML Section -->
                        <h1 class="display-3 text-white animated slideInDown"
                            style="font-family: 'Protest Guerrilla', system-ui; font-weight: 400; font-style: normal;">
                            <?php echo $country_name; ?>: <?php echo $category_name; ?>
                        </h1>

                        <nav aria-label=" breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item fs-5 fw-bold"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item fs-5 fw-bold"><a href="countrys.php">Services</a></li>
                                <li class="breadcrumb-item  fs-5 fw-bold text-white active" aria-current="page">
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


    <!-- Package Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <?php
                include 'db.php'; // Include your database connection
                
                // Check if category_id is set in the URL
                if (isset($_GET['category_id'])) {
                    $category_id = intval($_GET['category_id']); // Get the category ID
                
                    // Prepare SQL query to fetch category details based on category_id
                    $query = "SELECT category_name, description FROM categories WHERE id = :category_id";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
                    $stmt->execute();

                    // Fetch category details
                    $category = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($category) {
                        $category_name = htmlspecialchars($category['category_name']);
                        $category_description = htmlspecialchars($category['description']);
                    } else {
                        // Handle case where no category is found
                        $category_name = "Category Not Found";
                        $category_description = "No description available for this category.";
                    }
                } else {
                    echo "No category selected.";
                }
                ?>

                <!-- HTML to display category details -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="section-title bg-white text-center text-primary px-3">
                                <?php echo $category_name; ?> <!-- Display Category Name -->
                            </h6>
                            <h1 class="mb-5">
                                <?php echo $category_description; ?> <!-- Display Category Description -->
                            </h1>
                        </div>
                    </div>
                </div>

            </div>
            <?php
            include 'db2.php'; // Ensure this file initializes $pdo correctly
            
            // Retrieve category_id from GET request or default to 0
            $category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

            $query = "SELECT id, service_name, description, price, duration, destination, facilities, available_class_type, trip_type, img1, img2, img3, img4 FROM service_detail WHERE category_id = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$category_id]);

            // Fetch all rows and display them
            $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($services): ?>
                <div class="row g-4 justify-content-center">
                    <?php foreach ($services as $row): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="<?php echo htmlspecialchars($row['img1']); ?>" alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-map-marker-alt text-primary me-2"></i><?php echo htmlspecialchars($row['destination']); ?></small>
                                    <small class="flex-fill text-center border-end py-2"><i
                                            class="fa fa-calendar-alt text-primary me-2"></i><?php echo htmlspecialchars($row['duration']); ?></small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>2
                                        Person</small>
                                </div>
                                <div class="text-center p-4">
                                    <h3 class="mb-0">$<?php echo number_format($row['price'], 2); ?></h3>
                                    <div class="mb-3">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="servicedetail.php?service_id=<?php echo $row['id']; ?>&category_id=<?php echo $category_id; ?>&country_id=<?php echo $country_id; ?>"
                                            class="btn btn-sm btn-primary px-3 border-end"
                                            style="border-radius: 30px 0 0 30px;">Read More</a>
                                        <a href="servicedetail.php?service_id=<?php echo $row['id']; ?>&category_id=<?php echo $category_id; ?>&country_id=<?php echo $country_id; ?>"
                                            class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No services available for this category.</p>
            <?php endif; ?>
    </div>
    <!-- Package End -->


    <!-- Modal Structure -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Service Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>User: <?php echo $_SESSION['name']; ?></h6>
                    <div id="serviceDetails"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    $('.btn-primary').on('click', function() {
        var serviceId = "<?php echo $row['id']; ?>"; // Change as per your logic
        $.ajax({
            url: 'fetch_service_details.php', // PHP file to fetch data
            type: 'GET',
            data: { service_id: serviceId },
            success: function(data) {
                $('#serviceDetails').html(data);
            },
            error: function() {
                $('#serviceDetails').html('<p>Error fetching details.</p>');
            }
        });
    });
});
</script>

    <!-- Booking Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase">More Info</h6>
                        <h1 class="text-white mb-4">Contact Us</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                            diam et eos. Clita erat ipsum et lorem et sit.</p>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                            diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna
                            dolore erat amet</p>
                        <a class="btn btn-outline-light py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Fill The Form</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="name"
                                            placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-transparent" id="email"
                                            placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control bg-transparent datetimepicker-input"
                                            id="datetime" placeholder="Date & Time" data-target="#date3"
                                            data-toggle="datetimepicker" />
                                        <label for="datetime">Date & Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-transparent" id="select1">
                                            <option value="1">Destination 1</option>
                                            <option value="2">Destination 2</option>
                                            <option value="3">Destination 3</option>
                                        </select>
                                        <label for="select1">Destination</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-transparent" placeholder="Special Request"
                                            id="message" style="height: 100px"></textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-light w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking Start -->


    <!-- Process Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Process</h6>
                <h1 class="mb-5">3 Easy Steps</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-danger rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px;">
                            <i class="fa fas fa-location-arrow fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Choose A Location</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum
                            et lorem et sit sed stet lorem sit</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-danger rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px;">
                            <i class="fa fa-dollar-sign fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Pay Online</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum
                            et lorem et sit sed stet lorem sit</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-danger rounded-circle position-absolute top-0 start-50 translate-middle shadow"
                            style="width: 100px; height: 100px;">
                            <i class="fa fa-plane fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4">Enjoy Event</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <p class="mb-0">Tempor erat elitr rebum clita dolor diam ipsum sit diam amet diam eos erat ipsum
                            et lorem et sit sed stet lorem sit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Start -->


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