<?

session_start();

require './config.php';

function call($controller) {
  include './app/controllers/'.$controller.'_controller.php';

  switch ($controller) {
    case 'home':
      HomeController::disp();
      break;
    case 'sign-in':
      $controller = new SignInController();
      break;
    case 'sign-up':
      $controller = new SignUpController();
      break;
    case 'leaderboard':
      $controller = new LeaderboardController();
      break;
    case 'shop':
      $controller = new ShopController();
      break;
  }
}

$page = isset($_GET['q']) ? $_GET['q'] : 'home';

switch($page) {
  case 'home':
    call('home');
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
  case 'shop':
    call('shop');
    break;
  case 'sign-out':
    session_destroy();
    header('Location: /');
    break;
}