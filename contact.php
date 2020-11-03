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
    <title>Document</title>
    <link rel="stylesheet" href="access/vendor/bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="access/vendor/bootstrap-4.5.2-dist/css/bootstrap-grid.css">
    <link rel="stylesheet" href="access/vendor/bootstrap-4.5.2-dist/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="access/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="access/css/style.css">
</head>
<body>

<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Google Contact</h1>
                <div class="">
                    <a href="googlecontact.php" class="btn btn-outline-primary"><i class="feather-upload"></i> Upload</a>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-12">
            <div class="mt-3">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach(contact() as $c){  ?>
                        <tr>
                            <td><?php echo $c['id'];?></td>
                            <td><img src="<?php echo $c['photo'];?>" alt="" style="width: 35px!important; height: 35px!important; object-fit: cover!important;" class="shadow rounded-circle"></td>
                            <td><?php echo $c['name'];?></td>
                            <td><a href="mailto:<?php echo $c['email'];?>" class="text-decoration-none text-dark"><i class="feather-mail text-white rounded-circle p-2 bg-danger"></i> <?php echo $c['email']?></a></td>
                            <td><a href="tel:<?php echo $c['phone'];?>" class="text-decoration-none text-dark"><i class="feather-phone-call text-white rounded-circle p-2 bg-success"></i> <?php echo $c['phone']?></a></td>
                            <td><?php echo showTime($c['created_at']);?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<script src="access/js/jquery.min.js"></script>
<script src="access/vendor/bootstrap-4.5.2-dist/js/jquery.dataTables.min.js"></script>
<script src="access/vendor/bootstrap-4.5.2-dist/js/dataTables.bootstrap4.min.js"></script>
<script src="access/vendor/bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
<script src="access/vendor/bootstrap-4.5.2-dist/js/bootstrap.bundle.min.js"></script>
<script src="access/js/app.js"></script>
<script>
    $(document).ready(function () {
        $('table').DataTable()
    });
</script>
</body>
</html>