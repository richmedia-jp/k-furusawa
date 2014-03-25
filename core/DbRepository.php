<?php

/*==========================
    DbRepository
        - データベースへアクセスを行う
==========================*/
abstract class DbRepository
{
    protected $con;

    /*==========================
        コストラクタ
    ==========================*/
    public function __construct($con)
    {
        $this->setConnection($con);
    }

    /*==========================
        コネクションを作成
    ==========================*/
    public function setConnection($con)
    {
        $this->con = $con;
    }

    /*==========================
        クエリの実行
    ==========================*/
    public function execute($sql, $params = array())
    {
        $stmt = $this->con->prepare($sql);

        //var_dump($params);
        $stmt->execute($params);

        return $stmt;
    }

    /*==========================
        クエリを実行し、結果を一行取得
    ==========================*/
    public function fetch($sql, $params = array())
    {
        return $this->execute($sql, $params)->fetch(PDO::FETCH_ASSOC);
    }


    /*==========================
        クエリを実行、結果をすべて取得
    ==========================*/
    public function fetchAll($sql, $params = array())
    {
        //var_dump($sql);
        return $this->execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
        //return $this->execute(" SELECT * FROM salon WHERE intro_title OR intro_body LIKE '%最高%' ")->fetch(PDO::FETCH_ASSOC);
    }
}
