<?

session_start();

require './config.php';

function call($controller) {
  include './app/controllers/'.$controller.'_controller.php';

  switch ($controller) {
    case 'sign-in':
      $controller = new SignInController();
      break;
    case 'sign-up':
      $controller = new SignUpController();
      break;
    case 'leaderboard':
      $controller = new LeaderboardController();
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