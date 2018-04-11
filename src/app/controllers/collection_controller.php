<?

class CollectionController {

  function __construct() {
    include './app/models/Db.php';
    $this->Db = new Db();

    if (isset($_POST['add-deck'])) {
      $this->Db->add_deck($_POST['add-deck--id']);
    }
    if (isset($_POST['remove-deck'])) {
      $this->Db->remove_deck($_POST['remove-deck--id']);
    }

    $this->disp($this->Db->get_collection($_SESSION['user-id']));
  }

  public function disp($collection) {
    include './app/views/partials/header.php';
    include './app/views/collection.php';
  }
}