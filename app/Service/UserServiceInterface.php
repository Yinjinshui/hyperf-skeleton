<?php


namespace App\Service;


interface UserServiceInterface
{
    public function getInfoByIds(int $id);

    public function getInfoAlls($where, $start, $limit);
}