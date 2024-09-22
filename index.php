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
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="countrys.php" class="nav-item nav-link">Destination</a>

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
                    <div class="col-lg-11 pt-lg-5 mt-lg-5 text-center ">
                        <h1 class="display-3 text-white mb-3 animated slideInDown" style="font-family: 'Protest Guerrilla', sans-serif; font-weight: 400;
                        font-style: normal;
                      text-transform: uppercase;background: linear-gradient(to bottom, #fff 20%, #fff 83%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Create Unforgettable Memories With <span style="background: linear-gradient(to bottom, #704924 20%, #704924 83%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;">Expenses Voyage</span>
                        </h1>
                        <p class="fs-4 text-white mb-4 animated slideInDown">Bringing your vision to life with expert
                            planning and flawless execution</p>
                        <div class="position-relative w-75 mx-auto animated slideInDown">
                            <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Eg: Corporate Conference">
                            <button type="button"
                                class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2"
                                style="margin-top: 7px;">Find Out More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->



    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100"
                            src="https://i.pinimg.com/736x/c8/28/51/c8285195e37daec951e4c68803b7a13e.jpg" alt=""
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary">Expense Voyage</span></h1>
                    <p class="mb-4">At Expense Voyage, we turn your travel dreams into unforgettable experiences. Our
                        dedicated team of travel experts is committed to crafting personalized itineraries that cater to
                        your unique preferences and desires.</p>
                    <p class="mb-4">From exotic getaways to adventurous road trips, we handle every detail with care and
                        creativity. Trust us to navigate your travel journey, ensuring a seamless and enjoyable
                        experience from start to finish.</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Customized Travel
                                Itineraries</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Exclusive Destination
                                Packages</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Expert Travel Advice</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Premium Accommodation
                                Selection</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Partnerships with Top
                                Airlines</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Travel Support</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="countrys.php">Read More</a>

                </div>
            </div>
        </div>
    </div>

    <!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Our Services</h6>
                <h1 class="mb-5">What We Offer</h1>
            </div>
            <div class="row g-4">
                <?php
                include 'db.php'; // Include your database connection
                
                // Fetch categories from the database
                $query = "SELECT id, country_id, category_name, description, icon FROM categories";
                $stmt = $conn->prepare($query);
                $stmt->execute();
                $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <div class="row">
                    <?php if ($categories): ?>
                        <?php foreach ($categories as $category): ?>
                            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                                <a href="package.php?category_id=<?php echo intval($category['id']); ?>"
                                    class="service-item rounded pt-3 d-block text-decoration-none">
                                    <div class="p-4">
                                        <i class="<?php echo htmlspecialchars($category['icon']); ?> text-primary mb-4"></i>
                                        <h5><?php echo htmlspecialchars($category['category_name']); ?></h5>
                                        <p style="color: #888;"><?php echo htmlspecialchars($category['description']); ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No categories available.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


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
            $query = "SELECT * FROM countries LIMIT 3";
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


    <!-- Event Packages Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">
                    Awesome Tour Packages<br>
                    <span class="text-muted">Explore breathtaking destinations and create unforgettable memories!</span>
                </h1>

            </div>
            <?php
            include 'db2.php'; // Ensure this file initializes $pdo correctly
            
            // No filtering by category_id or country_id
            $query = "SELECT * FROM combine_trips limit 3"; // Make sure to select the 'id' field as well
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            // Fetch all rows and display them
            $trips = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($trips): ?>
                <div class="row g-4 justify-content-center">
                    <?php foreach ($trips as $row): ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="<?php echo htmlspecialchars($row['destination_img']); ?>"
                                        alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i
                                            class="fa fa-map-marker-alt text-primary me-2"></i><?php echo htmlspecialchars($row['departure_city']); ?>
                                    </small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i
                                            class="fa fa-calendar-alt text-primary me-2"></i><?php echo htmlspecialchars($row['duration_days']); ?>
                                        Days
                                    </small>
                                    <small class="flex-fill text-center py-2">
                                        <i
                                            class="fa fa-user text-primary me-2"></i><?php echo htmlspecialchars($row['transportation_mode']); ?>
                                    </small>
                                </div>
                                <div class="text-center p-4">
                                    <h3 class="mb-0">₨ <?php echo number_format($row['budget'], 0); ?></h3>
                                    <div class="mb-3">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                    <p><?php echo htmlspecialchars($row['itinerary']); ?></p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="combine_trip_details.php?trip_id=<?php echo htmlspecialchars($row['id']); ?>&country_id=<?php echo htmlspecialchars($row['country_id']); ?>"
                                            class="btn btn-sm btn-primary px-3 border-end"
                                            style="border-radius: 30px 0 0 30px;">Read More</a>
                                        <a href="combine_trip_details.php?trip_id=<?php echo htmlspecialchars($row['id']); ?>&country_id=<?php echo htmlspecialchars($row['country_id']); ?>"
                                            class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book
                                            Now</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No trips available.</p>
            <?php endif; ?>

        </div>
    </div>
    <!-- Event Packages End -->



    <!-- Booking Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase">contact Us</h6>
                        <h1 class="text-white mb-4">Online Contact Form</h1>
                        <p class="mb-4">We’re here to assist you! If you have any questions or need support, feel free
                            to reach out. Our team is dedicated to providing you with the information you need.</p>
                        <p class="mb-4">Please fill out the contact form below, and we’ll get back to you as soon as
                            possible. Your feedback is important to us, and we look forward to hearing from you!</p>

                    </div>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Contact With Us</h1>
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
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-transparent" placeholder="Special Request"
                                            id="message" style="height: 100px"></textarea>
                                        <label for="message">Message For Us</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-light w-100 py-3" type="submit">Submit Now</button>
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


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Clients Say!!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-1.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-2.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-3.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
                <div class="testimonial-item bg-white text-center border p-4">
                    <img class="bg-white rounded-circle shadow p-1 mx-auto mb-3" src="img/testimonial-4.jpg"
                        style="width: 80px; height: 80px;">
                    <h5 class="mb-0">John Doe</h5>
                    <p>New York, USA</p>
                    <p class="mt-2 mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et
                        eos. Clita erat ipsum et lorem et sit.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <?php
    include 'footer.php';
    ?>
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