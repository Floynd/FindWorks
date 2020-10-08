<?php
session_start();
require_once('./DB/logik.php');
require_once('./DB/connection.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./includes/css/main.css" type="text/css" />


    <title>Главная страница</title>
</head>

<body>


    <?php
    include_once('./includes/header.php');
    ?>
    <main>
        <!-- верхний блок с картинкой -->
        <div class='main_image'>
            <img src='./includes/images/workbench2.jpg' width="100%" height="600">
            <h2>
                <span class="spacer"></span>
                <span class='h1_span'>Освободим вас от забот
                    <br />
                    <span class="spacer"></span>
                    <span class='h2_span'>Поможем найти исполнителя или стать им!</span>
                </span>
                <br><br>
                <div class="button_cont" align="center">
                    <?php
                    if (isset($_SESSION['autorized'])) {
                        echo "<a class='image_button_top' href='./account.php' target='_blank' rel='nofollow noopener'>Стать исполнителем</a>";
                    } else {
                        echo "     <a class='image_button_top' href='./index.php#openModal2' target='_blank' rel='nofollow noopener'>Стать исполнителем</a>";
                    }
                    ?>
                    <a class="image_button_top" href="./create_orders.php" target="_blank" rel="nofollow noopener">Создать заказ</a>
                </div>
            </h2>

        </div>



        <!-- категрии -->
        <?php include_once('includes/categories.php'); ?>


        <!-- баннер -->
        <div class='container_banner'>
            <div class='banner'>
                <img src='./includes/images/i-45-cG.31276.1.jpg' width="600px" height="120px">
            </div>
        </div>

        <!-- блок про плюсы -->
        <div class='container_pluses'>
            <h2>Основные преимущества FindWorks</h2>
            <div class='flex_pluses'>
                <div>
                    <h3>Адекватные цены</h3>
                    <p>Конкуренция. На каждое задание претендует множество исполнителей и это позволяет выбрать наиболее
                        выгодный вариант.</p>
                </div>
                <div>
                    <h3>Добросовестные исполнители</h3>
                    <p>Наши исполнители проверяются модерацией. Мы проверяем отзывы, разбираемся с жалобами и
                        контролируем качество работы.</p>
                </div>
                <div>
                    <h3>Простота и удобство</h3>
                    <p>Вам достаточно заполнить форму задания и выбрать исполнителя! Никаких лишних действий, всё в
                        одном месте. Быстро и удобно!</p>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once('./includes/footer.php');
    ?>


    <script src='.js'></script>
</body>

</html>