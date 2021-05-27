<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ProductService;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;

class ProductOneController extends AbstractController
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        return $response->raw('Hello Hyperf!');
    }


    //通过构造方法注入
    //https://hyperf.wiki/2.1/#/zh-cn/di?id=%e9%80%9a%e8%bf%87%e6%9e%84%e9%80%a0%e6%96%b9%e6%b3%95%e6%b3%a8%e5%85%a5
    /**
     * @var ProductService
     */
    private $productServer;

    // 通过在构造函数的参数上声明参数类型完成自动注入
    public function __construct(ProductService $productServer)
    {
        $this->productServer = $productServer;
    }

    public function getinfotest(RequestInterface $request, ResponseInterface $response)
    {
        $id=$request->input('id',1);
        $res=$this->productServer->getProductDetailinfo($id);
        return $response->json(['code'=>200,'message'=>'通过构造方法注入','data'=>$res]);
    }
}
