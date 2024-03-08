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
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
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

  <!-- Contact Form Section -->
  <section id="contact" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Contact Us</h4>
            </div>
            <div class="card-body">
              <form method="post" action="process_contact.php">
                <div class="form-group">
                  <label for="name">Your Name</label>
                  <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="email">Your Email</label>
                  <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-light">
    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4">
                <h5 class="mb-3 text-dark">About Us:</h5>
                <p>
                Our webshop is characterized by an extensive product catalog, where customers can browse through the latest and most popular electronics. Each product is presented with detailed specifications, images, and user reviews, enabling customers to make well-informed decisions.
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

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>