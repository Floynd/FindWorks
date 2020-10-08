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



        <div class='main_container_orders'>
            <div id='space_list'></div>

            <div class='left_block_orders'>
                <div class='ttile_block_orders'>Все категории</div>
                <div class='func_block_orders'>
                    <form method='POST'>
                        Сортировать по цене - <input type='submit' value='Убывание' name='sortMin'>
                        -
                        <input type='submit' value='Возрастание' name='sortMax'>

                    </form>
                </div>
                <div>

                    <?php
                    //all
                    if (isset($_GET['all'])) {
                        foreach ($lineOrders as $arr) {
                            echo "
                                <form method='GET'> 
                            <div class='cards_orders'>
                                <div class='top_carts'>
                                    <h3 class='title_orders'>$arr[title]</h3>
                                    <span class='price_orders'>$arr[price] руб.</span>
                                </div>
                                <div class='bottom_carts'>
                                    <span class='username_orders'><strong>$arr[user_name]</strong></span>
                                    <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                                </div>
                                </form>
                            </div> ";
                        }
                    }

                    //trucking
                    if (isset($_GET['trucking'])) {
                        foreach ($lineOrdersTrucking as $arr) {
                            echo "
                                <form method='GET'> 
                            <div class='cards_orders'>
                                <div class='top_carts'>
                                    <h3 class='title_orders'>$arr[title]</h3>
                                    <span class='price_orders'>$arr[price] руб.</span>
                                </div>
                                <div class='bottom_carts'>
                                    <span class='username_orders'><strong>$arr[user_name]</strong></span>
                                    <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                                </div>
                                </form>
                            </div> ";
                        }
                    }

                    //cleaning
                    if (isset($_GET['cleaning'])) {
                        foreach ($lineOrdersCleaning as $arr) {
                            echo "
                                <form method='GET'> 
                            <div class='cards_orders'>
                                <div class='top_carts'>
                                    <h3 class='title_orders'>$arr[title]</h3>
                                    <span class='price_orders'>$arr[price] руб.</span>
                                </div>
                                <div class='bottom_carts'>
                                    <span class='username_orders'><strong>$arr[user_name]</strong></span>
                                    <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                                </div>
                                </form>
                            </div> ";
                        }
                    }

                    //web
                    if (isset($_GET['web'])) {
                        foreach ($lineOrdersWeb as $arr) {
                            echo "
                                <form method='GET'> 
                            <div class='cards_orders'>
                                <div class='top_carts'>
                                    <h3 class='title_orders'>$arr[title]</h3>
                                    <span class='price_orders'>$arr[price] руб.</span>
                                </div>
                                <div class='bottom_carts'>
                                    <span class='username_orders'><strong>$arr[user_name]</strong></span>
                                    <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                                </div>
                                </form>
                            </div> ";
                        }
                    }

                    //legalassist
                    if (isset($_GET['legalassist'])) {
                        foreach ($lineOrdersLegalassist as $arr) {
                            echo "
                                <form method='GET'> 
                            <div class='cards_orders'>
                                <div class='top_carts'>
                                    <h3 class='title_orders'>$arr[title]</h3>
                                    <span class='price_orders'>$arr[price] руб.</span>
                                </div>
                                <div class='bottom_carts'>
                                    <span class='username_orders'><strong>$arr[user_name]</strong></span>
                                    <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                                </div>
                                </form>
                            </div> ";
                        }
                    }

                    //pchelp
                    if (isset($_GET['pchelp'])) {
                        foreach ($lineOrdersPcHelp as $arr) {
                            echo "
                                <form method='GET'> 
                            <div class='cards_orders'>
                                <div class='top_carts'>
                                    <h3 class='title_orders'>$arr[title]</h3>
                                    <span class='price_orders'>$arr[price] руб.</span>
                                </div>
                                <div class='bottom_carts'>
                                    <span class='username_orders'><strong>$arr[user_name]</strong></span>
                                    <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                                </div>
                                </form>
                            </div> ";
                        }
                    }

                    //lessons
                    if (isset($_GET['lessons'])) {
                        foreach ($lineOrdersLessons as $arr) {
                            echo "
                                <form method='GET'> 
                            <div class='cards_orders'>
                                <div class='top_carts'>
                                    <h3 class='title_orders'>$arr[title]</h3>
                                    <span class='price_orders'>$arr[price] руб.</span>
                                </div>
                                <div class='bottom_carts'>
                                    <span class='username_orders'><strong>$arr[user_name]</strong></span>
                                    <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                                </div>
                                </form>
                            </div> ";
                        }
                    }


                    // if (!isset($_POST['sortMin'])) {
                    //     if (!isset($_POST['sortMax'])) {
                    //         foreach ($lineOrders as $arr) {
                    //             echo "
                    //             <form method='GET'> 
                    //         <div class='cards_orders'>
                    //             <div class='top_carts'>
                    //                 <h3 class='title_orders'>$arr[title]</h3>
                    //                 <span class='price_orders'>$arr[price] руб.</span>
                    //             </div>
                    //             <div class='bottom_carts'>
                    //                 <span class='username_orders'><strong>$arr[user_name]</strong></span>
                    //                 <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                    //             </div>
                    //             </form>
                    //         </div> ";
                    //         }
                    //     }
                    // }



                    if (isset($_POST['sortMin'])) {
                        foreach ($lineOrdersMin as $arr) {
                            echo "
                            <form method='GET'> 
                            <div class='cards_orders'>
                                <div class='top_carts'>
                                    <h3 class='title_orders'>$arr[title]</h3>
                                    <span class='price_orders'>$arr[price] руб.</span>
                                </div>
                                <div class='bottom_carts'>
                                    <span class='username_orders'><strong>$arr[user_name]</strong></span>
                                    <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                                </div>
                                </form>
                            </div> ";
                        }
                    }

                    if (isset($_POST['sortMax'])) {
                        foreach ($lineOrdersMax as $arr) {
                            echo "
                            <form method='GET'> 
                            <div class='cards_orders'>
                                <div class='top_carts'>
                                    <h3 class='title_orders'>$arr[title]</h3>
                                    <span class='price_orders'>$arr[price] руб.</span>
                                </div>
                                <div class='bottom_carts'>
                                    <span class='username_orders'><strong>$arr[user_name]</strong></span>
                                    <a href='./preview_orders.php?preview=" . $arr['ID_orders'] . "'>Просмотреть</a>
                                </div>
                                </form>
                            </div> ";
                        }
                    };




                    //сессия для чата
                    // if (isset($_POST['orderBtn'])) {
                    //     $_SESSION['order'] = $arr['user_name'];
                    //     $_SESSION['order'] = true;
                    // };
                    ?>
                    <!-- категории -->

                </div>
            </div>

            <div id='space_list'></div>

            <div class='right_block_orders'>
                <?
                    echo "
                    <form method='GET'>
                <ul>
                        <li><a href='orders.php?all'>Все категории</a></li>
                        <li><a href='orders.php?trucking'>Грузоперевозки</a></li>
                        <li><a href='orders.php?cleaning'>Уборка</a></li>
                        <li><a href='orders.php?web'>Web-разработка</a></li>
                        <li><a href='orders.php?legalassist'>Юридическая помощь</a></li>
                        <li><a href='orders.php?pchelp'>Компьютерная помощь</a></li>
                        <li><a href='orders.php?lessons'>Репетиторы и обучение</a></li>
                </ul>
                </form>";
                    ?>
            </div>
        </div>

        <? 
              

?>



        <div id='space_list'></div>
    </main>

    <?php
    // include_once('./includes/footer.php');
    ?>

</body>

</html>