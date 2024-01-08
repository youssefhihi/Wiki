<?php
/*
 * App Core Class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 *url = controller/method/param[]
 * Core class
 * routing class
 */
class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    //print_r($this->getUrl());

    $url = $this->getUrl();

    // Check if $url is not null and has at least one element
    if ($url && isset($url[0])) {
      // Look in controllers for the first value
      //ucwords upper case letter 1 
      if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
      //vide cache 
        unset($url[0]);
      }
    }

    // Require the controller
    require_once '../app/controllers/' . $this->currentController . '.php';

    // Instantiate controller class
    $this->currentController = new $this->currentController;

    // Check for the second part of URL
    // METHODE CONTROLER 
    if (isset($url[1])) {
      // Check to see if method exists in the controller
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        // Unset 1 index
        unset($url[1]);
      }
    }

    // Get params
    $this->params = $url ? array_values($url) : [];

    // Call a callback with an array of params
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function getUrl()
  { 
    // htacces url index.php?url=$1
    if (isset($_GET['url'])) {
      // Annuler espace chenge /
      $url = rtrim($_GET['url'], '/');
      //supprmer les slach  "/"final
      $url = filter_var($url, FILTER_SANITIZE_URL);
      //Array 
      $url = explode('/', $url);
      return $url;
    }
  }
}