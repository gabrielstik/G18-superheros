<?
define('DB_HOST','51.254.118.218');
define('DB_PORT','3306');
define('DB_NAME','heroes');
define('DB_USER','heroes');
define('DB_PASS','dcmarvel');

try {
  $pdo = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME,DB_USER,DB_PASS);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  die('Connecté.');
}
catch (Exception $e) {
  die('Erreur');
}