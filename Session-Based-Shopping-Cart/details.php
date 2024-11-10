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

        <!-- Row with Image and Product Details Side by Side -->
        <div class="row">
            <!-- Column for Product Image -->
            <div class="col-4">
                <div class="product-image3">
                    <a href="#">
                        <img class="pic-1" src="img/hutao_1.jpg" alt="Product Image 1">
                        <img class="pic-2" src="img/hutao_2.jpg" alt="Product Image 2">
                    </a>
                </div>
            </div>

            <!-- Column for Title, Description, and Size Options -->
            <div class="col-8">
                <h2>Product Title</h2>
                <h4>P 550</h4>
                <p>Product description goes here. Add more details about the product, material, or any specifics the customer might want to know.</p>
                <hr>
                <!-- Radio Buttons for Size Selection -->
                <form>
                    <h4><label class="form-label">Select Size:</label></h4>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sizeOptions" id="sizeSmall" value="Small">
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
                    <h4><label class="form-label">Enter Quantity:</label></h4>
                    <input class="form-control w-100" type="number" min="1" max="100" value="0">
                    <br>
                    <div class="d-flex g-4">
                        <!-- Confirm Product Purchase Button -->
                        <button type="button" class="btn btn-dark text-white" style="margin-right: 20px;"> <!-- Increased margin on the end of the button -->
                            <i class="fa fa-check"></i> Confirm Product Purchase
                        </button>

                        <!-- Cancel/Go Back Button -->
                        <button type="button" class="btn btn-danger">
                            Cancel / Go Back
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
