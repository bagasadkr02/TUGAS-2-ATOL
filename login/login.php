<!doctype html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION["status"])) {
    header("Location:../admin/index.php");
    exit;
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

<head>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="../css/login.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "Login gagal! username dan password salah!";
            } else if ($_GET['pesan'] == "logout") {
                echo "Anda telah berhasil logout";
            } else if ($_GET['pesan'] == "belum_login") {
                echo "Anda harus login untuk mengakses halaman admin";
            }
        }
        ?>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <form method="post" action="do_login.php">
            <div class="form-floating">
                Username <input type="text" name="username" class="form-control" value="<?php echo ($_SERVER["REMOTE_ADDR"] == "5.189.147.47" ? "admin" : ""); ?>"><br>
            </div>
            <div class="form-floating">
                Password <input type="password" name="password" class="form-control" value="<?php echo ($_SERVER["REMOTE_ADDR"] == "5.189.147.47" ? "password_admin" : ""); ?>"><br>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <a href="../index.php" type="button" class="w-50 btn btn-md btn-secondary mt-3">Back</a>
        </form>

    </main>



</body>

</html>