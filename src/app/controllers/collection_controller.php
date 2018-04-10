<?

class CollectionController {

  function __construct() {
    include './app/models/Db.php';
    $db = new Db();
    $this->disp($db->get_collection($_SESSION['user-id']));
  }

  public function disp($collection) {
    include './app/views/partials/header.php';
    include './app/views/collection.php';
  }
}