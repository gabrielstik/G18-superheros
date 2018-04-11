<?

class ShopController {
  function __construct() {
    include './app/models/Db.php';
    $this->Db = new Db();

    if (isset($_POST['buy'])) {
      $this->buy($_SESSION['user-id'], $_POST['buy--id']);
    }

    $this->disp($this->Db->get_shop());

  }

  public function disp($cards) {
    include './app/models/API.php';
    $API = new API;
    
    $datas = array();
    foreach ($cards as $card) {
      $data = $API->get_hero($card->api_id);
      array_push($datas, $data);
    }
    $money = $this->Db->get_money($_SESSION['user-id']);

    include './app/views/partials/header.php';
    include './app/views/shop.php';
  }

  private function buy($user_id, $card_id) {
    if ($this->Db->get_price($card_id) <= $this->Db->get_money($user_id)) {
      $this->Db->buy_card($user_id, $card_id);
      $this->Db->user_transaction($user_id, $this->Db->get_price($card_id));
    }
    else $buy_error = 'not-enough-money';
  }
}