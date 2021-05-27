<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $id 
 * @property string $product_number 
 * @property string $product_title 
 * @property string $subtitle 
 * @property string $product_class 
 * @property string $imgurl 
 * @property string $content 
 * @property int $sort 
 * @property string $add_date 
 * @property int $volume 
 * @property string $s_type 
 * @property int $num 
 * @property int $status 
 * @property string $seller_id 
 * @property int $brand_id 
 * @property int $is_distribution 
 * @property int $is_default_ratio 
 * @property string $weight 
 * @property int $distributor_id 
 * @property string $freight 
 * @property int $is_zhekou 
 * @property string $separate_distribution 
 * @property int $recycle 
 * @property string $initial 
 * @property int $leve 
 * @property string $leve1 
 * @property string $leve2 
 * @property string $leve3 
 * @property string $leve4 
 * @property string $leve5 
 * @property int $type 
 * @property string $commissions 
 * @property int $is_celebrity 
 * @property int $is_hot 
 * @property int $is_brand_select 
 * @property int $is_like 
 */
class ProductList extends Model
{
    protected $primaryKey = "id";
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_list';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'sort' => 'integer', 'volume' => 'integer', 'num' => 'integer', 'status' => 'integer', 'brand_id' => 'integer', 'is_distribution' => 'integer', 'is_default_ratio' => 'integer', 'distributor_id' => 'integer', 'is_zhekou' => 'integer', 'recycle' => 'integer', 'leve' => 'integer', 'type' => 'integer', 'is_celebrity' => 'integer', 'is_hot' => 'integer', 'is_brand_select' => 'integer', 'is_like' => 'integer'];
    public $timestamps = false;
}