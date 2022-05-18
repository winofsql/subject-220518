<?php
session_cache_limiter('nocache');
session_start();
header( "Content-Type: text/html; Charset=UTF-8" );

mb_language('Japanese');
mb_internal_encoding('UTF-8');

$dbh = new PDO("odbc:H-ACCDB");

$sql = mb_convert_encoding("SELECT * FROM 社員マスタ", "SJIS", "UTF-8");

$stmt = $dbh->prepare($sql);
$stmt->execute();

while( $rows = $stmt->fetch() ){
    print mb_convert_encoding($rows[1], "UTF-8", "SJIS") . "<br>";
}

?>