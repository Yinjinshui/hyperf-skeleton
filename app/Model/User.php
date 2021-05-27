<?php

declare (strict_types=1);
namespace App\Model;

use Hyperf\DbConnection\Model\Model;
/**
 * @property int $id 
 * @property string $user_id 
 * @property string $user_name 
 * @property string $access_id 
 * @property string $access_key 
 * @property string $wx_id 
 * @property string $wx_name 
 * @property int $sex 
 * @property string $headimgurl 
 * @property string $province 
 * @property string $city 
 * @property string $county 
 * @property string $detailed_address 
 * @property string $money 
 * @property string $score 
 * @property string $password 
 * @property string $Register_data 
 * @property string $e_mail 
 * @property string $real_name 
 * @property string $mobile 
 * @property string $birthday 
 * @property string $wechat_id 
 * @property string $address 
 * @property string $Bank_name 
 * @property string $Cardholder 
 * @property string $Bank_card_number 
 * @property int $share_num 
 * @property string $Referee 
 * @property string $access_token 
 * @property string $consumer_money 
 * @property string $img_token 
 * @property string $zhanghao 
 * @property string $mima 
 * @property int $distribution_status 
 * @property int $source 
 */
class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user';
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
    protected $casts = ['id' => 'integer', 'sex' => 'integer', 'share_num' => 'integer', 'distribution_status' => 'integer', 'source' => 'integer'];

    public $timestamps = false;
}