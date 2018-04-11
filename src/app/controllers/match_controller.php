<?

class MatchController {

  function __construct($match_id) {
    include './app/models/Db.php';
    $Db = new Db();
    $players = $Db->get_playing_players($match_id);
    if ($players != false) {
      $user_playing = false;
      foreach ($players as $player) {
        if ($player == $_SESSION['user-id']) $user_playing = true;
      }
      if ($user_playing == true) $this->disp($match_id);
      else header('Location: /404');
    }
    else header('Location: /404');
  }

  function disp($match_id) {
    include './app/views/partials/header.php';
    include './app/views/match.php';
  }
}