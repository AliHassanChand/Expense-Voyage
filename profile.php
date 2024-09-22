<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Expense Voyage - Profile</title>
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
                    <a href="countrys.php" class="nav-item nav-link">Destination</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Trips</a>
                        <div class="dropdown-menu m-0">
                            <a href="countrys.php" class="dropdown-item"> Solo Trip </a>
                            <a href="combine.php" class="dropdown-item"> Combine Trip </a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>

                    <a href="team.php" class="nav-link nav-item">Our Guides</a>

                </div>


                <!-- HTML content -->
                <!-- Profile content -->
                <?php if (isset($_SESSION['name'])): ?>
                    <div class="dropdown">
                        <a href="#" class="btn btn-primary rounded-pill py-2 px-4 dropdown-toggle" id="userDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo "Welcome, " . $_SESSION['name']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a href="account.php" class="btn btn-primary rounded-pill py-2 px-4">Login / Register</a>
                <?php endif; ?>

            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white animated slideInDown" style="font-family: 'Protest Guerrilla', system-ui;
                        font-weight: 400;
                        font-style: normal;">User Profile Page</h1>
                        <nav aria-label=" breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item fs-5 fw-bold"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item fs-5 fw-bold text-white active" aria-current="page">Profile
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-10">
                    <div class="card shadow-lg wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card-body">
                            <div class="text-center">
                                <h1 class="mb-2 mt-2 d-flex align-items-center justify-content-center">
                                    <i class="fa fa-user-circle me-2" style="font-size: 1.5em;"></i>USER PROFILE
                                </h1>
                            </div>
                            <hr>
                            <ul class="nav nav-pills justify-content-center mb-4" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active fw-800 text-uppercase" id="profile-tab"
                                        data-bs-toggle="pill" href="#profile" role="tab" aria-controls="profile"
                                        aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fw-800 text-uppercase" id="travel-updates-tab"
                                        data-bs-toggle="pill" href="#travel-updates" role="tab"
                                        aria-controls="travel-updates" aria-selected="false">Travel Updates</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fw-800 text-uppercase" id="selected-tours-tab"
                                        data-bs-toggle="pill" href="#selected-tours" role="tab"
                                        aria-controls="selected-tours" aria-selected="false">Selected Tours</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row mt-4">
                                        <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.2s">
                                            <h5>Name:</h5>
                                            <p>ABC</p>
                                        </div>
                                        <div class="col-md-6 wow fadeInRight" data-wow-delay="0.2s">
                                            <h5>Email:</h5>
                                            <p>johndoe@example.com</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.3s">
                                            <h5>Phone:</h5>
                                            <p>(123) 456-7890</p>
                                        </div>
                                        <div class="col-md-6 wow fadeInRight" data-wow-delay="0.3s">
                                            <h5>Location:</h5>
                                            <p>New York, NY</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.4s">
                                            <h5>Date of Birth:</h5>
                                            <p>January 1, 1990</p>
                                        </div>
                                        <div class="col-md-6 wow fadeInRight" data-wow-delay="0.4s">
                                            <h5>Joined:</h5>
                                            <p>January 1, 2020</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.5s">
                                            <h5>Gender:</h5>
                                            <p>Female</p>
                                        </div>
                                        <div class="col-md-6 wow fadeInRight" data-wow-delay="0.5s">
                                            <h5>Nationality:</h5>
                                            <p>American</p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6 wow fadeInLeft" data-wow-delay="0.6s">
                                            <h5>Preferred Travel Styles:</h5>
                                            <p>Adventure, Culture, Relaxation</p>
                                        </div>
                                        <div class="col-md-6 wow fadeInRight" data-wow-delay="0.6s">
                                            <h5>Languages Spoken:</h5>
                                            <p>English, Spanish</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5 class="wow fadeInUp" data-wow-delay="0.7s">About Me</h5>
                                    <p class="wow fadeInUp" data-wow-delay="0.8s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Curabitur sodales ligula in libero sodales, nec feugiat libero venenatis.</p>
                                    <hr>
                                    <h5 class="wow fadeInUp" data-wow-delay="0.9s">Travel History</h5>
                                    <ul class="wow fadeInUp" data-wow-delay="1s">
                                        <li>Visited: France, Japan, Australia</li>
                                        <li>Favorite Destination: Bali</li>
                                        <li>Most Memorable Trip: Safari in Kenya</li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="travel-updates" role="tabpanel" aria-labelledby="travel-updates-tab">
                                    <h5 class="wow fadeInUp" data-wow-delay="0.1s">Travel Updates</h5>
                                    <p class="wow fadeInUp" data-wow-delay="0.2s">Stay updated with the latest travel alerts and offers.</p>
                                    <ul class="wow fadeInUp" data-wow-delay="0.3s">
                                        <li><strong>Upcoming Tours:</strong> Trip to Bali on October 15, 2024</li>
                                        <li><strong>Special Offers:</strong> 20% off on winter trips!</li>
                                        <li><strong>Travel News:</strong> New health guidelines for travelers.</li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="selected-tours" role="tabpanel" aria-labelledby="selected-tours-tab">
                                    <h5 class="fw-700 text-uppercase wow fadeInUp" data-wow-delay="0.1s">Selected Tours</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item wow fadeInUp" data-wow-delay="0.2s">
                                            <h6>Tour to Bali</h6>
                                            <p><strong>Date:</strong> October 15, 2024</p>
                                            <p><strong>Duration:</strong> 7 Days</p>
                                            <p><strong>Package:</strong> All-Inclusive</p>
                                            <p><strong>Status:</strong> Confirmed</p>
                                        </li>
                                        <li class="list-group-item wow fadeInUp" data-wow-delay="0.3s">
                                            <h6>Adventure in the Alps</h6>
                                            <p><strong>Date:</strong> December 5, 2024</p>
                                            <p><strong>Duration:</strong> 5 Days</p>
                                            <p><strong>Package:</strong> Guided Tour</p>
                                            <p><strong>Status:</strong> Pending</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <a href="#" class="btn btn-primary">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






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
    <!-- Include Bootstrap JS (if not already included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Javascript -->
    <script src="js/main.js"></script>
</body>

</html>