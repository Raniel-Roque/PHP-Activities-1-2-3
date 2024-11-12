<?php
session_start();
require 'stickerInfo.php'; // Include the sticker array

// Check if the cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
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

if (isset($_POST['btnDelete'])) {
    header('Location: remove-confirm.php');
    exit;
}

// Retrieve the cart from the session
$cart = $_SESSION['cart'];

// Step 1: Merge identical items in the cart
$mergedCart = [];
foreach ($cart as $item) {
    $found = false;
    // Look for an existing item with the same name and size
    foreach ($mergedCart as &$mergedItem) {
        if ($mergedItem['name'] === $item['name'] && $mergedItem['size'] === $item['size']) {
            // Merge quantities
            $mergedItem['quantity'] += $item['quantity'];
            $mergedItem['total'] = $mergedItem['quantity'] * $mergedItem['price']; // Recalculate total
            $found = true;
            break;
        }
    }

    // If the item wasn't found, add it to the merged cart
    if (!$found) {
        $mergedCart[] = $item;
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
                    <span class="badge badge-light">
                        <?php
                        // Calculate total quantity in the cart
                        $totalQuantity = 0;
                        foreach ($mergedCart as $item) {
                            $totalQuantity += $item['quantity']; // Sum up the quantity of each item
                        }
                        echo $totalQuantity;
                        ?>
                    </span>
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
                                    <th scope="col-1"></th>
                                    <th scope="col-2">Product Name</th>
                                    <th scope="col-2">Size</th>
                                    <th scope="col-2" class="text-center">Quantity</th>
                                    <th scope="col-2" class="text-center">Price</th>
                                    <th scope="col-2" class="text-center">Total</th>
                                    <th scope="col-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalAmount = 0;
                                foreach ($mergedCart as $item) {
                                    // Assuming photo1 is available in the item data
                                    $imagePath = 'img/' . $item['photo']; // Path to the photo stored in the cart item

                                    echo "<tr>";
                                    echo "<td><img src='" . htmlspecialchars($imagePath) . "' alt='" . htmlspecialchars($item['name']) . "' style='width: 50px; height: 50px;' /></td>"; // Display product image
                                    echo "<td>" . htmlspecialchars($item['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($item['size']) . "</td>";
                                    echo "<td class='text-center'>
                                            <input class='form-control' type='number' value='" . $item['quantity'] . "' min='1' max='100' />
                                          </td>";
                                    echo "<td class='text-center'>₱ " . number_format($item['price'], 2) . "</td>";
                                    echo "<td class='text-center'>₱ " . number_format($item['total'], 2) . "</td>";
                                    echo "<td>
                                            <form method='post'>
                                                <button type='submit' class='btn btn-danger' name='btnDelete'>
                                                    <i class='fa fa-trash'></i>
                                                </button>
                                            </form>
                                          </td>";
                                    echo "</tr>";

                                    $totalAmount += $item['total']; // Add to the total amount
                                }
                                ?>

                                <!-- Display Total -->
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td class="text-left"><?php echo array_sum(array_column($mergedCart, 'quantity')); ?></td>
                                    <td class="text-center">----</td>
                                    <td class="text-center"><strong>₱ <?php echo number_format($totalAmount, 2); ?></strong></td>
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