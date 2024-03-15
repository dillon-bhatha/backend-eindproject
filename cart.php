<?php
session_start();
require_once('db.database.php');

$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <!-- Your header content -->
    </header>
    <h1>Shopping Cart</h1>
    <div class="cart-items">
        <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION['cart'] as $product_id => $quantity): ?>
                        <?php
                        // Fetch product details from database
                        $stmt = $conn->prepare("SELECT * FROM producten WHERE product_id = ?");
                        $stmt->execute([$product_id]);
                        $product = $stmt->fetch();

                        // Calculate total price for the product
                        $productTotal = $product['prijs'] * $quantity;
                        $totalPrice += $productTotal;
                        ?>
                        <tr>
                            <td><?= $product_id ?></td>
                            <td><?= $product['name'] ?></td>
                            <td>$<?= $product['prijs'] ?></td>
                            <td><?= $quantity ?></td>
                            <td>$<?= $productTotal ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p>Total Price: $<?= $totalPrice ?></p>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>
    <a href="userproducten.php">Back to Products</a>
    <footer class="bg-light">
        <!-- Your footer content -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
</body>
</html>
