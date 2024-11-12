<?php
    session_start();
    require 'stickerInfo.php'; // Include the sticker array

    if (isset($_POST['btnContinue'])) {
        session_destroy();
        header('Location: index.php');
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
        <h3>Online Shopping is Successful</h3>
        
        <!-- Start the form -->
        <form method="POST">
            <button type="submit" name="btnContinue" class="btn btn-danger">
                <i class="fa-solid fa-bag-shopping mr-2" aria-hidden="true"></i>Continue
            </button>
        </form>
        <!-- End the form -->
    </div>
</body>
</html>