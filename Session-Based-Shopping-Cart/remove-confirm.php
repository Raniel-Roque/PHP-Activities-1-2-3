<?php
session_start();
require 'stickerInfo.php'; // Include the sticker array

// Check if the cart is set
if (!isset($_SESSION['cart'])) {
    header('Location: index.php'); // Redirect if no cart data exists
    exit();
}

// Ensure that the stickerKey exists in the session to identify which item to remove
if (!isset($_POST['stickerKey'])) {
    header('Location: cart.php'); // Redirect if no stickerKey is provided
    exit();
}

// Get the sticker data from the session based on the stickerKey
$stickerKey = $_POST['stickerKey'];

// Find the sticker item in the cart
$sticker = null;
foreach ($_SESSION['cart'] as $item) {
    if ($item['key'] === $stickerKey) {
        $sticker = $item;
        break; // Found the item, no need to continue looping
    }
}

// If no matching sticker is found, redirect to cart
if ($sticker === null) {
    header('Location: cart.php');
    exit();
}

// Handle button actions (Confirm removal or cancel)
if (isset($_POST['btnCancel'])) {
    header('Location: cart.php'); // Redirect back to the cart page without making changes
    exit();
}

if (isset($_POST['btnConfirm'])) {
    // Remove the sticker item from the cart
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function($item) use ($stickerKey) {
        return $item['key'] !== $stickerKey; // Remove the item by matching the key
    });
    $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex the array to ensure it remains sequential
    header('Location: cart.php'); // Redirect back to the cart page after removal
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom-index.css">
    <title>Confirm Product Removal</title>
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
                    <span class="badge badge-light"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
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
                        <!-- Use the sticker data for the images -->
                        <img class="pic-1" src="img/<?php echo htmlspecialchars($sticker['photo1']); ?>" alt="Product Image 1">
                        <img class="pic-2" src="img/<?php echo htmlspecialchars($sticker['photo2']); ?>" alt="Product Image 2">
                    </a>
                </div>
            </div>

            <!-- Column for Title, Description, and Size Options -->
            <div class="col-8">
                <!-- Use the sticker data for the title and price -->
                <h2><?php echo htmlspecialchars($sticker['name']); ?></h2>
                <h4>P <?php echo number_format($sticker['price'], 2); ?></h4>
                <p style="font-size: 14px"><?php echo htmlspecialchars($sticker['description']); ?></p>
                <hr>

                <!-- Display the size and quantity -->
                <h4><label class="form-label">Size: <?php echo htmlspecialchars($sticker['size']); ?></label></h4>
                <h4><label class="form-label">Quantity: <?php echo $sticker['quantity']; ?></label></h4>
                <hr>

                <!-- Form for confirming or canceling the removal -->
                <form method="post">
                    <div class="d-flex g-4">
                        <!-- Confirm Product Removal Button -->
                        <button type="submit" class="btn btn-dark text-white" name="btnConfirm" style="margin-right: 10px;">
                            <i class="fa fa-trash"></i> Confirm Product Removal
                        </button>

                        <!-- Cancel/Go Back Button -->
                        <button type="submit" class="btn btn-danger" name="btnCancel">
                            Cancel / Go Back
                        </button>
                    </div>

                    <!-- Hidden Input to Pass Product Key -->
                    <input type="hidden" name="stickerKey" value="<?php echo $sticker['key']; ?>">
                </form>
            </div>
        </div>
    </div>
</body>
</html>