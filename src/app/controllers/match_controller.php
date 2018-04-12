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
    $match = $this->Db->get_match($match_id);

    $player_1_id = $_SESSION['user-id'];
    $player_1 = array(
      'alias' => $this->Db->get_alias($player_1_id),
      'mana' => $match->player_1_mana,
      'health' => $match->player_1_health,
      'deck' => $this->Db->get_deck($player_1_id),
      'cards' => array(),
    );
    foreach ($this->Db->get_hand($match->id, $match->round, $player_1_id) as $card) {
      switch ($card->position) {
        case 0:
          array_push($player_1['cards'], $card);
          break;
        case 1:
          array_push($player_1['cards'], $card);
          break;
        case 2:
          array_push($player_1['cards'], $card);
          break;
        case 3:
          array_push($player_1['cards'], $card);
          break;
        case 4:
          array_push($player_1['cards'], $card);
          break;
        case 5:
          array_push($player_1['cards'], $card);
          break;
        case 6:
          array_push($player_1['cards'], $card);
          break;
        case 7:
          array_push($player_1['cards'], $card);
          break;
      }
    }

    $player_2_id = $_SESSION['user-id'] == $match->player_1 ? $match->player_2 : $match->player_1;
    $player_2 = array(
      'alias' => $this->Db->get_alias($player_2_id),
      'mana' => $match->player_2_mana,
      'health' => $match->player_2_health,
      'deck' => $this->Db->get_deck($player_2_id),
      'cards' => array(),
    );
    foreach ($this->Db->get_hand($match->id, $match->round, $player_2_id) as $card) {
      switch ($card->position) {
        case 0:
          array_push($player_2['cards'], $card);
          break;
        case 1:
          array_push($player_2['cards'], $card);
          break;
        case 2:
          array_push($player_2['cards'], $card);
          break;
        case 3:
          array_push($player_2['cards'], $card);
          break;
        case 4:
          array_push($player_2['cards'], $card);
          break;
        case 5:
          array_push($player_2['cards'], $card);
          break;
        case 6:
          array_push($player_2['cards'], $card);
          break;
        case 7:
          array_push($player_2['cards'], $card);
          break;
      }
    }

    $this->disp($match, $player_1, $player_2);
  }

  function disp($match, $player_1, $player_2) {
    include './app/views/partials/header.php';
    include './app/views/match.php';
  }
}