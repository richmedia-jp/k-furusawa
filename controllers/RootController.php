<?php

/*==========================

    ルートコントローラー

==========================*/

class RootController extends Controller
{
    protected $auth_actions = array('index');

    public function indexAction()
    {
			// [ todo ] - 変数をviewに渡す
			/*==========================
            # 必要なもの
                - 美容室がランキング順に入ってる配列 $salons[]
                    -- ID
                    -- 画像
                    -- 美容室名
                - 美容師がランキング順に入ってる配列 $beauticians[]
                    -- ID
                    -- 画像
                    -- 美容師名
                - タグが入っている配列 $tags[]
                    -- ID
                    -- 名前
        ==========================*/
        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }
}
