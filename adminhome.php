<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:home.php");
}
?>
    <style>
        .hero {
            opacity: 0;
            transform: translateX(-100%);
            animation: slide-in-hero 2s forwards, fade-in 2s forwards;
        }

        .about-us {
            opacity: 0;
            animation: fade-in 3s forwards;
        }

        .product-info {
            opacity: 0;
            transform: translateX(100%);
            animation: slide-in-product 2s forwards, fade-in 2s forwards;
        }

        @keyframes slide-in-hero {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes slide-in-product {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                filter: blur(20px);
            }

            to {
                opacity: 1;
                filter: blur(0);
            }
        }

        div.card-body {
            padding: 10px;
        }

        div.card {
            padding: 20px;
        }

        .card {
            opacity: 0;
            transition: all 2s;
            filter: blur(5px);
            transform: translateX(100%);
        }

        .show {
            opacity: 1;
            filter: blur(0);
            transform: translateX(0);
        }

    </style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="adminhome.php" style="font-size: 24px;">WEBSHOP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="adminhome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adminproducten.php">Producten</a>
                        </li>
                        <li class="nav-item is-active">
                            <a class="nav-link" href="admin.php">Admin Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admincontact.php">Contact</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                                    class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="hero bg-dark text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1>Welcome to Our Webshop</h1>
                    <p class="lead">Discover the latest and most popular electronics.</p>
                    <a href="pdo.php" class="btn btn-primary">Shop Now</a>
                </div>
                <div class="col-md-4">
                    <img src="../pdo/kisspng-refrigerator-samsung-rf26j7500-frigidaire-gallery-fridge-5b273a947cae05.6211153315292975565107.png"
                        alt="Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="about-us py-5">
        <div class="container">
            <h2>About Us</h2>
            <p class="lead">Our webshop features an extensive product catalog, where customers can browse through the
                latest and most popular electronics. Each product is presented with detailed specifications, images, and
                user reviews, enabling customers to make informed choices.</p>
        </div>
    </section>

    <section class="products py-5">
        <div class="container">
            <h2 class="text-center mb-5">Featured Products</h2>
            <div class="row">
                <?php
                require_once('db.database.php');
                $pdoconnect = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
                $pdoconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = "SELECT `name`, `info`, `foto`, `product_id` FROM `producten`";
                $stmt = $pdoconnect->query($query);

                while ($row = $stmt->fetch()) {
                    echo '<div class="col-md-4 mb-2">';
                    echo '<div class="card none">';
                    echo '<img src="' . $row['foto'] . '" class="card-img-top" alt="' . $row['name'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['name'] . '</h5>';
                    echo '<p class="card-text">' . $row['info'] . '</p>';
                    echo "<a href='detail.php?product_id={$row['product_id']}' class='btn btn-success mt-3 detail-btn'>Details</a>";
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    

    <footer class="bg-light">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4">
                    <h5 class="mb-3 text-dark">About Us:</h5>
                    <p>
                        Our webshop is characterized by an extensive product catalog, where customers can browse through
                        the latest and most popular electronics. Each product is presented with detailed specifications,
                        images, and user reviews, enabling customers to make well-informed decisions.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3 text-dark">More</h5>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-1">
                            <a href="#!" style="color: #4f4f4f;">FAQ</a>
                        </li>
                        <li class="mb-1">
                            <a href="#!" style="color: #4f4f4f;">Classes</a>
                        </li>
                        <li class="mb-1">
                            <a href="#!" style="color: #4f4f4f;">Pricing</a>
                        </li>
                        <li>
                            <a href="#!" style="color: #4f4f4f;">Safety</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-1 text-dark">Opening Hours</h5>
                    <table class="table" style="border-color: #666;">
                        <tbody>
                            <tr>
                                <td>Mon - Fri:</td>
                                <td>8am - 9pm</td>
                            </tr>
                            <tr>
                                <td>Sat - Sun:</td>
                                <td>8am - 1am</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright:
            <a class="text-dark" href="#">WEBSHOP</a>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
const hiddenElement = document.querySelectorAll(".card");

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if (entry.isIntersecting) {
            entry.target.classList.add("show");
        } else {
            entry.target.classList.remove("none");
        }
    });
});

hiddenElement.forEach((el) => observer.observe(el));
</script>
</html>