<?php 
    $arrDrinks = array(
        'Coke' => 15, 
        'Sprite' => 20, 
        'Royal' => 20,
        'Pepsi' => 15,
        'Mountain Dew' => 20
    );

    $arrSizes = array(
        'regular' => 'Regular',
        'upSize' => 'Up Size (add ₱ 5)',
        'jumbo' => 'Jumbo (add ₱ 10)'
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
    <h1>Vendo Machine</h1>
    <fieldset>
        <legend>Products: </legend>
        <?php
            if(isset($arrDrinks)) {
                foreach($arrDrinks as $key => $value) {
                    echo '<input type="checkbox" name="ckbDrink_' . $key . '" id="ckbDrink_' . $key . '">';
                    echo '<label for="ckbDrink_' . $key . '"> ' . $key . ' - ₱' . $value . '</label><br>';
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

        <label for="size">Quantity: </label>
        <input type="number" min="1" value="1">
        <button type="submit">Check Out</button>
    </fieldset>

    <hr>
    <h1>Purchase Summary: </h1>
    <ul> 
        <li>
            piece of name amounting to ₱ price
        </li>
    </ul>

    <b>Total Number of Items: </b><br>
    <b>Total Amount: </b>
</body>
</html>