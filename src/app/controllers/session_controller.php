<?

class SessionController {
  public function show() {
    include './app/views/partials/header.php';
    include './app/views/sign.php' ;
  }

  public function verify($user, $password) {
    $db = new Db();
    $actual_pw = $db->getHashedPassword($user);
    if (!empty($actual_pw)) {
      if (password_verify($password, $actual_pw)) {
        $_SESSION['username'] = $user;
        header('Location: /');
      }
      else {
        $error = 'password_incorrect';
      }
    }
    else {
      $error = 'user_does_not_exist';
    }
    include './app/views/partials/header.php';
    include './app/views/sign.php';
  }

  public function kill() {
    session_destroy();
    include './app/views/partials/header.php';
    include './app/views/sign.php';
  }
}