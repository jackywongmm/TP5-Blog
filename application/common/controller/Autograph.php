<?php
/**
 * Created by IntelliJ IDEA.
 * User: luohengyi.com
 * Date: 2017/8/29
 * Time: 11:27
 * 签名
 */
namespace app\common\controller;
use think\Controller;

class Autograph extends Controller{

    /**
     * @var time 时间
     */
    public $time;

    /**
     * 根据信息构造token
     * @param array $info 信息
     * @return string token字符串
     */
    function encryptToken($info)
    {
        if (empty ($info)) {
            return null;
        }
        $token_cnf = config('autograph');

        $info['random'] = rand(0, 999);
//        $info['end_time']= $token_cnf['end_time'];
        $info = json_encode($info,true);
        return autograph::encrypt($info, $token_cnf['security_key']);
    }

    /**
     * @param $input      加密信息
     * @param $key        加密秘钥
     * @return string     token
     */
    public static function encrypt($input, $key)
    {
        $size = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
        $input = autograph::pkcs5_pad($input, $size);
        $td = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_ECB, '');
        $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
        mcrypt_generic_init($td, $key, $iv);
        $data = mcrypt_generic($td, $input);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $data = base64_encode($data);
        return $data;
    }

    private static function pkcs5_pad($text, $blocksize)
    {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    /**
     * @param $sStr      // 要解密的数据
     * @param $sKey      // 加密密钥
     * @return string    //用户数据
     */
    public static function decrypt($sStr, $sKey)
    {
        $decrypted = mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            $sKey,
            base64_decode($sStr),
            MCRYPT_MODE_ECB
        );
        $dec_s = strlen($decrypted);
        $padding = ord($decrypted[$dec_s - 1]);
        $decrypted = substr($decrypted, 0, -$padding);
        return $decrypted;
    }

    /**
     * @param $time int 时间
     * @return int
     */
    public function getTime(){
        $time= strtotime($this->time);
        $time_h =  date('H',$time);
        $time_m =  date('i',$time);
        $time_s =  date('s',$time);
       return mktime($time_h,$time_m,$time_s,1,1,1970);

    }
    
}