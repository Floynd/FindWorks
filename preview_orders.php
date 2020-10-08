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


    <main class='main_orders'>
        <div class='wrapper_preview_orders'>
            <form method='POST'>
                <?php

                $result = $_GET['preview'];
                // echo "$result";


                $sqlPreview = "SELECT * FROM `orders` WHERE ID_orders = $result";
                $Data  = $pdo->query($sqlPreview);
                $lineOrdersPreview = $Data->fetchAll();


                foreach ($lineOrdersPreview as $arr) {
                    echo "
                    <h2>Просмотр заказа №$arr[ID_orders]</h2>
                    <div class='categories_form_preview'>
                    <form method='POST'>
                    <h3>$arr[title]</h3>                        <input type='hidden' name ='title' value='$arr[title]'>
                    <ul>
                     <li>Заказчик: $arr[user_name]</li>         <input type='hidden' name ='user_name' value='$arr[user_name]'>
                     <li>Описание: $arr[description]</li>       <input type='hidden' name ='description' value='$arr[description]'>
                     <li>Цена: $arr[price]</li>                 <input type='hidden' name ='price' value='$arr[price]'>
                     <li><input type='submit' value='Принять заказ' name='accept_order'> &nbsp&nbsp&nbsp&nbsp <a href='./orders.php'>Назад</a></li>
                     </ul>
                     </form>
                </div>
                        ";
                };


                if (isset($_POST['accept_order'])) {
                    $sqlIns3 = "INSERT INTO `accept_orders` SET `title` = ?, `user_name` = ?, `description` = ?, `price` = ?, `user_customer` = ?";
                    $ins3 = $pdo->prepare($sqlIns3);
                    $ins3->execute(array("$_POST[title]", "$_POST[user_name]", "$_POST[description]", "$_POST[price]", "$_SESSION[login]"));
                    echo "<script>alert('Заказ добавлен в личный кабинет!')</script>";
                };

                if (isset($_POST['accept_order'])) {
                    $sqlIns4 = "DELETE FROM `orders` WHERE `ID_orders` = ? ";
                    $ins4 = $pdo->prepare($sqlIns4);
                    $ins4->execute(array("$_GET[preview]"));
                }

                ?>
            </form>
        </div>





    </main>

    <?php
    // include_once('./includes/footer.php');
    ?>

</body>

</html>