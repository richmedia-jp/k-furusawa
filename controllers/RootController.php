<?php

/*==========================

    ルートコントローラー

==========================*/

class RootController extends Controller
{
    protected $auth_actions = array('index');

    public function indexAction()
    {
        $result = $this->db_manager->get('Salon')->fetchAllSalons();
        //var_dump($result);
        return $this->render(array(
        'res' => $result
        ));
    }
}
