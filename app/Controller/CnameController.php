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

use App\Model\Cname;
use Hyperf\HttpServer\Contract\RequestInterface;


class CnameController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        $data=Cname::query()->where('cid',1)->get();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
            'data'=>$data
        ];
    }

    public function listss()
    {
        $method = $this->request->getMethod();
        $data=Cname::query()->where('cid','>=',3)->get();

        return [
            'method' => $method,
            'data'=>$data
        ];
    }

    /**
     * 添加数据
     * @return array
     */
    public function addss()
    {
        $method = $this->request->getMethod();
        $cname=$this->request->post('cname');
        if(empty($cname)){
            return [
                'method' => $method,
                'data'=>'cname不能为空'
            ];
        }
        //方式1
        $user = new Cname();
        $user->cname = $cname;
        $res=$user->save();

        //方式2
        Cname::create(['cname'=>$cname.rand(1000,999)]);


        return [
            'method' => $method,
            'data'=>$res
        ];
    }

    /**
     * 更新数据
     */
    public function savess()
    {
        $method = $this->request->getMethod();
        $cname=$this->request->post('cname');
        if(empty($cname)){
            return [
                'method' => $method,
                'data'=>'cname不能为空'
            ];
        }

        $res=Cname::query()->where('cname',$cname)->update(['status'=>0]);
        return [
            'method' => $method,
            'data'=>$res
        ];
    }
    
    /**
     * 一对一
     */
    public function oness()
    {
        $method = $this->request->getMethod();
        $cid=$this->request->post('cid');
        if(empty($cid)){
            return [
                'method' => $method,
                'data'=>'cid不能为空'
            ];
        }
        $query=Cname::query()->find($cid);
        var_dump($query);
        $res=$query->cinfo;
        return [
            'method' => $method,
            'data'=>[$query,$res]
        ];
    }



}
