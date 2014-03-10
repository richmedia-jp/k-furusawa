<?php

/*==========================

    美容室コントローラー

==========================*/

class SalonController extends Controller
{
    protected $auth_actions = array('index', 'detail', 'search');

    public function indexAction()
    {
        return $this->render();
    }

    public function detailAction($param)
    {
        //var_dump($param['salon_id']);

        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }

    public function searchAction($param)
    {
        //echo "サーチ";
        //var_dump( urldecode($param['query'] ));
        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }
}
