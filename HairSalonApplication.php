<?php

/*==========================

    全体管理

==========================*/

class HairSalonApplication extends Application
{

    public function getRootDir()
    {
        return dirname(__FILE__);
    }

    // ルーティング定義配列
    protected function registerRoutes()
    {
        return array(
            '/'
                => array('controller' => 'root', 'action' => 'index'),
            '/salon'
                => array('controller' => 'salon', 'action' => 'index'),
            '/salon/:salon_id'
                => array('controller' => 'salon', 'action' => 'detail'),
            '/salon/search/:query'
                => array('controller' => 'salon', 'action' => 'search'),
            '/beautician'
                => array('controller' => 'beautician', 'action' => 'index'),
            '/beautician/:beautician_id'
                => array('controller' => 'beautician', 'action' => 'detail'),
            '/beautician/search/:query'
                => array('controller' => 'beautician', 'action' => 'search'),
        );
    }

    // protected function configure()
    // {
    //     $this->db_manager->connect('master', array(
    //         'dsn'      => 'mysql:dbname=mini_blog;host=localhost',
    //         'user'     => 'root',
    //         'password' => '',
    //     ));
    // }
}
