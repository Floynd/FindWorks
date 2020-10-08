<?php
Session_start();
require_once('./DB/logik.php');
require_once('./DB/connection.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='includes/css/main.css'>
    <link rel='stylesheet' href='includes/css/categories.css'>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <?php
    include_once('./includes/header.php');

    ?>
    <main>
        <div class='main_wrapper'>
            <div class='category_wrapper'>
                <!-- перевозки -->
                <?php
                if (isset($_GET['trucking'])) {
                    echo "


                        <div class='categories_form'>
                            <h1>Заполните заявку</h1>
                            <h2>Грузоперевозки</h2>
                            <form class='style_form' method='POST'>
                                <ul>
                                Заголовок
                                <li><input type='text' id='input_form1' placeholder='Перевезти стол' name='title' maxlength='18'></li>
                                Вес
                                <li><input type='text' id='input_form1' placeholder='20 кг' name='weight'></li>
                                Длина
                                <li><input type='text' id='input_form2' placeholder='1.5 м' name='length'></li>
                                Ширина
                                <li><input type='text' id='input_form3' placeholder='1 м' name='width'></li>
                                Расстояние
                                <li><input type='text' id='input_form4' placeholder='около 40 км' name='distance'></li>
                                Описание
                                <li><input type='text' class='description_form' placeholder='Нужно срочно перевезти столы из офиса' name='description'></li>
                                Цена
                                <li><input type='text' id='input_form4' placeholder='1000 руб.' name='price'></li>
                                <li><input type='submit' name='enter_form' value='Отправить' id='enter_form_style'></li>
                                 <input type='hidden' name='login' value='$_SESSION[login]'>
                                </ul>
                            </form>
                        </div>
                        ";
                    if (isset($_POST['enter_form'])) {
                        $sqlIns = "INSERT INTO `trucking` SET `title` = ?, `weight` = ?,`length` = ?, `width` = ?, `distance` = ?, `description` = ?,`price` = ?, `user_name` = ?";

                        $ins = $pdo->prepare($sqlIns);
                        $ins->execute(array("$_POST[title]", "$_POST[weight]", "$_POST[length]", "$_POST[width]", "$_POST[distance]", "$_POST[description]",  "$_POST[price]", "$_SESSION[login]"));
                        echo "<script>alert('Задание создано!')</script>";
                        echo "<script type = 'text/javascript'>location.href='./orders.php'</script>";
                    }

                    if (isset($_POST['enter_form'])) {
                        $sqlIns2 = "INSERT INTO `orders` SET `categories` = 'trucking', `title` = ?, `description` = ?,`price` = ?, `user_name` = ?";
                        $ins2 = $pdo->prepare($sqlIns2);
                        $ins2->execute(array("$_POST[title]", "$_POST[description]", "$_POST[price]", "$_SESSION[login]"));
                    }
                }
                // уборка
                if (isset($_GET['cleaning'])) {
                    echo "
                    <div class='categories_form'>
                    <h1>Заполните заявку</h1>
                    <h2>Уборка</h2>
                    <form class='style_form' method='POST'>
                        <ul>
                        Заголовок
                            <li><input type='text' id='input_form1' placeholder='Убрать офис' name='title' maxlength='18'></li>
                            Площадь уборки
                            <li><input type='text' id='input_form1' placeholder='60 м квадратных' name='perimetr'></li>
                            Описание
                            <li><input type='text' class='description_form' placeholder='Нужно срочно перевезти столы из офиса' name='description'></li>
                            Цена
                            <li><input type='text' id='input_form4' placeholder='1000 руб.' name='price'></li>
                            <li><input type='submit' name='enter_form' value='Отправить' id='enter_form_style'></li>
                            <input type='hidden' name='login' value='$_SESSION[login]'>
                        </ul>
                </form>
                </div>
                        ";
                    if (isset($_POST['enter_form'])) {
                        $sqlIns = "INSERT INTO `cleaning` SET `title` = ?, `perimetr` = ?,`description` = ?,`price` = ?, `user_name` = ?";

                        $ins = $pdo->prepare($sqlIns);
                        $ins->execute(array("$_POST[title]", "$_POST[perimetr]", "$_POST[description]",  "$_POST[price]", "$_SESSION[login]"));
                        echo "<script>alert('Задание создано!')</script>";
                        echo "<script type = 'text/javascript'>location.href='./orders.php'</script>";
                    }

                    if (isset($_POST['enter_form'])) {
                        $sqlIns2 = "INSERT INTO `orders` SET `categories` = 'cleaning', `title` = ?, `description` = ?,`price` = ?, `user_name` = ?";
                        $ins2 = $pdo->prepare($sqlIns2);
                        $ins2->execute(array("$_POST[title]", "$_POST[description]", "$_POST[price]", "$_SESSION[login]"));
                    }
                }
                // веб разработка
                if (isset($_GET['webDev'])) {
                    echo "
                    <div class='categories_form'>
                    <h1>Заполните заявку</h1>
                    <h2>Веб-разработка</h2>
                    <form class='style_form' method='POST'>
                        <ul>
                        Заголовок
                            <li><input type='text' id='input_form1' placeholder='Разработать сайт для продаж' name='title' maxlength='18'></li>
                            Примерные сроки
                            <li><input type='text' id='input_form1' placeholder='15 дней' name='days'></li>
                            Описание
                            <li><input type='text' class='description_form' placeholder='Нужно срочно перевезти столы из офиса' name='description'></li>
                            Цена
                            <li><input type='text' id='input_form4' placeholder='1000 руб.' name='price'></li>
                            <li><input type='submit' name='enter_form' value='Отправить' id='enter_form_style'></li>
                            <input type='hidden' name='login' value='$_SESSION[login]'>
                        </ul>
                </form>
                </div>
                        ";
                    if (isset($_POST['enter_form'])) {
                        $sqlIns = "INSERT INTO `web` SET `title` = ?, `days` = ?,`description` = ?,`price` = ?, `user_name` = ?";

                        $ins = $pdo->prepare($sqlIns);
                        $ins->execute(array("$_POST[title]", "$_POST[days]", "$_POST[description]",  "$_POST[price]", "$_SESSION[login]"));
                        echo "<script>alert('Задание создано!')</script>";
                        echo "<script type = 'text/javascript'>location.href='./orders.php'</script>";
                    }

                    if (isset($_POST['enter_form'])) {
                        $sqlIns2 = "INSERT INTO `orders` SET `categories` = 'web', `title` = ?, `description` = ?,`price` = ?, `user_name` = ?";
                        $ins2 = $pdo->prepare($sqlIns2);
                        $ins2->execute(array("$_POST[title]", "$_POST[description]", "$_POST[price]", "$_SESSION[login]"));
                    }
                }
                // юр помощь
                if (isset($_GET['legalAssist'])) {
                    echo "
                    <div class='categories_form'>
                    <h1>Заполните заявку</h1>
                    <h2>Юридическая помощь</h2>
                    <form class='style_form' method='POST'>
                        <ul>
                        Заголовок
                            <li><input type='text' id='input_form1' placeholder='Документы(Юр.помощь)' name='title' maxlength='18'></li>
                            Примерные сроки
                            <li><input type='text' id='input_form1' placeholder='2 дня' name='days'></li>
                            Описание
                            <li><input type='text' class='description_form' placeholder='Заверить и подписать документы юр. лицом' name='description'></li>
                            Цена
                            <li><input type='text' id='input_form4' placeholder='1000 руб.' name='price'></li>
                            <li><input type='submit' name='enter_form' value='Отправить' id='enter_form_style'></li>
                            <input type='hidden' name='login' value='$_SESSION[login]'>
                        </ul>
                </form>
                </div>
                        ";
                    if (isset($_POST['enter_form'])) {
                        $sqlIns = "INSERT INTO `legalAssist` SET `title` = ?, `days` = ?,`description` = ?,`price` = ?, `user_name` = ?";

                        $ins = $pdo->prepare($sqlIns);
                        $ins->execute(array("$_POST[title]", "$_POST[days]", "$_POST[description]",  "$_POST[price]", "$_SESSION[login]"));
                        echo "<script>alert('Задание создано!')</script>";
                        echo "<script type = 'text/javascript'>location.href='./orders.php'</script>";
                    }

                    if (isset($_POST['enter_form'])) {
                        $sqlIns2 = "INSERT INTO `orders` SET `categories` = 'legalAssist', `title` = ?, `description` = ?,`price` = ?, `user_name` = ?";
                        $ins2 = $pdo->prepare($sqlIns2);
                        $ins2->execute(array("$_POST[title]", "$_POST[description]", "$_POST[price]", "$_SESSION[login]"));
                    }
                }



                if (isset($_GET['pcHelp'])) {
                    echo "
                    <div class='categories_form'>
                    <h1>Заполните заявку</h1>
                    <h2>Компьютерная помощь</h2>
                    <form class='style_form' method='POST'>
                        <ul>
                        Заголовок
                            <li><input type='text' id='input_form1' placeholder='Сломался ПК' name='title' maxlength='18'></li>
                            Примерные сроки
                            <li><input type='text' id='input_form1' placeholder='7 дней' name='days'></li>
                            Описание
                            <li><input type='text' class='description_form' placeholder='Не работает видеокарта' name='description'></li>
                            Цена
                            <li><input type='text' id='input_form4' placeholder='1000 руб.' name='price'></li>
                            <li><input type='submit' name='enter_form' value='Отправить' id='enter_form_style'></li>
                            <input type='hidden' name='login' value='$_SESSION[login]'>
                        </ul>
                </form>
                </div>
                        ";
                    if (isset($_POST['enter_form'])) {
                        $sqlIns = "INSERT INTO `pcHelp` SET `title` = ?, `days` = ?,`description` = ?,`price` = ?, `user_name` = ?";

                        $ins = $pdo->prepare($sqlIns);
                        $ins->execute(array("$_POST[title]", "$_POST[days]", "$_POST[description]",  "$_POST[price]", "$_SESSION[login]"));
                        echo "<script>alert('Задание создано!')</script>";
                        echo "<script type = 'text/javascript'>location.href='./orders.php'</script>";
                    }

                    if (isset($_POST['enter_form'])) {
                        $sqlIns2 = "INSERT INTO `orders` SET `categories` = 'pcHelp', `title` = ?, `description` = ?,`price` = ?, `user_name` = ?";
                        $ins2 = $pdo->prepare($sqlIns2);
                        $ins2->execute(array("$_POST[title]", "$_POST[description]", "$_POST[price]", "$_SESSION[login]"));
                    }
                }
                // уроки
                if (isset($_GET['lessons'])) {
                    echo "
                    <div class='categories_form'>
                    <h1>Заполните заявку</h1>
                    <h2>Уроки и обучение</h2>
                    <form class='style_form' method='POST'>
                        <ul>
                        Заголовок
                            <li><input type='text' id='input_form1' placeholder='Школьника подготовить' name='title' maxlength='18'></li>
                            Предмет/Курс
                            <li><input type='text' id='input_form1' placeholder='Русский ОГЭ' name='predmet'></li>
                            Описание
                            <li><input type='text' class='description_form' placeholder='Подготовить школьника к ОГЭ' name='description'></li>
                            Цена
                            <li><input type='text' id='input_form4' placeholder='1000 руб.' name='price'></li>
                            <li><input type='submit' name='enter_form' value='Отправить' id='enter_form_style'></li>
                            <input type='hidden' name='login' value='$_SESSION[login]'>
                        </ul>
                </form>
                </div>
                        ";
                    if (isset($_POST['enter_form'])) {
                        $sqlIns = "INSERT INTO `lessons` SET `title` = ?, `predmet` = ?,`description` = ?,`price` = ?, `user_name` = ?";
                        $ins = $pdo->prepare($sqlIns);
                        $ins->execute(array("$_POST[title]", "$_POST[predmet]", "$_POST[description]",  "$_POST[price]", "$_SESSION[login]"));
                        echo "<script>alert('Задание создано!')</script>";
                        echo "<script type = 'text/javascript'>location.href='./orders.php'</script>";
                    }

                    if (isset($_POST['enter_form'])) {
                        $sqlIns2 = "INSERT INTO `orders` SET `categories` = 'lessons', `title` = ?, `description` = ?, `price` = ?, `user_name` = ?";
                        $ins2 = $pdo->prepare($sqlIns2);
                        $ins2->execute(array("$_POST[title]", "$_POST[description]", "$_POST[price]", "$_SESSION[login]"));
                    }
                }


                ?>


            </div>
        </div>

    </main>

    <?php
    include_once('./includes/footer.php');
    ?>


</body>

</html>