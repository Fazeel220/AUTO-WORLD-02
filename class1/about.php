
<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About Us - AutoWorld</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f5f6fa;
    margin: 0;
}
.header {
    background: #212529;
    padding: 20px;
}
.about-hero {
    background: linear-gradient(rgba(0,0,0,.75),rgba(0,0,0,.6)),
    url('https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1500&q=85') center/cover;
    min-height: 320px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    border-radius: 15px;
}
.about-box {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 3px 15px rgba(0,0,0,.07);
    height: 100%;
}
.about-icon {
    font-size: 45px;
}
.footer {
    background: #212529;
    color: white;
    padding: 30px;
    margin-top: 50px;
}
</style>
</head>

<body>

<header class="header">
<div class="container-fluid d-flex justify-content-between align-items-center flex-wrap">
<a href="index.php" class="text-white fs-3 fw-bold text-decoration-none">AutoWorld</a>

<nav>
<a href="index.php" class="text-white text-decoration-none me-3">Home</a>
<a href="about.php" class="text-warning text-decoration-none me-3">About</a>
<a href="contact.php" class="text-white text-decoration-none">Contact</a>
</nav>
</div>
</header>

<div class="container py-4">

<section class="about-hero mb-5">
<div>
<h1 class="display-3 fw-bold">About AutoWorld</h1>
<p class="fs-5">Your Trusted Destination For Premium Cars</p>
</div>
</section>

<div class="row g-4 mb-5 align-items-center">

<div class="col-md-6">
<h2 class="fw-bold">Who We Are</h2>
<p class="text-muted">
AutoWorld is a premium car shopping platform dedicated to helping
customers discover their dream vehicles. We offer a collection of
luxury, sports, SUV and electric cars.
</p>

<p class="text-muted">
Our goal is to provide customers with a simple, convenient and
reliable car shopping experience with quality service and
competitive prices.
</p>

<a href="index.php#cars" class="btn btn-warning btn-lg">Explore Cars</a>
</div>

<div class="col-md-6">
<img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?auto=format&fit=crop&w=1000&q=85"
class="img-fluid rounded-4" alt="Luxury Car">
</div>

</div>

<h2 class="text-center fw-bold mb-4">Why Choose AutoWorld?</h2>

<div class="row g-4 mb-5">

<div class="col-md-4">
<div class="about-box text-center">
<div class="about-icon">🚘</div>
<h4 class="fw-bold mt-3">Premium Cars</h4>
<p class="text-muted">Discover premium and luxury vehicles.</p>
</div>
</div>

<div class="col-md-4">
<div class="about-box text-center">
<div class="about-icon">💰</div>
<h4 class="fw-bold mt-3">Best Prices</h4>
<p class="text-muted">Find competitive prices on your favourite cars.</p>
</div>
</div>

<div class="col-md-4">
<div class="about-box text-center">
<div class="about-icon">🛡️</div>
<h4 class="fw-bold mt-3">Trusted Service</h4>
<p class="text-muted">We aim to provide a reliable shopping experience.</p>
</div>
</div>

</div>

<section class="text-center bg-dark text-white p-5 rounded-4">
<h2 class="fw-bold">Find Your Dream Car Today!</h2>
<p>Explore our collection and choose your favourite vehicle.</p>
<a href="index.php#cars" class="btn btn-warning btn-lg">Shop Now</a>
</section>

</div>

<footer class="footer text-center">
<h3 class="fw-bold">AutoWorld</h3>
<p>Your destination for premium and luxury cars.</p>
<p class="mb-0">© 2026 AutoWorld. All Rights Reserved.</p>
</footer>

</body>
</html>
