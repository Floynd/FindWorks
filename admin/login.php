<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../includes/css/login.css" />
  <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet" />
  <title>Авторизация</title>
</head>

<body>
  <main>
    <div class='login_layout'>
      <?
      if (!isset($_POST['enter'])) {
      ?>
        <div class='form_wrapper'>
          <form method='POST'>
            <h2>Авторизация</h2>
            <span><strong>Логин</strong></span> <br><br><input type='text' name='login' required value='' required><br>
            <span><strong>Пароль</strong></span> <br><br><input type='password' name='pass' required><br><br>
            <input type='submit' value='Войти' name='enter'>
          </form>
        </div>
      <?
      } else {
        $safe_login = trim($_POST['login']);
        $safe_pass = trim($_POST['pass']);
        $safe_pass = md5($safe_pass);
        require_once('../DB/connection.php');
        $sql = "SELECT * from `admins` where `login` like ? and `password` like ?";
        $result = $pdo->prepare($sql);
        $result->execute(array("$safe_login", "$safe_pass"));
        $line2 = $result->fetchall();
        $count = count($line2);
        foreach ($line2 as $mas) {
          $a = $mas['ID_user'];
        }
        if ($count > 0) {
          $_SESSION['ID_user'] = $a;
          $_SESSION['admin'] = true;
          $_SESSION['login'] = $_POST['login'];
          echo '<script type = "text/javascript">location.href="adminPanel.php"</script>';
        } else
      ?>
        <div>
        <? {
        echo "Неверный логин или пароль<br> <a href = '../index.php'>Вернуться на главную</a>";
        echo " или <a href = 'login.php'>Авторизоваться</a> заново";
      }
    }
        ?>

        </div>




    </div>
  </main>
</body>

</html>