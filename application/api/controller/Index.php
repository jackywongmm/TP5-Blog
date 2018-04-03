<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2 0002
 * Time: 16:15
 */

namespace app\api\controller;


use app\common\controller\HomeBase;
use think\Controller;
use think\Db;
use think\Request;
class Index extends Controller
{
    protected $resp;
    function __construct(Request $request)
    {
        parent::__construct($request);
        $this -> resp = new Response();
    }
    /**
     * 插入文章评论
     */
    public function comment(){
        $param = $this->request->param('param/a');
        $map['aid'] = $param['aid'];
        $map['name'] = $param['name'];
        $map['comment'] = $param['comment'];
        $map['email'] = $param['email'];
        $map['createTime'] = date('Y-m-d H:i;s');
        if(Db::name('comment')->insert($map)){
            return $this->resp->resp_success('','评论成功');
        }else{
            return $this->resp->resp_error('','评论失败');
        }
    }
    /**
     * 插入留言
     */
    public function leaving_message(){
        $param = $this->request->param('param/a');
        $map['name'] = $param['name'];
        $map['email'] = $param['email'];
        $map['comment'] = $param['comment'];
        $map['createTime'] = date('Y-m-d H:i;s');
        if(Db::name('leaving_message')->insert($map)){
            return $this->resp->resp_success('','留言成功');
        }else{
            return $this->resp->resp_error('','留言失败');
        }
    }
    /**
     * 查看文章评论
     */
    public function queryComment(){
        $param = $this->request->param('param/a');
        $commentList = Db::name('comment')
            ->where(['aid'=>$param['aid']])
            ->select();
       return $this->resp->resp_success($commentList,'操作成功');
    }
    /**
     * 查询分类
     */
    public function queryClassification(){
        $classification_list = Db::name('classification')->select();
        return $this->resp->resp_success($classification_list,'查询成功');
    }
    /**
     * 按分类查询文章
     */
     public function queryArticle(){
        $param = $this->request->param('param/a');
        $fid = $param['fid'];
        $map = [];
        $article_list = Db::name('article')
            ->where(['status'=>0])
            ->where(['fid'=>$fid])
            ->order('reading DESC')
            ->select();
        $comment = Db::name('comment')->field('aid')->select();
        if(count($article_list) > 0){
            for($i = 0;$i<count($article_list);$i++){
                $x = 0;
                for($j=0;$j<count($comment);$j++){
                    if($article_list[$i]['id'] == $comment[$j]['aid']){
                        $x++;
                    }
                }            
                $article_list[$i]['sum'] = $x;
            }
        }
        return $this->resp->resp_success($article_list,'操作成功');
    }
    /**
     *  连接查询
     **/
    public function queryLink(){
        $linkList = Db::name('link')->select();
        return $this->resp->resp_success($linkList,'查询成功');
    }
    
     /**
     *  阅读排行
     **/
    public function queryRank(){
        $linkList = Db::name('article')->order('reading DESC')->select();
        return $this->resp->resp_success($linkList,'查询成功');
    }
    /**
     * 查询文章
     */
    public function allList()
    {
	   $param= $this->request->param('param/a');
	   $map = [];
	   if(!empty($param['title'])){
	   		$map['title'] = ['like','%'.$param['title'].'%'];
	   }
	   if(!empty($param['name'])){
	   		$map['name'] = ['like','%'.$param['name'].'%'];
	   }
	   $map['status'] = 0;
	   $classification = Db::name('classification')->select();
	   if(empty($param['id'])){
		   	$article_list=Db::name('article')->where($map)->select();
		    foreach($article_list as $key =>$val){
		    	$count=Db::name('comment')->where('aid',$val['id'])->field('aid,count(id) as sum')->select();
		    	foreach($count as $k=>$v){
		    		if($val['id']==$v['aid']){
		    			$article_list[$key]['sum']=$v['sum'];
		    		}else{
		    			$article_list[$key]['sum']=0;
		    		}
		    	}
		    }
		    if(count($article_list)>0){
	    	 for($i = 0;$i<count($article_list);$i++){
	    		for($j=0;$j<count($classification);$j++){	    		
		    		if($article_list[$i]['fid'] == $classification[$j]['id']){
		    			$article_list[$i]['classification'] = $classification[$j]['name'];
		    		}
	    		}
	   		 }	   		    		 
	      }		 
	    }else{
	   	   $article_list=Db::name('article')->where(['status'=>0])->where('id',$param['id'])->find();
	     		        Db::name('article')->where(['id'=>$param['id']])->setInc('reading');	     		        
	       if(count($article_list)>0){
	    		for($j=0;$j<count($classification);$j++){	    		
		    		if($article_list['fid'] == $classification[$j]['id']){
		    			$article_list['classification'] = $classification[$j]['name'];
		    		}
	   		    }	   		    		 
	        }
	    }
	  return $this->resp->resp_success($article_list,'查询成功'); 
	}
}