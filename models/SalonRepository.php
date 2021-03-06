<?php

/*==========================
    SalonRepository
        - salonテーブルのレコードを取得する
==========================*/
class SalonRepository extends DbRepository
{
    // public function insert($user_name, $password)
    // {
    //     $password = $this->hashPassword($password);
    //     $now = new DateTime();

    //     $sql = "
    //         INSERT INTO user(user_name, password, created_at)
    //             VALUES(:user_name, :password, :created_at)
    //     ";

    //     $stmt = $this->execute($sql, array(
    //         ':user_name'  => $user_name,
    //         ':password'   => $password,
    //         ':created_at' => $now->format('Y-m-d H:i:s'),
    //     ));
    // }

    // public function hashPassword($password)
    // {
    //     return sha1($password . 'SecretKey');
    // }

    public function fetchBySalonId($salon_id)
    {
        $sql = "SELECT * FROM salon WHERE salon_id = :salon_id";

        return $this->fetch($sql, array(':salon_id' => $salon_id));
    }

    // public function isUniqueUserName($user_name)
    // {
    //     $sql = "SELECT COUNT(id) as count FROM user WHERE user_name = :user_name";

    //     $row = $this->fetch($sql, array(':user_name' => $user_name));
    //     if ($row['count'] === '0') {
    //         return true;
    //     }

    //     return false;
    // }

    public function fetchAllSalons()
    {
        $sql = "
            SELECT *
                FROM salon
                    ORDER BY page_view  DESC
        ";

        return $this->fetchAll($sql, array());
    }

        public function fetchByQuery($query)
    {
        $sql = "
            SELECT *
                FROM salon
                    WHERE intro_title OR intro_body
                        LIKE '%".$query."%'
        ";

        return $this->fetchAll($sql, array(':query' => $query));
    }
}
