<?

class SessionController {
  public $error = array();

  public function show($sign = 'sign-in') {
    include './app/views/partials/header.php';
    include './app/views/sign.php';
  }

  public function verify($user, $password) {
    if (isset($_POST['sign-in--username'])) {
      $db = new Db();
      $actual_pw = $db->get_hashed_password($user);
      if (!empty($actual_pw)) {
        if (password_verify($password, $actual_pw)) {
          $_SESSION['username'] = $user;
          header('Location: /a');
        }
        else array_push($this->error, 'password_incorrect');
      }
      else array_push($this->error, 'user_does_not_exist');
    }
    else array_push($this->error, 'no_username');
    $this->show('sign-in');
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
    else $this->show('sign-up');
  }

  public function kill() {
    session_destroy();
    $this->show();
  }
}