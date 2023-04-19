<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller {

	public function loginAction() {
		if(!empty($_POST)) {
			$this->view->message('ok', 'text');
		}
		$this->view->render('Вход');
	}

	public function registerAction() {
		$this->view->render('Регистрация');
	}

	
	public function location($url) {
		exit(json_encode(['url' => $url]));
	}
}