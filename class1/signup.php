
<?php

include 'db.php';

$message = "";
$status = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check empty fields
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {

        $message = "Please fill all fields!";
        $status = "error";

    }

    // Check password match
    elseif ($password !== $confirm_password) {

        $message = "Passwords do not match!";
        $status = "error";

    }

    // Check email format
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address!";
        $status = "error";

    }

    else {

        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert query
        $sql = "INSERT INTO users (name, email, password)
                VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {

            mysqli_stmt_bind_param(
                $stmt,
                "sss",
                $name,
                $email,
                $hashed_password
            );

            if (mysqli_stmt_execute($stmt)) {

                $message = "Your account has been created successfully!";
                $status = "success";

            } else {

                if (mysqli_stmt_errno($stmt) == 1062) {

                    $message = "This email is already registered! Please use another email.";

                } else {

                    $message = "Something went wrong. Please try again.";

                }

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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign Up | Create Account</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="card shadow-lg border-0 p-4 rounded-4"
             style="width: 100%; max-width: 450px;">

            <h2 class="text-center fw-bold mb-2">
                Create Account
            </h2>

            <p class="text-center text-muted mb-4">
                Sign up to get started
            </p>

            <!-- Signup Form -->

            <form action="signup.php" method="POST">

                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control form-control-lg"
                        placeholder="Enter your name"
                        maxlength="100"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control form-control-lg"
                        placeholder="Enter your email"
                        maxlength="150"
                        required
                    >

                </div>


                <div class="mb-3">

                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control form-control-lg"
                        placeholder="Create password"
                        minlength="6"
                        required
                    >

                </div>


                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="confirm_password"
                        class="form-control form-control-lg"
                        placeholder="Confirm password"
                        minlength="6"
                        required
                    >

                </div>


                <button
                    type="submit"
                    name="signup"
                    class="btn btn-warning btn-lg w-100 fw-bold">

                    Create Account

                </button>

            </form>


            <!-- Login Link -->

            <p class="text-center mt-4 mb-2">

                Already have an account?

                <a href="/class1/login.php"
                   class="text-decoration-none fw-bold">

                    Login

                </a>

            </p>


            <!-- Home Link -->

            <div class="text-center">

                <a href="/class1/index.php"
                   class="text-decoration-none text-muted">

                    Back to Home

                </a>

            </div>

        </div>

    </div>


    <!-- SweetAlert Popup -->

    <?php if ($message != "") { ?>

    <script>

        Swal.fire({

            icon: '<?php echo $status; ?>',

            title: '<?php echo $status == "success" ? "Congratulations!" : "Oops!"; ?>',

            text: <?php echo json_encode($message); ?>,

            confirmButtonText: 'OK',

            confirmButtonColor: '#ffc107',

            background: '#ffffff',

            color: '#333333',

            timer: <?php echo $status == "success" ? 4000 : 0; ?>,

            timerProgressBar: true

        }).then((result) => {

            <?php if ($status == "success") { ?>

                window.location.href = "/class1/login.php";

            <?php } ?>

        });

    </script>

    <?php } ?>


</body>
</html>
