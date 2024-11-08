<?php
    $arrUsersList = array(
        'Admin' => array(
            'admin'     => 'Pass1234',
            'renmark'   => 'Pogi1234'
        ),
    
        'Content Manager' => array(
            'pepito'    => 'manaloto',
            'juan'      => 'delacruz'
        ),
    
        'System User' => array(
            'pedro'     => 'penduko'
        )
    );

    // Check if the form has been submitted by checking if 'btnSignIn' is set
    if (isset($_POST['btnSignIn'])) {
        // Sanitize inputs to prevent XSS and other malicious code
        $userType = $_POST['inputUserType'];
        $userUsername = htmlspecialchars(trim($_POST['inputUserName']));
        $userPassword = htmlspecialchars(trim($_POST['inputPassword']));

        // Validate if username and password are correct
        if (array_key_exists($userType, $arrUsersList) && 
            array_key_exists($userUsername, $arrUsersList[$userType]) && 
            $arrUsersList[$userType][$userUsername] == $userPassword) {
            $message = "Welcome to the system: " . htmlspecialchars($userUsername);
            $alertClass = "alert-success";
        } else {
            $message = "Incorrect Username / Password.";
            $alertClass = "alert-danger";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/custom-login.css">
    <title>Login</title>
</head>
<body>
    <div class="container mt-3">
        <?php if (isset($message)): ?>
            <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" style="max-width: 350px; margin: auto;">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="POST" class="form-signin">
                <select class="form-select" name="inputUserType" id="inputUserType">
                    <option value="Admin">Admin</option>
                    <option value="Content Manager">Content Manager</option>  
                    <option value="System User">System User</option>   
                </select>

                <input type="text" name="inputUserName" id="inputUserName" class="form-control" placeholder="User Name" required autofocus>
                <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name='btnSignIn'>Sign in</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>
