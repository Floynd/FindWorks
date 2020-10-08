<?php
session_start();
require_once '../DB/connection.php';
if (!isset($_SESSION['admin'])) {
  require_once 'login.php'; //Переходим на страницу авторизации
} else {
  require_once("adminPanel.php"); // переходим в админку
}
