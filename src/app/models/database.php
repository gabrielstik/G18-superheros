<?

class Db {
	function __construct() {    
		try {
			$this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
			$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		}
		catch (Exception $e) {
			die('La base de donnée n\'est pas connectée. Veuillez contacter l\'administrateur.');
		}
  }
  public function getHashedPassword($user) {
    $query = $this->pdo->query("SELECT * FROM users WHERE username = '$user'");
    $user = $query->fetch();
    return !empty($user->password) ? $user->password : false;
  }
  public function createAccount($user, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $exec = $this->pdo->prepare("INSERT INTO users (username, password) VALUES ('$user', '$password')");
    $exec->execute();
  }
  public function getFavoris($user) {
    $query = $this->pdo->query("SELECT * FROM favoris WHERE username = '$user'");
    $favoris = $query->fetchAll();
    return !empty($favoris) ? $favoris : false;
  }
  public function pushFavoris($user, $favoris) {
    $exec = $this->pdo->prepare("INSERT INTO favoris (place, username) VALUES ('$favoris', '$user')");
    $exec->execute();
  }
  public function removeFavoris($user, $favoris) {
    $prepare = $this->pdo->prepare("DELETE FROM favoris WHERE place = '$favoris' AND username = '$user'");
    $prepare->execute();
  }
}