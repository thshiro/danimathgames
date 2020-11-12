<?php

/**
*  Get a post request for a method in any class
*
*  @param string $post['callback'] is the class name (required)
*  @param string $post['callback_action'] is the method name (required)
*
*/

# Requiring config file
require_once(dirname(dirname(__DIR__)) . '/config/app.php');

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($_FILES) && !empty($_FILES)) {
    $post['file'] = filter_var_array($_FILES);
}


if ($post && $post['callback'] && $post['callback_action']){

    $class  = $post['callback'];
    $method = $post['callback_action'];

    unset($post['callback'], $post['callback_action']);

    if (file_exists(dirname(__DIR__) . "/model/{$class}.php")) {
      require_once(dirname(__DIR__) . "/model/{$class}.php");
    }

    $class = 'DaniMathGames\SafeBox\\' . $class;

    if (class_exists($class)) {

      $class = new $class();

      if (method_exists($class, $method)) {

          try {

              # returning json if required
              if (isset($post['json'])) {
                  echo json_encode($class->$method($post));
              } else {
                  $class->$method($post);
              }

          } catch (Execption $e) {
              return http_response_code(400);
              //echo "Error: something went wrong.";
          }

      } else {
          return http_response_code(404);
          //echo "Error: method not found.";
      }

    } else {
        return http_response_code(404);
        //echo "Error: class not found.";
    }

}
