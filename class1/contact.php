
<?php
session_start();

$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (
        $name !== '' &&
        filter_var($email, FILTER_VALIDATE_EMAIL) &&
        $subject !== '' &&
        $message !== ''
    ) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Contact Us - AutoWorld</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body {
    background: #f5f6fa;
}
.header {
    background: #212529;
    padding: 20px;
}
.contact-hero {
    background: linear-gradient(rgba(0,0,0,.8),rgba(0,0,0,.6)),
    url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1500&q=85') center/cover;
    min-height: 250px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
    border-radius: 15px;
}
.contact-box {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 3px 15px rgba(0,0,0,.07);
    height: 100%;
}
.contact-icon {
    font-size: 35px;
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
<a href="about.php" class="text-white text-decoration-none me-3">About</a>
<a href="contact.php" class="text-warning text-decoration-none">Contact</a>
</nav>
</div>
</header>

<div class="container py-4">

<section class="contact-hero mb-5">
<div>
<h1 class="display-3 fw-bold">Contact Us</h1>
<p class="fs-5">We Are Here To Help You</p>
</div>
</section>

<div class="row g-4">

<div class="col-md-5">

<div class="contact-box">
<h3 class="fw-bold mb-4">Get In Touch</h3>

<div class="mb-4">
<div class="contact-icon">📍</div>
<h5>Our Location</h5>
<p class="text-muted">Karachi, Pakistan</p>
</div>

<div class="mb-4">
<div class="contact-icon">📧</div>
<h5>Email Address</h5>
<p class="text-muted">info@autoworld.com</p>
</div>

<div class="mb-4">
<div class="contact-icon">📞</div>
<h5>Phone Number</h5>
<p class="text-muted">+92 300 1234567</p>
</div>

<div>
<div class="contact-icon">🕒</div>
<h5>Working Hours</h5>
<p class="text-muted">Monday - Saturday: 9 AM - 6 PM</p>
</div>

</div>
</div>

<div class="col-md-7">

<div class="contact-box">
<h3 class="fw-bold mb-4">Send Us A Message</h3>

<form method="POST" action="contact.php">

<div class="mb-3">
<label class="form-label">Your Name</label>
<input type="text" name="name" class="form-control"
placeholder="Enter your name" required>
</div>

<div class="mb-3">
<label class="form-label">Your Email</label>
<input type="email" name="email" class="form-control"
placeholder="Enter your email" required>
</div>

<div class="mb-3">
<label class="form-label">Subject</label>
<input type="text" name="subject" class="form-control"
placeholder="Enter subject" required>
</div>

<div class="mb-3">
<label class="form-label">Message</label>
<textarea name="message" class="form-control" rows="5"
placeholder="Write your message..." required></textarea>
</div>

<button type="submit" class="btn btn-warning btn-lg w-100">
Send Message
</button>

</form>
</div>

</div>
</div>

</div>

<footer class="footer text-center">
<h3 class="fw-bold">AutoWorld</h3>
<p>Your destination for premium and luxury cars.</p>
<p class="mb-0">© 2026 AutoWorld. All Rights Reserved.</p>
</footer>

<?php if ($success) { ?>
<script>
Swal.fire({
    title: 'Thank You!',
    text: 'Your message passed validation successfully.',
    icon: 'success',
    confirmButtonColor: '#212529'
});
</script>
<?php } ?>

</body>
</html>
