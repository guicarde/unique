<?php

$user = 'postgres';
$pass = '123456';
$db_name = '';
$port = 5432;
$host = 'localhost';

$str = "host=$host port=$port dbname=$db_name user=$user password=$pass";
//
//var_dump($str);
//exit();
function Conectar()
{
    $con = pg_connect("host=echo.db.elephantsql.com port=5432 dbname=dahksxkg user=dahksxkg password=YgmtejPoSFuis6OxjB0OcVxWoKuqtkY2") or die("error");
    return $con;
}

