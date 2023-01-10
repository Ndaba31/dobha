<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/b6a4716a36.js" crossorigin="anonymous"></script>

    <!-- ajax and jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- personal css linking -->
    <link rel="stylesheet" href="<?php echo $css ?>">
    <title><?php echo $title ?></title>
</head>
<body>
    <?php 
        include('components/navbar.php');
        include($content); 
    ?>
</body>
</html>