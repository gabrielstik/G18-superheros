<?

class ShopController {
  function __construct() {
    
    include './app/models/Db.php';
    $db = new Db();
    $this->disp($db->get_shop());
  }

  public function disp($cards) {
    include './app/views/partials/header.php';
    include './app/views/shop.php';
  }
}