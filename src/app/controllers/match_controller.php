<?

class MatchController {

  function __construct($match_id) {
    include './app/models/Db.php';
    $this->Db = new Db();

    $this->match_id = $match_id;

    if (isset($_POST['sendNewDatas'])) {
      $this->update_data();
    }

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
        case 8:
          array_push($player_1['cards'], $card);
          break;
        case 9:
          array_push($player_1['cards'], $card);
          break;
        case 10:
          array_push($player_1['cards'], $card);
          break;
        case 11:
          array_push($player_1['cards'], $card);
          break;
        default:
          array_push($player_1['cards'], false);
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
        case 8:
          array_push($player_2['cards'], $card);
          break;
        case 9:
          array_push($player_2['cards'], $card);
          break;
        case 10:
          array_push($player_2['cards'], $card);
          break;
        case 11:
          array_push($player_2['cards'], $card);
          break;
        default:
          array_push($player_2['cards'], false);
          break;
      }
    }

    $this->disp($match, $player_1, $player_2);
  }

  function update_data() {
    $new_datas = array(
      'health' => $_POST['life'],
      'card_0_id' => $_POST['slot0'],
      'card_1_id' => $_POST['slot1'],
      'card_2_id' => $_POST['slot2'],
      'card_3_id' => $_POST['slot3'],
      'card_4_id' => $_POST['slot4'],
      'card_0_id_defense' => $_POST['cardDefence0'],
      'card_1_id_defense' => $_POST['cardDefence1'],
      'card_2_id_defense' => $_POST['cardDefence2'],
      'card_3_id_defense' => $_POST['cardDefence3'],
      'card_4_id_defense' => $_POST['cardDefence4'],
      'card_5_id' => $_POST['hand0'],
      'card_6_id' => $_POST['hand1'],
      'card_7_id' => $_POST['hand2'],
      'card_8_id' => $_POST['hand3'],
      'card_9_id' => $_POST['hand4'],
      'card_10_id' => $_POST['hand5'],
      'card_11_id' => $_POST['hand6'],
    );

    $match = $this->Db->get_match($this->match_id);
    if ($match->playing_player == $_SESSION['user-id']) {
      for ($i = 0; $i < 11; $i++) {
        $this->Db->update_hand($match->id, $match->round+1, $match->playing_player, $new_datas['card_'."$i".'_id'], $i);
      }
      // $this->Db->delete_null_cards();
      // $this->Db->update_match($this->match_id, $match, $new_datas['health']);
    }
  }

  function disp($match, $player_1, $player_2) {
    include './app/models/API.php';
    $API = new API();
    echo '<pre style="font-size:12px">';
    print_r(!empty($player_2['cards'][4]->id) && $player_2['cards'][4]->id == 0);
    echo '</pre>';
    include './app/views/partials/header.php';
    include './app/views/match.php';
  }
}