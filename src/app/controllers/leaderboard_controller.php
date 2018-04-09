<?

class leaderboardController {
  function __construct() {
    $db = new Db();
    $this->show($db->get_leaderboard());
  }

  public function show($leaderboard) {
    include './app/views/leaderboard.php';
  }
}