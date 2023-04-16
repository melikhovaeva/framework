<?php

namespace application\core;

class View {
  public $path;
  public $route;
  public $layout = 'default';

  public function __construct($route) {
    $this->route = $route;
    // debug($this->route);
    $this->path = $route['controller'].'/'.$route['action'];
    // debug($this->path);
  }

  //Загружает сам шаблон и его вид
  public function render($title, $vars = []) {
    $path = 'application/views/'.$this->path.'.php';
		if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'application/views/layouts/'.$this->layout.'.php';
		}
  }
}
