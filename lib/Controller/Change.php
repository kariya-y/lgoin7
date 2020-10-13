<?php

namespace MyApp\Controller;

use MyApp\Model\User;
use MyApp;

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
		$result = false;
		$newName = $_POST ['name'];
		$newEmail = $_POST ['email'];
		$me = $_SESSION ['me'];

		if (isset ( $_POST ['name'] ) && $_POST ['name'] != null) {
//			$me->name = $_POST ['name'];
//			$me->email = $_POST ['email'];
			$userModel = new MyApp\Model\User;
			try {
				$result = $userModel->change ([
					'id'       => $me->id,
					'name'     => $newName,
					'email' => $newEmail
				]);
			} catch(MyApp\Exception\ErrorUserChange $e) {
				$this->setErrors('change', $e->getMessage());
				return;
			}
		}
		if($result){
			$me->name = $newName;
			$me->email = $newEmail;
		}
	}
}