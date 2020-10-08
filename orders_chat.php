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
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./includes/css/main.css" type="text/css" />
    <link rel="stylesheet" href="./includes/css/orders.css" type="text/css" />
    <link rel="stylesheet" href="./includes/css/chat.css" type="text/css" />
    <title>Главная страница</title>
</head>

<body>

    <?php
    include_once('./includes/header.php');
    ?>


    <main class='main_orders'>


        <div class="centeralised">
            <h2>Задание №<?php
                            // function UserName()
                            // {
                            //     $GLOBALS["username"] = $_GET['username'];
                            // }
                            // UserName();
                            // echo $username;
                            $_SESSION['username'] = $_GET['username'];

                            $result2 = $_GET['AccountOrders'];
                            $result3 = $_GET['username'];
                            echo "$result2 Исполнитель: $result3";
                            ?></h2>
            <div class="chathistory"></div>
            <div class="chatbox">
                <form action="" method="POST">
                    <ul>
                        <li><textarea class="txtarea" id="message" name="message"></textarea></li>
                        <li> <input type='submit' name='up_orders' value='Принять задание'></li>
                        <li> <input type='submit' name='closeUp_orders' value='Отказаться'></li>
                        <!-- <li> <input type='submit' name='close_order' value='Завершить задание'></li> -->
                        <!-- <li><input type='hidden' name='user_perfomermer' value='$_SESSION[accepment_account]'></li>
                        <li><input type='hidden' name='user_customer' value='$_SESSION[login]'></li> -->
                    </ul>
                    <?php


                    $sql = "SELECT * FROM accept_orders WHERE ID = '$result2'";
                    $Data  = $pdo->query($sql);
                    $lineCloseOrders = $Data->fetchAll();

                    foreach ($lineCloseOrders as $arr) {
                        echo "
                            <input type='hidden' name='title' value='$arr[title]'>
                            <input type='hidden' name='price' value='$arr[price]'>
                            <input type='hidden' name='user_name' value='$arr[user_name]'>
                            <input type='hidden' name='description' value='$arr[description]'>
                            <input type='hidden' name='price' value='$arr[price]'>";
                    }
                    ?>
                </form>
            </div>
        </div>

        <script src='./includes/js/chat.js'></script>
        <?php


        if (isset($_POST['up_orders'])) {
            $sqlIns3 = "INSERT INTO `close_orders` SET `title` = ?, `price` = ?, `user_name` = ?, `description` = ?, `user_customer` = ?";
            $ins3 = $pdo->prepare($sqlIns3);
            $ins3->execute(array("$_POST[title]", "$_POST[price]", "$_POST[user_name]", "$_POST[description]", "$_SESSION[login]"));
            echo "<script>alert('Заказ завершен! Оставьте отзыв!')</script>";
            echo "<script type = 'text/javascript'>location.href='./customers.php'</script>";
        }

        if (isset($_POST['up_orders'])) {
            // $sql = "DELETE FROM accept_orders WHERE ID = $result2 ";
            $sqlIns4 = "DELETE FROM `accept_orders` WHERE `ID` = ? ";
            $ins4 = $pdo->prepare($sqlIns4);
            $ins4->execute(array("$_GET[AccountOrders]"));
        }

        if (isset($_POST['closeUp_orders'])) {
            // $sql = "DELETE FROM accept_orders WHERE ID = $result2 ";
            $sqlIns4 = "DELETE FROM `accept_orders` WHERE `ID` = ? ";
            $ins4 = $pdo->prepare($sqlIns4);
            $ins4->execute(array("$_GET[AccountOrders]"));
            echo "<script>alert('Задание удалено!')</script>";
            echo "<script type = 'text/javascript'>location.href='./account_orders.php'</script>";
        }


        if (isset($_POST['road_chat'])) {
            // $_SESSION['customer_in_account_orders'] = $_POST['user_customer'];
            // echo "$_SESSION[customer_in_account_orders]";
        }

        // if (isset($_POST['up_orders'])) {
        //     $sqlIns3 = "INSERT INTO `up_orders` SET `user_performer` = ?, `user_customer` = ?";
        //     $ins3 = $pdo->prepare($sqlIns3);
        //     $ins3->execute(array("$_SESSION[accepment_account]", "$_SESSION[login]"));
        //     echo "<script>alert('Задание завершено! Оставьте отзыв')</script>";
        //     echo "<script type = 'text/javascript'>location.href='./orders_chat.php'</script>";
        //     echo " <form>
        //             Оставить отзыв:
        //         </form> ";
        // }


        // if (isset($_POST['close_order'])) {
        //     $sqlIns3 = "INSERT INTO `close_orders` SET `user_performer` = ?, `user_customer` = ?";
        //     $ins3 = $pdo->prepare($sqlIns3);
        //     $ins3->execute(array("$_SESSION[accepment_account]", "$_SESSION[login]"));
        //     echo "<script>alert('Задание завершено! Оставьте отзыв')</script>";
        //     echo "<script type = 'text/javascript'>location.href='./orders_chat.php'</script>";
        //     echo " <form>
        //             Оставить отзыв:
        //         </form> ";
        // }

        ?>



    </main>

    <?php
    // include_once('./includes/footer.php');
    ?>

</body>

</html>