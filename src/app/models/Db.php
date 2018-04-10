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
  public function get_hashed_password($user) {
    $query = $this->pdo->query("SELECT * FROM users WHERE username = '$user'");
    $user = $query->fetch();
    return !empty($user->password) ? $user->password : false;
  }
  public function get_user_id($user) {
    $query = $this->pdo->query("SELECT * FROM users WHERE username = '$user'");
    $user = $query->fetch();
    return !empty($user->id) ? $user->id : false;
  }
  public function get_alias($id) {
    $query = $this->pdo->query("SELECT * FROM users WHERE id = '$id'");
    $user = $query->fetch();
    return !empty($user->alias) ? $user->alias : false;
  }
  public function check_account($user) {
    $query = $this->pdo->query("SELECT * FROM users WHERE username = '$user'");
    $user = $query->fetch();
    return empty($user) ? true : false;
  }
  public function create_account($user, $password, $date, $alias) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $exec = $this->pdo->prepare("INSERT INTO users (username, password, creation_date, alias) VALUES ('$user', '$password', '$date', '$alias')");
    $exec->execute();
  }
  public function get_leaderboard() {
    $query = $this->pdo->query("SELECT * FROM users");
    $users = $query->fetchAll();
    return $users;
  }
  public function get_shop() {
    $query = $this->pdo->query("SELECT * FROM shop");
    $shop = $query->fetchAll();
    return $shop;
  }
  public function get_in_progress_matches($id) {
    $query = $this->pdo->query("SELECT * FROM matches WHERE in_progress = true AND (player_1 = $id OR player_2 = $id)");
    $matches = $query->fetchAll();
    return $matches;
  }
}