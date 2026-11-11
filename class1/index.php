
<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AutoWorld - Car Store</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body {
    margin: 0;
    overflow-x: hidden;
    background: #f5f6fa;
}

/* NAVBAR */
.main-header {
    background: #212529;
    min-height: 72px;
    position: relative;
    z-index: 1100;
}

.menu-toggle {
    background: transparent;
    border: 1px solid white;
    color: white;
    font-size: 25px;
    width: 43px;
    height: 40px;
    border-radius: 6px;
    display: none;
}

/* SIDEBAR */
.profile-sidebar {
    position: fixed;
    top: 72px;
    left: 0;
    width: 260px;
    height: calc(100vh - 72px);
    background: #212529;
    color: white;
    padding: 25px 20px;
    z-index: 1050;
    overflow-y: auto;
    transition: .3s;
}

.profile-avatar {
    width: 85px;
    height: 85px;
    border-radius: 50%;
    background: #ffc107;
    color: #212529;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 35px;
    font-weight: bold;
    margin: auto auto 15px;
}

/* MAIN */
.profile-content {
    margin-left: 260px;
    padding: 25px;
    min-height: calc(100vh - 72px);
    transition: .3s;
}

body.sidebar-closed .profile-sidebar {
    transform: translateX(-100%);
}

body.sidebar-closed .profile-content,
body.sidebar-closed .main-footer {
    margin-left: 0;
}

/* HERO */
.hero {
    min-height: 370px;
    background: linear-gradient(90deg,rgba(0,0,0,.85),rgba(0,0,0,.25)),
    url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1600&q=85') center/cover;
    border-radius: 15px;
    display: flex;
    align-items: center;
    color: white;
    padding: 45px;
    margin-bottom: 40px;
}

.hero h1 {
    font-size: clamp(30px,5vw,55px);
    font-weight: 800;
}

/* SEARCH */
.search-box {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 35px;
    box-shadow: 0 3px 15px rgba(0,0,0,.06);
}

/* CARDS */
.section-title {
    font-weight: 800;
    margin-bottom: 10px;
}

.car-card {
    background: white;
    border-radius: 14px;
    overflow: hidden;
    height: 100%;
    box-shadow: 0 3px 15px rgba(0,0,0,.08);
    transition: .3s;
}

.car-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 8px 25px rgba(0,0,0,.15);
}

.car-card img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.car-info {
    padding: 20px;
}

.car-details {
    color: #777;
    font-size: 14px;
}

.car-price {
    font-size: 21px;
    font-weight: bold;
    color: #dc3545;
}

/* OFFER */
.offer {
    background: #212529;
    color: white;
    border-radius: 15px;
    padding: 45px;
    margin-top: 45px;
}

/* FEATURES */
.feature-card {
    background: white;
    padding: 30px 20px;
    text-align: center;
    border-radius: 12px;
    height: 100%;
    box-shadow: 0 3px 15px rgba(0,0,0,.06);
}

.feature-icon {
    font-size: 45px;
    margin-bottom: 15px;
}

/* NEWSLETTER */
.newsletter {
    background: #ffc107;
    padding: 40px 20px;
    text-align: center;
    border-radius: 15px;
    margin-top: 40px;
}

/* FOOTER */
.main-footer {
    margin-left: 260px;
    padding: 35px;
    background: white;
    transition: .3s;
}

.sidebar-overlay {
    display: none;
}

@media(max-width:768px) {
    .menu-toggle {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-sidebar {
        transform: translateX(-100%);
        box-shadow: 5px 0 20px rgba(0,0,0,.2);
    }

    body.sidebar-open .profile-sidebar {
        transform: translateX(0);
    }

    .profile-content,
    .main-footer {
        margin-left: 0;
    }

    .sidebar-overlay {
        position: fixed;
        inset: 72px 0 0;
        background: rgba(0,0,0,.45);
        z-index: 1040;
    }

    body.sidebar-open .sidebar-overlay {
        display: block;
    }

    .hero {
        padding: 25px;
        min-height: 300px;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<header class="main-header p-3 text-white">
<div class="container-fluid">
<div class="d-flex flex-wrap align-items-center">

<?php if($isLoggedIn) { ?>
<button class="menu-toggle me-3" id="menuToggle">☰</button>
<?php } ?>

<a href="index.php" class="text-white text-decoration-none fs-4 fw-bold me-4">
AutoWorld
</a>

<ul class="nav me-auto">
<li><a href="index.php" class="nav-link text-white">Home</a></li>
<li><a href="#cars" class="nav-link text-white">Cars</a></li>
<li><a href="about.php" class="nav-link text-white">About</a></li>
<li><a href="contact.php" class="nav-link text-white">Contact</a></li>
</ul>

<a href="#cart" class="btn btn-outline-light me-2">
Cart (<span id="cartCount">0</span>)
</a>

<?php if(!$isLoggedIn) { ?>
<a href="login.php" class="btn btn-outline-light me-2">Login</a>
<a href="signup.php" class="btn btn-warning">Sign-up</a>
<?php } ?>

</div>
</div>
</header>

<?php if($isLoggedIn) { ?>

<!-- SIDEBAR -->
<?php if($isLoggedIn) { ?>

<!-- USER SIDEBAR -->
<div class="profile-sidebar text-center" id="profileSidebar">

    <div class="profile-avatar">
        <?php echo strtoupper(substr($_SESSION['user_name'] ?? 'U', 0, 1)); ?>
    </div>

    <h5>
        <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'User'); ?>
    </h5>

    <p class="text-white-50 small">
        <?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?>
    </p>

</div>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<?php } ?>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<?php } ?>

<!-- MAIN CONTENT -->
<main class="<?php echo $isLoggedIn ? 'profile-content' : 'container py-4'; ?>">

<!-- HERO -->
<section class="hero">
<div>
<span class="badge bg-warning text-dark mb-3">WELCOME TO AUTOWORLD</span>
<h1>Find Your Dream Car</h1>
<p class="fs-5">Discover premium cars at amazing prices.</p>
<a href="#cars" class="btn btn-warning btn-lg mt-3">Explore Cars</a>
</div>
</section>

<!-- SEARCH AND FILTER -->
<section class="search-box">
<h4 class="fw-bold mb-3">Find Your Favourite Car</h4>

<div class="row g-3">

<div class="col-md-7">
<input type="search" id="searchCar" class="form-control form-control-lg"
placeholder="Search car name..." oninput="searchCars()">
</div>

<div class="col-md-5">
<select id="carCategory" class="form-select form-select-lg"
onchange="searchCars()">
<option value="all">All Categories</option>
<option value="SUV">SUV</option>
<option value="Sports">Sports</option>
<option value="Sedan">Sedan</option>
<option value="Electric">Electric</option>
</select>
</div>

</div>
</section>

<!-- CARS -->
<section id="cars" class="mb-5">

<div class="d-flex justify-content-between flex-wrap mb-4">
<div>
<h2 class="section-title">Featured Cars</h2>
<p class="text-muted">Explore our premium collection</p>
</div>
<span class="badge bg-dark p-2 align-self-center">Premium Collection</span>
</div>

<div class="row g-4" id="carList">

<!-- CAR 1 -->
<div class="col-md-6 col-lg-4 car-item" data-category="SUV">
<div class="car-card">
<img src="https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?auto=format&fit=crop&w=800&q=85" alt="BMW SUV">
<div class="car-info">
<span class="badge bg-warning text-dark">SUV</span>
<h5 class="fw-bold mt-3">BMW X5</h5>
<p class="car-details">2024 | Automatic | Petrol</p>
<div class="car-price">Rs. 2.5 Crore</div>
<button class="btn btn-dark w-100 mt-3" onclick="addToCart('BMW X5')">Add to Cart</button>
</div>
</div>
</div>

<!-- CAR 2 -->
<div class="col-md-6 col-lg-4 car-item" data-category="Sports">
<div class="car-card">
<img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=800&q=85" alt="Porsche">
<div class="car-info">
<span class="badge bg-danger">Sports</span>
<h5 class="fw-bold mt-3">Porsche 911</h5>
<p class="car-details">2024 | Automatic | Petrol</p>
<div class="car-price">Rs. 8 Crore</div>
<button class="btn btn-dark w-100 mt-3" onclick="addToCart('Porsche 911')">Add to Cart</button>
</div>
</div>
</div>

<!-- CAR 3 -->
<div class="col-md-6 col-lg-4 car-item" data-category="Sedan">
<div class="car-card">
<img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&w=800&q=85" alt="BMW Sedan">
<div class="car-info">
<span class="badge bg-primary">Sedan</span>
<h5 class="fw-bold mt-3">BMW 5 Series</h5>
<p class="car-details">2024 | Automatic | Petrol</p>
<div class="car-price">Rs. 1.8 Crore</div>
<button class="btn btn-dark w-100 mt-3" onclick="addToCart('BMW 5 Series')">Add to Cart</button>
</div>
</div>
</div>

<!-- CAR 4 -->
<div class="col-md-6 col-lg-4 car-item" data-category="Electric">
<div class="car-card">
<img src="https://images.unsplash.com/photo-1560958089-b8a1929cea89?auto=format&fit=crop&w=800&q=85" alt="Tesla">
<div class="car-info">
<span class="badge bg-success">Electric</span>
<h5 class="fw-bold mt-3">Tesla Model 3</h5>
<p class="car-details">2024 | Automatic | Electric</p>
<div class="car-price">Rs. 1.5 Crore</div>
<button class="btn btn-dark w-100 mt-3" onclick="addToCart('Tesla Model 3')">Add to Cart</button>
</div>
</div>
</div>

<!-- CAR 5 -->
<div class="col-md-6 col-lg-4 car-item" data-category="SUV">
<div class="car-card">
<img src="https://images.unsplash.com/photo-1519608487953-e999c86e7455?auto=format&fit=crop&w=800&q=85" alt="Range Rover">
<div class="car-info">
<span class="badge bg-warning text-dark">SUV</span>
<h5 class="fw-bold mt-3">Range Rover</h5>
<p class="car-details">2024 | Automatic | Diesel</p>
<div class="car-price">Rs. 6 Crore</div>
<button class="btn btn-dark w-100 mt-3" onclick="addToCart('Range Rover')">Add to Cart</button>
</div>
</div>
</div>

<!-- CAR 6 -->
<div class="col-md-6 col-lg-4 car-item" data-category="Sports">
<div class="car-card">
<img src="https://images.unsplash.com/photo-1544829099-b9a0c07fad1a?auto=format&fit=crop&w=800&q=85" alt="Sports car">
<div class="car-info">
<span class="badge bg-danger">Sports</span>
<h5 class="fw-bold mt-3">Luxury Sports Car</h5>
<p class="car-details">2024 | Automatic | Petrol</p>
<div class="car-price">Rs. 4 Crore</div>
<button class="btn btn-dark w-100 mt-3" onclick="addToCart('Luxury Sports Car')">Add to Cart</button>
</div>
</div>
</div>

</div>

<p id="noCars" class="text-center text-muted mt-4" style="display:none;">No cars found!</p>
</section>

<!-- OFFER -->
<section class="offer mb-5">
<span class="badge bg-warning text-dark mb-3">SPECIAL OFFER</span>
<h2 class="fw-bold">Get Your Dream Car Today!</h2>
<p>Explore premium vehicles and discover amazing deals.</p>
<a href="#cars" class="btn btn-warning btn-lg">Shop Now</a>
</section>

<!-- ABOUT -->
<section id="about" class="mb-5">
<h2 class="section-title text-center">Why Choose AutoWorld?</h2>
<p class="text-muted text-center mb-4">We provide the best car shopping experience.</p>

<div class="row g-4">

<div class="col-md-4">
<div class="feature-card">
<div class="feature-icon">🚘</div>
<h5 class="fw-bold">Premium Cars</h5>
<p class="text-muted">Explore premium and luxury vehicles.</p>
</div>
</div>

<div class="col-md-4">
<div class="feature-card">
<div class="feature-icon">💰</div>
<h5 class="fw-bold">Best Prices</h5>
<p class="text-muted">Discover competitive vehicle prices.</p>
</div>
</div>

<div class="col-md-4">
<div class="feature-card">
<div class="feature-icon">🛡️</div>
<h5 class="fw-bold">Trusted Service</h5>
<p class="text-muted">Enjoy a reliable shopping experience.</p>
</div>
</div>

</div>
</section>

<!-- NEWSLETTER -->
<section class="newsletter mb-5">
<h2 class="fw-bold">Subscribe To Our Newsletter</h2>
<p>Get updates about new cars and special offers.</p>

<form class="row justify-content-center g-2" onsubmit="subscribeNewsletter(event)">
<div class="col-md-5">
<input type="email" id="newsletterEmail" class="form-control form-control-lg"
placeholder="Enter your email" required>
</div>
<div class="col-md-2">
<button class="btn btn-dark btn-lg w-100">Subscribe</button>
</div>
</form>
</section>

</main>

<!-- FOOTER -->
<footer class="<?php echo $isLoggedIn ? 'main-footer' : 'container'; ?>">

<div class="row g-4 py-4 border-top">

<div class="col-md-4">
<h3 class="fw-bold">AutoWorld</h3>
<p class="text-muted">Your destination for premium and luxury cars.</p>
</div>

<div class="col-md-2">
<h5>Quick Links</h5>
<a href="index.php" class="d-block text-muted text-decoration-none mb-2">Home</a>
<a href="#cars" class="d-block text-muted text-decoration-none mb-2">Cars</a>
<a href="about.php" class="d-block text-muted text-decoration-none mb-2">About</a>
<a href="contact.php" class="d-block text-muted text-decoration-none mb-2">Contact</a>
</div>

<div class="col-md-3">
<h5>Customer Service</h5>
<p class="text-muted">Contact Us</p>
<p class="text-muted">Privacy Policy</p>
<p class="text-muted">Terms & Conditions</p>
</div>

<div class="col-md-3" id="contact">
<h5>Contact Us</h5>
<p class="text-muted">Karachi, Pakistan</p>
<p class="text-muted">info@autoworld.com</p>
<p class="text-muted">+92 300 1234567</p>
</div>

</div>

<hr>
<p class="text-center text-muted">© 2026 AutoWorld. All Rights Reserved.</p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<script>

/* SIDEBAR */
const menuToggle = document.getElementById('menuToggle');
const sidebarOverlay = document.getElementById('sidebarOverlay');

function updateButton() {
    if (!menuToggle) return;

    const isOpen = window.innerWidth <= 768
        ? document.body.classList.contains('sidebar-open')
        : !document.body.classList.contains('sidebar-closed');

    menuToggle.setAttribute('aria-expanded', isOpen);
}

if (menuToggle) {
    menuToggle.addEventListener('click', function() {
        if (window.innerWidth <= 768) {
            document.body.classList.toggle('sidebar-open');
        } else {
            document.body.classList.toggle('sidebar-closed');
        }
        updateButton();
    });
}

if (sidebarOverlay) {
    sidebarOverlay.addEventListener('click', function() {
        document.body.classList.remove('sidebar-open');
        updateButton();
    });
}

window.addEventListener('resize', function() {
    document.body.classList.remove('sidebar-open');
    document.body.classList.remove('sidebar-closed');
    updateButton();
});

updateButton();

/* SEARCH AND CATEGORY FILTER */
function searchCars() {
    const search = document.getElementById('searchCar').value.toLowerCase();
    const category = document.getElementById('carCategory').value;
    const cars = document.querySelectorAll('.car-item');

    let visibleCount = 0;

    cars.forEach(function(car) {
        const name = car.querySelector('h5').innerText.toLowerCase();
        const carCategory = car.dataset.category;

        const matchName = name.includes(search);
        const matchCategory = category === 'all' || category === carCategory;

        if (matchName && matchCategory) {
            car.style.display = '';
            visibleCount++;
        } else {
            car.style.display = 'none';
        }
    });

    document.getElementById('noCars').style.display =
        visibleCount === 0 ? 'block' : 'none';
}

/* DEMO CART */
let cart = [];

function addToCart(carName) {
    cart.push(carName);
    document.getElementById('cartCount').innerText = cart.length;

    Swal.fire({
        title: 'Added to Cart!',
        text: carName + ' added to your demo cart.',
        icon: 'success',
        confirmButtonColor: '#212529'
    });
}

/* NEWSLETTER */
function subscribeNewsletter(event) {
    event.preventDefault();

    const email = document.getElementById('newsletterEmail').value;

    Swal.fire({
        title: 'Thank You!',
        text: 'Newsletter demo submitted for ' + email,
        icon: 'success',
        confirmButtonColor: '#212529'
    });

    document.getElementById('newsletterEmail').value = '';
}

</script>

</body>
</html>