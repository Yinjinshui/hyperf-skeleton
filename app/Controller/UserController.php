<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\UserServiceInterface;
use Hyperf\DbConnection\Db;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Utils\Arr;

class UserController extends AbstractController
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        return $response->raw('Hello Hyperf!');
    }

    //抽象对象注入
    //https://hyperf.wiki/2.1/#/zh-cn/di?id=%e6%8a%bd%e8%b1%a1%e5%af%b9%e8%b1%a1%e6%b3%a8%e5%85%a5
    /**
     * @Inject
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * 获取单条用户数据
     */
    public function getInfo(RequestInterface $request, ResponseInterface $response)
    {
        $id = (int)$request->post('id', 1);
        $res=[];
        $res = $this->userService->getInfoByIds($id);
        return $response->json(['code' => 200, 'message' => '抽象对象注入', 'params'=>$id,'data' => $res]);
    }

    /**
     * 获取多条用户数据
     */
    public function getInfolist(RequestInterface $request, ResponseInterface $response)
    {
        $sex = $request->post('sex', 1);
        $page = $request->post('page', 1);
        $where = ['sex' => $sex];
        $limit=$request->post('limit', 5);
        $start=ceil($page - 1) * $limit;
        $res = $this->userService->getInfoAlls($where, $start,$limit);
        return $response->json(['code' => 200, 'message' => '抽象对象注入', 'data' => $res]);
    }


}
