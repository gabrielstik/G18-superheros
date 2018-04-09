<?

class SignInController {
  public $error = array();

  public function disp() {
    include './app/views/partials/header.php';
    include './app/views/sign-up.php';
  }

  public function create_account($user, $password, $confirm) {
    $db = new Db();
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
    if (empty($this->error)) {
      if ($db->check_account($user)) $db->create_account($user, $password, time());
      header('Location: /');
    }
    else $this->disp();
  }

  public function kill() {
    session_destroy();
    $this->disp();
  }
}