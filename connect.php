<?php
require_once 'db_config.php';

ob_start();
session_start();

$db_host  = DB_HOST ;
$db_user  = DB_USER ;
$db_pass  = DB_PASS ;
$db_name  = DB_NAME ;
$charset 	= CHARSET;

$db_con = mysqli_connect($db_host, $db_user, $db_pass);

if (!$db_con) {
    die("MySQLi connect error: " . mysqli_connect_error());
}
mysqli_select_db($db_con, $db_name);
mysqli_set_charset($db_con, $charset);
