<?php

namespace application\core;

class Router {

  protected $routes = [];
  protected $params = [];

  public function __construct() {
    $arr = require 'application/config/routes.php';
    foreach ($arr as $key => $val) {
      $this->add($key, $val);
    }
    //echo debug($arr); 
  }

  //Добавление маршуртов
  public function add($route, $params) {
    $route = '#^'.$route.'$#';
    $this->routes[$route] = $params;
  }


  //Проверка маршрутов на наличии
  public function match() {
    $url = trim($_SERVER['REQUEST_URI'], '/');
    foreach ($this->routes as $route => $params) {
      if(preg_match($route, $url, $matches)) {
        $this->params = $params;
        return true;
      } 
    }
    return false;
  }


    //Запуск маршрутов
  public function run() {
    if($this->match()) {
      echo '<p>Controller <b>'.$this->params['controller'].'</b></p>';
      echo '<p>Action <b>'.$this->params['action'].'</b></p>';
    } else {
      echo 'Маршрут не найден';
    }
  }
}
