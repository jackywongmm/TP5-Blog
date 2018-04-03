<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/02/10
 * Time: 15:46
 */

namespace app\api\controller;

use think\Controller;
use think\Request;

//use Drops;
class Server extends Controller
{

    protected $resp;

    function __construct(Request $request)
    {
        parent::__construct($request);
        $this->resp = new Response();
    }

    /**
     * 图片上传接口
     * @return \think\response\Json
     */
    public function upload()
    {
        $config = [
            'size' => 20971520,
            'ext' => 'jpg,png'
        ];
        $file = $this->request->file('file');

        $upload_path = str_replace('\\', '/', ROOT_PATH . 'public/uploads');
        $save_path = 'public/uploads/';

        $info = $file->validate($config)->move($upload_path);
        if ($info) {
            $result = [
                'error' => 0,
                'url' => str_replace('\\', '/', $save_path . $info->getSaveName())
            ];
            $array['url'] = $result['url'];
            return $this->resp->resp_success($array, "上传成功");
        } else {
            $result = [
                'error' => 1,
                'message' => $file->getError()
            ];
            return $this->resp->resp_error('', $result['message']);
        }
    }


//    /**
//     * 图片上传接口
//     * @return \think\response\Json
//     */
//    public function photo()
//    {
//        //全局变量
//        if(!empty($_FILES)){
//            $file = $_FILES['file'];
//            $type = strtolower(substr($file['name'], strrpos($file['name'], '.') + 1));
//            $arrType = array('jpg', 'gif', 'png', 'bmp', 'jpeg');
//            if (!in_array($type, $arrType)) {
//                return $this->resp->resp_error('', '图片格式错误...', 0);
//            }
//            $max_size = '500000';      // 最大文件限制（单位：byte）
//            $time = time();
//            $date = date("Ymd", $time);
//            $upFileDir = ROOT_PATH . 'public/photo/' . $date; //根据上传时间创建图片目录路径
//
//            if (!file_exists($upFileDir)) {  // 判断存放文件目录是否存在
//                mkdir($upFileDir, 0777, true);
//            }
//            $imageSize = getimagesize($file['tmp_name']);
//            $img = $imageSize[0] . '*' . $imageSize[1];
//            $fName = $file['name'];
//            $fType = explode('.', $fName);
//            $picName = $upFileDir . "/" . time() . "." . $fType[1];//图片上传后的路径
//            $returnName = "public/photo/" . $date . "/" . time() . "." . $fType[1];
//            if (file_exists($picName)) {
//                echo "<font color='#FF0000'>同文件名已存在！</font>";
//                exit;
//            }
//            if (move_uploaded_file($file['tmp_name'], $picName)) {
//                return $this->resp->resp_success($returnName, "上传成功...", 1);
//            }
//        }else{
//            return $this->resp->resp_error('', '请上传图片...', 0);
//        }
//
//    }

}