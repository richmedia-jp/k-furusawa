<?php

/*==========================
	Request；ユーザのリクエスト情報を制御
==========================*/

class Request {

	// POSTかどうかの判定
	public function isPost() {

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			return ture;
		}
		return false;
	}

	// getの値を取得
	public function getGet($name, $default = nul) {
		if (isset($_GET[$name])) {
			return $_GET[$name];
		}
		return $default;
	}
	// postの値を取得
	public function getPost($name, $default = null) {
		if (isset($_POST[$name])) {
			return $_POST[$name];
		}
		return $default;
	}

	// ホスト名取得
	public function getHost() {
		if(!empty($_SERVER['HTTP_HOST'])) {
			return ($_SERVER['HTTP_HOST']);
		}
		return $_SERVER['SERVER_NAME'];
	}

	// HTTPSか判定
	public function isSsl() {
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
			return true;
		}
		return false;
	}

	// URL情報を返す
	public function getRequestUri() {
		return $_SERVER['REQUEST_URI'];
	}
}
?>
