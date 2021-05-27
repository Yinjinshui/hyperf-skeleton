<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $brand_id 
 * @property string $brand_pic 
 * @property string $brand_name 
 * @property string $brand_y_name 
 * @property string $producer 
 * @property string $producer_pic 
 * @property string $remarks 
 * @property int $status 
 * @property string $brand_time 
 * @property int $sort 
 * @property string $brand_prefix 
 * @property int $recycle 
 * @property int $is_brand_select 
 * @property string $brand_banner 
 */
class BrandClass extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brand_class';
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
    protected $casts = ['brand_id' => 'integer', 'status' => 'integer', 'sort' => 'integer', 'recycle' => 'integer', 'is_brand_select' => 'integer'];
}