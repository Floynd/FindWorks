<?
session_start();
require_once('../DB/connection.php');
?>
<?php
if (isset($_POST['reg'])) {
    if ($_POST['pass'] == $_POST['passw']) {

        $safe_login = $_POST['login'];
        $safe_pass = $_POST['pass'];
        $safe_pass = md5($safe_pass);
        $sql = "INSERT INTO `users` SET `login` = ?, `password` = ?, `image` = './includes/images/unknow.png', FIO = 'unknow', number_phone = 'none', payment_summ = '0'";
        $result = $pdo->prepare($sql);
        $result->execute(array("$safe_login", "$safe_pass"));
        $line2 = $result->fetchall();
        $count = count($line2);
        if ($count > 0) {
            $_SESSION['autorized'] = true;
            $_SESSION['login'] = $_POST['login'];
            echo '<script type = "text/javascript">location.href="../index.php"</script>';
        } else
?>
        <div>
    <? {
        echo '<script type = "text/javascript">location.href="../index.php"</script>';
    }
} else {
    echo 'Пароли не верны';
}
}
    ?>