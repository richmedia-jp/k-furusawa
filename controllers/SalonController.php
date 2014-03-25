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
        //var_dump($this->request);
        //$salon_id = $this->request->getGet('salon_id');

        //$result = $this->db_manager->get('Salon')->fetchBySalonId(1);
        $result = $this->db_manager->get('Salon')->fetchBySalonId($param['salon_id']);


        return $this->render(array(
            'res' => $result
        ));
    }

    public function searchAction($param)
    {
        //echo "サーチ";
        //var_dump( urldecode($param['query'] ));
        return $this->render(array(
            'query' => $param['query']
        ));
    }
}
