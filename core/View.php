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
        $_file = $this->base_dir . '/' . $_path . '.php';

        extract(array_merge($this->defaults, $_variables));

        ob_start();
        ob_implicit_flush(0);

        //var_dump($_variables);

        // レイアウトを読み込む
        require $_file;

        // レイアウトファイルでなければ、テンプレートエンジンのように振る舞う
        /*==========================
            {...}のように囲まれたファイルを展開する
            例:
                {name}
            ->
                <?php echo $res["name"]?>
        ==========================*/
        // if( $_file != '/Users/mosco/Dev/sandbox/views/layout.php') {
        //     $html = ob_get_clean();
        //     echo preg_replace('/{(.+?)}/e', '$res["$1"]', $html);
        // }

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
