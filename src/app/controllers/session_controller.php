<?

class SessionController {
  public $error = array();

  public function show($sign = 'sign-in') {
    include './app/views/partials/header.php';
    include './app/views/sign.php' ;
  }

  public function verify($user, $password) {
    if (isset($_POST['sign-in--username'])) {
      $db = new Db();
      $actual_pw = $db->get_hashed_password($user);
      if (!empty($actual_pw)) {
        if (password_verify($password, $actual_pw)) {
          $_SESSION['username'] = $user;
          header('Location: /');
        }
        else array_push($error, 'password_incorrect');
      }
      else array_push($error, 'user_does_not_exist');
    }
    else array_push($error, 'no_username');
    $this->show('sign-in');
  }

  public function create_account($user, $password, $confirm) {
    $db = new Db();
    if (isset($_POST['sign-up--username'])) {
      if (isset($_POST['sign-up--password'])) {
        if (isset($_POST['sign-up--password-confirm'])) {
          $db->create_account($user, $password);
        }
        else array_push($error, 'passwords_does_not_match');
      }
      else array_push($error, 'password_incorrect');
    }
    else array_push($error, 'no_username');
    $this->show('sign-up');
  }

  public function kill() {
    session_destroy();
    $this->show();
  }
}