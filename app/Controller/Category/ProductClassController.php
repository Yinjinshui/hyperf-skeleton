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

namespace App\Controller\Category;

use App\Controller\AbstractController;
use App\Service\ProductService;
use http\Env\Request;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Hyperf\Utils\Arr;
use Psr\Http\Message\ResponseInterface as Psr7ResponseInterface;
use Hyperf\DbConnection\Db;

class ProductClassController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        #HttpExceptionHandler
        $data = [];

        #从数据表获取数据[原生sql]
        #$data=DB::select('select * from lkt_product_class');
        // 启用 SQL 数据记录功能
        Db::enableQueryLog();
        $data = DB::table('product_class')->where(['recycle' => 1])->select('cid', 'pname')->get();
        var_dump($data);
        // 打印最后一条 SQL 相关数据
        var_dump(Arr::last(Db::getQueryLog()));
        return [
            'method' => $method,
            'message' => "Hello {$user}.",
            'data' => $data,
        ];
    }

    /*
     * 此处路由 /category/list
     * https://hyperf.wiki/2.1/#/zh-cn/request
     */
    public function list(RequestInterface $request)
    {
        $data = $request->input('name');
        $data = is_array($data) ? json_encode($data) : '';
        $method = $request->getMethod();
        return [
            'method' => $method,
            'message' => "Hello {$data}.",
            'path' => '请求路径:' . $request->path(),
            'url1' => '没有查询参数' . $request->url(),
            'url2' => '有查询参数' . $request->fullUrl(),
            'all' => '获取所有请求的参数' . json_encode($request->all())
        ];
    }


    public function test(RequestInterface $request, ResponseInterface $response)
    {
        $target = $request->input('target', 'World');
        return 'Hello ' . $target;
    }

    /*
     * 存储上传文件
     */
    public function photos(RequestInterface $request)
    {
        // 该路径为上传文件的临时路径
        $path = $request->file('photo')->getPath();
        // 由于 Swoole 上传文件的 tmp_name 并没有保持文件原名，所以这个方法已重写为获取原文件名的后缀名
        $extension = $request->file('photo')->getExtension();
        $file = $request->file('photo');
        $file->moveTo('./images/' . time() . "." . $extension);
        // 通过 isMoved(): bool 方法判断方法是否已移动
        $res = 0;
        if ($file->isMoved()) {
            $res = 1;
        }
        return [
            'path' => $path,
            'extension' => $extension,
            'move' => $res,
            'base_path' => BASE_PATH
        ];
    }

    public function downloads(ResponseInterface $response): Psr7ResponseInterface
    {
        return $response->download(BASE_PATH . '/images/1618649260.jpg', '1618649260.jpg');
    }

    public function editdata(ResponseInterface $response)
    {
        Db::beginTransaction();
        try {
            $res = Db::table('product_class')->update(['recycle' => 0, 'add_date' => date('Y-m-d H:i:s')]);
            if (empty($res)) {
                Db::rollBack();
                return ['code' => 201, 'msg' => '处理失败'];
            }
            Db::commit();
        } catch (\Throwable $ex) {
            Db::rollBack();
            $response->json(['code' => 201]);
        }
        return ['code' => 200, 'msg' => '处理成功'];
    }

    /**
     * 获取一列数据
     */
    public function pluckss()
    {
        // 启用 SQL 数据记录功能
        Db::enableQueryLog();
        $res = Db::table("product_class")->whereRaw("sid>?", [29])->where(['recycle' => 0])->pluck('pname', 'cid');
        var_dump(Arr::last(Db::getQueryLog()));
        return ['code' => 200, 'msg' => '处理成功', 'data' => $res];
    }

    //获取单条数据
    public function getoneinfo(RequestInterface $request, ResponseInterface $response)
    {
        #商品id
        $id = (int)$request->input('id', 1);
        $res=[];
        return $response->json(['code' => 200, 'msg' => '处理成功', 'data' => $res]);

    }






}
