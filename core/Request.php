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

	// ベースURLを取得
    public function getBaseUrl()
    {
        $script_name = $_SERVER['SCRIPT_NAME'];

        $request_uri = $this->getRequestUri();

        if (0 === strpos($request_uri, $script_name)) {
            return $script_name;
        } else if (0 === strpos($request_uri, dirname($script_name))) {
            return rtrim(dirname($script_name), '/');
        }

        return '';
    }

    // パス情報を取得
    public function getPathInfo()
    {
        $base_url = $this->getBaseUrl();
        $request_uri = $this->getRequestUri();

        if (false !== ($pos = strpos($request_uri, '?'))) {
            $request_uri = substr($request_uri, 0, $pos);
        }

        $path_info = (string)substr($request_uri, strlen($base_url));

        return $path_info;
    }
}
?>
