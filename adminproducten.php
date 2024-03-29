<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location:home.php");
}

if (isset($_POST['delete'])) {
    $product_id = $_POST['product_id'];

    require_once('db.database.php');

    $query = "DELETE FROM `producten` WHERE `product_id` = :product_id";
    $pdoresult = $conn->prepare($query);
    $pdoExec = $pdoresult->execute(array(":product_id" => $product_id));

    if ($pdoExec) {
        echo "<div class='alert alert-success'>Product Deleted</div>";
    } else {
        echo "<div class='alert alert-danger'>ERROR</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../pdo/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .deleto {
            width: 330px;
            background-color: red;
            border-radius: 5px;
            height: 40px;
            color: white;
            box-shadow: #4f4f4f;
            margin-top: 7px;
            border-style: none;
        }

        .deleto:hover {
            filter: brightness(85%);
        }

        div.card {
            padding: 20px;
        }

        .info {
            opacity: 0;
            transition: all 2s;
            filter: blur(5px);
            transform: translateX(-100%);
        }

        .show {
            opacity: 1;
            filter: blur(0);
            transform: translateX(0);
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="adminhome.php" style="font-size: 24px;">WEBSHOP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0" />
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

    <main class="container mt-3">
        <div class="row">
            <?php
            require_once('db.database.php');

            $query = "SELECT * FROM producten";

            $stmt = $conn->query($query);

            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='info'>";
                    echo "<div class= 'titel'><h3><strong>{$row['name']}</strong></h3></div>";
                    if (!empty($row["foto"])) {
                        echo "<a href='" . $row["foto"] . "' target='_blank'>";
                        echo "<img src='" . $row["foto"] . "' alt='foto' class='img-fluid'>";
                        echo "</a>";
                    } else {
                        echo "No foto available";
                    }
                    echo "<div class='details'>";
                    echo "<h2 class='prijzen'>$<strong>{$row['prijs']}</strong></h2>";
                    echo "<div class= 'informatie'>{$row['info']}</div>";
                    echo "</div>";
                    echo "<a href='detail.php?product_id={$row['product_id']}' class='btn btn-success mt-2 detail-btn'>Details</a>";
                    echo "<button class='btn btn-primary mt-2 add-to-cart' data-product-id='{$row['product_id']}'>Add to Cart</button>";
                    echo "<form method='post' action=''>";
                    echo "<input type='hidden' name='product_id' value='" . $row['product_id'] . "'>";
                    echo "<button class ='deleto' type='submit' name='delete' class='btn btn-danger mt-2'>Delete</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "No results found.";
            }
            ?>
        </div>
    </main>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');

            addToCartButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const productId = button.getAttribute('data-product-id');

                    addToCart(productId);
                });
            });

            function addToCart(productId) {
                console.log('Product added to cart with ID: ' + productId);
            }
        });
    </script>
    <script>
const hiddenElement = document.querySelectorAll(".info");

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
</body>

</html>