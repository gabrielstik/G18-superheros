<?

class MatchController {

  function __construct($match_id) {
    include './app/models/Db.php';
    $this->Db = new Db();
    $players = $this->Db->get_playing_players($match_id);
    if ($players != false) {
      $user_playing = false;
      foreach ($players as $player) {
        if ($player == $_SESSION['user-id']) $user_playing = true;
      }
      if ($user_playing == true) $this->get_data($match_id);
      else header('Location: /404');
    }
    else header('Location: /404');
  }

  function get_data($match_id) {
    $player_1 = array(
      'alias' => $this->Db->get_alias($_SESSION['user-id'])
    );
    $player_2 = array(
      'alias' => $_SESSION['user-id'] == $this->Db->get_match($match_id)->player_1 ? $this->Db->get_alias($this->Db->get_match($match_id)->player_2) : $this->Db->get_alias($this->Db->get_match($match_id)->player_1)
    );
    $this->disp($player_1, $player_2);
  }

  function disp($player_1, $player_2) {
    include './app/views/partials/header.php';
    include './app/views/match.php';
  }
}