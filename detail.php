<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        h1 {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        img.img-fluid {
            max-width: 380px;
            display: block;
        }

        .product-info {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            margin-top: 30px;
        }

        .product-info h3 {
            color: #007bff;
            margin-top: 20px;
        }

        .product-info p {
            color: #666;
        }

        .add-to-cart {
            margin-top: 20px;
        }

        .layer {
            margin: 30px;
        }
    </style>
</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="home.php" style="font-size: 24px;">WEBSHOP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav"> <!-- Changed justify-content -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item is-active">
                        <a class="nav-link" href="pdo.php">Producten</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                        </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<?php
require_once('db.database.php');

if(isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
    $stmt = $conn->prepare("SELECT * FROM producten WHERE product_id = ?");
    $stmt->execute([$product_id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0) {
?>
        <h1><?php echo $row["name"];?></h1>
        <div class="layer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo $row["foto"]; ?>" alt="Person foto" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <div class="product-info">
                            <h3><?php echo "$" . $row["prijs"];?></h3>
                            <p><?php echo $row["info"];?></p>
                            <button class='btn btn-primary add-to-cart' data-product-id='<?php echo $row['product_id']; ?>'>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "<p>Geen records gevonden.</p>";
    }
} else {
    echo "<p>Geen product-ID opgegeven.</p>";
}
?>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>
