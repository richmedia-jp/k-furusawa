<?php

/*==========================

    美容師コントローラー

==========================*/

class BeauticianController extends Controller
{
    protected $auth_actions = array('index', 'detail', 'search');

    public function indexAction()
    {
        return $this->render();
    }

    public function detailAction()
    {
        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }

    public function searchAction()
    {
        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }
}
