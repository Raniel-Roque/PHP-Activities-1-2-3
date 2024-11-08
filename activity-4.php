<?php
    $fullName = '';
    $sex = 'Male';
    $emailAddress = '';
    $jobType = '';

    if (isset($_POST['btnCreate'])) {
        // Data scrubbing
        $arrErrors = [];
        $fullName = htmlspecialchars(stripslashes(trim($_POST['txtFullName'])));
        $sex = $_POST['radSex'];
        $emailAddress = htmlspecialchars(stripslashes(trim($_POST['txtEmail'])));
        $jobType = $_POST['drpJobType'];

        // Check if file is uploaded
        if (isset($_FILES['filImage'])) {
            $fileName = $_FILES['filImage']['name'];
            $fileSize = $_FILES['filImage']['size'];
            $fileTemp = $_FILES['filImage']['tmp_name'];
            $fileType = $_FILES['filImage']['type'];
            $fileError = $_FILES['filImage']['error'];

            // Check if a file was uploaded
            if ($fileError === UPLOAD_ERR_NO_FILE) {
                $arrErrors[] = "File is required.";
            } else {
                $fileExtTemp = explode('.', $fileName);
                $fileExt = strtolower(end($fileExtTemp));

                $arrAllowedFiles = array('jpeg', 'jpg', 'png');
                $uploadDIR = 'uploads/';

                // Check if file extension is allowed
                if (in_array($fileExt, $arrAllowedFiles) === false) {
                    $arrErrors[] = "File extension is not allowed. You can only choose JPG, JPEG, or PNG.";
                }

                // Check file size
                if ($fileSize > 5000000) { // 5MB maximum
                    $arrErrors[] = "File size should be a maximum of 5MB.";
                }
            }
        }

        // Check if fields are empty
        if (empty($fullName)) $arrErrors['fullName'] = 'Full Name is Required.';
        if (empty($sex)) $arrErrors['sex'] = 'Sex is Required.';
        if (empty($emailAddress)) $arrErrors['emailAddress'] = 'Email Address is Required.';
        else {
            if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                $arrErrors['emailAddress'] = 'Email Address is Invalid.';
            }
        }
        if (empty($jobType)) $arrErrors['jobType'] = 'Job Type is Required.';

        // If there are no errors, proceed with uploading
        if (empty($arrErrors)) {
            if (isset($fileTemp) && move_uploaded_file($fileTemp, $uploadDIR . $fileName)) {
                header("location:activity-4_page2.php");
            } else {
                echo 'There was an issue uploading the file.';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <title>Server Side Validation</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <?php if(isset($arrErrors)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>System Errors!</strong> The following list are the Errors in the Form.   
                    <hr>
                    <ul>
                        <?php foreach($arrErrors as $key => $value): ?>
                            <li> <?php echo $value ?> </li>
                        <?php endforeach; ?>
                    </ul>             
                </div>
                <?php endif; ?>

                <div class="card bg-light">
                    <article class="card-body mx-auto" style="max-width: 400px;">
                        <h4 class="card-title mt-3 text-center">Create Account</h4>
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="txtFullName" class="form-control" placeholder="Full name" type="text" value="<?php echo $fullName; ?>">
                            </div> <!-- form-group// -->

                            <div class="form-check form-check-inline">
                                <?php if($sex == 'Male'): ?>
                                    <input class="form-check-input" type="radio" name="radSex" id="radMale" value="Male" checked>
                                <?php else: ?>
                                    <input class="form-check-input" type="radio" name="radSex" id="radMale" value="Male">
                                <?php endif; ?>
                                <label class="form-check-label" for="radMale">Male</label>
                            </div>

                            <div class="form-check form-check-inline mb-2">
                                <?php if($sex == 'Female'): ?>
                                    <input class="form-check-input" type="radio" name="radSex" id="radFemale" value="Female" checked>
                                <?php else: ?>
                                    <input class="form-check-input" type="radio" name="radSex" id="radFemale" value="Female">
                                <?php endif; ?>                                
                                <label class="form-check-label" for="radFemale">Female</label>
                            </div>

                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input name="txtEmail" class="form-control" placeholder="Email address" type="text" value="<?php echo $emailAddress; ?>">
                            </div> <!-- form-group// -->

                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                <select name="drpJobType" class="form-select">
                                    <option value="" <?php echo $jobType == '' ? 'selected' : ''; ?>>Select job type</option>
                                    <option value="Developer" <?php echo $jobType == 'Developer' ? 'selected' : ''; ?>>Developer</option>
                                    <option value="Designer" <?php echo $jobType == 'Designer' ? 'selected' : ''; ?>>Designer</option>
                                    <option value="Quality Assurance" <?php echo $jobType == 'Quality Assurance' ? 'selected' : ''; ?>>Quality Assurance</option>
                                </select>
                            </div>
                            
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-upload"></i> </span>
                                </div>
                                <input type="file" name="filImage" id="filImage" class="form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" name='btnCreate' class="btn btn-primary btn-block">Create Account</button>
                            </div> <!-- form-group// -->
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
