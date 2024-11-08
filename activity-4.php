<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <title>Server Side Validation</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <div class="card bg-light">
                    <article class="card-body mx-auto" style="max-width: 400px;">
                        <h4 class="card-title mt-3 text-center">Create Account</h4>
                        <form method="post">
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                </div>
                                <input name="txtFullName" class="form-control" placeholder="Full name" type="text">
                            </div> <!-- form-group// -->

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radSex" id="radMale" value="Male">
                                <label class="form-check-label" for="radMale">Male</label>
                            </div>

                            <div class="form-check form-check-inline mb-2">
                                <input class="form-check-input" type="radio" name="radSex" id="radFemale" value="Female">
                                <label class="form-check-label" for="radFemale">Female</label>
                            </div>

                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input name="txtEmail" class="form-control" placeholder="Email address" type="text">
                            </div> <!-- form-group// -->

                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                </div>
                                <select name="drpJobType" class="form-control">
                                    <option selected="">Select job type</option>
                                    <option>Developer</option>
                                    <option>Designer</option>
                                    <option>Quality Assurance</option>
                                </select>
                            </div> <!-- form-group end.// -->

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                            </div> <!-- form-group// -->
                        </form>
                    </article>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
