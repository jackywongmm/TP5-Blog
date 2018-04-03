<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/3 0003
 * Time: 12:33
 */

namespace app\api\controller;


use think\Controller;

class Response extends Controller
{
    //返回数据
    public $data;
    //状态
    public $status;
    //返回提示
    public $point;

    /**
     * @param $data
     * @return array
     * 成功返回状态
     */

    public  function resp_success($data,$point='操作成功!',$status = 1){
        $this->data  =  $data != "" ? $data :$this->data;
        $this->point =  $this->point =="" ? $point : $this->point;
        return  json(['data'=>$this->data,'status'=>$status,'point'=>$this->point]);
    }


    /**
     * @param $data
     * @return array
     * 失败返回状态
     */
    public  function resp_error($data,$point='操作失败!',$status=0){
        $this->data =  $data != "" ? $data : $this->data;
        $this->point =  $this->point =="" ? $point : $this->point;
        return json(['message'=>$this->data,'status'=>$status,'point'=>$this->point]);
    }
    /**
     * @param $data
     * @return array
     * 登录
     */

    public  function resp_login($data ,$point,$status){
        $this->data =  $data != "" ? $data : $this->data;
        $this->point =  $this->point =="" ? $point : $this->point;
        return json_encode(['data'=>$this->data,'status'=>$status,'point'=>$this->point]);
    }
}