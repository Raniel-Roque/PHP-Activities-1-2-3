<?php
    session_start();
    require 'stickerInfo.php'; // Include the sticker array

    // Check if the sticker data is available in the session
    if (!isset($_SESSION['sticker'])) {
        header('Location: index.php');
        exit(); // Always exit after a redirect to stop further execution
    }

    if (isset($_POST['btnContinue'])) {
        header('Location: index.php');
        exit;
    }

    if (isset($_POST['btnCheckout'])) {
        header('Location: clear.php');
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
    <title>Shopping Cart</title>
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
                    <span class="badge badge-light">4</span>
                </button>
            </form>
        </div>

        <hr>
        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col-3">Product Name</th>
                                    <th scope="col-2">Size</th>
                                    <th scope="col-2" class="text-center">Quantity</th>
                                    <th scope="col-2" class="text-center">Price</th>
                                    <th scope="col-2" class="text-center">Total</th>
                                    <th scope="col-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Product Name Dada</td>
                                    <td>Large</td>
                                    <td class="text-center">
                                        <input class="form-control" type="number" value="1" min="1" max="100" />
                                    </td>
                                    <td class="text-center">₱ 24.90</td>
                                    <td class="text-center">₱ 24.90</td>
                                    <td>
                                        <form method="post">
                                            <button type="submit" class="btn btn-danger" name="btnDeleteDada">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Name Toto</td>
                                    <td>Medium</td>
                                    <td class="text-center">
                                        <input class="form-control" type="number" value="1" min="1" max="100" />
                                    </td>
                                    <td class="text-center">₱ 33.90</td>
                                    <td class="text-center">₱ 33.90</td>
                                    <td>
                                        <form method="post">
                                            <button type="submit" class="btn btn-danger" name="btnDeleteToto">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Product Name Titi</td>
                                    <td>Small</td>
                                    <td class="text-center">
                                        <input class="form-control" type="number" value="1" min="1" max="100" />
                                    </td>
                                    <td class="text-center">₱ 70.00</td>
                                    <td class="text-center">₱ 70.00</td>
                                    <td>
                                        <form method="post">
                                            <button type="submit" class="btn btn-danger" name="btnDeleteTiti">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-center">4</td>
                                    <td class="text-center">----</td>
                                    <td class="text-center"><strong>₱ 128.80</strong></td>
                                    <td>----</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col mb-2">
                    <div class="row">
                        <div class="col-4">
                            <form method="post">
                                <button type="submit" class="btn btn-block btn-danger" name="btnContinue">
                                    <i class="fa fa-shopping-bag mx-2"></i> Continue Shopping
                                </button>
                            </form>
                        </div>
                        <div class="col-4">
                            <form method="post">
                                <button type="submit" class="btn btn-block btn-success" name="btnUpdateCart">
                                    <i class="fa fa-sync-alt mx-2"></i> Update Cart
                                </button>
                            </form>
                        </div>
                        <div class="col-4">
                            <form method="post">
                                <button type="submit" class="btn btn-block btn-primary" name="btnCheckout">
                                    <i class="fa fa-credit-card mx-2"></i> Checkout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
