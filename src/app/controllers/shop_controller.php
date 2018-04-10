<?

class ShopController {
  function __construct() {
    
    include './app/models/Db.php';
    $db = new Db();
    $this->show($db->get_shop());
  }

  public function show($shop) {
    include './app/views/partials/header.php';
    include './app/views/shop.php';
  }
}