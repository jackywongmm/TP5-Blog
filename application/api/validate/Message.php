<?php
namespace app\api\validate;
use think\Validate;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/5 0005
 * Time: 10:41
 */
class Message extends Validate
{
    protected $rule = [
        'title' => 'require',
        'name' => 'require',
        'content' => 'require',
    ];

    protected $message = [
        'title.require' => '请输入标题',
        'name.require' => '请选择发布人',
        'content.require'=>'请输入发布内容',
    ];

}