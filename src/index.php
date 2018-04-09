<?

session_start();

require './config.php';

function call($controller) {
  include './app/controllers/'.$controller.'_controller.php';

  switch($controller) {
    case 'apis':
      include './app/models/apis.php';
      $controller = new APIsController('http://superheroapi.com/api/'.SUPERHERO_API_KEY.'/search/batman');
      break;
    case 'session':
      include './app/models/database.php';
      $controller = new SessionController();
      if (isset($_POST['sign-in'])) $controller->verify($_POST['sign-in--username'], $_POST['sign-in--password']);
      else if (isset($_SESSION['username'])) $controller->kill();
      else $controller->show();
  }
}

$page = isset($_GET['q']) ? $_GET['q'] : 'home';

switch($page) {
  case 'home':
    // call('apis');
    break;
  case 'sign':
    call('session');
    break;
  case 'signout':
    session_destroy();
    header('Location: /');
    break;
}

if (isset($_SESSION['username'])) echo $_SESSION['username'];
else echo 'Pas connecté';