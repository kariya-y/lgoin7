<?php

namespace MyApp\Controller;

use MyApp\Model\User;

class Change extends \MyApp\Controller {
	public function run() {
		if (! $this->isLoggedIn ()) {
			// ログインしていない場合はログイン画面にリダイレクトをかける
			header ( 'Location: ' . SITE_URL . '/login.php' );
			exit ();
		}

		if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
			$this->postProcess ();
		}
	}
	protected function postProcess() {
		if (isset ( $_POST ['name'] ) && $_POST ['name'] != null) {
			$me = $_SESSION ['me'];
			$me->name = $_POST ['name'];
			$userModel = new \MyApp\Model\User();
			$userModel->change($me);
		}
	}
}