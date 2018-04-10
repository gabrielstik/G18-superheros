<?

class MatchesController {

  function __construct() {
    include './app/models/Db.php';
    $db = new Db();
    $this->disp($db->get_in_progress_matches($_SESSION['user-id']));
  }

  public function disp($matches) {
    // include './app/views/partials/header.php';
    include './app/views/matches.php';

    echo '<pre style="font-size:12px">';
    print_r($matches);
    echo '</pre>';
  }
}