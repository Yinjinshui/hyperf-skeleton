<?php


namespace App\Service;


use App\Model\ProductList;

class ProductService
{

    public function getProductDetailinfo($id)
    {
        return ProductList::query()->where(['id'=>$id])->first();
    }

}