<?php
$server = 'localhost';
$usuarios = 'samuel';
$password = 'admin';
$database = 'blog_masters';
$db = mysqli_connect($server,$usuarios,$password,$database);
mysqli_query($db,"SET NAMES 'utf8'");
session_start();
