<?php
  function call($controller, $action) {
    // require the file that matches the controller name
    require_once('Controllers/' . $controller . '.php');

    // create a new instance of the needed controller
    switch($controller) {
      case 'pages':
        $controller = new PagesController();
      break;
      case 'posts':
        require_once('Models/Posts.php');
        $controller = new PostsController();
    }

    // call the action
    $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array('pages' => ['home', 'error'],
                       'posts' => ['index', 'show']);

  // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>