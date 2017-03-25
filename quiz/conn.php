<?php
@session_start();

$conn = null;

try
{
	$conn = new PDO('mysql:host=localhost;dbname=meuapp_quiz', 'meuapp_quiz','@password2017', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec("set names utf8");
}
catch ( PDOException $e )
{
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}

