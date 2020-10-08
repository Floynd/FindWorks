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
    // $sql = "SELECT * FROM users WHERE ID_user = ?";
    // $find = $pdo->prepare($sql);
    // $find->execute(array($_SESSION['ID_user']));
    // $lineUser = $find->fetchAll();
    ?>


    <main class='user_container'>

        <div class='user_container_main'>
            <form class='style_form1' method='POST'>
                <ul>
                    ФИО
                    <li><input type='text' id='input_form1' placeholder='Валерий Альбертович' name='fio_user'></li>
                    Телефон
                    <li><input type='text' id='input_form1' placeholder='89222927909' name='phone_user'></li>
                    <li><input type='submit' name='enter_form_accept' value='Отправить' id='enter_form_style'></li>
                </ul>
            </form>
            <?php
            if (isset($_POST['enter_form_accept'])) {
                $sqlIns1 = "UPDATE `users` SET `FIO` = ?, `number_phone` = ?, `status` = '1' WHERE `login` = '$_SESSION[login]'";
                $ins1 = $pdo->prepare($sqlIns1);
                $ins1->execute(array("$_POST[fio_user]", "$_POST[phone_user]"));
                echo "<script>alert('Аккаунт подтвержден!')</script>";
                echo "<script type = 'text/javascript'>location.href='./account.php'</script>";
            }

          

            ?>
        </div>
    </main>



</body>

</html>