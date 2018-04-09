<?

class SignInController {
  public $error = array();

  function __construct() {
    include './app/models/Db.php';
    
    if (isset($_POST['sign-in'])) $this->verify($_POST['sign-in--username'], $_POST['sign-in--password']);
    else if (isset($_SESSION['username'])) $this->kill();
    else $this->disp();
  }

  public function disp() {
    include './app/views/partials/header.php';
    include './app/views/sign-in.php';
  }

  public function verify($user, $password) {
    if (isset($_POST['sign-in--username'])) {
      $Db = new Db();
      $actual_pw = $Db->get_hashed_password($user);
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