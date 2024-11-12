<?php
    session_start();
    require 'stickerInfo.php'; // Include the sticker array

    // Check if the sticker data is available in the session
    if (!isset($_SESSION['sticker'])) {
        header('Location: index.php');
        exit(); // Always exit after a redirect to stop further execution
    }

    if (isset($_POST['btnCancel'])) {
        header('Location: cart.php');
        exit;
    }
    
    if (isset($_POST['btnConfirm'])) {
        header('Location: cart.php');
        exit;
    }

    if (isset($_POST['btnView'])) {
        header('Location: cart.php');
        exit;
    }

    // Get the sticker data from the session
    $sticker = $_SESSION['sticker'];
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
    <title>Shopping_cart</title>
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
                    <i class="fa fa-shopping-cart mx-2" aria-hidden="true"></i><strong>Cart</strong> &nbsp;&nbsp;<span class="badge badge-light">4</span>
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
                <!-- Use the sticker description -->
                <p style="font-size: 14px"><?php echo htmlspecialchars($sticker['description']); ?></p>
                <hr>
                <!-- Radio Buttons for Size Selection -->
                <form method="post">
                    <h4><label class="form-label">Size: XL</label></h4>

                    <hr>
                    <h4><label class="form-label">Quantity: 4</label></h4>
                    <br>
                    <div class="d-flex g-4">
                        <!-- Confirm Product Purchase Button -->
                        <button type="submit" class="btn btn-dark text-white" name="btnConfirm" style="margin-right: 10px;"> <!-- Increased margin on the end of the button -->
                            <i class="fa fa-trash"></i> Confirm Product Removal
                        </button>

                        <!-- Cancel/Go Back Button -->
                        <button type="submit" class="btn btn-danger" name="btnCancel">
                            Cancel / Go Back
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
