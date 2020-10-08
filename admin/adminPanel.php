<?
session_start();
require_once '../DB/connection.php';
require_once '../DB/logik.php';
?>
<link rel="stylesheet" href="../includes/css/main.css" />
<link rel="stylesheet" href="styleAdmin.css" />
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
<header>
  <!-- топ шапки -->
  <div class='header_top_wrapper' id='navbar'>
    <!-- логотип -->
    <div class='logo'>
      <a href='adminPanel.php'><img src='../includes/images/logo.jpg'></a>
    </div>
    <!-- навигация -->
    <nav class='top_nav'>
      <ul class='top_nav'>
        <!-- <li><a href='./orders.php'>Заказы</a></li>
        <li><a href='./customers.php'>Исполнители</a></li>
        <li><a href='./create_orders.php'>Создать заказ</a></li> -->
        <h3>Панель администратора</h3>
      </ul>
    </nav>

    <!-- авторизация -->
    <div class='sing_in'>
      <?php
      if (!isset($_SESSION['autorized'])) {
        echo "
              <ul>
                  <li><a href='#openModal'>Вход</a></li>
                  <div id='openModal' class='modalDialog'>
                      <div>
                          <a href='#close' title='Закрыть' class='close'>X</a>
                          <h2>Авторизация</h2><br>
                          <form method='POST' action='./users/login.php' >
                              <input type='text' name='login' required value='' placeholder='Логин' required>
                              <input type='password' name='pass' placeholder='Пароль' required><br>
                              <input type='submit' value='Войти' name='enter'><br><br>
                          </form>
                      </div>
                  </div>
                    <span>или</span>
                  <li><a href='#openModal2'>Регистрация</a></li>
                  <div id='openModal2' class='modalDialog2'>
                      <div>
                          <a href='#close2' title='Закрыть' class='close2'>X</a>
                          <h2>Регистрация</h2>
                          <form method='POST' action='./users/registration.php'><br>
                             <input type='text' name='login' value='' placeholder='Логин' required>
                             <input type='password' name='pass' placeholder='Пароль' required>
                             <input type='password' placeholder='Пароль ещё раз' name='passw' required><br>
                              <input type='submit' value='Зарегистрироваться' name='reg'>
                          </form>
                      </div>
                  </div>
              </ul>";
      } else {
        echo "<ul class='link_account_header'>
                <li><span>Привет, $_SESSION[login] !</span></li>
             
                </ul>";
      }
      ?>
    </div>
  </div>

  <!-- низ шапки -->
  <div>

  </div>
</header>

</main>


<div class='main_container'>
  <div class='left_side'>
    <div class='menu_block'>
      <ul class='list2a'>
        <h1>Модерация</h1>
        <form method='GET'>
          <a href='./adminPanel.php?chat'>
            <li>Чат</li>
          </a>
          <a href='./adminPanel.php?users'>
            <li>Исполнители</li>
          </a>
          <a href='./adminPanel.php?ordersClosed'>
            <li>Заверш. задания</li>
          </a>

        </form>
      </ul>
    </div>
  </div>


  <div class='right_side'>
    <?php

    //Пользователи
    $sql = "SELECT * from `users`";
    $Data = $pdo->query($sql);
    $Line = $Data->fetchAll();
    if (isset($_GET['users'])) {
      echo "<form method ='GET' class='tablePanel'>
       <table class='redTable'>
       <h2>Исполнители</h2>
       <tr>
           <th>" . 'ID' . "</th>
           <th>" . 'Логин' . "</th>
           <th>" . 'ФИО' . "</th>
           <th>" . 'Номер телефона' . "</th>
           <th colspan='2'>" . 'Функции' . "</th>
        </tr>";
      foreach ($Line as $arr) {
        echo "
            <tr>
               <td>" . $arr['ID_user'] . "</td>
               <td>" . $arr['login'] . "</td>
               <td>" . $arr['FIO'] . "</td>
               <td>" . $arr['number_phone'] . "</td>
               <td>" . '<a href="adminPanel.php?del=' . $arr['ID_user'] . '&login=' . $arr['login'] . '">Удалить</a>' . "</td>
               <td>" . '<a href="adminPanel.php?clear=' . $arr['login'] . '">Очистить</a>' . "</td>
            </tr>";
      }
      echo "
       </table>
     </form>
     ";
    }

    if (isset($_GET['del'])) {
      $sql = "DELETE FROM users WHERE ID_user = ?";
      $delete = $pdo->prepare($sql);
      $delete->execute(array("$_GET[del]"));
      echo "<script>alert('Удаление прошло успешно')</script>";
      echo "<script type='text/javascript'>location.href = 'adminPanel.php'</script>";
    }

    if (isset($_GET['del'])) {
      $sql1 = "DELETE FROM customers WHERE user_login = ?";
      $delete1 = $pdo->prepare($sql1);
      $delete1->execute(array("$_GET[login]"));
    }


    if (isset($_GET['clear'])) {
      $sql2 = "DELETE FROM chat WHERE user = ?";
      $delete2 = $pdo->prepare($sql2);
      $delete2->execute(array("$_GET[clear]"));
      echo "<script>alert('Чат очищен!')</script>";
      echo "<script type='text/javascript'>location.href = 'adminPanel.php'</script>";
    }

    if (isset($_GET['chat'])) {
      $sql = "SELECT * FROM chat";
      $Data  = $pdo->query($sql);
      $lineChat = $Data->fetchAll();

      echo "
      <form method ='GET' class='tablePanel'>
       <table class='redTable'>
       <h2>Исполнители</h2>
       <tr>
           <th>" . 'ID' . "</th>
           <th>" . 'Логин' . "</th>
           <th>" . 'Сообщение' . "</th>
           </tr>";

      foreach ($lineChat as $arr) {
        echo "
          <tr>
            <td>" . $arr['ID'] . "</td>
            <td>" . $arr['user'] . "</td>
            <td>" . $arr['message'] . "</td>
            </tr>";
      }
      echo "
            </table>
          </form>
          ";
    }

    if (isset($_GET['ordersClosed'])) {
      $sql = "SELECT * FROM `close_orders`";
      $Data  = $pdo->query($sql);
      $lineOrdersClosed = $Data->fetchAll();

      echo "
      <form method ='GET' class='tablePanel'>
       <table class='redTable'>
       <h2>Исполнители</h2>
       <tr>
           <th>" . 'ID' . "</th>
           <th>" . 'Титул' . "</th>
           <th>" . 'Цена' . "</th>
           <th>" . 'Заказчик' . "</th>
           <th>" . 'Исполнитель' . "</th>
           </tr>";

      foreach ($lineOrdersClosed as $arr) {
        echo "
          <tr>
            <td>" . $arr['ID'] . "</td>
            <td>" . $arr['title'] . "</td>
            <td>" . $arr['price'] . "</td>
            <td>" . $arr['user_name'] . "</td>
            <td>" . $arr['user_customer'] . "</td>
            </tr>";
      }
      echo "
            </table>
          </form>
          ";
    }

    ?>

  </div>
</div>