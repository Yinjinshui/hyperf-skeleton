<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Nacos\Api\NacosInstance;
use Hyperf\Nacos\Model\ServiceModel;
use Hyperf\Utils\ApplicationContext;
use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use \Hyperf\Contract\ConfigInterface;
use Hyperf\Di\Annotation\Inject;

/**
 * @Controller()
 */
class IndexController extends AbstractController
{
    /**
     * @Inject
     * @var ConfigInterface
     */
    private $config;

    /**
     * @RequestMapping(path="index", methods="get,post")
     */
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    /**
     * @RequestMapping(path="planlist", methods="get,post")
     * 获取列表数据
     * 路由文件配置方式使用
     */
    public function planlist()
    {
       #获取请求参数
        $name=$this->request->input('name');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$name}",
            'data'=>'https://hyperf.wiki/2.1/#/zh-cn/quick-start/overview?id=%e9%80%9a%e8%bf%87%e9%85%8d%e7%bd%ae%e6%96%87%e4%bb%b6%e5%ae%9a%e4%b9%89%e8%b7%af%e7%94%b1',
        ];
    }

    /**
     * @RequestMapping(path="test", methods="get,post")
     * 获取列表数据
     * 路由文件配置方式使用
     */
    public function test(RequestInterface $request)
    {
        $data=$request->input('name');
        $data=is_array($data)? json_encode($data):'';
        $method=$request->getMethod();
        return [
            'method' => $method,
            'message' => "Hello {$data}.",
        ];
    }


    /**
     * @RequestMapping(path="getnacos", methods="get,post")
     * 通过nacos获取最优节点
     */
    public function getnacos(ResponseInterface $response)
    {
        echo 'get nacos';
        $container = ApplicationContext::getContainer();
        $instance = $container->get(NacosInstance::class);

        $service = new ServiceModel([
            'service_name' => 'hyperf-test',
            'group_name' => 'php-test',
            'namespace_id' => '419f2929-7822-4822-88b1-3de0a69c7ac0'
        ]);

        $optimal = $instance->getOptimal($service);
        var_dump($optimal);
        return $response->json(['code'=>200,'data'=>$optimal]);
    }

    /**
     * @RequestMapping(path="getapollo", methods="get,post")
     * 获取apollo配置
     * @param ResponseInterface $response
     */
    public function getapollo(ResponseInterface $response)
    {
        $configs=$this->config->get('apollo');
        $apillo_config=$this->config->get('store_manage');
        $store_set=$this->config->get('store_set');
        return $response->json(['code'=>200,'data'=>$configs,'store_manage'=>$apillo_config,'store_set'=>$store_set]);
    }


}
