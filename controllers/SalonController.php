<?php

/*==========================

    美容室コントローラー

==========================*/

class SalonController extends Controller
{
    protected $auth_actions = array('index', 'detail', 'search');

    public function indexAction()
    {
        // [ todo ] - 変数をviewに渡す
        /*==========================
            # 必要なもの
                - 美容師ランキング（おすすめ？）順に入ってる配列 $salons[]
                    -- ID
                    -- 画像
                    -- 美容師名
        ==========================*/
        return $this->render();
    }

        public function searchAction($param)
    {
        // [ todo ] - 変数をviewに渡す
        /*==========================
            # 必要なもの
                - 検索クエリ
                - 美容師がランキング順に入ってる配列 $beauticians[]
                    -- ID
                    -- 画像
                    -- 美容師名
                    -- ふりがな
                    -- ニックネーム
                    -- 性別
                - 美容師ランキング（おすすめ？）順に入ってる配列 $salons[]
                    -- ID
                    -- 画像
                    -- 美容師名
        ==========================*/

        // URLDECODEすると見れるね！
        //var_dump( urldecode($param['query'] ));
        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }

    public function detailAction($param)
    {
        // [ todo ] - 変数をviewに渡す
        /*==========================
            # 必要なもの
                - 美容師 $beauticians
                    -- ID
                    -- 画像
                    -- 美容師名
                    -- ふりがな
                    -- ニックネーム
                    -- 性別
                    -- 所属する美容室名
                    -- 所属する美容室ID
                    -- 得意なカット[]
                        --- ID
                        --- name
        ==========================*/
        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }
}
