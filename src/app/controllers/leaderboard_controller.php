<?

class LeaderboardController {
  function __construct() {
    
    include './app/models/Db.php';
    $db = new Db();
    $this->show($db->get_leaderboard());
  }

  public function show($leaderboard) {
    include './app/views/partials/header.php';
    include './app/views/leaderboard.php';
  }
}