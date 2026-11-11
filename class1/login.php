
<?php

session_start();
include 'db.php';

$message = "";
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {

        $message = "Please enter email and password!";
        $status = "error";

    } else {

        $sql = "SELECT id, name, email, password FROM users WHERE email = ? LIMIT 1";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($user = mysqli_fetch_assoc($result)) {

                if (password_verify($password, $user['password'])) {

                    session_regenerate_id(true);

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['name'];
                    $_SESSION['user_email'] = $user['email'];

                    $message = "Welcome back, " . $user['name'] . "! You have logged in successfully.";
                    $status = "success";

                } else {

                    $message = "Incorrect password! Please try again.";
                    $status = "error";

                }

            } else {

                $message = "Email is not registered!";
                $status = "error";

            }

            mysqli_stmt_close($stmt);

        } else {

            $message = "Database query failed!";
            $status = "error";

        }
    }
}

?>

<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | My Website</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="card shadow-lg border-0 rounded-4 p-4"
         style="width:100%; max-width:450px;">

        <h2 class="text-center fw-bold mb-2">
            Welcome Back!
        </h2>

        <p class="text-center text-muted mb-4">
            Login to your account
        </p>

        <form action="login.php" method="POST">

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control form-control-lg"
                    placeholder="Enter your email"
                    required
                >

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control form-control-lg"
                    placeholder="Enter your password"
                    required
                >

            </div>

            <button
                type="submit"
                name="login"
                class="btn btn-dark btn-lg w-100">

                Login

            </button>

        </form>

        <p class="text-center mt-4 mb-2">

            Don't have an account?

            <a href="/class1/signup.php"
               class="text-decoration-none fw-bold">

                Sign Up

            </a>

        </p>

        <div class="text-center">

            <a href="/class1/index.php"
               class="text-decoration-none text-muted">

                Back to Home

            </a>

        </div>

    </div>

</div>

<?php if ($message != "") { ?>

<script>

Swal.fire({

    icon: <?php echo json_encode($status); ?>,

    title: <?php echo json_encode($status == "success" ? "Login Successful!" : "Login Failed!"); ?>,

    text: <?php echo json_encode($message); ?>,

    confirmButtonText: "Continue",

    confirmButtonColor: "#ffc107",

    timer: <?php echo $status == "success" ? 2500 : 0; ?>,

    timerProgressBar: true

}).then(() => {

    <?php if ($status == "success") { ?>

        window.location.href = "index.php";

    <?php } ?>

});

</script>

<?php } ?>

</body>
</html>
