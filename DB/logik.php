<?
require_once('connection.php');
//example
$sql = "SELECT * FROM orders";
$Data  = $pdo->query($sql);
$lineOrders = $Data->fetchAll();

$sql = "SELECT * FROM orders WHERE categories = 'trucking'";
$Data  = $pdo->query($sql);
$lineOrdersTrucking = $Data->fetchAll();

$sql = "SELECT * FROM orders WHERE categories = 'cleaning'";
$Data  = $pdo->query($sql);
$lineOrdersCleaning = $Data->fetchAll();

$sql = "SELECT * FROM orders WHERE categories = 'web'";
$Data  = $pdo->query($sql);
$lineOrdersWeb = $Data->fetchAll();

$sql = "SELECT * FROM orders WHERE categories = 'legalassist'";
$Data  = $pdo->query($sql);
$lineOrdersLegalassist = $Data->fetchAll();

$sql = "SELECT * FROM orders WHERE categories = 'pchelp'";
$Data  = $pdo->query($sql);
$lineOrdersPcHelp = $Data->fetchAll();

$sql = "SELECT * FROM orders WHERE categories = 'lessons'";
$Data  = $pdo->query($sql);
$lineOrdersLessons = $Data->fetchAll();






$sql = "SELECT COUNT(*) FROM feedback WHERE user_target = '$_GET[user_customer]'";
$Data  = $pdo->query($sql);
$linelineFeedBack = $Data->fetchAll();



$sql = "SELECT * FROM customers";
$Data  = $pdo->query($sql);
$lineCustomers = $Data->fetchAll();

$sql = "SELECT * FROM orders ORDER BY price DESC";
$Data  = $pdo->query($sql);
$lineOrdersMin = $Data->fetchAll();

$sql = "SELECT * FROM orders ORDER BY price ASC";
$Data  = $pdo->query($sql);
$lineOrdersMax = $Data->fetchAll();

$sql = "SELECT * FROM customers ORDER BY estimation DESC";
$Data  = $pdo->query($sql);
$lineCustomersEstimation = $Data->fetchAll();

$sql = "SELECT * FROM customers ORDER BY feedback DESC";
$Data  = $pdo->query($sql);
$lineCustomersFeedBack = $Data->fetchAll();

//trucking
$sql = "SELECT * FROM orders WHERE categories = 'trucking'";
$Data  = $pdo->query($sql);
$lineTrucking = $Data->fetchAll();