<?

class RulesController {

  function __construct() {
    $this->disp();
  }

  public function disp() {
    include './app/views/partials/header.php';
    include './app/views/rules.php';
  }
}