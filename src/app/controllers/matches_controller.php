<?

class MatchesController {

  function __construct() {
    include './app/models/Db.php';
    $Db = new Db();
    $matches = $Db->get_in_progress_matches($_SESSION['user-id']);
    $opponents = $this->get_opponents($matches);

    $this->disp($matches, $opponents);
  }

  public static function get_opponents($matches) {
    $Db = new Db();

    $opponents = array();
    foreach ($matches as $match) {
      $opponent = $match->player_1 == $_SESSION['user-id'] ? $match->player_2 : $match->player_1;
      array_push($opponents, $Db->get_alias($opponent));
    }
    return $opponents;
  }

  private function disp($matches, $opponents) {
    include './app/views/partials/header.php';
    include './app/views/matches.php';
  }
}