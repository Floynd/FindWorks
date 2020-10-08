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
                <?php echo " <h2>Форма заполнения отзыва исполнителю $arr[name_customer]</h2>" ?>
                <ul>
                    <br>
                    <?php
                    echo " <li><input type='hidden' name='responded' value='$_SESSION[login]'></li> 
                    <li><input type='hidden' name='user_target' value='$_GET[username]'></li> 
                    ";
                    ?>
                    <li><input type='text' id='input_form1_description' class='form_input_description' name='text_comment' placeholder='Текст отзыва'></li>
                    <br>
                    <li><input type='text' id='enter_form_style' name='estimation' placeholder='Оценка (от 1 до 5)'></li>
                    <li><input type='submit' name='enter_form_feedback' value='Отправить' id='enter_form_style'></li>
                    <!-- <li><input type='hidden' id='input_form1' name='user_login'></li>
                    Опишите свою деятельность
                    <li><input type='text' id='input_form1_description' class='form_input_description' placeholder='Делаю сайты любой сложности' name='description'></li>
                    <li><input type='hidden' id='input_form1' name='image'></li>
                    <li><input type='submit' name='enter_form_accept' value='Отправить' id='enter_form_style'></li> -->

                </ul>
            </form>
            <?php
            if (isset($_POST['enter_form_feedback'])) {
                $sqlIns5 = "INSERT INTO `feedback` SET `responded` = ?, `user_target` = ?, `text` = ?, `estimation` = ?";
                $ins5 = $pdo->prepare($sqlIns5);
                $ins5->execute(array("$_POST[responded]", "$_POST[user_target]", "$_POST[text_comment]", "$_POST[estimation]"));
                echo "<script>alert('Отзыв оставлен!')</script>";
                echo "<script type = 'text/javascript'>location.href='./customers.php'</script>";
            }

            if (isset($_POST['enter_form_feedback'])) {
                $sqlIns2 = "UPDATE `customers` SET `feedback` =  (feedback + 1) WHERE `user_login` = ?";
                $ins2 = $pdo->prepare($sqlIns2);
                $ins2->execute(array("$_POST[user_target]"));
            }

            if (isset($_POST['enter_form_feedback'])) {
                $sqlIns2 = "UPDATE `customers` SET `estimation` =  (SELECT AVG(estimation)  FROM feedback WHERE feedback.user_target = customers.user_login) WHERE `user_login` = ?";
                $ins2 = $pdo->prepare($sqlIns2);
                $ins2->execute(array("$_POST[user_target]"));
            }



            ?>
        </div>
    </main>



</body>

</html>