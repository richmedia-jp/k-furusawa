<?php

/*==========================

    ルートコントローラー

==========================*/

class RootController extends Controller
{
    protected $auth_actions = array('index');

    public function indexAction()
    {
        return $this->render(array(
            'user'       => $user,
            'followings' => $followings,
        ));
    }
}
