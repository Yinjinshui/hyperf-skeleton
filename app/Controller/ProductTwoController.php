<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ProductService;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Di\Annotation\Inject;

class ProductTwoController extends AbstractController
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        return $response->raw('Hello Hyperf!');
    }


    //通过 @Inject 注解注入
    //https://hyperf.wiki/2.1/#/zh-cn/di?id=%e9%80%9a%e8%bf%87-inject-%e6%b3%a8%e8%a7%a3%e6%b3%a8%e5%85%a5
    /**
     * @Inject
     * @var ProductService
     */
    private $productServer;


    public function getinfotest(RequestInterface $request, ResponseInterface $response)
    {
        $id=$request->input('id',1);
        $res=$this->productServer->getProductDetailinfo($id);
        return $response->json(['code'=>200,'message'=>'通过 @Inject 注解注入','data'=>$res]);
    }


    /**
     * 通过 `@Inject` 注解注入由 `@var` 注解声明的属性类型对象
     * 当 UserService 不存在于 DI 容器内或不可创建时，则注入 null
     *
     * @Inject(required=false)
     * @var UserService
     */
    private $userService;

    public function testtwo(RequestInterface $request, ResponseInterface $response)
    {
        $id = 1;
        $res=[];
        if ($this->userService instanceof UserService) {
            // 仅值存在时 $userService 可用
            $res=$this->userService->getInfoById($id);
        }
        return $response->json(['code'=>200,'message'=>'通过 @Inject 注解注入','data'=>$res]);
    }
}
