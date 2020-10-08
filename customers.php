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
    <link rel="stylesheet" href="./includes/css/customers.css" type="text/css" />
    <title>Главная страница</title>
</head>

<body>
    <?php
    include_once('./includes/header.php');
    ?>


    <main class='main_customers'>

        <div id='space_list'></div>

        <div class='left_block_customers'>
            <?php
            echo "
            <ul>
                <li><a href='customers.php?all'>Все категории</a></li>
                <li><a href='#'>Грузоперевозки</a></li>
                <li><a href='#'>Уборка</a></li>
                <li><a href='#'>Web-разработка</a></li>
                <li><a href='#'>Юридическая помощь</a></li>
                <li><a href='#'>Компьютерная помощь</a></li>
                <li><a href='#'>Репетиторы и обучение</a></li>
            </ul>
            ";
            ?>
        </div>


        <div id='space_list'></div>


        <div class='right_block_customers'>
            <div class='func_block_customers'>
                Сортировать по -
                <form method='POST'>
                    <input type='submit' value='Рейтингу' name='estimation'>
                    -
                    <input type='submit' value='Отзывам' name='feedback'>
                </form>
            </div>
            <?php
            if (!isset($_POST['estimation'])) {
                if (!isset($_POST['feedback'])) {
                    foreach ($lineCustomers as $arr) {

                        echo "
            <div class='carts_user'>
                <div class='left_carts'>
                    <div><img src='$arr[image]'></div>
                </div>

                <div class='right_carts'>
                    <div><strong>$arr[user_login]</strong></div>
                    <div>$arr[description]</div>

                    <div>Оценка: $arr[estimation]</div>
                    <div>Отзывов: $arr[feedback]</div>
                    
                    <div><form method='GET'><a class='linkChat' href='./feedback_form.php?id_customers&id=" . $arr['ID_customers'] . "&username=" . $arr['user_login'] . "'>Оставить отзыв</a></form></div>
                </div>
            </div>";
                    }
                }
            }
            if (isset($_POST['estimation'])) {
                foreach ($lineCustomersEstimation as $arr) {
                    echo "
                    <div class='carts_user'>
                        <div class='left_carts'>
                            <div><img src='$arr[image]'></div>
                        </div>

                        <div class='right_carts'>
                            <div><strong>$arr[user_login]</strong></div>
                            <div>$arr[description]</div>
                            <div>Оценка: $arr[estimation]</div>
                            <div>Отзывов: $arr[feedback]</div>
                            <div><form method='GET'><a class='linkChat' href='./feedback_form.php?id_customers&id=" . $arr['ID_customers'] . "&username=" . $arr['user_login'] . "'>Оставить отзыв</a></form></div>
                        </div>
                    </div>";
                }
            }

            if (isset($_POST['feedback'])) {
                foreach ($lineCustomersFeedBack as $arr) {
                    echo "
                    <div class='carts_user'>
                        <div class='left_carts'>
                            <div><img src='$arr[image]'></div>
                        </div>

                        <div class='right_carts'>
                            <div><strong>$arr[user_login]</strong></div>
                            <div>$arr[description]</div>
                            <div>Оценка: $arr[estimation]</div>
                            <div>Отзывов: $arr[feedback]</div>
                            <div><form method='GET'><a class='linkChat' href='./feedback_form.php?id_customers&id=" . $arr['ID_customers'] . "&username=" . $arr['user_login'] . "'>Оставить отзыв</a></form></div>
                        </div>
                    </div>";
                }
            }
            ?>


        </div>

        <div id='space_list'></div>
    </main>


    <?php
    // include_once('./includes/footer.php');
    ?>




    <script src='.js'></script>
</body>