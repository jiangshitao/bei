<?php

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Qiniu\Storage\BucketManager;
use Qiniu\Processing\ImageUrlBuilder;

class QiNiuYunHandle
{

    //七牛云访问KEY
    const ACCESS_KEY = 'wKENQUwRDvGC_cpaenJ_ZwRjXsUUkXgCCdvgEpnG';
    //七牛云服务KEY
    const SECRET_KEY = 'FCqECimR323AUVKF1Q0hiH2GvdxfsZCoCiTx8EqN';
    //七牛云存储空间名称
    const BUCKET     = 'baicaiqiche';

    //构建鉴权对象
    private static $auth = NULL;
    //上传对象
    private static $uploadMgr = NULL;
    //存储空间文件操作对象
    private static $bucketMgr = NULL;
    //图片处理对象
    private static $imageUrlBuilder = NULL;
    //token
    private static $toekn = NULL;

    /**
     * 获取鉴权对象
     * @return null|Auth
     *
     */

    private static function getAuth()
    {
        if(empty(self::$auth))
        {
            self::$auth = new Auth(self::ACCESS_KEY, self::SECRET_KEY);
        }

        return self::$auth;
    }

    /**
     *
     * 获取上传token
     * @param string $bucket 存储空间名称
     * @return null|string
     *
     */

    private static function getToken($bucket = self::BUCKET)
    {
        if(empty(self::$toekn))
        {
            $auth = self::getAuth();

            self::$toekn = $auth->uploadToken($bucket);
        }

        return self::$toekn;
    }

    /**
     * 获取上传对象
     * @return null|UploadManager
     *
     */
    private static function getUploadMgr()
    {
        if(empty(self::$uploadMgr))
        {
            self::$uploadMgr = new UploadManager();
        }

        return self::$uploadMgr;
    }

    /**
     * 获取存储空间操作对象
     * @return null|BucketManager
     *
     */
    private static function getBucketMgr()
    {
        if(empty(self::$bucketMgr))
        {
            $auth = self::getAuth();

            self::$bucketMgr =  new BucketManager($auth);
        }

        return self::$bucketMgr;
    }

    /**
     * @param $filePath 上传图片路径
     * @param $qn_filename 七牛云文件文件名
     * @return bool
     *
     */

    public static function uploadfile($filePath,$qn_filename)
    {
        if( ! is_file($filePath))
        {
            return false;
        }

        // 生成上传 Token
        $token = self::getToken();

        // 初始化 UploadManager 对象并进行文件的上传。
        $uploadMgr = self::getUploadMgr();

        // 调用 UploadManager 的 putFile 方法进行文件的上传。
        list($ret, $err) = $uploadMgr->putFile($token, $qn_filename, $filePath);

        return empty($err) ? $ret : $err;

    }

    /**
     *
     * 复制或是移动文件
     * @param string $from_bucket
     * @param $from_filename
     * @param string $to_bucket
     * @param $to_filename
     * @param $type
     * @return bool
     *
     */

    public static function copyMoveFile(
       $from_filename , $to_filename , $type = 'copy' , $from_bucket = self::BUCKET , $to_bucket = self::BUCKET)
    {
        if(empty($from_filename) || empty($to_filename))
        {
            return false;
        }

        if( ! in_array($type,['copy','move']))
        {
            return false;
        }

        $bucketMgr = self::getBucketMgr();

        switch ($type)
        {
            case 'copy':
                $err = $bucketMgr->copy($from_bucket, $from_filename, $to_bucket, $to_filename);
                break;
            case 'move':
                $err = $bucketMgr->move($from_bucket, $from_filename, $to_bucket, $to_filename);
                break;
            default:
                $err = true;
                break;
        }

        return empty($err) ? true : false ;
    }

    /**
     * @param $filename
     * @param string $bucket
     * @return bool
     *
     */
    public static function delFile($filename,$bucket = self::BUCKET)
    {
        if(empty($filename))
        {
            return false;
        }

        $bucketMgr = self::getBucketMgr();

        $err = $bucketMgr->delete($bucket, $filename);

        return empty($err) ? true : false ;
    }

    /**
     *  获取存储空间单个文件的信息
     * @param $filename 文件名称
     * @param string $bucket 存储空间名称
     * @return bool
     *
     */
    public static function getFileInfo($filename,$bucket = self::BUCKET)
    {
        if(empty($filename))
        {
            return false;
        }

        $bucketMgr = self::getBucketMgr();

        list($ret, $err) = $bucketMgr->stat($bucket, $filename);

        return empty($err) ? $ret : $err;
    }

    /**
     *
     * 获取存储空间文件列表
     * @param int $limit本次列举的条目数
     * @param string $marker 上次列举返回的位置标记，作为本次列举的起点信息。
     * @param string $prefix 要列取文件的公共前缀
     * @param string $bucket 存储空间名称
     * @return mixed
     *
     */
    public static function getFileList($limit = 20, $marker = '',$prefix = '',$bucket = self::BUCKET)
    {
        $bucketMgr = self::getBucketMgr();

        $limit = (int) $limit ? 20 : (int) $limit;

        // 列举文件
        list($iterms, $marker, $err) = $bucketMgr->listFiles($bucket, $prefix, $marker, $limit);

        return empty($err) ? [$iterms,$marker] : $err;
    }

    /**
     * 获取存储空间操作对象
     * @return null|BucketManager
     *
     */
    private static function getImageUrlBuilder()
    {
        if(empty(self::$imageUrlBuilder))
        {
            self::$imageUrlBuilder = new ImageUrlBuilder();
        }

        return self::$imageUrlBuilder;
    }

    /**
     * 缩略图链接拼接
     *
     * @param  string $url 图片链接
     * @param  int $mode 缩略模式
     * @param  int $width 宽度
     * @param  int $height 长度
     * @param  string $format 输出类型 [可选]
     * @param  int $quality 图片质量 [可选]
     * @param  int $interlace 是否支持渐进显示 [可选]
     * @param  int $ignoreError 忽略结果 [可选]
     * @return string
     *
     */

    public static function thumbnail($url, $mode, $width, $height, $format = null,
                                     $interlace = null, $quality = null, $ignoreError = 1
    )
    {
        $imageUrlBuilder = self::getImageUrlBuilder();
        $thumbLink = $imageUrlBuilder->thumbnail($url, $mode, $width, $height,$format,$interlace,$quality,$ignoreError);

        return $thumbLink;
    }
}