<?

session_start();

require './config.php';

function call($controller) {
  include './app/controllers/'.$controller.'_controller.php';

  switch ($controller) {
    case 'sign-in':
      include './app/models/Db.php';
      $controller = new SignInController();
      if (isset($_POST['sign-in'])) $controller->verify($_POST['sign-in--username'], $_POST['sign-in--password']);
      else if (isset($_SESSION['username'])) $controller->kill();
      else if (isset($_POST['sign-up'])) $controller->create_account($_POST['sign-up--username'], $_POST['sign-up--password'], $_POST['sign-up--password-confirm']);
      else $controller->disp();
      break;
    case 'sign-up':
      include './app/models/Db.php';
      $controller = new SignInController();
      if (isset($_POST['sign-in'])) $controller->verify($_POST['sign-in--username'], $_POST['sign-in--password']);
      else if (isset($_SESSION['username'])) $controller->kill();
      else if (isset($_POST['sign-up'])) $controller->create_account($_POST['sign-up--username'], $_POST['sign-up--password'], $_POST['sign-up--password-confirm'], $_POST['sign-up--alias']);
      else $controller->disp();
      break;
    case 'leaderboard':
      include './app/models/Db.php';
      $controller = new leaderboardController();
      break;
  }
}

$page = isset($_GET['q']) ? $_GET['q'] : 'home';

switch($page) {
  case 'home':
    include './app/views/home.php';
    // call('apis');
    break;
  case 'sign-in':
    call('sign-in');
    break;
  case 'sign-up':
    call('sign-up');
    break;
  case 'leaderboard':
    call('leaderboard');
    break;
  case 'sign-out':
    session_destroy();
    header('Location: /');
    break;
}