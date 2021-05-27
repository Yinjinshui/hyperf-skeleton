<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $cid 
 * @property string $cname 
 * @property int $status 
 * @property string $del 
 * @property-read \App\Model\CnameInfo $cinfo 
 */
class Cname extends Model
{
    //主键
    protected $primaryKey = "cid";
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cname';
    /**
     * The attributes that are mass assignable.
     *  批量赋值
     * @var array
     */
    protected $fillable = ['cname'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['cid' => 'integer', 'status' => 'integer'];
    public $timestamps = false;
    //默认属性值
    protected $attributes = ['status' => 1];

    /**
     * 一对一
     * @return \Hyperf\Database\Model\Relations\HasOne
     */
    public function cinfo()
    {
        return $this->hasOne(CnameInfo::class, "fk_cid", "cid");
    }
}