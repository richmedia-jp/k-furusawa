<?php


/*==========================
    オートローダクラス
        # ルール
            - クラスは1ファイルにつき1つのみ定義できる
            - core, modulesのいずれかに置く
==========================*/


class ClassLoader {

    protected $dirs;

    // PHPにオートローダクラスを登録する
    public function register() {
        // コールバックでloadClassを読み込み
        spl_autoload_register(array($this, 'loadClass'));
    }

    public function registerDir($dir) {
        //ディレクトリの登録
        $this->dirs[] = $dirs;
    }

    // クラスファイルの読み込み
    public function loadClass($class) {
        foreach ($this->dirs as $dir) {
            $file = $dir . '/' . $class . '.php';
            if (is_readdable($file)) {
                require $file;
                return;
            }
        }
    }
}
?>
