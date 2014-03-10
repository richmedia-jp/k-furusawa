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
        // ディレクトリの登録をする
        // 引数にきたパスを参照する$dirsに追加する
        $this->dirs[] = $dir;
    }

    // クラスファイルの読み込み
    public function loadClass($class) {
        // $class は読み込みたいクラス名が入ってくる
        foreach ($this->dirs as $dir) {
            $file = $dir . '/' . $class . '.php';
            if (is_readable($file)) {
                require $file;
                return;
            }
        }
    }
}
?>
