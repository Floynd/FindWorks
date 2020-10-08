<?php
session_start();
require_once('./DB/logik.php');
require_once('./DB/connection.php');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./includes/css/main.css" type="text/css" />
    <link rel="stylesheet" href="./includes/css/orders.css" type="text/css" />
    <title>Главная страница</title>
</head>

<body>
    <?php
    include_once('./includes/header.php');
    ?>


    <main>


        <div class='container_create_orders'>
            <?php include_once('includes/categories.php'); ?>
        </div>


    </main>

    <?php
    include_once('./includes/footer.php');
    ?>

</body>

</html>