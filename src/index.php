<?
session_start();
setlocale(LC_ALL, 'fr_FR');
require './config.php';

$page = isset($_GET['q']) ? $_GET['q'] : 'home';