<?php
session_start();
unset($_SESSION['autorized']);
session_destroy();
header('location: ../index.php');
