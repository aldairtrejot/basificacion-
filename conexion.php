<?php
$password = "pgs2023";
$username = "postgres";
$dbname = "bas_test";
$host = "localhost";
$port = "5432";
$options = "--client_encoding=UTF8";

try {
    $connectionDB = "host=$host port=$port dbname=$dbname user=$username password=$password options=$options";
    $connectionDBsPro = pg_pconnect($connectionDB);
} catch (\Throwable $e) {
    echo "Error connecting to data base + ".$e; 
}

/// Connection to server
/*
$password = "pgs2023";
$username = "postgres";
$dbname = "DSINFOTEC";
$host = "localhost";
$port = "5432";
*/