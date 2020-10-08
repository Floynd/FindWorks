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
    <title>Оплата картой</title>
</head>

<body>






    <main class='cart_payment'>


        <div id="card-success" class="hidden">
            <i class="fa fa-check"></i>
            <p>Оплата прошла успешно!</p>
        </div>
        <div id="form-errors" class="hidden">
            <i class="fa fa-exclamation-triangle"></i>
            <p id="card-error">Card error</p>
        </div>
        <div id="form-container">
            <form method='POST'>
                <div id="card-front">
                    <div id="shadow"></div>
                    <div id="image-container">
                        <span id="amount">Сумма: <strong> <input type="text" placeholder="1000 руб." name='summaaa' length="16"></strong></span>
                        <span id="card-image">

                        </span>
                    </div>
                    <!--- end card image container --->

                    <label for="card-number">
                        Номер карты
                    </label>
                    <input type="text" id="card-number" placeholder="1234 5678 9101 1112" length="16">
                    <div id="cardholder-container">
                        <label for="card-holder">ФИО
                        </label>
                        <input type="text" id="card-holder" placeholder="Vachlyaev Artem" />
                    </div>
                    <!--- end card holder container --->
                    <div id="exp-container">
                        <label for="card-exp">
                            Срок
                        </label>
                        <input id="card-month" type="text" placeholder="MM" length="2">
                        <input id="card-year" type="text" placeholder="YY" length="2">
                    </div>
                    <div id="cvc-container">
                        <label for="card-cvc"> CVC/CVV</label>
                        <input id="card-cvc" placeholder="XXX-X" type="text" min-length="3" max-length="4">

                    </div>
                    <!--- end CVC container --->
                    <!--- end exp container --->
                </div>
                <!--- end card front --->
                <div id="card-back">
                    <div id="card-stripe">
                    </div>

                </div>
                <!--- end card back --->
                <input type="text" id="card-token" />

                <input type='submit' id="card-btn" name='payCart' value='Пополнить'>
                <!-- <button type="button" id="card-btn" name='payCart2'>Подтвердить</button> -->

            </form>
            <?php
            if (isset($_POST['payCart'])) {
                $summ_carts = $arr['payment_summ'];
                $sqlIns2 = "UPDATE `users` SET `payment_summ` =  (payment_summ + ?) WHERE `login` = '$_SESSION[login]'";
                $ins2 = $pdo->prepare($sqlIns2);
                $ins2->execute(array("$_POST[summaaa]"));
                echo "<script>alert('Оплата прошла успешно!')</script>";
                echo "<script type = 'text/javascript'>location.href='./account.php'</script>";
            }
            ?>
        </div>
        <!--- end form container --->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script src="https://use.fontawesome.com/f1e0bf0cbc.js"></script>

    </main>


    <script src='includes/js/cart.js'></script>
</body>

</html>