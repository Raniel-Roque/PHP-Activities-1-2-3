<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    <h1>Peys App</h1>
    <form method="post">
        <label for="rngSize">Select Photo Size:</label>
        <input type="range" name="rngSize" id="rngSize" min="10" max="100" step="10" value="60"> <br>
        <label for="">Select Border Color:</label>
        <input type="color" name="clrBorder" id="clrBorder" value="#000000"> <br>
        <button type="submit" name="btnProcess">Process</button> <br><br><br>

        <?php 
            if (isset($_REQUEST['btnProcess'])) {
                $borderColor = $_REQUEST['clrBorder'];
                $size = $_REQUEST['rngSize'];
            }

            echo '<img src="Roque.jpg" width="' . (empty($size) ? '60' : $size) . '%" height="' . (empty($size) ? '60' : $size) . '%" style="border:5px solid '. (empty($borderColor) ? '#000000' : $borderColor) . ';">'
        ?>
    </form>
</body>
</html>