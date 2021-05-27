<?php

declare (strict_types=1);
namespace App\Model;

/**
 * @property int $cid 
 * @property int $sid 
 * @property string $pname 
 * @property string $img 
 * @property string $bg 
 * @property int $level 
 * @property int $sort 
 * @property string $add_date 
 * @property int $recycle 
 */
class ProductClass extends Model
{
    protected $table = 'product_class';
    protected $fillable = ['cid', 'sid', 'pname', 'img', 'bg', 'level', 'sort', 'add_date', 'recycle'];
    protected $casts = ['cid' => 'integer', 'sid' => 'integer', 'level' => 'integer', 'sort' => 'integer', 'recycle' => 'integer'];
    public $timestamps = false;
}