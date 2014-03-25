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
        $salon_info = $this->db_manager->get('Salon')->fetchBySalonId($param['salon_id']);
        $salon_tag_ids = $this->db_manager->get('Tag')->fetchBySalonId($param['salon_id']);
        for ($i=0; $i < count($salon_tag_ids); $i++) {
           $tags[] =  $this->db_manager->get('Tag')->fetchByTagId($salon_tag_ids[$i]["tag_id"]);
        }


        return $this->render(array(
            'res' => $salon_info,
            'tags' => $tags

        ));
    }

    public function searchAction($param)
    {
        //echo "サーチ";
        //var_dump( urldecode($param['query'] ));
        $salons = $this->db_manager->get('Salon')->fetchByQuery(urldecode($param['query']));

        for ($i=0; $i < count($salons); $i++) {
            $tag_ids[] = $this->db_manager->get('Tag')->fetchBySalonId($salons[$i]["salon_id"]);
        }


        for ($i=0; $i < count($salons); $i++) {
            for ($j=0; $j < count($tag_ids[$i]); $j++) {
                //echo $tag_ids[$i][$j]["tag_id"];
                $_tags[] =  $this->db_manager->get('Tag')->fetchByTagId($tag_ids[$i][$j]["tag_id"]);
            }
            $tags[$i] = $_tags;
            $_tags = [];

        }
        //var_dump($tags);

        return $this->render(array(
            'query' => urldecode($param['query']),
            'tags' => $tags,
            'res' => $salons
        ));
    }
}
