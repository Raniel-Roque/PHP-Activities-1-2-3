<?php
    session_start();
    require 'stickerInfo.php'; // Include the array from stickerInfo.php

    if (isset($_POST['btnCart'])) {
        if (isset($_POST['sticker_key'])) {
            $sticker_key = $_POST['sticker_key']; // Get the sticker key from the POST data
            
            // Make sure the key exists in the array before accessing it
            if (isset($arrStickers[$sticker_key])) {
                $_SESSION['sticker'] = $arrStickers[$sticker_key]; // Store the selected sticker in the session
                header('Location: details.php');
                exit(); // Always exit after a redirect to stop further script execution
            }
        }
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
    <title>Shopping_cart</title>
</head>
<body>
    <br>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="h3" style="font-size: 35px;">
                <i class="fa fa-store mx-2" aria-hidden="true"></i> Hoyo Sticker Online Store
            </h3>
            <button type="button" class="btn btn-primary">
                <i class="fa fa-shopping-cart mx-2" aria-hidden="true"></i><strong>Cart</strong> &nbsp;&nbsp;<span class="badge badge-light">4</span>
            </button>
        </div>
        <hr>
        <div class="row g-3">
            <?php foreach ($arrStickers as $key => $sticker): ?>
                <div class="col-3" style="margin-bottom: 30px">
                    <div class="card">
                        <div class="product-grid2">
                            <div class="product-image2">
                                <form method="POST">
                                    <input type="hidden" name="sticker_key" value="<?php echo $key; ?>">
                                    <button type="submit" name="btnCart" style="background: none; border: none; padding: 0;">
                                        <img class="pic-1" src="img/<?php echo $sticker['photo1']; ?>">
                                        <img class="pic-2" src="img/<?php echo $sticker['photo2']; ?>">
                                    </button>
                                </form>
                                <!-- Wrap Add to Cart in a form to submit the sticker key -->
                                <form method="POST">
                                    <input type="hidden" name="sticker_key" value="<?php echo $key; ?>">
                                    <button type="submit" name="btnCart" class="add-to-cart">
                                        <i class="fa fa-shopping-cart"></i> &nbspAdd to cart
                                    </button>
                                </form>
                            </div>
                            <div class="card-body product-content">
                                <h3 class="title">
                                    <?php echo $sticker['name']; ?>
                                    <span class="badge badge-dark" style="padding: 10px; color: white;">
                                        ₱<?php echo number_format($sticker['price'], 2); ?>
                                    </span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <hr>
</body>
</html>