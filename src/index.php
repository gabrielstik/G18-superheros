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
    case 'collection':
      $controller = new CollectionController();
      break;
    case 'rules':
      $controller = new RulesController();
      break;
    case 'match':
      $match_id = explode('-', $_GET['q'])[1];
      $controller = new MatchController($match_id);
      break;
  }
}

$page = isset($_GET['q']) ? $_GET['q'] : 'home';

if (substr($page, 0, 5) === 'match' && isset($_SESSION['username']) && substr($page, 5, 2) !== 'es') {
  empty(explode('-', $_GET['q'])[1]) ? header('Location: /404') : call('match');
}

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
  case 'rules':
    call('rules');
    break;
  case 'collection':
  isset($_SESSION['username']) ? call('collection') : header('Location: /sign-in');
    break;
  case 'shop':
    isset($_SESSION['username']) ? call('shop') : header('Location: /sign-in');
    break;
  case 'matches':
    isset($_SESSION['username']) ? call('matches') : header('Location: /sign-in');
    break;
  case 'sign-out':
    session_destroy();
    header('Location: /');
    break;
}