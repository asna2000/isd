<?php
    session_start();

    $host = "DESKTOP-QF1CJMR\SQLEXPRESS";
    $username = "DESKTOP-QF1CJMR\Nur Azila";
    $password = "";
    $database = "ANNOUNCEMENT";

    mssql_connect($host, $username, $password);
    mssql_select_db($database);
?>