<?php 
    $arrDrinks = array(
        'Coke' => 15,
        'Sprite' => 20,
        'Royal' => 20,
        'Pepsi'=> 15,
        'Mountain Dew' => 20
    );

    $arrSizes = array(
        'Regular' => 0,
        'Up Size' => 5,
        'Jumbo' => 10
    )
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>
    <form method="post">
        <h1>Vendo Machine</h1>
        <fieldset>
            <legend>Products: </legend>
            <?php
                if(isset($arrDrinks)) {
                    $index = 0;
                    foreach($arrDrinks as $key => $value) {
                        echo '<input type="checkbox" name="ckbDrinks[]" id="ckbDrink_' . $index . '" value="' . $key .'">';
                        echo '<label for="ckbDrinks[]"> ' . $key . ' - ₱' . $value . '</label><br>';
                        $index++;
                    }
                }
            ?>
        </fieldset>

        <fieldset>
            <legend>Options: </legend>
            <label for="size">Size: </label>

            <select name="size" id="size">
                <?php
                    foreach($arrSizes as $key => $value) 
                        echo '<option value="' . $key .'">' . $key . ' ' . ($key != 'Regular' ? '(add ₱ '. $value .')' : '' ). '</option>';
                ?>
            </select>

            <label for="quantity">Quantity: </label>
            <input type="number" name="quantity" id="quantity" min="1" max="999" value="1">
            <button type="submit" name="btnCheckout">Check Out</button>
        </fieldset>
    </form>

    <?php if (isset($_REQUEST['btnCheckout'])): ?>
        <?php if(!empty($_REQUEST['ckbDrinks'])): ?>
            <hr>
            <h1>Purchase Summary: </h1>
            
            <ul>
                <?php
                    $arrDrinksChosen = $_REQUEST['ckbDrinks'];
                    $size = $_REQUEST['size'];
                    $quantity = $_REQUEST['quantity'];
                    $totalcost = 0;
                    $totalquantity = 0;

                    foreach($arrDrinksChosen as $key => $value) {
                        $cost = (($arrDrinks[$value] + $arrSizes[$size]) * ($quantity));
                            
                        $totalcost += $cost;
                        $totalquantity += $quantity;
                        echo '<li>'. $quantity . ' piece' . ($quantity > 1 ? 's ' : ' ') . 'of ' . $size . ' ' . $value . ' amounting to ₱ ' . $cost . '</li>';
                    }
                ?>

            </ul>

            <?php
                echo '<b>Total Number of Items: </b> ' . $totalquantity . '<br>';
                echo '<b>Total Amount: </b>₱ ' . $totalcost;
            ?>
        <?php else: ?>
            <hr>
            No Selected Product. Try Again.
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>