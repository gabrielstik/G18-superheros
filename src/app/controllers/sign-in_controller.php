<?

class SignInController {
  public $error = array();

  public function disp() {
    include './app/views/partials/header.php';
    include './app/views/sign-in.php';
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
        else array_push($this->error, 'password_incorrect');
      }
      else array_push($this->error, 'user_does_not_exist');
    }
    else array_push($this->error, 'no_username');
    $this->disp();
  }

  public function kill() {
    session_destroy();
    $this->disp();
  }
}