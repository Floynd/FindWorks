<?php
session_start();
if (isset($_POST['enter'])) {
    $safe_login = trim($_POST['login']);
    $safe_pass = trim($_POST['pass']);
    $safe_pass = md5($safe_pass);
    require_once('../DB/connection.php');
    $sql = "SELECT * from `users` where `login` like ? and `password` like ?";
    $result = $pdo->prepare($sql);
    $result->execute(array("$safe_login", "$safe_pass"));
    $line2 = $result->fetchall();
    $count = count($line2);
    foreach ($line2 as $mas) {
        $a = $mas['ID_user'];
    }
    if ($count > 0) {
        $_SESSION['ID_user'] = $a;
        $_SESSION['autorized'] = true;
        $_SESSION['login'] = $_POST['login'];
        echo '<script type = "text/javascript">location.href="../index.php"</script>';
    } else
?>
    <div>
    <? {
    echo "Неверный логин или пароль или капча<br> <a href = '../index.php'>Вернуться на главную</a>";
    echo " или <a href = 'login.php'>Авторизоваться</a> заново";
}
}
