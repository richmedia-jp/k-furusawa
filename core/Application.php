<?php

/*==========================

    アプリケーションクラス
        - 全体の管理をする

==========================*/


// abstractとして定義されたクラスのインスタンスを生成することはできない
abstract class Application
{
    // デバッグモードの管理
    // protected $debug = false;
    protected $request;
    protected $response;

    // コンストラクタ
    public function __construct($debug = false)
    {
        //$this->setDebugMode($debug);
        $this->initialize();
        $this->configure();
    }

    // デバッグ用
    // protected function setDebugMode($debug)
    // {
    //     if ($debug) {
    //         $this->debug = true;
    //         ini_set('display_errors', 1);
    //         error_reporting(-1);
    //     } else {
    //         $this->debug = false;
    //         ini_set('display_errors', 0);
    //     }
    // }



    /*==========================

        初期化

    ==========================*/

    protected function initialize()
    {
        // それぞれのクラスをオブジェクト化
        $this->request    = new Request();
        $this->response   = new Response();
        $this->router     = new Router($this->registerRoutes());
    }



    // 設定関連
    protected function configure()
    {
    }

    // ルート取得
    abstract public function getRootDir();

    // ルーティングを取得
    abstract protected function registerRoutes();

    // デバッグモードか判定
    // public function isDebugMode()
    // {
    //     return $this->debug;
    // }


    // Requestオブジェクト
    public function getRequest()
    {
        return $this->request;
    }

    // Responseオブジェクト
    public function getResponse()
    {
        return $this->response;
    }

    // コントローラのディレクトリを取得
    public function getControllerDir()
    {
        return $this->getRootDir() . '/controllers';
    }

    // ビューのディレクトリを取得
    public function getViewDir()
    {
        return $this->getRootDir() . '/views';
    }

    // モデルのディレクトリを取得
    public function getModelDir()
    {
        return $this->getRootDir() . '/models';
    }

    // ドキュメントルートのディレクトリを取得
    public function getWebDir()
    {
        return $this->getRootDir() . '/web';
    }

    /*==========================
        アプリケーションの実行
    ==========================*/
    public function run() {
        try {

            // 受け取ったリクエストを解析
            $params = $this->router->resolve($this->request->getPathInfo());

            if ($params === false) {
                throw new HttpNotFoundException('No route found for ' . $this->request->getPathInfo());
            }

            $controller = $params['controller'];
            $action = $params['action'];

            // 受け取ったものによって実行する
            $this->runAction($controller, $action, $params);

        } catch (HttpNotFoundException $e) {
            // エラーならば404に飛ばす
            $this->render404Page($e);
        }
        // catch (UnauthorizedActionException $e) {
        //     //list($controller, $action) = $this->login_action;
        //     $this->runAction($controller, $action);
        // }

        $this->response->send();
    }


    // アクションの実行
    public function runAction($controller_name, $action, $params = array())
    {
        // クラス名を作成
        $controller_class = ucfirst($controller_name) . 'Controller';
        // クラス名からコントローラを探す
        $controller = $this->findController($controller_class);

        // コントローラがなければエラーで404
        if ($controller === false) {
            throw new HttpNotFoundException($controller_class . ' controller is not found.');
        }

        // 見つかれば、コントローラに処理を任せる
        $content = $controller->run($action, $params);

        // コントローラの処理をレスポンスとして返す
        $this->response->setContent($content);
    }


    // 指定されたコントローラ名から対応するControllerオブジェクトを取得
    protected function findController($controller_class)
    {
        // コントローラーを読み込んでいなかったら、
        if (!class_exists($controller_class)) {
            // PATH/TO/CONTROLLERS/コントローラクラス.phpを探す
            $controller_file = $this->getControllerDir() . '/' . $controller_class . '.php';

            // $controller_fileが読めなかったら404
            if (!is_readable($controller_file)) {
                return false;
            } else {
                // $controller_fileが読めたらそれを読む。
                require_once $controller_file;

                // その中にクラスがなかったら404
                if (!class_exists($controller_class)) {
                    return false;
                }
            }
        }

        return new $controller_class($this);
    }

    // エラー時は404を返す
    protected function render404Page($e)
    {
        $this->response->setStatusCode(404, 'Not Found');
        //$message = $this->isDebugMode() ? $e->getMessage() : 'Page not found.';
        $message = '404 Page not found.';
        $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        $this->response->setContent(<<<EOF
            <!doctype html>
            <html lang="ja">
            <head>
                <meta charset="UTF-8" />
                <title>404です</title>
            </head>
            <body>
                {$message}
            </body>
            </html>
EOF
        );
    }
}
