<?php
session_start();

// Ensure the sticker is stored in the session
if (!isset($_SESSION['sticker'])) {
    header('Location: index.php');
    exit(); // Redirect back to the main store if no sticker is selected
}

$sticker = $_SESSION['sticker']; // Get the sticker from the session

// Handle the add to cart functionality
if (isset($_POST['btnAddToCart'])) {
    // Capture selected size and quantity, sanitize input
    $selectedSize = filter_input(INPUT_POST, 'sizeOptions', FILTER_SANITIZE_STRING);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

    // Ensure valid quantity (1-100)
    if ($quantity === false || $quantity < 1 || $quantity > 100) {
        $quantity = 1; // Default to 1 if invalid quantity
    }

    // Create the cart item with a unique key (the sticker key)
    $cartItem = array(
        'key' => $sticker['key'],  // Use the sticker key as the unique identifier
        'name' => htmlspecialchars($sticker['name']),
        'price' => (float)$sticker['price'], // Ensure price is numeric
        'size' => $selectedSize,
        'quantity' => $quantity,
        'total' => $quantity * (float)$sticker['price'],
        'photo' => $sticker['photo1'] // Use photo1 (can include photo2 if needed)
    );

    // Initialize the cart session if not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Add the item to the cart session
    $_SESSION['cart'][] = $cartItem;

    // Redirect to the cart page after adding to the cart
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/custom-index.css">
    <title>Sticker Details</title>
</head>

<body>
    <br>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="h3" style="font-size: 35px;">
                <i class="fa fa-store mx-2" aria-hidden="true"></i> Hoyo Sticker Online Store
            </h3>
            <form method="post">
                <button type="submit" name="btnView" class="btn btn-primary">
                    <i class="fa fa-shopping-cart mx-2" aria-hidden="true"></i><strong>Cart</strong> &nbsp;&nbsp;
                    <span class="badge badge-light"><?php echo count($_SESSION['cart']); ?></span>
                </button>
            </form>
        </div>
        <hr>

        <!-- Row with Image and Product Details Side by Side -->
        <div class="row">
            <!-- Column for Product Image -->
            <div class="col-4">
                <div class="product-image3">
                    <a href="#">
                        <img class="pic-1" src="img/<?php echo htmlspecialchars($sticker['photo1']); ?>" alt="Product Image 1">
                        <img class="pic-2" src="img/<?php echo htmlspecialchars($sticker['photo2']); ?>" alt="Product Image 2">
                    </a>
                </div>
            </div>

            <!-- Column for Title, Description, and Size Options -->
            <div class="col-8">
                <!-- Product Name and Price -->
                <h2><?php echo htmlspecialchars($sticker['name']); ?></h2>
                <h4>P <?php echo number_format($sticker['price'], 2); ?></h4>
                <p style="font-size: 14px"><?php echo htmlspecialchars($sticker['description']); ?></p>
                <hr>

                <!-- Radio Buttons for Size Selection -->
                <form method="post">
                    <h4><label class="form-label">Select Size:</label></h4>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sizeOptions" id="sizeSmall" value="Small" checked>
                            <label class="form-check-label" for="sizeSmall">Small</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sizeOptions" id="sizeMedium" value="Medium">
                            <label class="form-check-label" for="sizeMedium">Medium</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sizeOptions" id="sizeLarge" value="Large">
                            <label class="form-check-label" for="sizeLarge">Large</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sizeOptions" id="sizeXLarge" value="XL">
                            <label class="form-check-label" for="sizeXLarge">Extra Large (XL)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sizeOptions" id="sizeXXLarge" value="XXL">
                            <label class="form-check-label" for="sizeXXLarge">Extra Extra Large (XXL)</label>
                        </div>
                    </div>

                    <hr>

                    <!-- Quantity Input -->
                    <h4><label class="form-label">Enter Quantity:</label></h4>
                    <input class="form-control w-100" type="number" name="quantity" min="1" max="100" value="1">
                    <br>

                    <!-- Add to Cart Button -->
                    <button type="submit" name="btnAddToCart" class="btn btn-dark text-white" style="margin-right: 10px;">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>

                    <!-- Back to Store Button -->
                    <a href="index.php" class="btn btn-danger">
                        <i class="fa fa-shopping-bag mx-2"></i> Continue Shopping
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>