  <!-- шапка начало -->
  <header>
      <!-- топ шапки -->
      <div class='header_top_wrapper' id='navbar'>
          <!-- логотип -->
          <div class='logo'>
              <a href='./index.php'><img src='./includes/images/logo.jpg'></a>
          </div>
          <!-- навигация -->
          <nav class='top_nav'>
              <ul class='top_nav'>
                  <li><a href='./orders.php'>Заказы</a></li>
                  <li><a href='./customers.php'>Исполнители</a></li>
                  <li><a href='./create_orders.php'>Создать заказ</a></li>
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
                <li><a href='./account.php'>ЛК</a></li>
                <a href='users/logout.php'><li>Выйти</li></a>
                </ul>";
                }
                ?>
          </div>
      </div>

      <!-- низ шапки -->
      <div>

      </div>
  </header>