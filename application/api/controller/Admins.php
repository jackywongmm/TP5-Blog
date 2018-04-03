<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/23 0023
 * Time: 11:43
 */

namespace app\api\controller;

use app\common\model\Article as ArticleModel;
use app\common\controller\HomeBase;
use think\Db;
use think\Request;
use think\Controller;
class Admins extends Controller
{
    protected $article_model;
    protected $resp;
    function __construct(Request $request)
    {
        parent::__construct($request);
        $this -> resp = new Response();
        $this->article_model = new ArticleModel();
    }
    // ********************************** 个人信息
    /**
     * 查询个人信息
     */
    public function query_message(){
        $message_list = Db::name('message')->where(['uid'=>1])->select();
        return $this->resp->resp_success($message_list,'查询成功');
    }
    /**
     * 新增个人信息
     */
    public function add_message(){
        $param = $this->request->param('param/a');
        $map['key'] = $param['key'];
        $map['value'] = $param['value'];
        $map['uid'] = $this->user['id'];
        if(Db::name('message')->insert($map)){
            return $this->resp->resp_success('','新增成功');
        }else{
            return $this->resp->resp_error('','新增失败');
        }
    }
    /**
     * 编辑个人信息
     */
    public function update_message(){
        $param = $this->request->param('param/a');
        $map['key'] = $param['key'];
        $map['value'] = $param['value'];
        if(Db::name('message')->where(['id'=>$param['id']])->update($map)){
            return $this->resp->resp_success('','编辑成功');
        }else{
            return $this->resp->resp_error('','编辑失败');
        }
    }
    /**
     * 删除个人信息
     */
    public function delete_message(){
        $param = $this->request->param('param/a');
        if(Db::name('message')->where(['id'=>$param['id']])->delete()){
            return $this->resp->resp_success('','删除成功');
        }else{
            return $this->resp->resp_error('','删除失败');
        }
    }
    // ********************************** 评论信息
    /**
     * 查询评论
     */
    public function query_comment(){
        $comment_list = Db::name('comment')
            ->alias('c')
            ->join('article a','a.id = c.aid')
            ->order('c.id DESC')
            ->field('c.*,a.title as title')
            ->select();
        return $this->resp->resp_success($comment_list,'操作成功');
    }
    /**
     *  删除文章评论
     */
    public function delete_comment(){
        $param = $this->request->param('param/a');
        if(Db::name('comment')->where(['id'=>$param['id']])->delete()){
            return $this->resp->resp_success('','删除成功');
        }else{
            return $this->resp->resp_error('','删除失败');
        }
    }
    // ***********************************  文章管理

    /**
     * 查询文章
     */
    public function query_article(){
        $comment_list = Db::name('article')
            ->alias('a')
            ->join('classification c','c.id = a.fid')
            ->where(['status'=>0])
            ->order('a.id DESC')
            ->field('a.id,a.title,a.fid,a.name,a.createTime,a.content,a.abstract,c.name as type')
            ->select();
        return $this->resp->resp_success($comment_list,'操作成功');
    }
    
     /**
     * 编辑文章
     */
    public function update_article()
    {
        if ($this->request->isPost()) {
            $data            = $this->request->param('param/a');
            if ($this->article_model->allowField(true)->save($data['data'],$data['data']['id']) !== false) {
                return $this->resp->resp_success('','编辑成功');
            } else {
                return $this->resp->resp_error('','编辑失败');
            }
        }
    }
    

    
    /**
     * 发布文章
     */
    public function release_article()
    {
        if ($this->request->isPost()) {
            $data            = $this->request->param('param/a');
            if ($this->article_model->allowField(true)->save($data)) {
                return $this->resp->resp_success('','发布成功');
            } else {
                return $this->resp->resp_error('','发布失败');
            }
        }
    }
    /**
     *  删除文章到回收站
     */
    public function delete_article(){
        $param = $this->request->param('param/a');
        $result = Db::name('article')->where(['id'=> $param['id']])->update(['status'=>1,'deleteTime'=>date('Y-m-d H:i:s',time())]);
        if ($result) {
            return $this->resp->resp_success('','删除成功');
        } else {
            return $this->resp->resp_error('','删除失败');
        }
    }
    // ************************************  留言管理
    /**
     *  查询多有留言
     */
    public function query_leaving_message(){
        $leaving_message_list = Db::name('leaving_message')->select();
        return $this->resp->resp_success($leaving_message_list,'操作成功');
    }
    /**
     * 删除留言
     */
    public function delete_leaving_message(){
        $param = $this->request->param('param/a');
        if(Db::name('leaving_message')->where(['id'=>$param['id']])->delete()){
            return $this->resp->resp_success('','删除成功');
        }else{
            return $this->resp->resp_error('','删除失败');
        }
    }

    // *************************************  分类管理
    /**
     *  查询分类
     */
    public function query_classification(){
        $classification_list = Db::name('classification')->select();
        return $this->resp->resp_success($classification_list,'查询成功');
    }
    /**
     * 新增分类
     */
    public function add_classification(){
        $param = $this->request->param('param/a');
        if(Db::name('classification')->insert(['name'=>$param['name']])){
            return $this->resp->resp_success('','新增成功');
        }else{
            return $this->resp->resp_error('','新增失败');
        }
    }
    /**
     * 编辑分类
     */
    public function update_classification(){
        $param = $this->request->param('param/a');
        $map['name']= $param['name'];
        if(Db::name('classification')->where(['id'=>$param['id']])->update($map)){
            return $this->resp->resp_success('','编辑成功');
        }else{
            return $this->resp->resp_error('','编辑失败');
        }
    }
    /**
     * 删除分类
     */
    public function delete_classification(){
        $param = $this->request->param('param/a');
        if(Db::name('classification')->where(['id'=>$param['id']])->delete()){
            return $this->resp->resp_success('','删除成功');
        }else{
            return $this->resp->resp_error('','删除失败');
        }
    }
    // **************************************  链接管理
    /**
     * 查询链接
     */
    public function query_link(){
        $link_list = Db::name('link')->select();
         return $this->resp->resp_success($link_list,'查询成功');
    }
    /**
     * 新增链接
     */
    public function add_link(){
        $param = $this->request->param('param/a');
        $map['name']= $param['name'];
        $map['url'] = $param['url'];
        if(Db::name('link')->insert($map)){
            return $this->resp->resp_success('','新增成功');
        }else{
            return $this->resp->resp_error('','新增失败');
        }
    }
    /**
     * 编辑链接
     */
    public function update_link(){
        $param = $this->request->param('param/a');
        $map['name']= $param['name'];
        $map['url'] = $param['url'];
        if(Db::name('link')->where(['id'=>$param['id']])->update($map)){
            return $this->resp->resp_success('','编辑成功');
        }else{
            return $this->resp->resp_error('','编辑失败');
        }
    }
    /**
     * 删除链接
     */
    public function delete_link(){
        $param = $this->request->param('param/a');
        if(Db::name('link')->where(['id'=>$param['id']])->delete()){
            return $this->resp->resp_success('','删除成功');
        }else{
            return $this->resp->resp_error('','删除失败');
        }
    }
    //**************************************** 回收站
    /**
     * 查询回收站文章
     */
    public function query_article_update(){
        $article_list = Db::name('article')
            ->where(['status'=>1])
            ->field('id,title,deleteTime')
            ->select();
        return $this->resp->resp_success($article_list,'操作成功');
    }
    /**
     * 还原文章
     */
    public function return_article(){
        $param = $this->request->param('param/a');
        if(Db::name('article')->where(['id'=>$param['id']])->update(['status'=>0])){
            return $this->resp->resp_success('','还原成功');
        }else{
            return $this->resp->resp_error('','还原失败');
        }
    }
    /**
     * 彻底删除
     */
    public function delete_article_all(){
        $param = $this->request->param('param/a');
        if(Db::name('article')->where(['id'=>$param['id']])->delete()){
            return $this->resp->resp_success('','删除成功');
        }else{
            return $this->resp->resp_error('','删除失败');
        }
    }
}