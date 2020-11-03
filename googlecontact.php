<?php

session_start();
require_once "base.php";
require_once "googlecontactfunction.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Validation</title>
    <link rel="stylesheet" href="access/vendor/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="access/vendor/bootstrap-4.5.2-dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="access/vendor/bootstrap-4.5.2-dist/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="access/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="access/css/style.css">
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-8">
            <div class="my-5">
                <div class="card cus-card">
                    <div class="card-body">
                        <dvi class="d-flex justify-content-start align-items-center">
                            <h5 class="font-weight-bold text-uppercase mr-2 mb-0">
                                Create new contact
                            </h5>
                            <a href="#" class="btn btn-outline-dark rounded-pill py-0 font-weight-bolder text-black-50"><i class="feather-arrow-right-circle"></i> No Label</a>
                        </dvi>
                        <hr>

                        <?php



                        if(isset($_POST['reg'])){

                            register();

                        }
                        ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="name" class="text-black-50 font-weight-bold"><i class="feather-user"></i> Your Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?php echo old('name'); ?>">
                                <?php if(getError('name')) { ?>
                                    <small class="text-danger font-weight-bold"><?php echo getError('name') ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-black-50 font-weight-bold"><i class="feather-mail"></i> Email</label>
                                <input type="text" id="email" name="email" class="form-control" value="<?php echo old('email'); ?>">
                                <?php if(getError('email')) { ?>
                                    <small class="text-danger font-weight-bold"><?php echo getError('email') ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="text-black-50 font-weight-bold"><i class="feather-phone-call"></i> Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo old('phone'); ?>">
                                <?php if(getError('phone')) { ?>
                                    <small class="text-danger font-weight-bold"><?php echo getError('phone') ?></small>
                                <?php } ?>
                            </div>


                            <div class="form-group">
                                <label for="upload" class="text-black-50 font-weight-bold">Upload Photo</label>
                                <input type="file" id="upload" name="upload" class="form-control p-1" value="<?php echo old('upload'); ?>">
                                <?php if(getError('upload')) { ?>
                                    <small class="text-danger font-weight-bold"><?php echo getError('upload') ?></small>
                                <?php } ?>
                            </div>



                            <hr>
                            <div class="form-row justify-content-between align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" required id="customSwitch2">
                                    <label class="custom-control-label" for="customSwitch2">All Correct</label>
                                </div>
                                <button name="reg" class="btn btn-primary">Submit</button>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="contact.php" class="text-decoration-none">Google Contact List <i class="feather-arrow-right-circle ml-2"></i> </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php clearError(); ?>


<script src="access/js/jquery.min.js"></script>
<script src="access/vendor/bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
<script src="access/vendor/bootstrap-4.5.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>