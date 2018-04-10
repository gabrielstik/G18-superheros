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
    case 'matches':
      $controller = new MatchesController();
      break;
    case 'match':
      empty(explode('/', $_GET['q'])[1]) ? header('Location: /404') : $match_id = explode('/', $_GET['q'])[1];
      $controller = new MatchController($match_id);
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
    isset($_SESSION['username']) ? call('shop') : header('Location: /'.$_GET['q']);
    break;
  case 'matches':
    isset($_SESSION['username']) ? call('matches') : header('Location: /'.$_GET['q']);
    break;
  case 'sign-out':
    session_destroy();
    header('Location: /');
    break;
}

if (substr($page, 0, 5) === 'match' && isset($_SESSION['username'])) {
  call('match');
}