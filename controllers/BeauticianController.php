<?php

/*==========================

    美容師コントローラー

==========================*/

class BeauticianController extends Controller
{
    protected $auth_actions = array('index', 'detail', 'search');

    public function indexAction()
    {
        // [ todo ] - 変数をviewに渡す
        /*==========================
            # 必要なもの
                - 美容室がランキング（おすすめ？）順に入ってる配列 $salons[]
                    -- ID
                    -- 画像
                    -- 美容室名
                - タグが入っている配列 $tags[]
                    -- ID
                    -- 名前
        ==========================*/

        return $this->render();
    }

        public function searchAction()
    {
        // [ todo ] - 変数をviewに渡す
        /*==========================
            # 必要なもの
                - 検索クエリ
                - 美容師室がランキング順に入ってる配列 $salons[]
                    -- ID
                    -- 画像
                    -- 美容室名
                    -- 電話番号
                    -- 関連するタグ
                    -- 店舗紹介タイトル
                    -- 店舗紹介本文
                - タグが入っている配列 $tags[]
                    -- ID
                    -- 名前
        ==========================*/
        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }

    public function detailAction()
    {
        // [ todo ] - 変数をviewに渡す
        /*==========================
            # 必要なもの
                - 美容室情報 $salon
                    -- ID
                    -- 美容室名
                    -- 画像[]
                        --- 画像1
                        --- 画像2
                        --- 画像3
                    -- 関連するタグ[]
                        --- ID
                        ---- 名前
                    -- 店舗紹介タイトル
                    -- 店舗紹介本文
                    -- 関連する美容師[]
                        --- ID
                        --- 画像
                        --- 美容師名
                    -- 住所
                    -- 営業時間
                    -- 定休日
                    -- 電話番号
        ==========================*/
        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }
}
