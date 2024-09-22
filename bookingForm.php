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
                        font-style: normal;">Booking Page</h1>
                        <nav aria-label=" breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item fs-5 fw-bold"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item fs-5 fw-bold text-white active" aria-current="page">Booking Page
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
                                    BOOKING FORM
                                </h1>
                            </div>
                            <hr>
                            <ul class="nav nav-pills justify-content-center mb-4" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active fw-800 text-uppercase" id="profile-tab"
                                        data-bs-toggle="pill" href="#profile" role="tab" aria-controls="profile"
                                        aria-selected="true">Combine Trip</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link fw-800 text-uppercase" id="travel-updates-tab"
                                        data-bs-toggle="pill" href="#travel-updates" role="tab"
                                        aria-controls="travel-updates" aria-selected="false">Solo Trips</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="booking p-5" style="background: rgba(0, 0, 0, 0.7); border-radius: 15px; position: relative;">
                                        <div class="form-background" style="background-image: url('/img/background1.png'); background-size: cover; background-position: center; position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: -1;"></div>
                                        <div class="row g-5 align-items-center">
                                            <div class="col-md-12">
                                                <h1 class="text-white mb-4">Solo Trip booking</h1>
                                                <form>
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control bg-transparent" id="name" placeholder="Your Name" required>
                                                                <label for="name">Your Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="email" class="form-control bg-transparent" id="email" placeholder="Your Email" required>
                                                                <label for="email">Your Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="tel" class="form-control bg-transparent" id="phone" placeholder="Your Phone" required>
                                                                <label for="phone">Your Phone</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                                                <input type="text" class="form-control bg-transparent datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" required />
                                                                <label for="datetime">Date & Time</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <select class="form-select bg-transparent" id="select1" required>
                                                                    <option value="" disabled selected>Select Destination</option>
                                                                    <option value="1">Destination 1</option>
                                                                    <option value="2">Destination 2</option>
                                                                    <option value="3">Destination 3</option>
                                                                </select>
                                                                <label for="select1">Destination</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <select class="form-select bg-transparent" id="travelers" required>
                                                                    <option value="" disabled selected>Number of Travelers</option>
                                                                    <option value="1">1 Traveler</option>
                                                                    <option value="2">2 Travelers</option>
                                                                    <option value="3">3 Travelers</option>
                                                                    <option value="4">4 Travelers</option>
                                                                    <option value="5">5+ Travelers</option>
                                                                </select>
                                                                <label for="travelers">Travelers</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <select class="form-select bg-transparent" id="transportation" required>
                                                                    <option value="" disabled selected>Select Transportation Mode</option>
                                                                    <option value="Flight">Flight</option>
                                                                    <option value="Car">Car</option>
                                                                    <option value="Train">Train</option>
                                                                    <option value="Bus">Bus</option>
                                                                </select>
                                                                <label for="transportation">Transportation Mode</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-floating">
                                                                <textarea class="form-control bg-transparent" placeholder="Special Request" id="message" style="height: 100px"></textarea>
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
                                <div class="tab-pane fade" id="travel-updates" role="tabpanel" aria-labelledby="travel-updates-tab">
                                    <div class="booking p-5" style="background: rgba(0, 0, 0, 0.7); border-radius: 15px; position: relative;">
                                        <div class="form-background" style="background-image: url('/img/background1.png'); background-size: cover; background-position: center; position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: -1;"></div>
                                        <div class="row g-5 align-items-center">
                                            <div class="col-md-12">
                                                <h1 class="text-white mb-4">Combine Trip Booking</h1>
                                                <form>
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="text" class="form-control bg-transparent" id="name" placeholder="Your Name" required>
                                                                <label for="name">Your Name</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="email" class="form-control bg-transparent" id="email" placeholder="Your Email" required>
                                                                <label for="email">Your Email</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <input type="tel" class="form-control bg-transparent" id="phone" placeholder="Your Phone" required>
                                                                <label for="phone">Your Phone</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating date" id="date3" data-target-input="nearest">
                                                                <input type="text" class="form-control bg-transparent datetimepicker-input" id="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" required />
                                                                <label for="datetime">Date & Time</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <select class="form-select bg-transparent" id="select1" required>
                                                                    <option value="" disabled selected>Select Destination</option>
                                                                    <option value="1">Destination 1</option>
                                                                    <option value="2">Destination 2</option>
                                                                    <option value="3">Destination 3</option>
                                                                </select>
                                                                <label for="select1">Destination</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <select class="form-select bg-transparent" id="travelers" required>
                                                                    <option value="" disabled selected>Number of Travelers</option>
                                                                    <option value="1">1 Traveler</option>
                                                                    <option value="2">2 Travelers</option>
                                                                    <option value="3">3 Travelers</option>
                                                                    <option value="4">4 Travelers</option>
                                                                    <option value="5">5+ Travelers</option>
                                                                </select>
                                                                <label for="travelers">Travelers</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating">
                                                                <select class="form-select bg-transparent" id="transportation" required>
                                                                    <option value="" disabled selected>Select Transportation Mode</option>
                                                                    <option value="Flight">Flight</option>
                                                                    <option value="Car">Car</option>
                                                                    <option value="Train">Train</option>
                                                                    <option value="Bus">Bus</option>
                                                                </select>
                                                                <label for="transportation">Transportation Mode</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-floating">
                                                                <textarea class="form-control bg-transparent" placeholder="Special Request" id="message" style="height: 100px"></textarea>
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