<?

session_start();

require './config.php';

function call($controller) {
  include './app/controllers/'.$controller.'_controller.php';

  switch ($controller) {
    case 'session':
      include './app/models/database.php';
      $controller = new SessionController();
      if (isset($_POST['sign-in'])) $controller->verify($_POST['sign-in--username'], $_POST['sign-in--password']);
      else if (isset($_SESSION['username'])) $controller->kill();
      else if (isset($_POST['sign-up'])) $controller->create_account($_POST['sign-up--username'], $_POST['sign-up--password'], $_POST['sign-up--password-confirm']);
      else $controller->show();
  }
}

$page = isset($_GET['q']) ? $_GET['q'] : 'home';

switch($page) {
  case 'home':
    include './app/views/home.php';
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