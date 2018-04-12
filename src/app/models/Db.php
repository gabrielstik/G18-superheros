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
  public function get_username($id) {
    $query = $this->pdo->query("SELECT * FROM users WHERE id = '$id'");
    $user = $query->fetch();
    return !empty($user->username) ? $user->username : false;
  }
  public function get_money($id) {
    $query = $this->pdo->query("SELECT * FROM users WHERE id = '$id'");
    $user = $query->fetch();
    return !empty($user->money) ? $user->money : false;
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
    $query = $this->pdo->query("SELECT * FROM cards");
    $cards = $query->fetchAll();
    return $cards;
  }
  public function get_collection($id) {
    $query = $this->pdo->query("SELECT * FROM collection WHERE related_user = $id");
    $collection = $query->fetchAll();
    return $collection;
  }
  public function get_in_progress_matches($id) {
    $query = $this->pdo->query("SELECT * FROM matches WHERE in_progress = true AND (player_1 = $id OR player_2 = $id)");
    $matches = $query->fetchAll();
    return $matches;
  }
  public function get_match($id) {
    $query = $this->pdo->query("SELECT * FROM matches WHERE id = $id");
    $match = $query->fetch();
    return $match;
  }
  public function get_playing_players($match_id) {
    $query = $this->pdo->query("SELECT * FROM matches WHERE id = $match_id");
    $match = $query->fetch();
    return !empty($match) ? array($match->player_1, $match->player_2) : false;
  }
  public function get_deck($id) {
    $query = $this->pdo->query("SELECT * FROM collection WHERE related_user = $id AND in_deck = 1");
    $deck = $query->fetchAll();
    return $deck;
  }
  public function add_deck($id) {
    $query = $this->pdo->prepare("UPDATE collection SET in_deck = 1 WHERE id = $id");
    $match = $query->execute();
  }
  public function remove_deck($id) {
    $query = $this->pdo->prepare("UPDATE collection SET in_deck = 0 WHERE id = $id");
    $match = $query->execute();
  }
  public function get_price($id) {
    $query = $this->pdo->query("SELECT * FROM cards WHERE api_id = $id");
    $deck = $query->fetch();
    return $deck->price;
  }
  public function buy_card($user_id, $card_id) {
    $exec = $this->pdo->prepare("INSERT INTO collection (related_user, card_id) VALUES ('$user_id', '$card_id')");
    $exec->execute();
  }
  public function user_transaction($user_id, $amount) {
    $money = $this->get_money($user_id) - $amount;
    $query = $this->pdo->prepare("UPDATE users SET money = $money WHERE id = $user_id");
    $match = $query->execute();
  }
  public function create_match($player_1, $player_2) {
    $exec = $this->pdo->prepare("INSERT INTO matches (player_1, player_2, playing_player) VALUES ('$player_1', '$player_2', '$player_2')");
    $exec->execute();
  }
  public function check_match($id_1, $id_2) {
    $query = $this->pdo->query("SELECT * FROM matches WHERE (player_2 = '$id_2' AND player_1 = '$id_1') OR (player_1 = '$id_2' AND player_2 = '$id_1')");
    $user = $query->fetch();
    return empty($user) ? true : false;
  }
  public function get_hand($match, $round, $player) {
    $query = $this->pdo->query("SELECT * FROM hands WHERE related_match = $match AND related_round = $round AND related_player = $player");
    $hand = $query->fetchAll();
    return $hand;
  }


  public function update_hand($match_id, $round, $player, $hand, $position) {
    $exec = $this->pdo->prepare("INSERT INTO hands (related_match, related_round, related_player, hero_id, position) VALUES ('$match_id', '$round', '$player', '$hand', '$position')");
    $exec->execute();
  }
  public function update_match($match_id, $match, $health) {
    $playing = $match->playing_player == $match->player_1 ? $match->player_2 : $match->player_1;
    $health_player = $match->playing_player == $match->player_1 ? 'player_1_health' : 'player_2_health';
    $round = $match->round + 1;
    $query = $this->pdo->prepare("UPDATE matches SET round = '$round', playing_player = '$playing', $health_player = $health  WHERE id = $match_id");
    $update = $query->execute();
  }
  public function delete_null_cards() {
    $exec = $this->pdo->exec("DELETE FROM hands WHERE hero_id = 0");
  }
}