<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/3 0003
 * Time: 11:52
 */

namespace app\api\controller;
use app\common\controller\Autograph;
use think\Controller;
use think\Db;
use think\Request;
use think\Cache;
class Login extends Controller
{
    private $resp;
    function __construct(Request $request)
    {
        parent::__construct($request);
        $this -> resp = new Response();
    }
    /**
     * 登录
     * @return mixed
     */
    public function login(){
        $param = $this->request->param('param/a');
        $name = $param['username'];
        $pwd = $param['password'];
        $user = Db::name('user')->field('id,password')->where(['username' => $name])->find();
        if ($user == null){
            return $this->resp->resp_login('','用户不存在！',0);
        }
        if ($user['password'] !== md5($pwd)) {
            return $this->resp->resp_login('', '密码错误！',0);
        }
        $autograph = new Autograph();
        $sort = rand(100000,999999)+rand(100000,99999);
        $token = $autograph->encryptToken(['id' => $user['id']]);
        $array['token'] = $token;
        $array['user_id'] = $user['id'];
        Cache::set($sort,$array,7200);
        $data['token'] = $token;
        $data['sort'] = $sort;
        if(!empty($user)){
            $point = '登陆成功！';
            return $this->resp->resp_login($data,$point,1);
        }else{
            $point = "登录失败！";
            return $this->resp->resp_login('',$point,0);
        }
    }
}