<?php
namespace App\Service;

use App\Model\User;

class UserService implements UserServiceInterface
{
    /**
     * 获取会员信息
     * @param int $id
     */
    public function getInfoByIds(int $id)
    {
        #获取用户信息
        return User::query()->where(['id' => $id])->first();
    }

    /**
     * 分页获取获取会员信息
     */
    public function getInfoAlls($params,$start,$limit)
    {
        return User::query()->where($params)->offset($start)->limit($limit)->get();
    }
}