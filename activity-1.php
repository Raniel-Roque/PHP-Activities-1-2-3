<?php 
    $arrDrinks = array(
        'Coke',
        'Sprite',
        'Royal',
        'Pepsi',
        'Mountain Dew'
    );

    $arrDrinksPrice = array(
        '15',
        '20',
        '20',
        '15',
        '20'
    );

    $arrSizes = array(
        'Regular',
        'Up Size (add ₱ 5)',
        'Jumbo (add ₱ 10)'
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
                    foreach($arrDrinks as $key => $value) {
                        echo '<input type="checkbox" name="ckbDrink_' . $key . '" id="ckbDrink_' . $key . '">';
                        echo '<label for="ckbDrink_' . $key . '"> ' . $value . ' - ₱' . $arrDrinksPrice[$key] . '</label><br>';
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
                        echo '<option value="' . $key .'">' . $value .'</option>';
                ?>
            </select>

            <label for="quantity">Quantity: </label>
            <input type="number" name="quantity" id="quantity" min="1" max="99" value="1">
            <button type="submit" name="btnCheckout">Check Out</button>
        </fieldset>
    </form>

    <?php if(isset($_REQUEST['btnCheckout'])) : ?>

        <hr>
        <h1>Purchase Summary: </h1>
        <ul> 
            <?php
            $quantity = $_REQUEST['quantity'];
            $totalcost = 0;
            $totalquantity = 0;

            switch ($_REQUEST['size']) {
                case 0:
                    $size = 'Regular';
                    $sizeCost = 0;
                    break;
                case 1:
                    $size = 'Up-size';
                    $sizeCost = 5;
                    break;
                case 2:
                    $size = 'Jumbo';
                    $sizeCost = 10;
                    break;    
            }
            
            foreach($arrDrinks as $key => $value){
                if(isset($_REQUEST['ckbDrink_' . $key])) {
                    $cost = (($arrDrinksPrice[$key] + $sizeCost) * ($quantity));
                    echo '<li>'. $quantity . ' piece' . ($quantity > 1 ? 's ' : ' ') . 'of ' . $size . ' ' . $value . ' amounting to ₱ ' . $cost . '</li>';
                    $totalcost += $cost;
                    $totalquantity += $quantity;
                }
            }
            ?>
        </ul>

        <?php
            echo '<b>Total Number of Items: </b> ' . $totalquantity . '<br>';
            echo '<b>Total Amount: </b>' . $totalcost;
        ?>

    <?php endif; ?>
</body>
</html>