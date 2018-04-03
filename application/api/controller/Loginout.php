<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/9 0009
 * Time: 09:37
 */

namespace app\api\controller;

use think\cache;
use think\Request;
use app\common\controller\HomeBase;
use think\Db;

class Loginout extends HomeBase
{

    private $resp;

    function __construct(Request $request)
    {
        parent::__construct($request);
        $this->resp = new Response();
    }

    // 退出登录
    public function logout()
    {
        $param = $this->request->param('param/a');
        $sort = $param['sort'];
        Cache::pull($sort);
        $msg = Cache::get($sort);
        if (empty($msg)) {
            $point = '退出成功！';
            return $this->resp->resp_success('', $point);
        } else {
            $point = '退出失败！';
            return $this->resp->resp_error('', $point);
        }
    }

    // 修改密码
    public function updatePwd()
    {
        $param = $this->request->param('param/a');
        $oldPwd = $param['oldPwd'];
        $newPwd = $param['newPwd'];
        $Pold = Db::name('user')->field('password')->where(['id'=>$this->user['id']])->find();
        if ($Pold['password'] !== md5($oldPwd)) {
            $point = '原密码错误！';
            return $this->resp->resp_error('',$point);
        } else {
            $pwd = md5($newPwd);
            $msg = Db::name('user')->where(['id'=>$this->user['id']])->update(['password' => $pwd]);
            if ($msg == true) {
                $point = '修改成功！';
                return $this->resp->resp_success('',$point);
            } else {
                $point = '修改失败！';
                return $this->resp->resp_error('',$point);
            }
        }
    }
}