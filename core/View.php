<?php

/*==========================
    ビュー
==========================*/

class View
{
    protected $base_dir;
    protected $defaults;
    protected $layout_variables = array();


    // コンストラクタ
    public function __construct($base_dir, $defaults = array())
    {
        $this->base_dir = $base_dir;
        $this->defaults = $defaults;
    }

    // レイアウトに渡す変数を指定
    public function setLayoutVar($name, $value)
    {
        $this->layout_variables[$name] = $value;
    }

    // レンダリング
    public function render($_path, $_variables = array(), $_layout = false)
    {
        // ビューファイルを探す
        $_file = $this->base_dir . '/' . $_path . '.php';

        extract(array_merge($this->defaults, $_variables));

        ob_start();
        ob_implicit_flush(0);

        // 使いやすい名前に変更
        $val = $_variables;

        // ビューファイルの呼び出し
        require $_file;

        $content = ob_get_clean();

        if ($_layout) {
            $content = $this->render($_layout,
                array_merge($this->layout_variables, array(
                    '_content' => $content,
                )
            ));
        }
        return $content;
    }

    // HTMLエスケープ
    public function escape($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}
