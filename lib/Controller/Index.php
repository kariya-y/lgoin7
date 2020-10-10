<?php
namespace login7\Controller;

class Index extends \login7\Controller {
    public function run() {
        if (!$this->isLoggedIn()) {
            // ログインしていない場合はログイン画面にリダイレクトをかける
            header('Location: '. SITE_URL.'/public_html/login.php');
            exit;
        }
        // get users info
    }
}