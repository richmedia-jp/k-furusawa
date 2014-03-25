<?php

/*==========================
    TagRepository
        - salon_tag_relationsからtag_idを取得し、tag_nameテーブルからtag_idのnameを取得する
==========================*/
class TagRepository extends DbRepository
{
    public function fetchBySalonId($salon_id)
    {
        $sql = "SELECT * FROM salon_tag_relations WHERE salon_id = :salon_id";

        return $this->fetchAll($sql, array(':salon_id' => $salon_id));
    }

    public function fetchAllTags()
    {
        $sql = "
            SELECT *
                FROM salon
                    ORDER BY page_view  DESC
        ";
        return $this->fetchAll($sql, array());
    }

    public function fetchByTagId($tag_id)
    {
        $sql = "SELECT * FROM tag_name WHERE tag_id = :tag_id";

        return $this->fetchAll($sql, array(':tag_id' => $tag_id));
    }
}
