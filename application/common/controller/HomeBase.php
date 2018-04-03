<?php
namespace app\common\controller;
use think\Cache;
use think\Controller;
use app\api\controller\Response;
use think\Session;
class HomeBase extends Controller
{

    public $user;
    function _initialize()
    {
        $resp = new Response();
        $param = $this->request->param('param/a');
        if($param == null){
            $param = $this->request->get();
            $token = $param['token'];
        }else{
            $token = $param['token'];
        }
        $sort =  $param['sort'];
        $token_cnf=config('autograph');
        if (empty($token) || empty($sort)){
            echo $resp->resp_login($data = '',$point='未登录!',$status = -1);
            exit();
        }
        $autograph = new Autograph();
        $this->user = json_decode($autograph->decrypt($token, $token_cnf['security_key']),true);
        if (empty($this->user['id'])){
            echo $resp->resp_login($data = '',$point='未登录!',$status = -1);
            exit();
        }
        $cache = Cache::get($sort);
        if($cache['token'] == null || $cache['token'] != $token){
            echo $resp->resp_login($data = '',$point='未登录!',$status = -1);
            exit();
        }
        if($cache['user_id'] != $this->user['id']){
            echo $resp->resp_login($data = '',$point='未登录!',$status = -1);
            exit();
        }
    }
}