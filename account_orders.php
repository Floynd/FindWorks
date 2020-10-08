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
    <title>Личный кабинет</title>
</head>

<body>


    <?php
    include_once('./includes/header.php');
    ?>

    <?php
    $sql = "SELECT * FROM users WHERE login = ?";
    $find = $pdo->prepare($sql);
    $find->execute(array($_SESSION['login']));
    $lineUser = $find->fetchAll();
    ?>


    <main class='user_container'>

        <div class='user_container_main'>

            <h2>Профиль пользователя</h2>
            <div class='user_flex_block'>
                <?php
                foreach ($lineUser as $arr) {
                    echo "
                <div class='user_left_side'>
                    <div class='user_top_left_side'>
                        <ul>
                            <li> <img src='$arr[image]'></li>
           
                            <li><a href='./accept_customer.php?$arr[login]' class='buttonsAc'>Стать исполнителем</a></li>
                        </ul>
                    </div>

                    <div class='user_top_right_side'>
                        <ul>
                            <li>$arr[FIO]</li>
                            <li>Телефон: $arr[number_phone]</li>
                            
                            ";
                    echo "
                            <li>Изменить личную информацию: <a href='./accept_status.php?$arr[login]'>Изменить</a></li>    
                            ";
                    // if (!isset($_SESSION['customer'])) {
                    //     echo "
                    //         <li>Подтвердите аккаунт исполнителя: <a href='./accept_customer.php?$arr[login]'>Подтвердить</a></li>";
                    // } else {
                    //     echo "
                    //         <li>Аккаунт исполнителя подтвержден</li>    
                    //         ";
                    // }
                    echo "
                        </ul>
                    </div>
                </div>

                <div class='user_right_side'>
                    <div class='block_balance'>
                        <ul>
                            <li>Баланс: $arr[payment_summ] Рублей</li>
                            <li><a href='./payment_cart.php?$arr[login]' class='buttons'>Пополнить</a></li>
                            <li><a href='./payment_cart.php?$arr[login]' class='buttons'>Вывести</a></li>
                            <li><a href='./account_orders.php' class='buttons'>Ваши задания</a></li>
                            <li><a href='./account_orders_for_customers.php' class='buttonsAc'>Задания исполнителей</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            ";
                }


                ?>



                <!-- блок в профиле с отображением откликов на задания -->
                <div class='user_block_bottom'>
                    <h2>Ваши задания на исполнение</h2>
                    <?php
                    //для заказчика
                    $sql = "SELECT * FROM accept_orders WHERE `user_name` = '$_SESSION[login]'";
                    $Data  = $pdo->query($sql);
                    $lineOrdersAccount = $Data->fetchAll();

                    foreach ($lineOrdersAccount as $arr) {
                        echo "
                             <div class='cart_feedback_flex'>
                                 <div class='feedback_left_side'>
                                 <img src='./includes/images/avatar2.jpg'>
                                </div>
                                <div class='feedback_right_side'>
                                    <div>Исполнитель: $arr[user_customer]</div>
                                    <div>$arr[title]</div>
                                    <div>$arr[description]</div>
                                    <div class='input_orders_account'><form method='GET'><a href='./orders_chat.php?&AccountOrders=" . $arr['ID'] . "&username=" . $arr['user_customer'] . "' class='linkChat'>Перейти в чат</a></form></div>
                                </div>
                             </div>";
                    }

                    //для исполнителя
                    // $sql = "SELECT * FROM accept_orders WHERE `user_customer` = '$_SESSION[login]'";
                    // $Data  = $pdo->query($sql);
                    // $lineOrdersAccount2 = $Data->fetchAll();

                    // foreach ($lineOrdersAccount2 as $arr) {
                    //     echo "
                    //          <div class='cart_feedback_flex'>
                    //              <div class='feedback_left_side'>
                    //              <img src='./includes/images/avatar2.jpg'>
                    //             </div>
                    //             <div class='feedback_right_side'>
                    //                 <div>Заказчик: $arr[user_name]</div>
                    //                 <div>$arr[title]</div>
                    //                 <div>$arr[description]</div>
                    //                 <div class='input_orders_account'><form method='POST' action='./orders_chat.php'><input type='submit' value='Перейти в чат' name='road_chat'></form></div>
                    //             </div>
                    //          </div>";
                    // }


                    ?>



                </div>
            </div>
    </main>



</body>

</html>