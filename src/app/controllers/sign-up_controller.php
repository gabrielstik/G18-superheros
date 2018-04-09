<?

class SignUpController {
  public $error = array();

  function __construct() {
    global $images;

    include './app/models/Db.php';
    include './app/models/APIs.php';

    if (isset($_POST['sign-up'])) $this->create_account($_POST['sign-up--username'], $_POST['sign-up--password'], $_POST['sign-up--password-confirm'], $_POST['sign-up--alias']);
    else if (isset($_SESSION['username'])) $this->kill();
    else $this->disp();
  }

  public function disp() {
    include './app/views/partials/header.php';
    include './app/views/sign-up.php';
  }

  public function create_account($user, $password, $confirm, $alias) {
    $Db = new Db();
    if (!isset($_POST['sign-up--username'])) {
      array_push($this->error, 'no_username');
    }
    else {
      if (strlen($_POST['sign-up--username']) <= 4) {
        array_push($this->error, 'short_username');
      }
    }
    if (!isset($_POST['sign-up--password'])) {
      array_push($this->error, 'no_password');
    }
    else {
      if (strlen($_POST['sign-up--password']) <= 6) {
        array_push($this->error, 'short_password');
      }
    }
    if (isset($_POST['sign-up--password-confirm']) && isset($_POST['sign-up--password-confirm']) && $_POST['sign-up--password-confirm'] != $_POST['sign-up--password']) {
      array_push($this->error, 'passwords_does_not_match');
    }
    if (!isset($_POST['sign-up--alias'])) {
      array_push($this->error, 'no_alias');
    }
    else {
      if (strlen($_POST['sign-up--alias']) <= 2) {
        array_push($this->error, 'short_alias');
      }
    }

    if (empty($this->error)) {
      if ($Db->check_account($user)) $Db->create_account($user, $password, time(), $alias);
      header('Location: /');
    }
    else $this->disp();
  }

  public function kill() {
    session_destroy();
    $this->disp();
  }
}