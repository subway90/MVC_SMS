<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CDN font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- CDN bootstrap icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <!-- CDN JS Bootstrap 5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <!-- CDN CSS Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <!-- CDN JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- CSS Custom -->
    <link rel="stylesheet" href="<?= URL ?>assets/css/custom.css">
    <!-- JS Custom -->
    <script src="<?= URL ?>assets/js/custom.js"></script>
    <!-- JS Ajax Product -->
    <script src="<?= URL ?>assets/js/ajax_product.js"></script>
    <!-- JS Ajax Cart -->
    <script src="<?= URL ?>assets/js/ajax_cart.js"></script>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= WEB_FAVICON ?>" type="image/x-icon">
    <!-- Title -->
    <title><?= isset($title) ? $title : WEB_NAME ?></title>
</head>

<?= toast_show() ?>

<body>